<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";

include "../../infra/conexao.php";

$sql = "SELECT * FROM Rota";
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
    <title>Rotas Cadastradas</title>
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
                        <a class="nav-link" href="../sensores/tela-lista-sensores.php">Sensores</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="../trens/tela-lista-trens.php">Trens</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="tela-lista-rotas.php">Rotas</a>
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

            <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="m-0">Lista de Rotas Cadastradas</h1>

            <?php if (ehAdministrador()) { ?>
            <a href="cadastrar-rotas.php"
                class="btn-novo-funcionario"
                style="background-color: #2D3250 !important;
                       color: white !important;
                       font-weight: bold !important;
                       text-decoration: none !important;
                       padding: 10px 20px;
                       border-radius: 8px;
                       border: 1px solid #2D3250;
                       display: inline-block;">
                + Nova rota
            </a>
            <?php } ?>
        </div>

            <div class="borda-tabela">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome da Rota</th>
                            <th>Distância (km)</th>
                            <th>Duração</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

             <?php while ($rota = $resultado->fetch_assoc()) { ?>

            <tr>
                    <td>
                        <?php echo htmlspecialchars($rota['id_rota']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($rota['nome_rota']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($rota['distancia_km']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($rota['duracao_estimada']); ?>
                    </td>

                    <td>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="visualizar-rotas.php?id_rota=<?php echo $rota['id_rota']; ?>"
                                class="btn btn-sm px-3 text-white fw-semibold"
                                style="background: #2D3250; border: none; border-radius: 8px; min-width: 90px; box-shadow: 0 3px 8px rgba(45, 50, 80, 0.18);">
                                Visualizar
                            </a>

                            <?php if (ehAdministrador()) { ?>
                            <a href="editar-rotas.php?id_rota=<?php echo $rota['id_rota']; ?>"
                                class="btn btn-sm px-3 text-white fw-semibold"
                                style="background: #2D3250; border: none; border-radius: 8px; min-width: 78px; box-shadow: 0 3px 8px rgba(45, 50, 80, 0.18);">
                                Editar
                            </a>

                            <a href="excluir-rotas.php?id_rota=<?php echo $rota['id_rota']; ?>"
                                class="btn btn-sm px-3 text-white fw-semibold"
                                style="background: #d93a3a; border: none; border-radius: 8px; min-width: 78px; box-shadow: 0 3px 8px rgba(217, 58, 58, 0.18);">
                                Excluir
                            </a>
                            <?php } ?>
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