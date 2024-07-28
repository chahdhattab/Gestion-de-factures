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
