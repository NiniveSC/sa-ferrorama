<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";

if (!ehAdministrador()) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit;
}

require '../../infra/conexao.php';

$sql_usuarios = "SELECT id_administrador, nome_cadastro FROM Pessoa ORDER BY nome_cadastro ASC";
$resultado_usuarios = $conexao->query($sql_usuarios);

// Busca o id_trem vindo da URL
$id_trem = isset($_GET["id_trem"]) ? (int) $_GET["id_trem"] : 0;
$mensagem_erro = "";

// Se enviou o formulário, atualiza no banco
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo_trem = $_POST["tipo_trem"] ?? '';
    $localizacao_trem = $_POST["localizacao_trem"] ?? '';
    $status_trem = $_POST["status_trem"] ?? '';
    $id_responsavel = !empty($_POST["id_responsavel"]) ? (int) $_POST["id_responsavel"] : null;

    if (!empty($tipo_trem) && !empty($localizacao_trem) && !empty($status_trem) && $id_trem > 0) {
        $sql_update = "UPDATE Trem SET 
                        tipo_trem = ?,
                        localizacao_trem = ?,
                        status_trem = ?,
                        id_responsavel = ?
                       WHERE id_trem = ?";

        $stmt = $conexao->prepare($sql_update);
        $stmt->bind_param("sssii", $tipo_trem, $localizacao_trem, $status_trem, $id_responsavel, $id_trem);

        if ($stmt->execute()) {
            header("Location: tela-lista-trens.php");
            exit();
        } else {
            $mensagem_erro = "Erro no banco de dados: " . $stmt->error;
        }
    } else {
        $mensagem_erro = "Por favor, preencha todos os campos.";
    }
}

// Carrega dados atuais do trem
$trem = null;
if ($id_trem > 0) {
    $sql_select = "SELECT * FROM Trem WHERE id_trem = $id_trem";
    $resultado = mysqli_query($conexao, $sql_select);
    $trem = mysqli_fetch_assoc($resultado);
}

if (!$trem) {
    header("Location: tela-lista-trens.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Trem</title>
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
                        <a class="nav-link" href="tela-lista-trens.php">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a>
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
                        <div class="card-body p-4">
                            <h2 class="card-title text-center fw-bold mb-4" style="color: #2d3250;">
                                Editar Trem
                            </h2>

                            <?php if (!empty($mensagem_erro)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= htmlspecialchars($mensagem_erro) ?>
                                </div>
                            <?php endif; ?>

                            <form action="" method="POST" id="form-cadastro-funcionario">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">ID do trem</label>
                                        <input type="text" class="form-control" value="<?= htmlspecialchars($trem['id_trem']) ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Tipo</label>
                                        <select name="tipo_trem" id="cargo-cadastro" class="form-select" required>
                                            <option value="" disabled>Selecione o tipo</option>
                                            <option value="Carga viva" <?= ($trem['tipo_trem'] == 'Carga viva') ? 'selected' : '' ?>>Carga viva</option>
                                            <option value="Transporte de pessoas" <?= ($trem['tipo_trem'] == 'Transporte de pessoas') ? 'selected' : '' ?>>Transporte de pessoas</option>
                                            <option value="Carga a granel" <?= ($trem['tipo_trem'] == 'Carga a granel') ? 'selected' : '' ?>>Carga a granel</option>
                                            <option value="Carga a granel em seco" <?= ($trem['tipo_trem'] == 'Carga a granel em seco') ? 'selected' : '' ?>>Carga a granel em seco</option>
                                            <option value="Carga a granel líquida" <?= ($trem['tipo_trem'] == 'Carga a granel líquida') ? 'selected' : '' ?>>Carga a granel líquida</option>
                                            <option value="Carga Geral" <?= ($trem['tipo_trem'] == 'Carga Geral') ? 'selected' : '' ?>>Carga Geral</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Localização</label>
                                        <input type="text" name="localizacao_trem" class="form-control" placeholder="Insira a localização do trem"
                                               value="<?= htmlspecialchars($trem['localizacao_trem']) ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Status do trem</label>
                                        <select name="status_trem" id="status-trem" class="form-select" required>
                                            <option value="" disabled>Selecione o status</option>
                                            <option value="Ativo" <?= ($trem['status_trem'] == 'Ativo' || $trem['status_trem'] == 'ativo') ? 'selected' : '' ?>>Ativo</option>
                                            <option value="Inativo" <?= ($trem['status_trem'] == 'Inativo' || $trem['status_trem'] == 'inativo') ? 'selected' : '' ?>>Inativo</option>
                                            <option value="Manutenção" <?= ($trem['status_trem'] == 'Manutenção' || $trem['status_trem'] == 'manutencao') ? 'selected' : '' ?>>Manutenção</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Usuário responsável</label>
                                        <select name="id_responsavel" id="id-responsavel" class="form-select">
                                            <option value="">Selecione o responsável</option>
                                            <?php while ($usuario = $resultado_usuarios->fetch_assoc()): ?>
                                                <option value="<?= (int) $usuario['id_administrador'] ?>" <?= (isset($trem['id_responsavel']) && (int)$trem['id_responsavel'] === (int)$usuario['id_administrador']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($usuario['nome_cadastro']) ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center gap-3 mt-4">
                                    <a href="tela-lista-trens.php" class="btn btn-light border btn-func-custom text-decoration-none d-flex align-items-center justify-content-center">
                                        Voltar
                                    </a>

                                    <button type="submit" class="btn btn-func-custom btn-primary" style="background-color: #2D3250 !important;">
                                        Editar
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>


 </html>
