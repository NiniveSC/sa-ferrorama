document.addEventListener("DOMContentLoaded", function () {
    const buttons = [
        { id: "buttonFuncionarios", target: "../funcionarios/funcionarios-cadastrados.php" },
        { id: "buttonSensores", target: "../sensores/tela-lista-sensores.php" },
        { id: "buttonRotas", target: "../rotas/tela-lista-rotas.php" },
        { id: "buttonTrens", target: "../trens/tela-lista-trens.php" },
        { id: "buttonRelatorios", target: "../relatorios/tela-relatorios.php" }
    ];

    buttons.forEach(({ id, target }) => {
        const button = document.getElementById(id);

        if (button) {
            button.addEventListener("click", function () {
                window.location.href = target;
            });
        }
    });
});