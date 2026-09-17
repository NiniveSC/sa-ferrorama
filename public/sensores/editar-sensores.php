<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sensor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina-cadastro-sensor">
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
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 card-cadastro-funcionario">
                    <div class="card-body px-5 pt-3 pb-5">
                        <h2 class="card-title text-center fw-bold mb-2" style="color: #2d3250;">
    Editar Sensor
</h2>
<br>

                        <form id="form-cadastro-funcionario">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ID do sensor</label>
                                    <input type="text" id="nome-cadastro" class="form-control" placeholder="Digite o ID do sensor">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tipo</label>
                                    <select id="cargo-cadastro" class="form-select">
                                        <option value="" selected>Selecione o tipo</option>
                                        <option value="Administrador">Temperatura</option>
                                        <option value="Funcionário">Velocidade</option>
                                        <option value="Funcionário">Localizador</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Localização</label>
                                    <input type="text" id="cpf-cadastro" class="form-control" placeholder="Digite a localização do sensor">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Status do sensor</label>
                                    <select id="status-trem" class="form-select">
                                        <option value="" selected>Selecione o status</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                        <option value="em concerto" >Em concerto</option>
                                    </select>
                                </div>
                            </div>

                            

                           <div class="d-flex justify-content-center gap-4">

                                <button type="button" id="btn-func-cancelar" class="btn btn-light border btn-func-custom">
                                    ← Voltar
                                </button>

                                 <button type="submit" id="btn-func-editar" class="btn btn-func-custom">
                                     Editar
                                </button>

                            </div>
                        </form>

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