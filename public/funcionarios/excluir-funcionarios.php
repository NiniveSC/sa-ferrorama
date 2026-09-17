<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Funcionário</title>
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
            <div class="col-12 col-md-8 col-lg-8">

                <div class="card shadow-lg border-0 card-cadastro-funcionario">
                    <div class="card-body p-5">

                        <h2 class="card-title fw-bold mb-5">
                            Excluir Funcionário
                        </h2>

                       
                        <div class="dados-funcionario mb-4">                            
                            <div class="d-flex mb-3">
                                <span class="label-funcionario">
                                    ID do funcionário
                                </span>

                                <span class="valor-funcionario">
                                    001
                                </span>
                            </div>

                            <div class="d-flex mb-3">
                                <span class="label-funcionario">
                                    Nome Funcionário
                                </span>

                                <span class="valor-funcionario">
                                    Maria Carvalho
                                </span>
                            </div>

                            <div class="d-flex">
                                <span class="label-funcionario">
                                    Email
                                </span>

                                <span class="valor-funcionario">
                                    maria_carvalho@email.com
                                </span>
                            </div>

                        </div>

                       
                      <div class="confirmacao-exclusao mb-4">

                        <img src="../../assets/img/icone_alerta.png" alt="Alerta">

                          <div>
                            <strong>
                                 Deseja mesmo excluir?
                             </strong>

                             <p>
                                  Os dados do funcionário excluído não podem ser resgatados.
                            </p>
                            </div>

                        </div>

                       
                        <div class="d-flex justify-content-center gap-5">

                            <button type="button"
                                    id="btn-func-cancelar"
                                    class="btn btn-light border btn-func-custom">
                                Cancelar
                            </button>

                            <button type="button"
                                    id="btn-func-excluir"
                                    class="btn btn-danger btn-func-custom">
                                Excluir
                            </button>

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
        <script src=""></script>
</body>

</html>