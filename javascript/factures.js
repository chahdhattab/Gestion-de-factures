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

// Sélecteurs
const editForm = document.querySelector('.edit');
const closeEditButton = document.querySelector('#closeEditButton');

// Fonction pour ouvrir le formulaire d'édition
function openEditForm(facture) {
    document.getElementById('editNumfacture').value = facture.numfacture;
    document.getElementById('editMatricule').value = '<?php echo $_SESSION["matricule"]; ?>';
    document.getElementById('editMontantPayé').value = facture.montantpayé;
    document.getElementById('editMontantTotal').value = facture.montanttotal;
    document.getElementById('editStatut').value = facture.statut;
    editForm.classList.add('open'); // Afficher le formulaire d'édition avec animation
}

// Fonction pour fermer le formulaire d'édition
function closeEditForm() {
    editForm.classList.remove('open'); // Masquer le formulaire d'édition avec animation
}

// Gestion des clics pour ouvrir le formulaire d'édition
document.querySelectorAll('.edit-facture').forEach(function(button) {
    button.addEventListener('click', function() {
        const facture = {
            numfacture: this.closest('tr').dataset.numfacture,
            numclient: this.closest('tr').dataset.numclient,
            montantpayé: this.closest('tr').dataset.montantpayé,
            montanttotal: this.closest('tr').dataset.montanttotal,
            statut: this.closest('tr').dataset.statut
        };
        openEditForm(facture);
    });
});

// Gestion du clic sur le bouton Annuler
closeEditButton.addEventListener('click', (event) => {
    event.preventDefault(); // Empêche le comportement par défaut du bouton
    closeEditForm();
});

// Empêcher la propagation du clic à l'intérieur du formulaire pour éviter la fermeture
editForm.addEventListener('click', (event) => {
    event.stopPropagation();
});

// Fermer le formulaire si l'utilisateur clique en dehors
document.addEventListener('click', (event) => {
    if (!editForm.contains(event.target) && !event.target.classList.contains('edit-facture')) {
        closeEditForm();
    }
});
