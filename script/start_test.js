window.addEventListener('DOMContentLoaded', (event) => {
    const testbutton = document.getElementById("start-test",);
    const test = document.getElementById("test");
    const time = document.getElementById("time");
    const modal = document.getElementById("testFinished");
    testbutton.addEventListener("click", function (){
        testbutton.style.display = "block";
        this.remove();

        fetchTest(test);
        fetchTime(time, modal);
    });
});






