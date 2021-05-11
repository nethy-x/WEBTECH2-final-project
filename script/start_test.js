window.addEventListener('DOMContentLoaded', (event) => {
    const testbutton = document.getElementById("start-test",);
    const test = document.getElementById("test",);
    const time = document.getElementById("time")
    testbutton.addEventListener("click", function (){
        testbutton.style.display = "block";
        this.remove();

        fetchTest(test);
        fetchTime(time);
    });
});






