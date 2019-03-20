
'use strict'

window.addEventListener("load", function () {



  function countdown(endDate,) {
    let days, hours, minutes;

    endDate = new Date("Jan 1, 2020 00:00:00").getTime();



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
    countdown('04/01/2333 05:00 PM');



  }());


});



