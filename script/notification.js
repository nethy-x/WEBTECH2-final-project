
var notificationTable = localStorage.getItem('notification');



var source = new EventSource("partials/notification.php");
source.onopen = function (event) {
    console.log(event);
    console.log("open");
};
source.onmessage = function (event) {

    if (notificationTable.length !== event.data.length) {
        localStorage.setItem('notification', event.data);
        $(".toast").toast("show");
        logs = JSON.parse(event.data);
        document.getElementById("table-log").innerHTML = " ";
        logs.forEach((element, index) => {
            document.getElementById("table-log").innerHTML += "<tr>" + "<td>" + element["Meno"] +"</td>" + "<td>" + element["Priezvisko"] +"</td>" + "<td>" + element["Tracker"] +"</td>" + "</tr>"
        });
    }

};
source.onerror = function (event) {
    console.log(event);
    console.log("error");

}
