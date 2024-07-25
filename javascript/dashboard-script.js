
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

//client 

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
//facture
const addfacture = document.querySelector('.item-facture');
const factureform = document.querySelector('.add-facture-form');
const closeformF = document.querySelector('#closeF');

factureform.addEventListener('click', (event) => {
     event.stopPropagation();
});
 
addfacture.addEventListener('click', () => {
    factureform.classList.toggle('open');
});

closeformF.addEventListener('click', () => {
    factureform.classList.remove('open');
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




