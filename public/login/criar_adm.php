
<?php

include "../../infra/conexao.php";

$nome = "Administradora";
$email = "admin@ferrorama.com";
$telefone = "";
$cpf = "";
$senha = "Ferrorama123!";

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
$id_perfil = 1;

$sql = "INSERT INTO Pessoa
(nome_cadastro, email_cadastro, telefone_cadastro, cpf_cadastro, senha_cadastro, id_perfil)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssssi",
    $nome,
    $email,
    $telefone,
    $cpf,
    $senhaHash,
    $id_perfil
);

if ($stmt->execute()) {
    echo "Administrador criado com sucesso!";
} else {
    echo "Erro ao criar administrador: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
