let question5 = document.getElementById("question5");

let submit5 = document.getElementById("submit-question5");



submit5.addEventListener("click",function (){

    let answer5 = document.getElementById('output').innerHTML;
    let Json5 = {"question_type":"question_5","question":question5.value,"answer":answer5};
    console.log(Json5);

})

