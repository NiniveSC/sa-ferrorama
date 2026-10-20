<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina-home">
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-geral-home.php">Dashboard</a>
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
                        <a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            NomeAdmin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../login/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-principal">

        <div class="row align-items-center seção-topo">

            <div class="col-md-5 bloco-boas-vindas">
                <h1 class="boas-vindas">Olá, NomeAdmin!</h1>
                <p class="texto-home">O que deseja fazer hoje?</p>
                <div class="linha-decorativa"></div>
            </div> <div class="col-md-7">
                <div id="carouselExample" class="carousel slide carrossel-card">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../../assets/img/tela-home/grafico-1.png" class="d-block w-100" alt="Relatórios">
                        </div>
                        <div class="carousel-item">
                            <img src="../../assets/img/tela-home/grafico-2.png" class="d-block w-100" alt="Relatórios">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div> </div> <div class="botoes-home d-flex justify-content-center flex-wrap">
            <button type="button" id="buttonFuncionarios" class="btn card-botao funcionarios" data-target="../funcionarios/funcionarios-cadastrados.php">
                <img src="../../assets/img/tela-home/funcionarios.png" alt="Funcionários">
            </button>
            <button type="button" id="buttonSensores" class="btn card-botao btn-outline-sensores" data-target="../sensores/tela-lista-sensores.php">
                <img src="../../assets/img/tela-home/sensores.png" alt="Sensores">
            </button>
            <button type="button" id="buttonRotas" class="btn card-botao btn-outline-rotas" data-target="../rotas/tela-lista-rotas.php">
                <img src="../../assets/img/tela-home/rotas.png" alt="Rotas">
            </button>
            <button type="button" id="buttonTrens" class="btn card-botao btn-outline-trens" data-target="../trens/tela-lista-trens.php">
                <img src="../../assets/img/tela-home/trens.png" alt="Trens">
            </button>
            <button type="button" id="buttonRelatorios" class="btn card-botao btn-outline-relatorios" data-target="../relatorios/tela-relatorios.php">
                <img src="../../assets/img/tela-home/relatorios.png" alt="Relatórios">
            </button>
        </div>

    </main>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous"></script>
            <script src="../../script/tela-geral-home.js"></script>

</body>

</html>