
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferrorama | Monitoramento ferroviário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina-landing">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-4 px-lg-5">

            <a class="navbar-brand fw-bold" href="landing-page.php">
                Ferrorama
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarLanding">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLanding">

                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                    <li class="nav-item">
                        <a class="nav-link" href="#projeto">Projeto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#funcionalidades">Funcionalidades</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#beneficios">Benefícios</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-light rounded-pill px-4" href="../login/tela-login.php">
                            Acessar sistema
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <main>

        <!-- PRIMEIRA SEÇÃO -->
        <section class="hero-ferrorama">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-5">

                        <span class="hero-subtitulo">
                            MONITORAMENTO FERROVIÁRIO
                        </span>

                        <h1>
                            Tecnologia e controle para operações ferroviárias.
                        </h1>

                        <p>
                            O Ferrorama reúne trens, sensores e rotas em um único sistema,
                            facilitando o acompanhamento das operações e a identificação
                            de possíveis problemas.
                        </p>

                        <div class="d-flex flex-wrap gap-3 mt-4">

                            <a class="btn btn-amarelo" href="../login/tela-login.php">
                                Acessar sistema
                            </a>

                            <a class="btn btn-outline-light" href="#projeto">
                                Conhecer projeto
                            </a>

                        </div>

                    </div>

                    <!-- ILUSTRAÇÃO DO TREM -->
                    <div class="col-lg-7">

                        <div class="trem-cenario">

                            <div class="trem">

                                <div class="trem-frente">

                                    <div class="trem-vidro"></div>
                                    <div class="trem-farol"></div>

                                </div>

                                <div class="trem-vagoes">

                                    <div class="trem-vagao">
                                        <div class="janela"></div>
                                        <div class="janela"></div>
                                        <div class="janela"></div>
                                    </div>

                                    <div class="trem-vagao">
                                        <div class="janela"></div>
                                        <div class="janela"></div>
                                        <div class="janela"></div>
                                    </div>

                                </div>

                            </div>

                            <div class="trem-rodas">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div class="trilhos">
                                <div></div>
                                <div></div>
                            </div>

                            <div class="trilhos-detalhes"></div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- SOBRE O PROJETO -->
        <section id="projeto" class="section-bloco">

            <div class="container">

                <div class="row align-items-center g-5">

                    <div class="col-lg-6">

                        <span class="secao-subtitulo">SOBRE O PROJETO</span>

                        <h2>
                            O que é o Ferrorama?
                        </h2>

                        <p>
                            Em operações ferroviárias, acompanhar as informações
                            corretamente é essencial para manter a organização
                            e a segurança.
                        </p>

                        <p>
                            O Ferrorama foi desenvolvido para centralizar dados
                            de trens, sensores e rotas, facilitando o trabalho
                            da equipe e o acompanhamento da operação.
                        </p>

                    </div>

                    <div class="col-lg-6">

                        <div class="info-panel">

                            <h3>Controle em um só lugar</h3>

                            <ul>
                                <li>Visualização de trens cadastrados.</li>
                                <li>Acompanhamento dos sensores.</li>
                                <li>Organização das rotas ferroviárias.</li>
                                <li>Consulta de informações e relatórios.</li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- FUNCIONALIDADES -->
        <section id="funcionalidades" class="section-bloco section-alt">

            <div class="container">

                <div class="text-center mb-5">

                    <span class="secao-subtitulo">RECURSOS DO SISTEMA</span>

                    <h2>Funcionalidades</h2>

                    <p class="texto-secao">
                        Conheça os principais recursos disponíveis no Ferrorama.
                    </p>

                </div>

                <div class="row g-4">

                    <div class="col-md-6 col-xl-3">

                        <div class="feature-card">
                            <div class="feature-numero">01</div>
                            <h3>Sensores</h3>
                            <p>
                                Monitoramento de indicadores e condições operacionais.
                            </p>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3">

                        <div class="feature-card">
                            <div class="feature-numero">02</div>
                            <h3>Trens</h3>
                            <p>
                                Cadastro e acompanhamento dos trens e seus respectivos status.
                            </p>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3">

                        <div class="feature-card">
                            <div class="feature-numero">03</div>
                            <h3>Rotas</h3>
                            <p>
                                Organização das linhas e dos trajetos ferroviários.
                            </p>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3">

                        <div class="feature-card">
                            <div class="feature-numero">04</div>
                            <h3>Relatórios</h3>
                            <p>
                                Consulta de informações e acompanhamento da operação.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- BENEFÍCIOS -->
        <section id="beneficios" class="section-bloco">

            <div class="container">

                <div class="text-center mb-5">

                    <span class="secao-subtitulo">DIFERENCIAIS</span>

                    <h2>Benefícios do sistema</h2>

                </div>

                <div class="row g-4">

                    <div class="col-lg-4">

                        <div class="benefit-card">
                            <h3>Segurança</h3>
                            <p>
                                Facilita a identificação de possíveis falhas
                                e situações que precisam de atenção.
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="benefit-card">
                            <h3>Organização</h3>
                            <p>
                                Centraliza as informações e facilita
                                o acompanhamento das atividades.
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="benefit-card">
                            <h3>Eficiência</h3>
                            <p>
                                Ajuda a equipe a consultar dados
                                e tomar decisões com mais agilidade.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- FINAL -->
        <section class="cta-final">

            <div class="container text-center">

                <h2>
                    Conheça o Ferrorama.
                </h2>

                <p>
                    Acesse o sistema e acompanhe as informações da operação ferroviária.
                </p>

                <a class="btn btn-amarelo" href="../login/tela-login.php">
                    Acessar sistema
                </a>

            </div>

        </section>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
