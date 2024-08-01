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





document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez l'élément avec la classe message-succ
    var messageElement = document.querySelector(".message-succ");

    // Vérifiez si l'élément existe
    if (messageElement) {
        // Attendez 2 secondes, puis masquez le message
        setTimeout(function() {
            messageElement.style.opacity = "0";
            setTimeout(function() {
                messageElement.parentNode.removeChild(messageElement);
            }, 200); // Supprimez l'élément après que la transition soit terminée (300ms)
        }, 1000); // Attendez 2 secondes avant de commencer à masquer
    }
});

document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez l'élément avec la classe message-succ
    var messageElement1 = document.querySelector(".message-fail");

    // Vérifiez si l'élément existe
    if (messageElement1) {
        // Attendez 2 secondes, puis masquez le message
        setTimeout(function() {
            messageElement1.style.opacity = "0";
            setTimeout(function() {
                messageElement1.parentNode.removeChild(messageElement1);
            }, 200); // Supprimez l'élément après que la transition soit terminée (300ms)
        }, 1000); // Attendez 2 secondes avant de commencer à masquer
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





// Sélecteurs pour la fenêtre modale et le bouton de fermeture
const modal = document.getElementById('facture-details-modal');
const span = document.querySelector('.modal .close');

// Fonction pour ouvrir la fenêtre modale avec les détails de la facture
function openModal(facture) {
    document.getElementById('modal-numfacture').innerText = facture.numfacture;
    document.getElementById('modal-numclient').innerText = facture.numclient;
    document.getElementById('modal-datecreation').innerText = facture.datecreation;
    document.getElementById('modal-montanttotal').innerText = facture.montanttotal;
    document.getElementById('modal-montantpayé').innerText = facture.montantpayé;
    document.getElementById('modal-statut').innerText = facture.statut;
    document.getElementById('modal-nomclient').innerText = facture.nomclient;
    document.getElementById('modal-prenomclient').innerText = facture.prenomclient;
    document.getElementById('modal-emailclient').innerText = facture.emailclient;
    document.getElementById('modal-telclient').innerText = facture.telclient;
    modal.style.display = 'block';
}

// Fonction pour fermer la fenêtre modale
span.onclick = function() {
    modal.style.display = 'none';
}

// Fermer la fenêtre modale si l'utilisateur clique en dehors
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

// Gestion des clics pour ouvrir la fenêtre modale
document.querySelectorAll('.facture-info').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const row = this.closest('tr');
        const facture = {
            numfacture: row.dataset.numfacture,
            numclient: row.dataset.numclient,
            datecreation: row.dataset.datecreation,
            montanttotal: row.dataset.montanttotal,
            montantpayé: row.dataset.montantpayé,
            statut: row.dataset.statut,
            nomclient: row.dataset.nomclient,
            prenomclient: row.dataset.prenomclient,
            emailclient: row.dataset.emailclient,
            telclient: row.dataset.telclient
        };
        openModal(facture);
    });
});


document.getElementById('search-facture').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    let hasResults = false;

    rows.forEach(row => {
        const numFacture = row.getAttribute('data-numfacture').toLowerCase();
        const numClient = row.getAttribute('data-numclient').toLowerCase();
        const statut = row.getAttribute('data-statut').toLowerCase();

        if (numFacture.includes(searchTerm) || numClient.includes(searchTerm) || statut.includes(searchTerm)) {
            row.style.display = '';
            hasResults = true;
        } else {
            row.style.display = 'none';
        }
    });

    document.getElementById('no-results').style.display = hasResults ? 'none' : 'block';
});
