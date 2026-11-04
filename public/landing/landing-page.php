<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferrorama | Monitoramento ferroviário inteligente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina-landing">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-4 px-lg-5">
            <a class="navbar-brand fw-bold" href="landing-page.php">Ferrorama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLanding">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarLanding">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="#projeto">Projeto</a></li>
                    <li class="nav-item"><a class="nav-link" href="#funcionalidades">Funcionalidades</a></li>
                    <li class="nav-item"><a class="nav-link" href="#beneficios">Benefícios</a></li>
                    <li class="nav-item"><a class="btn btn-light rounded-pill px-4" href="../login/tela-login.php">Acessar sistema</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero-ferrorama">
            <div class="container py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <span class="badge text-bg-warning rounded-pill px-3 py-2 mb-3">Operação ferroviária</span>
                        <h1>Acompanhar a operação com mais clareza.</h1>
                        <p>
                            O Ferrorama reúne trens, sensores e rotas em um painel simples e objetivo, ajudando a equipe
                            a entender o que está acontecendo em tempo real e agir com mais segurança.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a class="btn btn-primary btn-lg px-4 rounded-pill" href="../login/tela-login.php">Entrar no sistema</a>
                            <a class="btn btn-outline-light btn-lg px-4 rounded-pill" href="#funcionalidades">Ver recursos</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-card">
                            <div class="hero-card-header">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <div class="hero-card-body">
                                <div class="metric-card">
                                    <small>Velocidade média</small>
                                    <strong>78 km/h</strong>
                                </div>
                                <div class="metric-card">
                                    <small>Sensores ativos</small>
                                    <strong>128</strong>
                                </div>
                                <div class="metric-card">
                                    <small>Linhas em operação</small>
                                    <strong>24</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="projeto" class="section-bloco">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <h2>O que o Ferrorama ajuda a controlar</h2>
                        <p>
                            Em operações ferroviárias, a qualidade da informação faz toda a diferença. Quando os dados
                            chegam separados, lentos ou difíceis de interpretar, a equipe precisa reagir no improviso.
                        </p>
                        <p>
                            O sistema reúne os principais indicadores em um lugar só, facilitando o acompanhamento do dia a dia,
                            a identificação de ocorrências e a organização das ações corretivas.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-panel">
                            <h3>Um painel de operação mais claro</h3>
                            <ul>
                                <li>Visão integrada de trens, rotas e sensores.</li>
                                <li>Organização dos dados para apoio à rotina de operação.</li>
                                <li>Informações que ajudam a decidir com mais rapidez e segurança.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="funcionalidades" class="section-bloco section-alt">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge text-bg-light rounded-pill px-3 py-2 mb-3">Funcionalidades</span>
                    <h2>Recursos para o acompanhamento da operação</h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Sensores</h3>
                            <p>Monitoramento de indicadores e condições operacionais para identificar variações e falhas.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Trens</h3>
                            <p>Cadastro e acompanhamento da frota com histórico e status atualizado da operação.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Rotas</h3>
                            <p>Organização das linhas e itinerários para manter o planejamento visual e mais seguro.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Relatórios</h3>
                            <p>Acompanhamento de desempenho, ocorrências e tendências para apoiar a gestão diária.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="beneficios" class="section-bloco">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge text-bg-warning rounded-pill px-3 py-2 mb-3">Benefícios</span>
                    <h2>Mais organização para a operação</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="benefit-card">
                            <h3>Segurança</h3>
                            <p>Ajuda a acompanhar sinais de risco e reduzir falhas antes que elas se tornem problemas maiores.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="benefit-card">
                            <h3>Eficiência</h3>
                            <p>Centraliza informações e agiliza a rotina da equipe responsável pela operação.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="benefit-card">
                            <h3>Decisão</h3>
                            <p>Permite avaliar o cenário com mais clareza e agir com base em dados relevantes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-final">
            <div class="container text-center">
                <h2>Quer acompanhar a operação com mais clareza?</h2>
                <a class="btn btn-primary btn-lg px-5 rounded-pill" href="../login/tela-login.php">Acessar o sistema</a>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
