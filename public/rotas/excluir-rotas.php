
<?php
session_start();

require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once "../../infra/permissoes.php";

if (!ehAdministrador()) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit;
}

include "../../infra/conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: tela-lista-rotas.php");
    exit;
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM Rotas WHERE id_rota = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$rota = $resultado->fetch_assoc();

if (!$rota) {
    header("Location: tela-lista-rotas.php");
    exit;
}

if (isset($_POST["excluir"])) {
    mysqli_begin_transaction($conexao);

    try {
        $sql_delete_sensores = "DELETE FROM Sensor WHERE id_rota = ?";
        $stmt_sensores = $conexao->prepare($sql_delete_sensores);
        $stmt_sensores->bind_param("i", $id);
        $stmt_sensores->execute();

        $sql = "DELETE FROM Rota WHERE id_rota = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        mysqli_commit($conexao);
        header("Location: tela-lista-rotas.php");
        exit;
    } catch (Exception $e) {
        mysqli_rollback($conexao);
        $erro = "Não foi possível excluir a rota.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Rota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina_excluir_user">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
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
                        <a class="nav-link" href="tela-lista-rotas.php">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <?php echo htmlspecialchars($_SESSION["nome"]); ?>
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
                <div class="col-12 col-md-8 col-lg-8">

                    <div class="card shadow-lg border-0 card-cadastro-funcionario">
                        <div class="card-body p-5">

                            <h2 class="card-title fw-bold mb-5">
                                Excluir Rota
                            </h2>

                            <div class="dados-funcionario mb-4">

                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">ID da rota</span>
                                    <span class="valor-funcionario">
                                        <?php echo htmlspecialchars($rota["id_rota"]); ?>
                                    </span>
                                </div>

                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">Nome da rota</span>
                                    <span class="valor-funcionario">
                                        <?php echo htmlspecialchars($rota["nome_rota"]); ?>
                                    </span>
                                </div>

                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">Localização</span>
                                    <span class="valor-funcionario">
                                        <?php echo htmlspecialchars($rota["localizacao_rota"]); ?>
                                    </span>
                                </div>

                                <div class="d-flex">
                                    <span class="label-funcionario">Status</span>
                                    <span class="valor-funcionario">
                                        <?php echo htmlspecialchars($rota["status_rota"]); ?>
                                    </span>
                                </div>

                            </div>

                            <div class="confirmacao-exclusao mb-4">
                                <img src="../../assets/img/icone_alerta.png" alt="Alerta">
                                <div>
                                    <strong>Deseja mesmo excluir?</strong>
                                    <p>Os dados da rota excluída não podem ser resgatados.</p>
                                </div>
                            </div>

                            <?php if (isset($erro)) { ?>
                                <p class="text-danger"><?php echo $erro; ?></p>
                            <?php } ?>

                            <div class="d-flex justify-content-center gap-5">

                                <a href="tela-lista-rotas.php"
                                   class="btn btn-light border btn-func-custom">
                                    Cancelar
                                </a>

                                <form method="POST">
                                    <button type="submit"
                                            name="excluir"
                                            class="btn btn-danger btn-func-custom">
                                        Excluir
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
