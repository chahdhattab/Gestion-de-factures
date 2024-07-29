const addfacture = document.querySelector('.add-facture');
const factureform = document.querySelector('.add-facture-form');
const closeformF = document.querySelector('#closeF');

addfacture.addEventListener('click', () => {
    factureform.classList.toggle('open'); // Ajoute ou enlève la classe 'open'
});

closeformF.addEventListener('click', () => {
    factureform.classList.remove('open'); // Enlève la classe 'open'
});

// Assurez-vous que le clic à l'intérieur du formulaire ne ferme pas le formulaire
factureform.addEventListener('click', (event) => {
    event.stopPropagation();
});

// Optionnel : fermer le formulaire si l'utilisateur clique en dehors
document.addEventListener('click', (event) => {
    if (!factureform.contains(event.target) && !addfacture.contains(event.target)) {
        factureform.classList.remove('open');
    }
});




// Sélecteurs
const factureDelete = document.querySelector('.supp');
const closeD = document.querySelector('#closeButton');

// Fonction pour ouvrir la boîte de dialogue
function openDialog(numfacture) {
    // Mettre à jour les champs du formulaire avec les données
    document.getElementById('numfacture').value = numfacture;
    document.getElementById('matricule').value = '<?php echo $_SESSION["matricule"]; ?>';
    factureDelete.classList.add('open'); // Afficher la boîte de dialogue
}

// Fonction pour fermer la boîte de dialogue
function closeDialog() {
    factureDelete.classList.remove('open');
}

// Gestion des clics pour ouvrir la boîte de dialogue
document.querySelectorAll('.delete-facture').forEach(function(button) {
    button.addEventListener('click', function() {
        const numfacture = this.getAttribute('data-numfacture');
        openDialog(numfacture);
    });
});

// Gestion du clic sur le bouton Annuler
closeD.addEventListener('click', (event) => {
    event.preventDefault(); // Empêche le comportement par défaut du bouton
    closeDialog();
});

// Empêcher la propagation du clic à l'intérieur de la boîte de dialogue pour éviter la fermeture
factureDelete.addEventListener('click', (event) => {
    event.stopPropagation();
});

// Fermer la boîte de dialogue si l'utilisateur clique en dehors
document.addEventListener('click', (event) => {
    if (!factureDelete.contains(event.target) && !event.target.classList.contains('delete-facture')) {
        closeDialog();
    }
});
