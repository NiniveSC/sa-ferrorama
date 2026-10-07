<?php
require '../../infra/conexao.php';

// Busca o id_sensor vindo da URL
$id_sensor = isset($_GET["id_sensor"]) ? (int) $_GET["id_sensor"] : 0;
$mensagem_erro = "";

// Se enviou o formulário, atualiza no banco
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo_sensor = $_POST["tipo_sensor"];
    $localizacao_sensor = $_POST["localizacao_sensor"];
    $status_sensor = $_POST["status_sensor"];

    if (!empty($tipo_sensor) && !empty($localizacao_sensor) && !empty($status_sensor) && $id_sensor > 0) {
        $sql_update = "UPDATE Sensor SET 
                        tipo_sensor = '$tipo_sensor', 
                        localizacao_sensor = '$localizacao_sensor', 
                        status_sensor = '$status_sensor' 
                       WHERE id_sensor = $id_sensor";

        if (mysqli_query($conexao, $sql_update)) {
            header("Location: tela-lista-sensores.php");
            exit();
        } else {
            $mensagem_erro = "Erro no banco de dados: " . mysqli_error($conexao);
        }
    } else {
        $mensagem_erro = "Por favor, preencha todos os campos.";
    }
}

// Carrega dados atuais do sensor
$sensor = null;
if ($id_sensor > 0) {
    $sql_select = "SELECT * FROM Sensor WHERE id_sensor = $id_sensor";
    $resultado = mysqli_query($conexao, $sql_select);
    $sensor = mysqli_fetch_assoc($resultado);
}

if (!$sensor) {
    header("Location: tela-lista-sensores.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Trem</title>
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

    
    <div class="d-flex align-items-center justify-content-center pg-cadastro-funcionario">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-lg border-0 card-cadastro-funcionario">
                    <div class="card-body px-5 pt-3 pb-5">
                        <h2 class="card-title text-center fw-bold mb-2" style="color: #2d3250;">
    Editar Trens
</h2>
<br>

                        <?php if (!empty($mensagem_erro)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $mensagem_erro ?>
                                </div>
                            <?php endif; ?>

                        <form id="form-cadastro-funcionario">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">ID do trem</label>
                                    <input type="text" id="nome-cadastro" class="form-control" value="<?= $sensor['id_sensor'] ?>" disabled placeholder="Digite o ID do trem">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tipo</label>
                                    <select id="cargo-cadastro" class="form-select">
                                        <option value="" selected>Selecione o tipo</option>
                                        <option value="Carga viva"             <?= ($trem['tipo_trem'] == 'Carga viva') ? 'selected' : '' ?>>Carga viva</option>
                                        <option value="Transporte de pessoas"  <?= ($trem['tipo_trem'] == 'Transporte de pessoas') ? 'selected' : '' ?>>Transporte de pessoas</option>
                                        <option value="Carga a granel"         <?= ($trem['tipo_trem'] == 'Carga a granel') ? 'selected' : '' ?>>Carga a granel</option>
                                        <option value="Carga a granel em seco" <?= ($trem['tipo_trem'] == 'Carga a granel em seco') ? 'selected' : '' ?>>Carga a granel em seco</option>
                                        <option value="Carga a granel líquida" <?= ($trem['tipo_trem'] == 'Carga a granel líquida') ? 'selected' : '' ?>>Carga a granel líquida</option>
                                        <option value="Carga Geral"            <?= ($trem['tipo_trem'] == 'Carga Geral') ? 'selected' : '' ?>>Carga Geral</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
        
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Localização</label>
                                    <input type="tel" id="telefone-cadastro" class="form-control" placeholder="Insira a localização do trem">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Status do trem</label>
                                    <select id="status-trem" class="form-select">
                                        <option value="" selected>Selecione o status</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                        <option value="em concerto" >Em concerto</option>
                                    </select>
                                </div>
                            </div>

                              
                            </div>

                            

                           <div class="d-flex justify-content-center gap-4">
                                    <a href="tela-lista-sensores.php" class="btn btn-light border btn-func-custom text-decoration-none d-flex align-items-center justify-content-center">
                                        Voltar
                                    </a>

                                    <button type="submit" class="btn btn-func-custom btn-primary" style="background-color: #2D3250 !important;">
                                        Editar
                                    </button>
                                </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
        <script src=""></script>
</body>

</html>

