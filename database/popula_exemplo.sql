USE SA_Ferrorama;

-- =========================================================
-- 5 funcionários de exemplo
-- =========================================================
INSERT INTO Pessoa (id_administrador, nome_cadastro, email_cadastro, telefone_cadastro, cpf_cadastro, senha_cadastro, id_perfil)
VALUES
    (101, 'Ana Paula Costa', 'ana.costa@mnferrovia.com.br', '11911112222', '52998224725', 'Senha@123', 2),
    (102, 'Bruno Lima', 'bruno.lima@mnferrovia.com.br', '11922223333', '39087615478', 'Senha@123', 2),
    (103, 'Carla Souza', 'carla.souza@mnferrovia.com.br', '11933334444', '70356429040', 'Senha@123', 2),
    (104, 'Diego Rocha', 'diego.rocha@mnferrovia.com.br', '11944445555', '18722130443', 'Senha@123', 2),
    (105, 'Elisa Nunes', 'elisa.nunes@mnferrovia.com.br', '11955556666', '89077412390', 'Senha@123', 2)
ON DUPLICATE KEY UPDATE
    nome_cadastro = VALUES(nome_cadastro),
    email_cadastro = VALUES(email_cadastro),
    telefone_cadastro = VALUES(telefone_cadastro),
    cpf_cadastro = VALUES(cpf_cadastro),
    senha_cadastro = VALUES(senha_cadastro),
    id_perfil = VALUES(id_perfil);

-- =========================================================
-- 5 trens de exemplo
-- =========================================================
INSERT INTO Trem (id_trem, nome_trem, tipo_trem, status_trem, localizacao_trem, id_responsavel)
VALUES
    (101, 'Trem 101', 'Regional', 'Ativo', 'Estação Central', 101),
    (102, 'Trem 202', 'Metropolitano', 'Ativo', 'Estação Norte', 102),
    (103, 'Trem 303', 'Carga', 'Manutenção', 'Pátio Sul', 103),
    (104, 'Trem 404', 'Intermunicipal', 'Ativo', 'Estação Leste', 104),
    (105, 'Trem 505', 'Executivo', 'Inativo', 'Depósito Oeste', 105)
ON DUPLICATE KEY UPDATE
    nome_trem = VALUES(nome_trem),
    tipo_trem = VALUES(tipo_trem),
    status_trem = VALUES(status_trem),
    localizacao_trem = VALUES(localizacao_trem),
    id_responsavel = VALUES(id_responsavel);

-- =========================================================
-- 5 rotas de exemplo
-- =========================================================
INSERT INTO Rota (id_rota, nome_rota, descricao_rota, distancia_km, duracao_estimada, data_criacao, id_trem)
VALUES
    (101, 'Linha A - Centro/Industrial', 'Rota principal de transporte de passageiros entre a região central e o polo industrial.', 42.50, '00:55:00', '2026-10-22 08:00:00', 101),
    (102, 'Linha B - Aeroporto/Terminal', 'Conexão direta para o terminal de passageiros e a área do aeroporto.', 38.20, '00:48:00', '2026-10-22 08:10:00', 102),
    (103, 'Linha C - Porto/Logística', 'Rota de carga com foco em movimentação logística e operações de porto.', 64.10, '01:20:00', '2026-10-22 08:20:00', 103),
    (104, 'Linha D - Bairro/Universidade', 'Rota regional de acesso ao campus universitário e bairros residenciais.', 28.90, '00:35:00', '2026-10-22 08:30:00', 104),
    (105, 'Linha E - Parque/Shopping', 'Trajeto urbano com alta demanda de passageiros em fins de semana.', 45.30, '00:58:00', '2026-10-22 08:40:00', 105)
ON DUPLICATE KEY UPDATE
    nome_rota = VALUES(nome_rota),
    descricao_rota = VALUES(descricao_rota),
    distancia_km = VALUES(distancia_km),
    duracao_estimada = VALUES(duracao_estimada),
    id_trem = VALUES(id_trem);

-- =========================================================
-- 5 sensores de exemplo
-- =========================================================
INSERT INTO Sensor (id_sensor, status_sensor, tipo_sensor, localizacao_sensor, id_trem, id_rota)
VALUES
    (101, 'Ativo', 'Temperatura', 'Vagão 1 - Motor', 101, 101),
    (102, 'Ativo', 'Velocidade', 'Vagão 2 - Eixo', 102, 102),
    (103, 'Manutenção', 'Localizador', 'Vagão 3 - Compartimento', 103, 103),
    (104, 'Ativo', 'Temperatura', 'Vagão 4 - Freio', 104, 104),
    (105, 'Inativo', 'Localizador', 'Vagão 5 - Carga', 105, 105)
ON DUPLICATE KEY UPDATE
    status_sensor = VALUES(status_sensor),
    tipo_sensor = VALUES(tipo_sensor),
    localizacao_sensor = VALUES(localizacao_sensor),
    id_trem = VALUES(id_trem),
    id_rota = VALUES(id_rota);

-- =========================================================
-- Se quiser também preencher a tabela de relacionamento trem_rota
-- =========================================================
INSERT INTO Trem_rota (id_trem_rota, Trem_id_trem, Rota_id_rota)
VALUES
    (101, 101, 101),
    (102, 102, 102),
    (103, 103, 103),
    (104, 104, 104),
    (105, 105, 105)
ON DUPLICATE KEY UPDATE
    Trem_id_trem = VALUES(Trem_id_trem),
    Rota_id_rota = VALUES(Rota_id_rota);
