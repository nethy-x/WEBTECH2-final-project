

document.addEventListener('visibilitychange', function(event){
    console.log('visibilitychange', document.hidden);
    if(document.hidden){
        let state = "odisiel";
        fetchTracker(state);
    }else{

    }
})

function fetchTracker(state) {
    let url = "api/fetchTrackingApi.php";
    let request = new Request(url, {
        method: 'POST',
        body: JSON.stringify({
            state: state
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