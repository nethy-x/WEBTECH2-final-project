window.addEventListener('DOMContentLoaded', (event) => {
    const testbutton = document.getElementById("start-test",);
    const test = document.getElementById("test",);
    testbutton.addEventListener("click", function (){
        testbutton.style.display = "block";
        this.remove();

        fetchTest(test);
    });
});






