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