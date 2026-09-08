CREATE DATABASE IF NOT EXISTS SA_Ferrorama;

USE SA_Ferrorama;


CREATE TABLE Perfil (
    id_perfil INT NOT NULL,
    cargo VARCHAR(45) NOT NULL,

    PRIMARY KEY (id_perfil)
);


CREATE TABLE Pessoa (
    id_administrador INT NOT NULL,
    nome_cadastro VARCHAR(60) NOT NULL,
    email_cadastro VARCHAR(60) NOT NULL,
    telefone_cadastro VARCHAR(20) NOT NULL,
    cpf_cadastro VARCHAR(14) NOT NULL,
    senha_cadastro VARCHAR(20) NOT NULL,
    id_perfil INT NOT NULL,

    PRIMARY KEY (id_administrador),

    FOREIGN KEY (id_perfil)
    REFERENCES Perfil(id_perfil)
);


CREATE TABLE Trem (
    id_trem INT NOT NULL,
    nome_trem VARCHAR(60) NOT NULL,
    tipo_trem VARCHAR(60) NOT NULL,
    status_trem ENUM('Ativo', 'Inativo', 'Manutenção') NOT NULL,
    localizacao_trem VARCHAR(60) NOT NULL,

    PRIMARY KEY (id_trem)
);


CREATE TABLE Rota (
    id_rota INT NOT NULL,
    nome_rota VARCHAR(60) NOT NULL,
    status_rota ENUM('Ativo', 'Inativo', 'Manutenção') NOT NULL,
    localizacao_rota VARCHAR(60) NOT NULL,

    PRIMARY KEY (id_rota)
);


CREATE TABLE Sensor (
    id_sensor INT NOT NULL,
    status_sensor ENUM('Ativo', 'Inativo', 'Manutenção') NOT NULL,
    nome_sensor VARCHAR(60) NOT NULL,
    tipo_sensor VARCHAR(45) NOT NULL,
    id_trem INT NULL,
    id_rota INT NULL,

    PRIMARY KEY (id_sensor),

    FOREIGN KEY (id_trem)
    REFERENCES Trem(id_trem),

    FOREIGN KEY (id_rota)
    REFERENCES Rota(id_rota)
);


CREATE TABLE Trem_rota (
    id_trem_rota INT NOT NULL,
    Trem_id_trem INT NOT NULL,
    Rota_id_rota INT NOT NULL,

    PRIMARY KEY (id_trem_rota),

    FOREIGN KEY (Trem_id_trem)
    REFERENCES Trem(id_trem),

    FOREIGN KEY (Rota_id_rota)
    REFERENCES Rota(id_rota)
);


CREATE TABLE Leitura_sensor (
    id_leitura_sensor INT NOT NULL,
    velocidade DECIMAL(10,2) NOT NULL,
    data_hora DATETIME NOT NULL,
    temperatura DECIMAL(5,2) NOT NULL,
    consumo_energia DECIMAL(10,2) NOT NULL,
    latitude DECIMAL(10,8) NOT NULL,
    longitude DECIMAL(11,8) NOT NULL,
    Sensor_id_sensor INT NOT NULL,

    PRIMARY KEY (id_leitura_sensor),

    FOREIGN KEY (Sensor_id_sensor)
    REFERENCES Sensor(id_sensor)
);


CREATE TABLE Falha (
    id_falha INT NOT NULL,
    tipo_falha VARCHAR(60) NOT NULL,
    descricao_falha VARCHAR(255) NOT NULL,
    data_hora DATETIME NOT NULL,
    status_falha ENUM('Aberta', 'Resolvida') NOT NULL,
    Sensor_id_sensor INT NOT NULL,

    PRIMARY KEY (id_falha),

    FOREIGN KEY (Sensor_id_sensor)
    REFERENCES Sensor(id_sensor)
);