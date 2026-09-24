<?php

include "../../infra/conexao.php";

$stmt = $conexao->prepare("
    SELECT Pessoa.id_administrador, Pessoa.nome_cadastro, Pessoa.email_cadastro,
           Pessoa.telefone_cadastro, Perfil.cargo
    FROM Pessoa
    INNER JOIN Perfil ON Pessoa.id_perfil = Perfil.id_perfil
");

$stmt->execute();

$resultado = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários Cadastrados</title>
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
        <h1>Funcionários Cadastrados</h1>
        <hr class="linha-decorativa-2">
        <div class="container-branco">
            <div class="borda-tabela">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Cargo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

    <?php while ($funcionario = $resultado->fetch_assoc()) { ?>

        <tr>
            <td>
                <?php echo htmlspecialchars($funcionario["nome_cadastro"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($funcionario["email_cadastro"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($funcionario["telefone_cadastro"]); ?>
            </td>

            <td>
                <?php echo htmlspecialchars($funcionario["cargo"]); ?>
            </td>

            <td>
                <a href="editar-funcionarios.php?id=<?php echo $funcionario["id_administrador"]; ?>"
                    class="btn btn-primary">
                    Editar
                </a>

                <a href="excluir-funcionarios.php?id=<?php echo $funcionario["id_administrador"]; ?>"
                    class="btn btn-danger">
                    Excluir
                </a>
            </td>
        </tr>

    <?php } ?>

</tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>