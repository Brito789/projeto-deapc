// scripts.js: Pequenas funções JS para interação visual e validação

// Função para mostrar mensagem de confirmação ao enviar formulário
function confirmaEnvio(form) {
    // Pergunta ao utilizador se quer realmente enviar
    return confirm('Tens a certeza que queres fornecer este produto?');
}

// Validação rápida (apenas exemplo, campos já são "required" em HTML)
function validaCampos() {
    const nome = document.getElementById('nome');
    const desc = document.getElementById('descricao');
    if (!nome.value || !desc.value) {
        alert('Preenche todos os campos!');
        return false;
    }
    return true;
}
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function (e) {
            const username = document.querySelector('input[name="username"]');
            const password = document.querySelector('input[name="password"]');
            let valid = true;
            let message = "";

            if (!username || username.value.trim() === "") {
                valid = false;
                message += "O nome de utilizador é obrigatório.\n";
            }
            if (!password || password.value.trim() === "") {
                valid = false;
                message += "A palavra-passe é obrigatória.\n";
            }

            if (!valid) {
                e.preventDefault();
                alert(message);
            }
        });
    }
});

