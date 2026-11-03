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
                        <span class="badge text-bg-warning rounded-pill px-3 py-2 mb-3">Monitoramento ferroviário</span>
                        <h1>Operações mais seguras, inteligentes e eficientes.</h1>
                        <p>
                            O Ferrorama centraliza dados operacionais de trens, sensores e rotas para permitir a
                            tomada de decisão em tempo real e reduzir riscos em corredores ferroviários.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a class="btn btn-primary btn-lg px-4 rounded-pill" href="../login/tela-login.php">Entrar no sistema</a>
                            <a class="btn btn-outline-light btn-lg px-4 rounded-pill" href="#funcionalidades">Conhecer recursos</a>
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
                                    <small>Rotas monitoradas</small>
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
                        <h2>O problema que o Ferrorama resolve</h2>
                        <p>
                            Operações ferroviárias exigem visibilidade constante sobre a condição da frota, da infraestrutura
                            e das rotas. Falhas em comunicação, variações de rota e ausência de monitoramento em tempo real
                            podem aumentar riscos operacionais e impactar a segurança.
                        </p>
                        <p>
                            Com dados consolidados, alertas e acompanhamento por sensores, o sistema permite reduzir intervenções
                            reativas e aprimorar a previsibilidade da operação diária.
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-panel">
                            <h3>Monitoramento em um único painel</h3>
                            <ul>
                                <li>Visualização integrada de trens, rotas e sensores.</li>
                                <li>Suporte a análise operacional e manutenção preventiva.</li>
                                <li>Interface para tomada de decisão com clareza e velocidade.</li>
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
                    <h2>Ferramentas que apoiam a operação ferroviária</h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Sensores</h3>
                            <p>Monitoramento de condições operacionais com foco em variações, falhas e indicadores críticos.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Trens</h3>
                            <p>Cadastro e acompanhamento da frota para manter histórico e status operacional atualizados.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Rotas</h3>
                            <p>Controle das linhas e itinerários para melhorar o planejamento e a visibilidade da operação.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="feature-card">
                            <h3>Relatórios</h3>
                            <p>Acompanhamento de desempenho, ocorrências e tendências com suporte à gestão e manutenção.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="beneficios" class="section-bloco">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="badge text-bg-warning rounded-pill px-3 py-2 mb-3">Benefícios</span>
                    <h2>Impacto para segurança, eficiência e operação</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="benefit-card">
                            <h3>Segurança</h3>
                            <p>Redução de riscos por meio do acompanhamento contínuo de indicadores e falhas.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="benefit-card">
                            <h3>Eficiência</h3>
                            <p>Organização dos dados operacionais aumenta agilidade e qualidade da resposta da equipe.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="benefit-card">
                            <h3>Decisão</h3>
                            <p>Dashboards e relatórios permitem priorizar ações com base em evidências e contexto real.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-final">
            <div class="container text-center">
                <h2>Pronto para acompanhar suas operações com mais clareza?</h2>
                <a class="btn btn-primary btn-lg px-5 rounded-pill" href="../login/tela-login.php">Acessar o sistema</a>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
