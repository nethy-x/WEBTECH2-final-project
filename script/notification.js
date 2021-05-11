


var arr = localStorage.getItem('notification');
window.setInterval(function () {
    getNotification()
}, 3000);
function getNotification() {
    let url = "api/notificationApi.php";
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
                if (parseInt(arr) !== data.test.length) {
                    localStorage.setItem('notification',data.test.length.toString());
                    $(".toast").toast("show");
                }
                console.log(data.test);
            } else {
                console.log("error");
            }
        });

}

// var notificationTable = localStorage.getItem('notification');
// var source = new EventSource("partials/notification.php");
// source.onopen = function (event) {
//     console.log(event);
//     console.log("open");
// };
// source.onmessage = function (event) {
//
//     if (notificationTable.length !== event.data.length) {
//         localStorage.setItem('notification', event.data);
//         $(".toast").toast("show");
//     }
//
// };
// source.onerror = function (event) {
//     console.log(event);
//     console.log("error");
//
// }
