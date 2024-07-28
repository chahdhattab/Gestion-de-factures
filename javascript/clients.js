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