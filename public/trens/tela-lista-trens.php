<?php

include "../../infra/conexao.php";

$sql = "SELECT * FROM Trem";
$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

?>

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

        <div class="container-branco">

            <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="m-0">Lista de trens Cadastrados</h1>

            <a href="cadastro-sensores.php"
                class="btn-novo-funcionario"
                style="background-color: #2D3250 !important;
                       color: white !important;
                       font-weight: bold !important;
                       text-decoration: none !important;
                       padding: 10px 20px;
                       border-radius: 8px;
                       border: 1px solid #2D3250;
                       display: inline-block;">
                + Novo Trem
            </a>
        </div>

            <div class="borda-tabela">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Localização</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

             <?php while ($trem = $resultado->fetch_assoc()) { ?>

            <tr>
                    <td>
                        <?php echo htmlspecialchars($trem['id_trem']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($trem['localizacao_trem']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($trem['status_trem']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($trem['tipo_trem']); ?>
                    </td>

                    <td>
                        <a href="editar-trens.php?id_trem=<?php echo $trem['id_trem']; ?>"
                            class="btn btn-primary"
                            style="background-color: #2D3250 !important;">
                            Editar
                        </a>


                        <a href="excluir-trens.php?id_trem=<?php echo $trem['id_trem']; ?>"
                            class="btn btn-danger"
                            style="background-color: #df3535 !important;">

                            Excluir
                        </a>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</main>

</body>

</html>