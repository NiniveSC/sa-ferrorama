<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";

include "../../infra/conexao.php";

$sql = "SELECT * FROM Sensor";
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
    <title>Sensores Cadastrados</title>
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
                        <a class="nav-link" href="../dashboard/tela-geral-home.php">Dashboard</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-sensores.php">Sensores</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../trens/tela-lista-trens.php">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            NomeAdmin
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

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="m-0 fw-bold" style="color: #2d3250;">Sensores cadastrados</h1>

                <a href="cadastro-sensores.php"
                    class="btn-novo-funcionario"
                    style="background: linear-gradient(135deg, #2D3250, #404a79) !important;
                           color: white !important;
                           font-weight: 600 !important;
                           text-decoration: none !important;
                           padding: 11px 20px;
                           border-radius: 10px;
                           border: none;
                           display: inline-block;
                           box-shadow: 0 4px 10px rgba(45, 50, 80, 0.18);">
                    + Novo sensor
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

             <?php while ($sensor = $resultado->fetch_assoc()) { ?>

            <tr>
                    <td>
                        <?php echo htmlspecialchars($sensor['id_sensor']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($sensor['localizacao_sensor']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($sensor['status_sensor']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($sensor['tipo_sensor']); ?>
                    </td>

                    <td>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="editar-sensores.php?id_sensor=<?php echo $sensor['id_sensor']; ?>"
                                class="btn btn-sm px-3 text-white fw-semibold"
                                style="background: #2D3250; border: none; border-radius: 8px; min-width: 78px; box-shadow: 0 3px 8px rgba(45, 50, 80, 0.18);">
                                Editar
                            </a>

                            <a href="excluir-sensores.php?id_sensor=<?php echo $sensor['id_sensor']; ?>"
                                class="btn btn-sm px-3 text-white fw-semibold"
                                style="background: #d93a3a; border: none; border-radius: 8px; min-width: 78px; box-shadow: 0 3px 8px rgba(217, 58, 58, 0.18);">
                                Excluir
                            </a>
                        </div>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</main>

</body>

</html>