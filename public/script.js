'use strict'

window.addEventListener('load', event=>{

    let display = document.querySelector('#event')
    let url = new XMLHttpRequest()

    url.open('GET', 'https://data.nantesmetropole.fr/api/records/1.0/search/?dataset=244400404_agenda-evenements-nantes-nantes-metropole&facet=emetteur&facet=rubrique&facet=lieu&facet=ville', false)

    url.send(null)

    let data = JSON.parse(url.response)
    
    if (data) {

        data.records.forEach( value => {

            display.innerHTML += 
            `<ul>
            <li>
            <h4>${value.fields.nom}</h4>
            <p>${value.fields.description}</p>
            <p>| Date: ${value.fields.date} -- Début: ${value.fields.heure_debut} -- Lieu: ${value.fields.adresse} -- Téléphone: ${value.fields.lieu_tel !== undefined ? value.fields.lieu_tel : "NC"} |</p>
            <p>| Tarif: ${value.fields.gratuit === "non" ? value.fields.precisions_tarifs : "Gratuit"} -- <a href="${value.fields.lieu_siteweb}">Site web</a> |</p>
            </li>
            </ul>`
        });

    }

 //Script du compte à rebours (Thibault)
    function countdown(endDate) {
        let days, hours, minutes;
    
        endDate = new Date(data.records[0].fields.date).getTime();
        
        
       
        
    
    
    
        if (isNaN(endDate)) {
          return;
        }
    
         setInterval(calculate, 1000);
    
        function calculate() {
          let startDate = new Date();
    
    
    
    
          let timeRemaining = parseInt((endDate - startDate) / 1000);
    
    
    
          if (timeRemaining >= 0) {
            days = parseInt(timeRemaining / 86400);
            timeRemaining = (timeRemaining % 86400);
    
            hours = parseInt(timeRemaining / 3600);
            timeRemaining = (timeRemaining % 3600);
    
            minutes = parseInt(timeRemaining / 60);
            timeRemaining = (timeRemaining % 60);
    
            document.querySelector(".countdown").innerHTML = days + " jours   " + hours + " heures   "
            + minutes + " minutes   ";
            // document.getElementById("days").innerHTML = parseInt(days, 10);
            // document.getElementById("hours").innerHTML = ("0" + hours).slice(-2);
            // document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2);
    
          } else {
            return;
          }
        }
      }
    
    
      (function () {
        countdown();
    
    
    
      }());
    
})