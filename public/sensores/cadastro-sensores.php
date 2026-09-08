<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Sensores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body class="pagina-cadastro-sensores">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbar-Nav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-geral-home.html">Dashboard</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-sensores.html">Sensores</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-trens.html">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-rotas.html">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="funcionarios-cadastrados.html">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-relatorios.html">Relatórios</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            NomeAdmin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tela-login.html">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


   <div class="d-flex align-items-center justify-content-center pagina-cadastro-container">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">

                    <div class="card shadow-lg border-0 card-cadastro">

                        <div class="card-body p-5">

                            <h2 class="card-title text-center fw-bold mb-2">Cadastrar novo sensor</h2>
                            <p class="text-center text-muted mb-5">Preencha os dados abaixo para cadastrar um novo sensor.</p>

                            <form id="form-cadastro">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">ID do sensor</label>
                                        <input type="text" id="id-sensor" class="form-control" placeholder="Digite o ID do sensor">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nome</label>
                                        <input type="text" id="nome-sensor" class="form-control" placeholder="Digite o nome do sensor">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Localização</label>
                                        <input type="text" id="localizacao-cadastro" class="form-control" placeholder="Digite a localização">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Status</label>
                                        <select id="status-cadastro" class="form-select">
                                            <option value="" selected>Selecione o status</option>
                                            <option value="Ativo">Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Tipo de Sensor</label>
                                        <select id="tipo-sensor" class="form-select">
                                            <option value="" selected>Selecione o tipo de sensor</option>
                                            <option value="Temperatura">Temperatura</option>
                                            <option value="Velocidade">Velocidade</option>
                                            <option value="Localizador">Localizador</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center gap-3">
                                    <button type="button" id="botao-cancelar" class="btn btn-light border btn-custom">Cancelar</button>
                                    <button type="submit" id="envio-cadastro" class="btn btn-primary btn-custom">Cadastrar</button>
                                    <button type="button" id="botao-visualizar" class="btn btn-secondary btn-custom">Editar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>