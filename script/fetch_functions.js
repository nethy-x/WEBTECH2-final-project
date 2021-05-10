function fetchDefineTest(test) {
    let url = "api/defineTestApi.php";
    let request = new Request(url, {
        method: 'POST',
        body: JSON.stringify({
            test: test
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    });
    fetch(request)
        .then((response) => response.json())
        .then((data) => {
            if (!data.error) {
                console.log(data.id);
            } else {
                console.log(data.message);
            }
        });
}

function fetchTest(element){
    let url = "api/fetchTestApi.php";
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
                //console.log(data.test);
                element.innerHTML = data.test;
            } else {
                console.log("error");
                element.innerHTML = "chyba";
            }
        });
}

function fetchTime(element){
    let url = "api/fetchTimeApi.php";
    let request = new Request(url, {
        method: 'GET',
        headers: {
            'Content-type': 'text/html; charset=UTF-8'
        }
    });

    fetch(request)
    .then(function(response) {
        return response.json();
    })
        .then(function(data) {
            if (!data.error) {
                //console.log(data.time);
                element.innerHTML = data.time;
                document.getElementById("timer").style = "display:block";
            } else {
                console.log("error");
                element.innerHTML = "chyba";
            }
        });
}