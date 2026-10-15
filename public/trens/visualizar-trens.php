<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";

require '../../infra/conexao.php';

$id_trem = isset($_GET['id_trem']) ? (int) $_GET['id_trem'] : 0;

if ($id_trem <= 0) {
    header('Location: tela-lista-trens.php');
    exit;
}

$sql = "SELECT T.*, P.nome_cadastro AS responsavel
        FROM Trem T
        LEFT JOIN Pessoa P ON P.id_administrador = T.id_responsavel
        WHERE T.id_trem = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param('i', $id_trem);
$stmt->execute();
$resultado = $stmt->get_result();
$trem = $resultado->fetch_assoc();

if (!$trem) {
    header('Location: tela-lista-trens.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Trem</title>
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
                    <li class="nav-item mx-3"><a class="nav-link" href="../dashboard/tela-geral-home.php">Dashboard</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../sensores/tela-lista-sensores.php">Sensores</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="tela-lista-trens.php">Trens</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../relatorios/tela-relatorios.php">Relatórios</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= htmlspecialchars($_SESSION['nome'] ?? 'Usuário') ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../login/logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex align-items-center justify-content-center pg-cadastro-funcionario">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-7">
                    <div class="card shadow-lg border-0 card-cadastro-funcionario">
                        <div class="card-body p-5">
                            <h2 class="card-title fw-bold mb-4 text-center" style="color: #2d3250;">Detalhes do Trem</h2>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">ID do trem</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($trem['id_trem']) ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nome</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($trem['nome_trem']) ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Tipo</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($trem['tipo_trem']) ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Status</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($trem['status_trem']) ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Localização</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($trem['localizacao_trem']) ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Responsável</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($trem['responsavel'] ?? 'Não informado') ?>" disabled>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <a href="tela-lista-trens.php" class="btn btn-light border btn-func-custom text-decoration-none d-flex align-items-center justify-content-center">
                                    Voltar
                                </a>

                                <?php if (ehAdministrador()): ?>
                                    <a href="editar-trens.php?id_trem=<?= (int) $trem['id_trem'] ?>" class="btn btn-primary btn-func-custom">
                                        Editar
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
