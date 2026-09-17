<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Rotas</title>
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

<div class="pg-cadastro-rotas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7">

                    <div class="card card-cadastro-rotas p-4 text-center border-0">
                        <div class="card-body p-4">

                            <h2 class="card-title fw-bold mb-4 text-start">Cadastrar Rotas</h2>

<div class="box-campos-rotas p-4 mx-auto">
    <form id="form-cadastro-rotas">
        
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row mb-3">
                    <div class="col-12 text-start">
                        <label class="form-label fw-bold">ID da rota</label>
                        <input type="text" id="id-rota" class="form-control" placeholder="ID da rota">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-6 text-start mb-3 mb-md-0">
                        <label class="form-label fw-bold">Localização</label>
                        <input type="text" id="localizacao-rota" class="form-control" placeholder="Localização">
                    </div>
                    <div class="col-12 col-md-6 text-start">
                        <label class="form-label fw-bold">Status</label>
                        <select id="status-rota" class="form-select">
                            <option value="" selected disabled>Status</option>
                            <option value="ativa">Ativa</option>
                            <option value="inativa">Inativa</option>
                            <option value="em_concerto">Em concerto</option>
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
                    <button type="submit" id="btn-rota-cadastrar" class="btn">
                        Cadastrar
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
    <script src="../script/tela-cadastro-rotas.js"></script>
</body>

</html>