<?php
session_start();

require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once "../../infra/permissoes.php";

if (!ehAdministrador()) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit;
}

include "../../infra/conexao.php";
require_once __DIR__ . "/../../infra/seguranca.php";

function cpfValido($cpf)
{
    $cpf = preg_replace('/\D/', '', (string) $cpf);

    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1+$/', $cpf)) {
        return false;
    }

    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += (int) $cpf[$i] * (10 - $i);
    }

    $digito1 = $soma % 11;
    $digito1 = $digito1 < 2 ? 0 : 11 - $digito1;

    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += (int) $cpf[$i] * (11 - $i);
    }

    $digito2 = $soma % 11;
    $digito2 = $digito2 < 2 ? 0 : 11 - $digito2;

    return (int) $cpf[9] === $digito1 && (int) $cpf[10] === $digito2;
}

$erro = "";

if (isset($_POST['cadastrar'])) {

    $nome = limparTexto($_POST["nome_cadastro"] ?? "");
    $cargo = limparTexto($_POST["cargo"] ?? "");
    $cpf = preg_replace('/\D/', '', (string) ($_POST["cpf_cadastro"] ?? ""));
    $telefone = preg_replace('/\D/', '', (string) ($_POST["telefone_cadastro"] ?? ""));
    $email = limparEmail($_POST["email_cadastro"] ?? "");
    $senha = $_POST["senha_cadastro"] ?? "";

    if (!textoValido($nome, 3, 60)) {
        $erro = "Nome inválido.";
    } elseif (!in_array($cargo, ['Administrador', 'Funcionário'], true)) {
        $erro = "Cargo inválido.";
    } elseif ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido.";
    } elseif (!cpfValido($cpf)) {
        $erro = "CPF inválido.";
    } elseif (strlen($telefone) < 10 || strlen($telefone) > 11) {
        $erro = "Telefone inválido.";
    } elseif (strlen((string) $senha) < 6) {
        $erro = "Senha muito curta.";
    } else {
        $stmtDuplicidade = $conexao->prepare("SELECT id_administrador FROM Pessoa WHERE email_cadastro = ? OR cpf_cadastro = ? OR telefone_cadastro = ?");
        $stmtDuplicidade->bind_param("sss", $email, $cpf, $telefone);
        $stmtDuplicidade->execute();
        $resultadoDuplicidade = $stmtDuplicidade->get_result();

        if ($resultadoDuplicidade->num_rows > 0) {
            $erro = "Já existe um usuário com este e-mail, CPF ou telefone.";
        } else {
            if (strcasecmp($cargo, "Administrador") === 0) {
                $id_perfil = 1;
            } else {
                $id_perfil = 2;
            }

            $perfilExiste = $conexao->prepare("SELECT id_perfil FROM Perfil WHERE id_perfil = ?");
            $perfilExiste->bind_param("i", $id_perfil);
            $perfilExiste->execute();
            $perfilExiste->store_result();

            if ($perfilExiste->num_rows === 0) {
                $cargoPerfil = $id_perfil === 1 ? "Administrador" : "Funcionário";
                $perfilInsert = $conexao->prepare("INSERT INTO Perfil (id_perfil, cargo) VALUES (?, ?)");
                $perfilInsert->bind_param("is", $id_perfil, $cargoPerfil);
                $perfilInsert->execute();
            }

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Pessoa
            (nome_cadastro, email_cadastro, telefone_cadastro, cpf_cadastro, senha_cadastro, id_perfil)
            VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssssi", $nome, $email, $telefone, $cpf, $senhaHash, $id_perfil);

            if (!$stmt->execute()) {
                die("Erro ao cadastrar funcionário: " . $stmt->error);
            }

            header("Location: funcionarios-cadastrados.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina_cadastro_user">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbar-Nav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../dashboard/tela-geral-home.php">Dashboard</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../sensores/tela-lista-sensores.php">Sensores</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../trens/tela-lista-trens.php">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="funcionarios-cadastrados.php">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?= htmlspecialchars($_SESSION["nome"] ?? "Usuário") ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../login/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="d-flex align-items-center justify-content-center pg-cadastro-funcionario">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 card-cadastro-funcionario">
                    <div class="card-body p-5">

                        <h2 class="card-title text-center fw-bold mb-2">Cadastrar novo funcionário</h2>
                        <p class="text-center text-muted mb-5">Preencha os dados abaixo para cadastrar um novo funcionário.</p>

                        <?php if (!empty($erro)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= htmlspecialchars($erro) ?>
                            </div>
                        <?php endif; ?>

                        <form id="form-cadastro-funcionario" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nome Completo</label>
                                    <input type="text" id="nome-cadastro" name="nome_cadastro" class="form-control" placeholder="Digite o nome completo" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Cargo</label>
                                    <select id="cargo-cadastro" name="cargo" class="form-select" required>
                                        <option value="" selected>Selecione o cargo</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Funcionário">Funcionário</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CPF</label>
                                    <input type="text" id="cpf-cadastro" name="cpf_cadastro" class="form-control" placeholder="000.000.000-00" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Telefone</label>
                                    <input type="tel" id="telefone-cadastro" name="telefone_cadastro" class="form-control" placeholder="(00) 90000-0000" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" id="email-cadastro" name="email_cadastro" class="form-control" placeholder="digite o e-mail" required>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Senha</label>
                                    <input type="password" id="senha-cadastro" name="senha_cadastro" class="form-control" placeholder="Crie uma senha forte" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
    <a href="funcionarios-cadastrados.php" class="btn btn-voltar">← Voltar</a>

    <button type="submit" name="cadastrar" id="btn-func-cadastrar" class="btn btn-primary btn-func-custom">
        Cadastrar
    </button>
</div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>