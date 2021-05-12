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

                const notification_container = document.getElementById("notification-container");
                let test = data.test;
                console.log(test)
                Object.keys(test).forEach((item, index) => {
                    let test_code = item;
                    test[item].forEach((item) => {
                        let student_id = item.id;
                        let student_name = item.name;
                        addToast(notification_container, student_name, student_id, test_code);
                    });
                });
                $(".toast").toast("show");
                addCloseListener();

            } else {
                console.log("error");
            }
        });


}
function addCloseListener(){
    let buttons = document.querySelectorAll(".btn-close");
    buttons.forEach((item) =>{
        item.addEventListener("click",()=>{
            item.parentElement.parentElement.remove();
        })
    })
}


function addToast(parent, name, id, code){
    parent.innerHTML += "    <div class=\"toast mt-1\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">\n" +
        "        <div class=\"toast-header\">\n" +
        "            <strong class=\"me-auto\">Alt+Tab tracker</strong>\n" +
        "            <small class=\"text-muted\">just now</small>\n" +
        "            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button>\n" +
        "        </div>\n" +
        "        <div id=\"notification-body\" class=\"toast-body\">\n" +
        `            ${name} s ID ${id} opustil tab testu s kódom ${code}.\n` +
        "        </div>\n" +
        "    </div>";
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
