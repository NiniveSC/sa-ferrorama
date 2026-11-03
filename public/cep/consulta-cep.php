<?php
session_start();
require_once __DIR__ . '/../../infra/verifica_sessao.php';
require_once __DIR__ . '/../../infra/api_cep.php';

$dadosCep = null;
$erroCep = '';
$cepDigitado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cep'])) {
    $cepDigitado = trim($_POST['cep']);
    $resultado = consultarCepBrasil($cepDigitado);

    if ($resultado['status'] === 'sucesso') {
        $dadosCep = $resultado;
    } else {
        $erroCep = $resultado['mensagem'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de CEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina-cep">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-3"><a class="nav-link" href="../dashboard/tela-geral-home.php">Dashboard</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../sensores/tela-lista-sensores.php">Sensores</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../trens/tela-lista-trens.php">Trens</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../rotas/tela-lista-rotas.php">Rotas</a></li>
                    <li class="nav-item mx-3"><a class="nav-link" href="../funcionarios/funcionarios-cadastrados.php">Funcionário</a></li>
                </ul>
                <ul class="navbar-nav">
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

    <main class="container py-5">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h2 class="titulo-secao mb-3">Consulta de CEP</h2>
                    <p class="text-muted">Informe o CEP para buscar endereço e preencher os campos automaticamente.</p>

                    <form method="POST">
                        <label class="form-label fw-bold" for="cep">CEP</label>
                        <input
                            type="text"
                            id="cep"
                            name="cep"
                            class="form-control form-control-lg"
                            value="<?= htmlspecialchars($cepDigitado) ?>"
                            placeholder="Digite o CEP"
                            maxlength="9"
                            inputmode="numeric"
                            required>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Consultar CEP</button>
                    </form>

                    <?php if ($erroCep !== ''): ?>
                        <div class="alert alert-danger mt-3 mb-0">
                            <?= htmlspecialchars($erroCep) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h3 class="titulo-secao mb-3">Resultado</h3>

                    <?php if ($dadosCep): ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">CEP</label>
                                <input class="form-control" value="<?= htmlspecialchars($dadosCep['cep']) ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Logradouro</label>
                                <input class="form-control" value="<?= htmlspecialchars($dadosCep['logradouro']) ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Bairro</label>
                                <input class="form-control" value="<?= htmlspecialchars($dadosCep['bairro']) ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Cidade</label>
                                <input class="form-control" value="<?= htmlspecialchars($dadosCep['cidade']) ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">UF</label>
                                <input class="form-control" value="<?= htmlspecialchars($dadosCep['estado']) ?>" readonly>
                            </div>
                            <div class="col-md-9">
                                <label class="form-label">Complemento</label>
                                <input class="form-control" value="<?= htmlspecialchars($dadosCep['complemento']) ?>" readonly>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-muted border rounded-3 p-4 bg-light">
                            Nenhum endereço foi consultado ainda. Informe um CEP válido para preencher os campos.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const inputCep = document.getElementById('cep');
        if (inputCep) {
            inputCep.addEventListener('input', function () {
                const value = inputCep.value.replace(/\D/g, '').slice(0, 8);
                inputCep.value = value.length > 5 ? value.slice(0, 5) + '-' + value.slice(5) : value;
            });
        }
    </script>
</body>

</html>
