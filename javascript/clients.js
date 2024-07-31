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


// Sélecteurs pour édition
const editForm = document.querySelector('.edit');
const closeEditButton = document.querySelector('#closeEditButton');

// Fonction pour ouvrir le formulaire d'édition
function openEditForm(client) {
    document.getElementById('editNumclient').value = client.numclient;
    document.getElementById('editMatricule').value = '<?php echo $_SESSION["matricule"]; ?>';
    document.getElementById('editNom').value = client.nom;
    document.getElementById('editPrenom').value = client.prenom;
    document.getElementById('editEmail').value = client.email;
    document.getElementById('editTel').value = client.telephone;
    editForm.classList.add('open'); // Afficher le formulaire d'édition avec animation
}

// Fonction pour fermer le formulaire d'édition
function closeEditForm() {
    editForm.classList.remove('open'); // Masquer le formulaire d'édition avec animation
}

// Gestion des clics pour ouvrir le formulaire d'édition
document.querySelectorAll('.edit-client').forEach(function(button) {
    button.addEventListener('click', function() {
        const client = {
            numclient: this.closest('tr').dataset.numclient,
            nom: this.closest('tr').dataset.nom,
            prenom: this.closest('tr').dataset.prenom,
            email: this.closest('tr').dataset.email,
            telephone: this.closest('tr').dataset.telephone
        };
        openEditForm(client);
    });
});

// Gestion du clic sur le bouton Annuler de l'édition
closeEditButton.addEventListener('click', (event) => {
    event.preventDefault(); // Empêche le comportement par défaut du bouton
    closeEditForm();
});

// Empêcher la propagation du clic à l'intérieur du formulaire d'édition pour éviter la fermeture
editForm.addEventListener('click', (event) => {
    event.stopPropagation();
});

// Fermer le formulaire d'édition si l'utilisateur clique en dehors
document.addEventListener('click', (event) => {
    if (!editForm.contains(event.target) && !event.target.classList.contains('edit-client')) {
        closeEditForm();
    }
});




document.getElementById('search-client').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    let hasResults = false;

    rows.forEach(row => {
        const numClient = row.getAttribute('data-numclient').toLowerCase();
        const nomClient = row.getAttribute('data-nom').toLowerCase();
        const prenomClient = row.getAttribute('data-prenom').toLowerCase();

        if (numClient.includes(searchTerm) || nomClient.includes(searchTerm) || prenomClient.includes(searchTerm)) {
            row.style.display = '';
            hasResults = true;
        } else {
            row.style.display = 'none';
        }
    });

    document.getElementById('no-results').style.display = hasResults ? 'none' : 'block';
});