
window.addEventListener('load', event => {

    let url = new XMLHttpRequest()

    url.open('GET', 'https://data.nantesmetropole.fr/api/records/1.0/search/?dataset=244400404_agenda-evenements-nantes-nantes-metropole&facet=emetteur&facet=rubrique&facet=lieu&facet=ville', false)

    url.send(null)

    let data = JSON.parse(url.response)

    function countdown(endDate) {

        let days, hours, minutes;

        endDate = new Date(data.records[0].fields.date).getTime();

        if (isNaN(endDate)) {
            return;
        }

        calculate()

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

                document.querySelector(".displayCD").innerHTML = `Prochain événement dans: ${days} j ${hours} h ${minutes} mn`

            } else {
                return;
            }
        }
    }

    setInterval(countdown, 10);
})