<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php"; 
require_once __DIR__ . "/../../infra/permissoes.php"; 
// -> Parte que fica responsavel por verificar se o usuário é um administrador ou nao e caso ele não seja, será redirecionado para o dashboard.

if (!ehAdministrador()) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit;
}// -> Caso seja um administrador, ele pode acessar a página de cadastro de rotas e se nao for ele é jogado para o dashboard

require '../../infra/conexao.php'; // -> conecta com o banco de dados

$mensagem_erro = ""; //->


$sql_trens = "SELECT id_trem, tipo_trem FROM Trem ORDER BY id_trem ASC";
$resultado_trens = mysqli_query($conexao, $sql_trens);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome_rota      = $_POST['nome_rota'] ?? '';
    $descricao_rota = $_POST['descricao_rota'] ?? '';
    $distancia_km   = !empty($_POST['distancia_km']) ? (float)$_POST['distancia_km'] : 0;
    $duracao_estimada = $_POST['duracao_estimada'] ?? '';
    $id_trem        = !empty($_POST['id_trem']) ? (int)$_POST['id_trem'] : null;
    $data_criacao   = date('Y-m-d H:i:s'); // Data e hora atual da criação

    if (!empty($nome_rota) && !empty($duracao_estimada) && $distancia_km > 0 && !empty($id_trem)) {
        
        $sql = "INSERT INTO Rota (nome_rota, descricao_rota, distancia_km, duracao_estimada, data_criacao, id_trem)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);

        if (!$stmt) {
            die("Erro no SQL/Banco: " . $conexao->error);
        }

      
        $stmt->bind_param("ssdssi", $nome_rota, $descricao_rota, $distancia_km, $duracao_estimada, $data_criacao, $id_trem);

        if ($stmt->execute()) {
            header("Location: tela-lista-rotas.php");
            exit;
        } else {
            $mensagem_erro = "Erro na execução do cadastro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $mensagem_erro = "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Rotas</title>
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

    <div class="pg-cadastro-rotas my-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">

                    <div class="card card-cadastro-rotas p-3 border-0 shadow-lg">
                        <div class="card-body p-4">

                            <h2 class="card-title fw-bold mb-3 text-start" style="color: #2d3250;">Cadastrar Rota</h2>

                            <?php if (!empty($mensagem_erro)): ?>
                                <div class="alert alert-danger text-start" role="alert">
                                    <?= htmlspecialchars($mensagem_erro) ?>
                                </div>
                            <?php endif; ?>

                            <div class="box-campos-rotas p-3 mx-auto">
                                <form id="form-cadastro-rotas" action="" method="POST">
                                    
                                    <div class="row text-start mb-3">
                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                            <label class="form-label fw-bold">Nome da Rota</label>
                                            <input type="text" name="nome_rota" class="form-control" placeholder="Ex: Rota Sul - Linha 1" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label fw-bold">Trem Vinculado</label>
                                            <select name="id_trem" class="form-select" required>
                                                <option value="" selected disabled>Selecione o trem</option>
                                                <?php while ($trem = mysqli_fetch_assoc($resultado_trens)): ?>
                                                    <option value="<?= $trem['id_trem'] ?>">
                                                        Trem #<?= str_pad($trem['id_trem'], 2, '0', STR_PAD_LEFT) ?> - <?= htmlspecialchars($trem['tipo_trem']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row text-start mb-3">
                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                            <label class="form-label fw-bold">Distância (km)</label>
                                            <input type="number" step="0.01" name="distancia_km" class="form-control" placeholder="Ex: 45.5" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label fw-bold">Tempo Previsto / Duração</label>
                                            <input type="text" name="duracao_estimada" class="form-control" placeholder="Ex: 02h 30min" required>
                                        </div>
                                    </div>

                                    <div class="row text-start mb-4">
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Descrição</label>
                                            <textarea name="descricao_rota" class="form-control" rows="3" placeholder="Insira a descrição detalhada da rota..."></textarea>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center gap-3 mt-4">
                                        <a href="tela-lista-rotas.php" class="btn btn-light border btn-func-custom text-decoration-none d-flex align-items-center justify-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                            </svg>
                                            Voltar
                                        </a>

                                        <button type="submit" class="btn btn-primary btn-func-custom" style="background-color: #2D3250 !important;">
                                            Cadastrar
                                        </button>
                                    </div>

                                </form>
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