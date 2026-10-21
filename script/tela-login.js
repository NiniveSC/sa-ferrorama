
let esqueceuASenha = modoInicial;

const form = document.getElementById("form-login");
const titulo = document.getElementById("titulo");
const botao = document.getElementById("botao-envio");
const toggle = document.getElementById("toggle");
const campoSenha = document.getElementById("c-senha");
const mensagem = document.getElementById("mensagem");

function mostrarModo(limparMensagem = true) {
    if (limparMensagem) {
        mensagem.innerHTML = "";
    }

    if (esqueceuASenha) {
        titulo.innerText = "Altere sua senha";
        botao.innerText = "Alterar senha";
        botao.name = "alterar_senha";
        toggle.innerText = "Voltar ao login";

        campoSenha.querySelector("label").innerText = "Nova senha:";
        document.getElementById("senha").placeholder = "Nova senha";

        if (!document.getElementById("confirmar-container")) {
            let novaDiv = document.createElement("div");

            novaDiv.className = "conjunto";
            novaDiv.id = "confirmar-container";

            novaDiv.innerHTML = `
                <label for="confirmar_senha">Confirmar senha:</label>
                <input type="password"
                    id="confirmar_senha"
                    name="confirmar_senha"
                    placeholder="Confirme a nova senha"
                    required>
            `;

            campoSenha.after(novaDiv);
        }
    } else {
        titulo.innerText = "Seja Bem-vindo!";
        botao.innerText = "Entrar";
        botao.name = "entrar";
        toggle.innerText = "Esqueceu a senha?";

        campoSenha.querySelector("label").innerText = "Senha:";
        document.getElementById("senha").placeholder = "Senha";

        let confirmar = document.getElementById("confirmar-container");

        if (confirmar) {
            confirmar.remove();
        }
    }

    document.getElementById("senha").value = "";
}

toggle.addEventListener("click", function () {
    esqueceuASenha = !esqueceuASenha;
    mostrarModo();
});

form.addEventListener("submit", function (e) {
    mensagem.innerHTML = "";

    let email = document.getElementById("email").value.trim();
    let senha = document.getElementById("senha").value;

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        e.preventDefault();
        mensagem.innerHTML =
            "<p class='erro'>Digite um email válido.</p>";
        return;
    }

    if (esqueceuASenha) {
        let confirmar = document.getElementById("confirmar_senha").value;

        if (
            senha.length < 8 ||
            !/[A-Z]/.test(senha) ||
            !/[0-9]/.test(senha) ||
            !/[!@#$%^&*(),.?":{}|<>]/.test(senha)
        ) {
            e.preventDefault();
            mensagem.innerHTML =
                "<p class='erro'>Use 8 caracteres, letra maiúscula, número e símbolo.</p>";
            return;
        }

        if (senha !== confirmar) {
            e.preventDefault();
            mensagem.innerHTML =
                "<p class='erro'>As senhas não coincidem!</p>";
            return;
        }
    }
});

mostrarModo(false);
