document.getElementById("form-cadastro").onsubmit = (e) => {

    e.preventDefault();

    let nome = document.getElementById("nome-cadastro").value;
    let cargo = document.getElementById("cargo-cadastro").value;
    let cpf = document.getElementById("cpf-cadastro").value;
    let telefone = document.getElementById("telefone-cadastro").value;
    let email = document.getElementById("email-cadastro").value;
    let senha = document.getElementById("senha-cadastro").value;

    if (nome.length < 3) {

        alert("Nome inválido!");
        return;
    }


    if (cargo == "") {

        alert("selecione um cargo!");
        return;
    }


    if (
        senha.length < 8 || !/[A-Z]/.test(senha) || !/[0-9]/.test(senha) || !/[!@#$%^&*(),.?":{}|<>]/.test(senha)
    ) {
        alert("Senha inválida!");
        return;
    }


    if (!/^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(cpf)) {

        alert("CPF inválido! Use xxx.xxx.xxx-xx");
        return;
    }


    if (!/^\+55 \(\d{2}\) 9\d{4}-\d{4}$/.test(telefone)) {

        alert("Telefone inválido! Use +55 (xx) 9xxxx-xxxx");
        return;
    }

    if (!email.includes("@") || !email.includes(".")) {

        alert("Email inválido!");
        return
    }

    let funcionario = {

        nome: nome,
        cargo: cargo,
        cpf: cpf,
        telefone: telefone,
        email: email,
        senha: senha
    };

    localStorage.setItem(email, JSON.stringify(funcionario));

    alert("Funcionário cadastrado com sucesso!");

    document.getElementById("form-cadastro").reset();


}


