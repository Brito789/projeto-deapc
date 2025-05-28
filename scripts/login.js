function validarLogin(event)
{
    event.preventDefault();

    const user = document.getElementById('user').value;
    const pass = document.getElementById('pass').value;

    if (user === "Gestor" && pass === "1234") {
        window.location.href = "index.html";     
    } else if (user === "Fornecedor" && pass ==="1234"){
        window.location.href = "index.html";
    }else {
        alert("Credenciais inválidas");
    }
}