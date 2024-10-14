import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// recupero i pulsanti tramite il nome della della classe assegnata ai pulsanti stessi
const buttons = document.querySelectorAll('.delete-project')
// ciclo i pulsanti
buttons.forEach((button)=>{
    //assegno un event listener a ogni pulsante
    button.addEventListener('click', function(e){
        // assegno il prevent default
        e.preventDefault();
        // recupero la modale tramite l'id
        const modal = document.getElementById('deleteProjectModal');
        // creo una nuova istanza
        const bootstrap_modal = new bootstrap.Modal(modal);
        // mostro la modale a video
        bootstrap_modal.show();
        // recupero il pulsante con la classe confirm-delete, aggiungo l'event listener e submitto la form
        document.querySelector('.confirm_delete').addEventListener('click', function(){
            button.parentElement.submit();
        })
    });
});