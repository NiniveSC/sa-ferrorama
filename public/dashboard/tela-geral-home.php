<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";
require_once __DIR__ . "/../../infra/api_clima.php";

$dadosClima = buscarClimaAtual();
$erroClima = $dadosClima['erro'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">

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
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../cep/consulta-cep.php">CEP</a>
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

    <main class="container-principal">
        <div class="welcome-panel">
            <h1 class="boas-vindas">Olá, <?= htmlspecialchars($_SESSION["nome"] ?? "Usuário") ?>!</h1>
            <p class="texto-home">O que deseja fazer hoje?</p>
            <div class="linha-decorativa"></div>
        </div>

        <div class="dashboard-row">
            <div class="weather-card">
                <div class="weather-header">
                    <div>
                        <p class="weather-label">Monitor meteorológico</p>
                        <h3 class="weather-title">Clima em <?= htmlspecialchars($dadosClima['localizacao'] ?? 'São Paulo, SP') ?></h3>
                    </div>
                    <span class="weather-badge">Tempo real</span>
                </div>

                <?php if (!empty($erroClima)): ?>
                    <div class="alert alert-warning mb-0 mt-3">
                        <?= htmlspecialchars($erroClima) ?>
                    </div>
                <?php else: ?>
                    <div class="row align-items-center g-3 mt-2">
                        <div class="col-md-3 text-center">
                            <div class="weather-temp"><?= htmlspecialchars((string) ($dadosClima['temperatura'] ?? 0)) ?>°C</div>
                        </div>
                        <div class="col-md-5">
                            <p class="weather-condition mb-1"><?= htmlspecialchars($dadosClima['condicao'] ?? 'Condição variável') ?></p>
                            <p class="weather-meta mb-0">Localização: <?= htmlspecialchars($dadosClima['localizacao'] ?? 'São Paulo, SP') ?></p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <p class="weather-meta mb-1">Última atualização</p>
                            <p class="weather-meta fw-bold mb-0"><?= htmlspecialchars($dadosClima['atualizacao'] ?? 'Não disponível') ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="report-panel">
                <h3>Relatórios</h3>
                <div class="report-graphic">
                    <div class="line-chart" aria-label="Gráfico de indicadores">
                        <svg viewBox="0 0 260 110" preserveAspectRatio="none" role="img" aria-label="Linha de desempenho">
                            <path d="M0,85 L30,78 L60,72 L90,62 L120,58 L150,54 L180,48 L210,42 L240,38 L260,30" fill="none" stroke="#2d3250" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M0,82 L30,71 L60,65 L90,74 L120,63 L150,56 L180,46 L210,50 L240,35 L260,26" fill="none" stroke="#d9c03d" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M0,90 L30,92 L60,76 L90,70 L120,61 L150,52 L180,58 L210,42 L240,31 L260,36" fill="none" stroke="#4d9de0" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="chart-legend">
                        <div class="legend-item"><span style="background:#2d3250"></span>Desempenho Sensores</div>
                        <div class="legend-item"><span style="background:#d9c03d"></span>Problemas Trens</div>
                        <div class="legend-item"><span style="background:#4d9de0"></span>Rotas</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="botoes-home d-flex justify-content-center">
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
        </div>

    </main>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous"></script>
            <script src="../../script/tela-geral-home.js"></script>

</body>

</html>