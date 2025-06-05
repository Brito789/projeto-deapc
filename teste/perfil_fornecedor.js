
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('produtoForm');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const data = new FormData(form);
        fetch('add_product.php', {
            method: 'POST',
            body: data
        })
        .then(res => res.text())
        .then(text => {
            document.getElementById('produtoResultado').innerText = text;
            form.reset();
            carregarProdutos();
        });
    });

    carregarProdutos();
});

function carregarProdutos() {
    fetch('listar_produtos.php')
        .then(res => res.json())
        .then(produtos => {
            const lista = document.getElementById('listaProdutos');
            lista.innerHTML = '';
            produtos.forEach(prod => {
                const li = document.createElement('li');
                li.textContent = `${prod.nome} - ${prod.descricao}`;
                lista.appendChild(li);
            });
        });
}
