let esqueceuASenha = false;

localStorage.setItem("admin@teste.com", "Admin12$");

document.getElementById("toggle").onclick = () => {

    esqueceuASenha = !esqueceuASenha;

    let titulo = document.getElementById("titulo");
    let botao = document.getElementById("botao-envio");
    let toggle = document.getElementById("toggle");
    let campoSenha = document.getElementById("c-senha");

    // LIMPA mensagens
    document.getElementById("mensagem").innerHTML = "";

    if (esqueceuASenha) {

        titulo.innerText = "Altere sua senha";
        botao.innerText = "Alterar senha";
        toggle.innerHTML = "<p>Voltar ao login</p>";

        // cria campo confirmar senha
        if (!document.getElementById("confirmar-container")) {

            let novaDiv = document.createElement("div");

            novaDiv.classList.add("conjunto");
            novaDiv.id = "confirmar-container";

            novaDiv.innerHTML = `
                <label for="confirmar-senha">Confirmar senha:</label>
                <input 
                    type="password" 
                    id="confirmar-senha" 
                    placeholder="Confirme a nova senha"
                    required
                >
            `;

            campoSenha.after(novaDiv);
        }

    } else {

        titulo.innerText = "Seja Bem vindo!";
        botao.innerText = "Entrar";
        toggle.innerHTML = "<p>Esqueceu a senha?</p>";

        // remove campo confirmar senha
        let confirmar = document.getElementById("confirmar-container");

        if (confirmar) {
            confirmar.remove();
        }
    }
};

document.getElementById("form-login").onsubmit = (e) => {

    e.preventDefault();

    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    let mensagem = document.getElementById("mensagem");

    mensagem.innerHTML = "";

    // valida email
    if (!email.includes("@") || !email.includes(".")) {

        mensagem.innerHTML = `
            <div class='erro'>
                <p>Dados inválidos!</p>
            </div>
        `;

        return;
    }

    // valida senha
    if (
        senha.length < 8 || !/[A-Z]/.test(senha) || !/[0-9]/.test(senha) || !/[!@#$%^&*(),.?":{}|<>]/.test(senha)
    ) {
        mensagem.innerHTML = `
            <div class='erro'>
                <p>Dados inválidos!</p>
            </div>
        `;

        return;
    }

    // valida confirmação
    if (esqueceuASenha) {
        let confirmarSenha =
            document.getElementById("confirmar-senha").value;

        if (senha !== confirmarSenha) {
            mensagem.innerHTML = `
                <div class='erro'>
                    <p>As senhas não coincidem!</p>
                </div>
            `;

            return;
        }
    }

    mensagem.innerHTML = `
        <div class='sucesso'>
            <p>Operação realizada com sucesso!</p>
        </div>
    `;

    if (!esqueceuASenha) {

    setTimeout(() => {
        window.location.href = "tela-geral-home.html";
    }, 1000);

}
    document.getElementById("form-login").reset();
};