
document.addEventListener("DOMContentLoaded", function() {

   
    const sidebar = document.querySelector('.sidebar');
    const closeBtn = document.querySelector('.close img');
    const menuBtn = document.querySelector('.menu-btn img');

    
    function toggleSidebar() {
        sidebar.classList.toggle('active');
    }

    closeBtn.addEventListener('click', toggleSidebar);
    menuBtn.addEventListener('click', toggleSidebar);

    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
        }
    });

});

const addclient = document.querySelector('.item-client');
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

// Sélectionnez l'élément de message de succès
const messageSuccess = document.querySelector('.message-succ');

// Affichez le message de succès pendant 2 secondes
function showSuccessMessage() {
    messageSuccess.classList.add('show-message'); // Ajoutez la classe pour afficher le message

    // Après 2 secondes, cachez le message
    setTimeout(() => {
        messageSuccess.classList.remove('show-message'); // Retirez la classe pour cacher le message
    }, 2000); // 2000 millisecondes = 2 secondes
}

