let question4 = document.getElementById("question4");

let submit4 = document.getElementById("submit-question4");


submit4.addEventListener("click",function (){

    let Json4 = {"question_type":"question_4","question":question4.value};
    console.log(Json4);
})

