
<?php
session_start();

if (isset($_SESSION["id_administrador"])) {
    header("Location: ../dashboard/tela-geral-home.php");
    exit();
}

include "../../infra/conexao.php";

$erro = "";
$sucesso = "";
$modoRecuperacao = false;

// LOGIN
if (isset($_POST["entrar"])) {
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    $stmt = $conexao->prepare(
        "SELECT id_administrador, nome_cadastro, senha_cadastro, id_perfil
        FROM Pessoa WHERE email_cadastro = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    $senhaValida = $usuario && (
        password_verify($senha, $usuario["senha_cadastro"]) ||
        hash_equals((string) $usuario["senha_cadastro"], $senha)
    );

    if ($senhaValida) {
        // Atualiza senhas antigas que ainda não possuem hash
        if (!password_verify($senha, $usuario["senha_cadastro"])) {
            $novaHash = password_hash($senha, PASSWORD_DEFAULT);

            $stmt = $conexao->prepare(
                "UPDATE Pessoa SET senha_cadastro = ?
                WHERE id_administrador = ?"
            );

            $stmt->bind_param(
                "si",
                $novaHash,
                $usuario["id_administrador"]
            );

            $stmt->execute();
        }

        $_SESSION["id_administrador"] = (int) $usuario["id_administrador"];
        $_SESSION["id_perfil"] = (int) $usuario["id_perfil"];
        $_SESSION["nome"] = $usuario["nome_cadastro"];

        header("Location: ../dashboard/tela-geral-home.php");
        exit();
    } else {
        $erro = "Email ou senha incorretos.";
    }
}

// RECUPERAÇÃO DE SENHA
if (isset($_POST["alterar_senha"])) {
    $modoRecuperacao = true;

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $confirmarSenha = $_POST["confirmar_senha"] ?? "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Digite um email válido.";
    } elseif (
        strlen($senha) < 8 ||
        !preg_match('/[A-Z]/', $senha) ||
        !preg_match('/[0-9]/', $senha) ||
        !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $senha)
    ) {
        $erro = "A senha precisa ter 8 caracteres, letra maiúscula, número e símbolo.";
    } elseif ($senha !== $confirmarSenha) {
        $erro = "As senhas não coincidem.";
    } else {
        $stmt = $conexao->prepare(
            "SELECT id_administrador FROM Pessoa
            WHERE email_cadastro = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario) {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $stmt = $conexao->prepare(
                "UPDATE Pessoa SET senha_cadastro = ?
                WHERE id_administrador = ?"
            );

            $stmt->bind_param(
                "si",
                $senhaHash,
                $usuario["id_administrador"]
            );

            if ($stmt->execute()) {
                $sucesso = "Senha alterada! Você já pode entrar.";
                $modoRecuperacao = false;
            } else {
                $erro = "Não foi possível alterar a senha.";
            }
        } else {
            $erro = "Não existe uma conta cadastrada com esse email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tela de Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../../assets/style/style.css">
</head>

<body class="pagina_login">

    <header class="meu_header">
        <div class="cabecalho">
            <img src="../../assets/img/tela-login/imagem trem.png"
                alt="Imagem do trem" class="imagem_trem">

            <div class="texto_cabecalho">
                <h1 class="titulo_mn">MN Ferrovia</h1>
                <p class="subtitulo_mn">Sistema de monitoramento</p>
            </div>
        </div>
    </header>

    <main class="main_content container-fluid">
        <div class="text-end">

            <h2 id="titulo">Seja Bem-vindo!</h2>

            <form method="POST" id="form-login">

                <div id="c-email" class="conjunto">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"
                        placeholder="Email" required
                        value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>">
                </div>

                <div id="c-senha" class="conjunto">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha"
                        placeholder="Senha" required>
                </div>

                <button id="botao-envio" type="submit" name="entrar">
                    Entrar
                </button>

                <div id="mensagem">
                    <?php if ($erro != "") { ?>
                        <p class="erro">
                            <?php echo htmlspecialchars($erro); ?>
                        </p>
                    <?php } ?>

                    <?php if ($sucesso != "") { ?>
                        <p class="sucesso">
                            <?php echo htmlspecialchars($sucesso); ?>
                        </p>
                    <?php } ?>
                </div>

                <button type="button" class="toggle" id="toggle">
                    Esqueceu a senha?
                </button>

            </form>
        </div>
    </main>

    <script>
        let modoInicial = <?php echo $modoRecuperacao ? "true" : "false"; ?>;
    </script>

    <script src="../../script/tela-login.js"></script>

</body>
</html>
