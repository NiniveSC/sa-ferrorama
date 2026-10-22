<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";

if (!ehAdministrador()) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit;
}

require "../../infra/conexao.php";

$id = isset($_GET["id_trem"]) ? (int) $_GET["id_trem"] : 0;
$mensagem_erro = "";

// Processa a exclusão
if (isset($_POST["excluir"]) && $id > 0) {
    $sql_verifica_rota = "SELECT COUNT(*) AS total FROM Rota WHERE id_trem = ?";
    $stmt_verifica_rota = $conexao->prepare($sql_verifica_rota);
    $stmt_verifica_rota->bind_param("i", $id);
    $stmt_verifica_rota->execute();
    $resultado_rota = $stmt_verifica_rota->get_result()->fetch_assoc();

    if ((int) $resultado_rota["total"] > 0) {
        $mensagem_erro = "Não é possível excluir este trem porque ele está vinculado a uma ou mais rotas. Remova ou reatribua a rota antes de excluir o trem.";
    } else {
        mysqli_begin_transaction($conexao);

        try {
            $sql_update_sensor = "UPDATE Sensor SET id_trem = NULL WHERE id_trem = ?";
            $stmt_update_sensor = $conexao->prepare($sql_update_sensor);
            $stmt_update_sensor->bind_param("i", $id);
            $stmt_update_sensor->execute();

            $sql_delete_trem_rota = "DELETE FROM Trem_rota WHERE Trem_id_trem = ?";
            $stmt_trem_rota = $conexao->prepare($sql_delete_trem_rota);
            $stmt_trem_rota->bind_param("i", $id);
            $stmt_trem_rota->execute();

            $sql_delete_trem = "DELETE FROM Trem WHERE id_trem = ?";
            $stmt_trem = $conexao->prepare($sql_delete_trem);
            $stmt_trem->bind_param("i", $id);
            $stmt_trem->execute();

            mysqli_commit($conexao);
            header("Location: tela-lista-trens.php");
            exit();
        } catch (Exception $e) {
            mysqli_rollback($conexao);
            $mensagem_erro = "Erro ao excluir o trem: " . $e->getMessage();
        }
    }
}

// Busca os dados do trem para exibição
$trem = null;
if ($id > 0) {
    $sql = "SELECT * FROM Trem WHERE id_trem = $id";
    $resultado = mysqli_query($conexao, $sql);
    $trem = mysqli_fetch_assoc($resultado);
}

// Se não encontrar o trem, redireciona para a lista
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
    <title>Excluir Trem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina_excluir_user">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbar-Nav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-3"><a class="nav-link" href="../dashboard/tela-geral-home.php">Dashboard</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../sensores/tela-lista-sensores.php">Sensores</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="tela-lista-trens.php">Trens</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <div class="col-12 col-md-8 col-lg-8">

                    <div class="card shadow-lg border-0 card-cadastro-funcionario">
                        <div class="card-body p-5">

                            <h2 class="card-title fw-bold mb-4">
                                Excluir trem
                            </h2>

                            <?php if (!empty($mensagem_erro)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= htmlspecialchars($mensagem_erro) ?>
                                </div>
                            <?php endif; ?>

                            <div class="dados-funcionario mb-4">
                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">ID do trem:</span>
                                    <span class="valor-funcionario ms-2 fw-bold">
                                        <?= str_pad($trem['id_trem'], 2, '0', STR_PAD_LEFT) ?>
                                    </span>
                                </div>

                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">Tipo trem:</span>
                                    <span class="valor-funcionario ms-2">
                                        <?= htmlspecialchars($trem['tipo_trem']) ?>
                                    </span>
                                </div>

                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">Localização:</span>
                                    <span class="valor-funcionario ms-2">
                                        <?= htmlspecialchars($trem['localizacao_trem']) ?>
                                    </span>
                                </div>

                                <div class="d-flex mb-3">
                                    <span class="label-funcionario">Status trem:</span>
                                    <span class="valor-funcionario ms-2">
                                        <?= htmlspecialchars($trem['status_trem']) ?>
                                    </span>
                                </div>
                            </div>

                            <div class="confirmacao-exclusao mb-4">
                                <img src="../../assets/img/icone_alerta.png" alt="Alerta">
                                <div>
                                    <strong>Deseja mesmo excluir?</strong>
                                    <p class="mb-0">Os dados do trem excluído não poderão ser recuperados.</p>
                                </div>
                            </div>

                            <form method="POST">
                                <div class="d-flex justify-content-center gap-4">
                                    <a href="tela-lista-trens.php" class="btn btn-light border btn-func-custom text-decoration-none d-flex align-items-center justify-content-center">
                                        Cancelar
                                    </a>

                                    <button type="submit" name="excluir" class="btn btn-danger btn-func-custom">
                                        Excluir
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