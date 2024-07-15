document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");
    const idField = document.getElementById("id");
    const passwordField = document.getElementById("password");
    const submitButton = document.getElementById("submit");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault(); 
        if (!idField.value || !passwordField.value) {
            alert("Veuillez remplir tous les champs !");
            return;
        }
        alert("Connexion réussie !");
        
    });
});
