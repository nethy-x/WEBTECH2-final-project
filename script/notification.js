var toastElList = [].slice.call(document.querySelectorAll('.toast'))
var toastList = toastElList.map(function (toastEl) {
    return new bootstrap.Toast(toastEl, option)
})

var notificationArray = 0;
var source = new EventSource("partials/notification.php");
source.onopen = function (event) {
    console.log(event);
    console.log("open");
};
source.onmessage = function (event) {
    console.log(notificationArray.length);
    console.log(event.data.length);
    if (notificationArray.length !== event.data.length) {
        notificationArray = event.data;
        document.getElementById("notification-div").innerHTML += "<p>" + notificationArray + "</p>";
    }

};
source.onerror = function (event) {
    console.log(event);
    console.log("error");

}