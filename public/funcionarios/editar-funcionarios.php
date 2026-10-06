<?php

session_start();
require_once "../../infra/permissoes.php";

if (!ehAdministrador()) {
    header("Location: ../tela-geral-home.php");
    exit;
}

include "../../infra/conexao.php";

$id = (int) $_GET["id"];

$sql = "SELECT * FROM Pessoa WHERE id_administrador = $id";
$resultado = mysqli_query($conexao, $sql);

$funcionario = mysqli_fetch_assoc($resultado);

if (isset($_POST["editar"])) {

    $nome = $_POST["nome"];
    $cargo = $_POST["cargo"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    if ($cargo == "Administrador") {
        $id_perfil = 1;
    } else {
        $id_perfil = 2;
    }

    $sql = "UPDATE Pessoa SET
    nome_cadastro='$nome',
    email_cadastro='$email',
    telefone_cadastro='$telefone',
    cpf_cadastro='$cpf',
    id_perfil='$id_perfil'
    WHERE id_administrador = '$id'";

    mysqli_query($conexao, $sql);

    header("Location: funcionarios-cadastrados.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
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
                        <a class="nav-link" href="tela-geral-home.php">Dashboard</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-sensores.php">Sensores</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-trens.php">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-rotas.php">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="funcionarios-cadastrados.php">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-relatorios.php">Relatórios</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            NomeAdmin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tela-login.php">Sair</a></li>
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
                    <div class="card-body px-5 pt-3 pb-5">
                        <h2 class="card-title text-center fw-bold mb-2" style="color: #2d3250;">
    Editar Funcionários
</h2>
<br>

                        <form id="form-cadastro-funcionario" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nome Completo</label>
                                    <input type="text" id="nome-cadastro" name="nome" class="form-control"
    value="<?php echo $funcionario['nome_cadastro']; ?>" placeholder="Digite o nome completo">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Cargo</label>
                                    <select id="cargo-cadastro" name="cargo" class="form-select">
    <option value="">Selecione o cargo</option>
    <option value="Administrador">Administrador</option>
    <option value="Funcionário">Funcionário</option>
</select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CPF</label>
                                    <input type="text" id="cpf-cadastro" name="cpf" class="form-control"
    value="<?php echo $funcionario['cpf_cadastro']; ?>" placeholder="000.000.000-00">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Telefone</label>
                                    <input type="tel" id="telefone-cadastro" name="telefone" class="form-control"
    value="<?php echo $funcionario['telefone_cadastro']; ?>" placeholder="(00) 90000-0000">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" id="email-cadastro" name="email" class="form-control"
    value="<?php echo $funcionario['email_cadastro']; ?>" placeholder="digite o e-mail">
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Senha</label>
                                    <input type="password" id="senha-cadastro" class="form-control" placeholder="Crie uma senha forte">
                                </div>
                            </div>

                           <div class="d-flex justify-content-center gap-4">

                               <a href="funcionarios-cadastrados.php" id="btn-func-cancelar" class="btn btn-light border btn-func-custom">
    ← Voltar
</a>

                                 <button type="submit" name="editar" id="btn-func-editar" class="btn btn-func-custom">
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
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src=""></script>
</body>

</html>