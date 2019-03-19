
'use strict'

window.addEventListener("load", function () {



  function countdown(endDate) {
    let days, hours, minutes;

    endDate = new Date(endDate).getTime();



    if (isNaN(endDate)) {
      return;
    }

    // setInterval(calculate, 1000);

    function calculate() {
      let startDate = new Date();
      startDate = new Date();



      let timeRemaining = parseInt((endDate - startDate) / 1000);



      if (timeRemaining >= 0) {
        days = parseInt(timeRemaining / 86400);
        timeRemaining = (timeRemaining % 86400);

        hours = parseInt(timeRemaining / 3600);
        timeRemaining = (timeRemaining % 3600);

        minutes = parseInt(timeRemaining / 60);
        timeRemaining = (timeRemaining % 60);

        countdown = document.getElementById("countdown");
        document.getElementById("days").innerHTML = parseInt(days, 10);
        document.getElementById("hours").innerHTML = ("0" + hours).slice(-2);
        document.getElementById("minutes").innerHTML = ("0" + minutes).slice(-2);

      } else {
        return;
      }
    }
  }


  setInterval((function () {
    countdown('04/01/2333 05:00 PM');
  },1000))

}





)
