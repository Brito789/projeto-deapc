// login.js
/*function login(event) {
    event.preventDefault(); // impede o submit normal

    let user = document.getElementById("user").value.trim();
    let pass = document.getElementById("pass").value.trim();
    let userLower = user.toLowerCase();

    // Verifica credenciais (hardcoded para demo)
    if ((userLower === "gestor" && pass === "abcd") || 
        (userLower === "fornecedor" && pass === "1234")) {
        window.location.href = "index.html"; // Redireciona para o index
    } else {
        alert("Credenciais inválidas");
    }
    return false; // impede envio do formulário
}*/
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