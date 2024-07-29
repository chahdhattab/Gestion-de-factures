const addclient = document.querySelector('.add-client');
const clientform = document.querySelector('.add-client-form');
const closeform = document.querySelector('#close');

clientform.addEventListener('click', (event) => {
     event.stopPropagation();
});
 
addclient.addEventListener('click', () => {
    clientform.classList.toggle('open');
});

closeform.addEventListener('click', () => {
    clientform.classList.remove('open');
});




// Sélecteurs
const clientDelete = document.querySelector('.supp');
const closeD = document.querySelector('#closeButton');

// Fonction pour ouvrir la boîte de dialogue
function openDialog(numclient) {
    document.getElementById('numclient').value = numclient;
    document.getElementById('matricule').value = '<?php echo $_SESSION["matricule"]; ?>';
    clientDelete.classList.add('open'); // Afficher la boîte de dialogue avec animation
}

// Fonction pour fermer la boîte de dialogue
function closeDialog() {
    clientDelete.classList.remove('open'); // Masquer la boîte de dialogue avec animation
}

// Gestion des clics pour ouvrir la boîte de dialogue
document.querySelectorAll('.delete-client').forEach(function(button) {
    button.addEventListener('click', function() {
        const numclient = this.getAttribute('data-numclient');
        openDialog(numclient);
    });
});

// Gestion du clic sur le bouton Annuler
closeD.addEventListener('click', (event) => {
    event.preventDefault(); // Empêche le comportement par défaut du bouton
    closeDialog();
});

// Empêcher la propagation du clic à l'intérieur de la boîte de dialogue pour éviter la fermeture
clientDelete.addEventListener('click', (event) => {
    event.stopPropagation();
});

// Fermer la boîte de dialogue si l'utilisateur clique en dehors
document.addEventListener('click', (event) => {
    if (!clientDelete.contains(event.target) && !event.target.classList.contains('delete-client')) {
        closeDialog();
    }
});
