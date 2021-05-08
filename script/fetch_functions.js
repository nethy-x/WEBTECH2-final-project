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
                console.log("error");
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
                console.log(data.test);
                element.innerHTML = data.test;
            } else {
                console.log("error");
                element.innerHTML = "chyba";
            }
        });
}