window.addEventListener('DOMContentLoaded', (event) => {
    const testbutton = document.getElementById("start-test",);
    const test = document.getElementById("test");
    const timeElement = document.getElementById("time");
    const modal = document.getElementById("testFinished");
    testbutton.addEventListener("click", function (){
        testbutton.style.display = "block";
        this.remove();


        fetchTest(test);
        testContinue(timeElement);
    });
});

function testContinue(element){
    let url = "api/continueTestApi.php";
    let request = new Request(url, {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    });

    fetch(request)
        .then((response) => response.json())
        .then((data) => {
            if (!data.error) {
                //console.log(data.testStarted);
                if(data.testStarted) {
                    fetchUpdatedTime(element);
                }
                else fetchTime(element);
            } else {
                //console.log("error");
                $('#testFinished').modal('toggle');
            }
        });
    return true;
}

function startTest(time) {
    let url = "api/startTestApi.php";
    let request = new Request(url, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        },
        body: JSON.stringify({
            time: time
        })
    });

    fetch(request)
        .then((response) => response.json())
        .then((data) => {
            if (!data.error) {
                //console.log("vsetko je v poriadku");

            } else {
                console.log("error");
            }
        });
}




