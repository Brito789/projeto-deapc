function validarLogin(event)
{
    event.preventDefault();

    const user = document.getElementById('user').value;
    const pass = document.getElementById('pass').value;

    if (user === "Gestor" && pass === "1234") {
        window.location.href = "scripts/index.php";     
    } else if (user === "Fornecedor" && pass ==="1234"){
        window.location.href = "scripts/index.php";
    }else {
        alert("Credenciais inválidas");
    }
}