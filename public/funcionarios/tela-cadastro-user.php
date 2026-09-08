<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/style.css">
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

    
    <div class="d-flex align-items-center justify-content-center pg-cadastro-funcionario">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 card-cadastro-funcionario">
                    <div class="card-body p-5">

                        <h2 class="card-title text-center fw-bold mb-2">Cadastrar novo funcionário</h2>
                        <p class="text-center text-muted mb-5">Preencha os dados abaixo para cadastrar um novo funcionário.</p>

                        <form id="form-cadastro-funcionario">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nome Completo</label>
                                    <input type="text" id="nome-cadastro" class="form-control" placeholder="Digite o nome completo">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Cargo</label>
                                    <select id="cargo-cadastro" class="form-select">
                                        <option value="" selected>Selecione o cargo</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Funcionário">Funcionário</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CPF</label>
                                    <input type="text" id="cpf-cadastro" class="form-control" placeholder="000.000.000-00">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Telefone</label>
                                    <input type="tel" id="telefone-cadastro" class="form-control" placeholder="(00) 90000-0000">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" id="email-cadastro" class="form-control" placeholder="digite o e-mail">
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Senha</label>
                                    <input type="password" id="senha-cadastro" class="form-control" placeholder="Crie uma senha forte">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <button type="button" id="btn-func-cancelar" class="btn btn-light border btn-func-custom">Cancelar</button>
                                <button type="submit" id="btn-func-cadastrar" class="btn btn-primary btn-func-custom">Cadastrar</button>
                                <button type="button" id="btn-func-editar" class="btn btn-secondary btn-func-custom">Editar</button>
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
        <script src="../script/tela-cadastro-user.js"></script>
</body>

</html>