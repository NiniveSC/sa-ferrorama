<?php

session_start();

require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";
include "../../infra/conexao.php";

$adminLogado = ehAdministrador();

$sql = "SELECT Pessoa.id_administrador, Pessoa.nome_cadastro,
        Pessoa.email_cadastro, Pessoa.telefone_cadastro, Perfil.cargo
        FROM Pessoa
        INNER JOIN Perfil ON Pessoa.id_perfil = Perfil.id_perfil
        ORDER BY Pessoa.nome_cadastro ASC";

$resultado = mysqli_query($conexao, $sql);

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
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../dashboard/tela-geral-home.php">Dashboard</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../sensores/tela-lista-sensores.php">Sensores</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../trens/tela-lista-trens.php">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="funcionarios-cadastrados.php">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?= htmlspecialchars($_SESSION["nome"] ?? "Usuário") ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../login/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<main class="container mt-4">

    <div class="container-branco">

        <div class="titulo-funcionarios">
            <h1>Lista de Funcionários Cadastrados</h1>

            <?php if ($adminLogado) { ?>
            <a href="tela-cadastro-user.php"
               class="btn-novo-funcionario"
               style="background-color: #2D3250 !important;
                      color: white !important;
                      font-weight: bold !important;
                      text-decoration: none !important;
                      padding: 10px 20px;
                      border-radius: 8px;
                      border: 1px solid #2D3250;
                      display: inline-block;">
                + Novo funcionário
            </a>
            <?php } ?>
        </div>

            <div class="borda-tabela">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Cargo</th>
                            <?php if ($adminLogado) { ?>
                            <th>Ações</th>
                            <?php } ?>
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

            <?php if ($adminLogado) { ?>
            <td class="text-center align-middle">
                <div class="acao-tabela d-flex flex-column justify-content-center align-items-center gap-2 mx-auto" style="max-width: 120px;">
                    <a href="editar-funcionarios.php?id=<?php echo $funcionario["id_administrador"]; ?>"
                        class="btn btn-sm btn-acao text-white fw-semibold"
                        style="background: #2D3250; border: none; border-radius: 8px; box-shadow: 0 3px 8px rgba(45, 50, 80, 0.18); width: 100%; min-width: 0; padding: 6px 10px; font-size: 0.75rem;">
                        Editar
                    </a>

                    <a href="excluir-funcionarios.php?id=<?php echo $funcionario["id_administrador"]; ?>"
                        class="btn btn-sm btn-acao text-white fw-semibold"
                        style="background: #d93a3a; border: none; border-radius: 8px; box-shadow: 0 3px 8px rgba(217, 58, 58, 0.18); width: 100%; min-width: 0; padding: 6px 10px; font-size: 0.75rem;">
                        Excluir
                    </a>
                </div>
            </td>
            <?php } ?>
        </tr>

    <?php } ?>

</tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>