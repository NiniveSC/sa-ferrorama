<?php

session_start();

include "../../infra/conexao.php";




?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina_login">

    <header class="meu_header">

        <div class="cabecalho">
            <img src="../../assets/img/tela-login/imagem trem.png" alt="imagem do trem" class="imagem_trem">
            <div class="texto_cabecalho">
                <h1 class="titulo_mn">MN Ferrovia</h1>
                <p class="subtitulo_mn">Sistema de monitoramento</p>
            </div>
        </div>
    </header>

    <main class="main_content container-fluid">
        <div class="text-end">
            <h2 id="titulo">Seja Bem vindo!</h2>
            <form method="POST">
                <div id="c-email" class="conjunto">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div id="c-senha" class="conjunto">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <button id="botao-envio" type="submit" name="entrar">Entrar</button>

                <div id="mensagem">

    <?php
    if (isset($erro)) {
        echo $erro;
    }
    ?>

</div>
                <div class="toggle" id="toggle">
                    <p> Esqueceu a senha?</p>
            </form>
        </div>
        </div>
    </main>

    <footer>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>

<?php
if (isset($_POST["entrar"])) {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $resultado = mysqli_query($conexao, "SELECT * FROM Pessoa WHERE email_cadastro = '$email'");

    $usuario = mysqli_fetch_assoc($resultado);

    if ($usuario && password_verify($senha, $usuario["senha_cadastro"])) {

        $_SESSION["id_administrador"] = $usuario["id_administrador"];
        $_SESSION["id_perfil"] = $usuario["id_perfil"];
        $_SESSION["nome"] = $usuario["nome_cadastro"];

        header("Location: ../dashboard/tela-geral-home.php");
        exit();

    } else {

        $erro = "Email ou senha incorretos.";

    }
}