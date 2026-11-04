<?php
session_start();
require_once __DIR__ . "/../../infra/verifica_sessao.php";
include __DIR__ . "/../../infra/conexao.php";

$totais = [
    'funcionarios' => 0,
    'trens' => 0,
    'rotas' => 0,
    'sensores' => 0,
    'falhas_abertas' => 0,
    'falhas_total' => 0,
];

$totais['funcionarios'] = (int) mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM Pessoa"))['total'];
$totais['trens'] = (int) mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM Trem"))['total'];
$totais['rotas'] = (int) mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM Rota"))['total'];
$totais['sensores'] = (int) mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM Sensor"))['total'];
$totais['falhas_total'] = (int) mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM Falha"))['total'];
$totais['falhas_abertas'] = (int) mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM Falha WHERE status_falha = 'Aberta'"))['total'];

$funcionarios = mysqli_query($conexao, "
    SELECT P.id_administrador, P.nome_cadastro, P.email_cadastro, P.telefone_cadastro, PF.cargo
    FROM Pessoa P
    INNER JOIN Perfil PF ON PF.id_perfil = P.id_perfil
    ORDER BY P.nome_cadastro ASC
");

$trens = mysqli_query($conexao, "
    SELECT T.id_trem, T.nome_trem, T.tipo_trem, T.status_trem, T.localizacao_trem,
           P.nome_cadastro AS responsavel
    FROM Trem T
    LEFT JOIN Pessoa P ON P.id_administrador = T.id_responsavel
    ORDER BY T.nome_trem ASC
");

$rotas = mysqli_query($conexao, "
    SELECT R.id_rota, R.nome_rota, R.descricao_rota, R.distancia_km, R.duracao_estimada, R.data_criacao, T.nome_trem
    FROM Rota R
    INNER JOIN Trem T ON T.id_trem = R.id_trem
    ORDER BY R.nome_rota ASC
");

$sensores = mysqli_query($conexao, "
    SELECT S.id_sensor, S.tipo_sensor, S.status_sensor, S.localizacao_sensor,
           T.nome_trem, R.nome_rota
    FROM Sensor S
    LEFT JOIN Trem T ON T.id_trem = S.id_trem
    LEFT JOIN Rota R ON R.id_rota = S.id_rota
    ORDER BY S.id_sensor ASC
");

$falhas = mysqli_query($conexao, "
    SELECT F.id_falha, F.tipo_falha, F.descricao_falha, F.data_hora, F.status_falha,
           S.id_sensor, S.localizacao_sensor, T.nome_trem
    FROM Falha F
    INNER JOIN Sensor S ON S.id_sensor = F.Sensor_id_sensor
    LEFT JOIN Trem T ON T.id_trem = S.id_trem
    ORDER BY F.data_hora DESC
");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Geral | Ferrorama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --azul: #2d3250;
            --azul-escuro: #1d3557;
            --amarelo: #d9c03d;
            --cinza-bg: #e8ecf1;
            --cinza-card: #f7f9fb;
            --texto: #1f2b3c;
            --texto-suave: #52607a;
            --borda: rgba(31, 43, 60, 0.12);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--cinza-bg);
            color: var(--texto);
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px 60px;
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .btn-voltar,
        .btn-pdf {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 11px 22px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-voltar {
            background: var(--azul);
            color: #fff;
        }

        .btn-voltar:hover {
            background: #1f243d;
            color: #fff;
            text-decoration: none;
        }

        .btn-pdf {
            background: var(--amarelo);
            color: var(--azul-escuro);
        }

        .btn-pdf:hover {
            background: #c9b235;
            color: var(--azul-escuro);
        }

        h1 {
            text-align: center;
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 800;
            color: var(--azul);
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
            margin-bottom: 34px;
        }

        .card {
            background: #fff;
            border: 1px solid var(--borda);
            border-radius: 18px;
            padding: 18px 20px;
            box-shadow: 0 12px 30px rgba(16, 23, 39, 0.05);
        }

        .card-label {
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--texto-suave);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .card-valor {
            font-size: clamp(1.7rem, 2vw, 2.3rem);
            font-weight: 800;
            color: var(--azul);
            line-height: 1;
        }

        .section-box {
            background: #fff;
            border: 1px solid var(--borda);
            border-radius: 20px;
            padding: 22px 18px;
            margin-bottom: 24px;
            box-shadow: 0 12px 30px rgba(16, 23, 39, 0.04);
        }

        .section-box h2 {
            margin: 0 0 18px;
            color: var(--azul);
            font-weight: 800;
            font-size: 1.6rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }

        th, td {
            border-bottom: 1px solid rgba(31, 43, 60, 0.12);
            padding: 10px 12px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f1f4f8;
            color: var(--azul);
            font-weight: 700;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 700;
            background: #eaf7ee;
            color: #1d7a47;
        }

        .status-manutencao {
            background: #fff4d9;
            color: #8f6200;
        }

        .status-inativo {
            background: #fbe8e8;
            color: #9c2a2a;
        }

        .small-muted {
            color: var(--texto-suave);
            font-size: 0.82rem;
        }

        @media (max-width: 768px) {
            .top-actions {
                justify-content: center;
            }

            .page {
                padding-left: 12px;
                padding-right: 12px;
            }
        }

        @media print {
            body {
                background: #fff;
            }

            .no-print {
                display: none !important;
            }

            .page {
                max-width: 100%;
                padding: 0;
            }

            .section-box, .card {
                box-shadow: none;
                border-color: #dfe5ee;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="top-actions no-print">
            <a href="../dashboard/tela-geral-home.php" class="btn-voltar">← Voltar</a>
            <button id="btn-gerar-pdf" class="btn-pdf" type="button">Gerar PDF</button>
        </div>

        <h1>Relatório Geral do Sistema</h1>

        <div class="cards">
            <div class="card">
                <div class="card-label">Funcionários</div>
                <div class="card-valor"><?= $totais['funcionarios'] ?></div>
            </div>
            <div class="card">
                <div class="card-label">Trens</div>
                <div class="card-valor"><?= $totais['trens'] ?></div>
            </div>
            <div class="card">
                <div class="card-label">Rotas</div>
                <div class="card-valor"><?= $totais['rotas'] ?></div>
            </div>
            <div class="card">
                <div class="card-label">Sensores</div>
                <div class="card-valor"><?= $totais['sensores'] ?></div>
            </div>
            <div class="card">
                <div class="card-label">Falhas abertas</div>
                <div class="card-valor"><?= $totais['falhas_abertas'] ?></div>
            </div>
            <div class="card">
                <div class="card-label">Falhas totais</div>
                <div class="card-valor"><?= $totais['falhas_total'] ?></div>
            </div>
        </div>

        <div class="section-box">
            <h2>Funcionários</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($funcionario = mysqli_fetch_assoc($funcionarios)): ?>
                        <tr>
                            <td><?= htmlspecialchars($funcionario['nome_cadastro']) ?></td>
                            <td><?= htmlspecialchars($funcionario['email_cadastro']) ?></td>
                            <td><?= htmlspecialchars($funcionario['telefone_cadastro']) ?></td>
                            <td><?= htmlspecialchars($funcionario['cargo']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="section-box">
            <h2>Trens</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Localização</th>
                        <th>Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($trem = mysqli_fetch_assoc($trens)): ?>
                        <tr>
                            <td><?= htmlspecialchars($trem['nome_trem']) ?></td>
                            <td><?= htmlspecialchars($trem['tipo_trem']) ?></td>
                            <td>
                                <?php
                                $status = $trem['status_trem'];
                                $classe = $status === 'Ativo' ? 'status' : ($status === 'Manutenção' ? 'status status-manutencao' : 'status status-inativo');
                                ?>
                                <span class="<?= $classe ?>"><?= htmlspecialchars($status) ?></span>
                            </td>
                            <td><?= htmlspecialchars($trem['localizacao_trem']) ?></td>
                            <td><?= htmlspecialchars($trem['responsavel'] ?? 'Sem responsável') ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="section-box">
            <h2>Rotas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Distância</th>
                        <th>Duração</th>
                        <th>Data</th>
                        <th>Trem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rota = mysqli_fetch_assoc($rotas)): ?>
                        <tr>
                            <td><?= htmlspecialchars($rota['nome_rota']) ?></td>
                            <td><?= htmlspecialchars($rota['descricao_rota'] ?? 'Sem descrição') ?></td>
                            <td><?= htmlspecialchars($rota['distancia_km']) ?> km</td>
                            <td><?= htmlspecialchars($rota['duracao_estimada']) ?></td>
                            <td><?= date('d/m/Y', strtotime($rota['data_criacao'])) ?></td>
                            <td><?= htmlspecialchars($rota['nome_trem']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="section-box">
            <h2>Sensores</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Localização</th>
                        <th>Trem</th>
                        <th>Rota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($sensor = mysqli_fetch_assoc($sensores)): ?>
                        <tr>
                            <td><?= htmlspecialchars($sensor['id_sensor']) ?></td>
                            <td><?= htmlspecialchars($sensor['tipo_sensor']) ?></td>
                            <td>
                                <?php
                                $statusSensor = $sensor['status_sensor'];
                                $classeSensor = $statusSensor === 'Ativo' ? 'status' : ($statusSensor === 'Manutenção' ? 'status status-manutencao' : 'status status-inativo');
                                ?>
                                <span class="<?= $classeSensor ?>"><?= htmlspecialchars($statusSensor) ?></span>
                            </td>
                            <td><?= htmlspecialchars($sensor['localizacao_sensor']) ?></td>
                            <td><?= htmlspecialchars($sensor['nome_trem'] ?? '—') ?></td>
                            <td><?= htmlspecialchars($sensor['nome_rota'] ?? '—') ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="section-box">
            <h2>Falhas</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Data/Hora</th>
                        <th>Status</th>
                        <th>Localização</th>
                        <th>Trem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($falha = mysqli_fetch_assoc($falhas)): ?>
                        <tr>
                            <td><?= htmlspecialchars($falha['id_falha']) ?></td>
                            <td><?= htmlspecialchars($falha['tipo_falha']) ?></td>
                            <td><?= htmlspecialchars($falha['descricao_falha']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($falha['data_hora'])) ?></td>
                            <td>
                                <?php
                                $statusFalha = $falha['status_falha'];
                                $classeFalha = $statusFalha === 'Aberta' ? 'status status-inativo' : 'status';
                                ?>
                                <span class="<?= $classeFalha ?>"><?= htmlspecialchars($statusFalha) ?></span>
                            </td>
                            <td><?= htmlspecialchars($falha['localizacao_sensor']) ?></td>
                            <td><?= htmlspecialchars($falha['nome_trem'] ?? '—') ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('btn-gerar-pdf')?.addEventListener('click', function () {
            window.print();
        });
    </script>
</body>

</html>
