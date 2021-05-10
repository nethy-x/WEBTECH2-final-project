var countDWN = document.getElementById("time");

function downcount(a) {
    countDWN.removeEventListener("DOMSubtreeModified", downcount);
    a.preventDefault();
    $.ajax({
        url: "https://wt69.fei.stuba.sk/test123/time_limit/countdown.php",
        type: "GET",
        data: {
           time: "set",
           limit: countDWN.innerHTML
        },
        success: function(data) {
            console.log(data);
            //countDWN.innerHTML = data["time"];
        }
        
    })
    var time = countDWN.innerHTML;
    var splitTime = time.split(":");
    var timeToEpoch = (parseInt(splitTime[0]) * 3600 + parseInt(splitTime[1]) * 60 + parseInt(splitTime[2]));

    var d = new Date();

    var countdown = d.getTime() + timeToEpoch * 1000;

    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countdown - now;


        if (distance <= 30000) {
            countDWN.style.color = "orange";
        }
        // If the count down is finished, write some text
        //1000 ms
        if (distance <= 1000) {
            clearInterval(x);
            $('#testFinished').modal('toggle');
        }
        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;
        countDWN.innerHTML = hours + ":" + minutes + ":" + seconds;


    }, 1000);
}

countDWN.addEventListener("DOMSubtreeModified", downcount);


$('#testFinished').on('hidden.bs.modal', function () {
    window.location.assign("logout.php");
})