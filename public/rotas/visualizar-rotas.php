<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
require_once __DIR__ . "/../../infra/permissoes.php";

require '../../infra/conexao.php';

$id_rota = isset($_GET['id_rota']) ? (int) $_GET['id_rota'] : 0;

if ($id_rota <= 0) {
    header('Location: tela-lista-rotas.php');
    exit;
}

$sql = "SELECT r.*, t.nome_trem, t.tipo_trem
        FROM Rota r
        LEFT JOIN Trem t ON t.id_trem = r.id_trem
        WHERE r.id_rota = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param('i', $id_rota);
$stmt->execute();
$resultado = $stmt->get_result();
$rota = $resultado->fetch_assoc();

if (!$rota) {
    header('Location: tela-lista-rotas.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Rota</title>
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
                    <li class="nav-item mx-3"><a class="nav-link" href="../trens/tela-lista-trens.php">Trens</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="tela-lista-rotas.php">Rotas</a></li>
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
                            <h2 class="card-title fw-bold mb-4 text-center" style="color: #2d3250;">Detalhes da Rota</h2>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">ID da rota</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($rota['id_rota']) ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nome da rota</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($rota['nome_rota']) ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Distância</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($rota['distancia_km']) ?> km" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Duração estimada</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($rota['duracao_estimada']) ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Trem</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($rota['nome_trem'] ?? 'Não informado') ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Tipo do trem</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($rota['tipo_trem'] ?? 'Não informado') ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Descrição</label>
                                    <textarea class="form-control" rows="4" disabled><?= htmlspecialchars($rota['descricao_rota'] ?? 'Sem descrição') ?></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <a href="tela-lista-rotas.php" class="btn btn-light border btn-func-custom text-decoration-none d-flex align-items-center justify-content-center">
                                    Voltar
                                </a>

                                <?php if (ehAdministrador()): ?>
                                    <a href="editar-rotas.php?id_rota=<?= (int) $rota['id_rota'] ?>" class="btn btn-primary btn-func-custom">
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
