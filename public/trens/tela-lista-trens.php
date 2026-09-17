<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trens Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina-funcionarios-cadastrados">
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


    <main class="container mt-4">
        <h1>Trens Cadastrados</h1>
        <hr class="linha-decorativa-2">
        <div class="container-branco">
            <div class="borda-tabela">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Localização</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Carga comum</td>
                            <td>TGV</td>
                            <td>Rota 01</td>
                            <td>Ativo</td>
                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Carga a granel líquida</td>
                            <td>Shinkansen</td>
                            <td>Rota 04</td>
                            <td>Em concerto</td>
                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Carga a granel</td>
                            <td>Al Boraq</td>
                            <td>Rota 08</td>
                            <td>Ativo</td>
                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>
                            </td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>Carga a granel em seco</td>
                            <td>Transist</td>
                            <td>Rota 03</td>
                            <td>Inativo</td>
                            <td>
                                <button class="btn btn-primary">Editar</button>
                                <button class="btn btn-danger">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>