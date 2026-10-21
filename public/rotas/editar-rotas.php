<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";

if (!ehAdministrador()) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit;
}

require '../../infra/conexao.php';

$id = isset($_GET["id_rota"]) ? (int) $_GET["id_rota"] : 0;

$sql = "SELECT * FROM Rota WHERE id_rota = $id";
$resultado = mysqli_query($conexao, $sql);
$rota = mysqli_fetch_assoc($resultado);

if (!$rota) {
    header("Location: tela-lista-rotas.php");
    exit;
}

if (isset($_POST["editar"])) {
    $nome = $_POST["nome_rota"];
    $descricao = $_POST["descricao_rota"];
    $distancia = (float) $_POST["distancia_km"];
    $duracao = $_POST["duracao_estimada"];
    $id_trem = (int) $_POST["id_trem"];

    $sql = "UPDATE Rota SET nome_rota = ?, descricao_rota = ?, distancia_km = ?, duracao_estimada = ?, id_trem = ? WHERE id_rota = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdsii", $nome, $descricao, $distancia, $duracao, $id_trem, $id);

    if ($stmt->execute()) {
        $stmt->close();
        header("Location: tela-lista-rotas.php");
        exit;
    } else {
        $mensagem_erro = "Erro ao editar a rota.";
    }

    $stmt->close();
}

$sql_trens = "SELECT id_trem, tipo_trem FROM Trem";
$resultado_trens = mysqli_query($conexao, $sql_trens);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rotas</title>
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
                        <a class="nav-link" href="tela-lista-rotas.php">Rotas</a>
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

    <div class="pg-cadastro-rotas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7">

                    <div class="card card-cadastro-rotas p-4 text-center border-0">
                        <div class="card-body p-4">

                            <h2 class="card-title fw-bold mb-4 text-start">Editar Rota</h2>

                            <div class="box-campos-rotas p-4 mx-auto">
                                <form id="form-editar-rotas" method="POST">

    <?php if (isset($mensagem_erro)) { ?>
        <p class="text-danger"><?= $mensagem_erro ?></p>
    <?php } ?>

    <div class="row mb-3">
        <div class="col-12 text-start">
            <label class="form-label fw-bold">ID da rota</label>
            <input type="text" class="form-control"
                value="<?= $rota['id_rota'] ?>" readonly>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 text-start">
            <label class="form-label fw-bold">Nome da rota</label>
            <input type="text" name="nome_rota" class="form-control"
                value="<?= htmlspecialchars($rota['nome_rota']) ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 text-start">
            <label class="form-label fw-bold">Descrição</label>
            <textarea name="descricao_rota" class="form-control"><?= htmlspecialchars($rota['descricao_rota'] ?? '') ?></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-md-6 text-start">
            <label class="form-label fw-bold">Distância (km)</label>
            <input type="number" step="0.01" name="distancia_km"
                class="form-control"
                value="<?= $rota['distancia_km'] ?>" required>
        </div>

        <div class="col-12 col-md-6 text-start">
            <label class="form-label fw-bold">Duração estimada</label>
            <input type="text" name="duracao_estimada" class="form-control"
                value="<?= htmlspecialchars($rota['duracao_estimada']) ?>" required>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 text-start">
            <label class="form-label fw-bold">Trem</label>
            <select name="id_trem" class="form-select" required>
                <option value="">Selecione um trem</option>

                <?php while ($trem = mysqli_fetch_assoc($resultado_trens)) { ?>
                    <option value="<?= $trem['id_trem'] ?>"
                        <?= $trem['id_trem'] == $rota['id_trem'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($trem['tipo_trem']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>


                                            <div class="botoes-container">
                                                <button type="button" id="btn-rota-voltar" class="btn d-flex align-items-center justify-content-center gap-2" onclick="window.location.href='tela-lista-rotas.php'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                                    </svg>
                                                    Voltar
                                                </button>
                                                <button type="submit" name="editar" id="btn-rota-editar" class="btn">
                                                    Editar
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

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