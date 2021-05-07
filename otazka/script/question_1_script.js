let question1 = document.getElementById("question1");
let cnt_answers1 = document.getElementById("cnt-answers1");
let submit1 = document.getElementById("submit-question1");

let value1 = cnt_answers1.value;
let target1 = document.getElementById("target1");

for(let i =0; i < value1; i++){
<<<<<<< HEAD
    let source =    "<label for="+i+"_question"+"></label>"+"<input type='text' class='answer1' id='"+i+"_answer1"+"'/></label>";
=======
    let source =    "<br><div class='d-flex align-items-center'><label for="+i+"_question"+"></label>"+"<input type='text' class='form-control answer1' id='"+i+"_answer1"+"'/></label></div>";
>>>>>>> 75419998ca8e6da5bdf317279d49826d7fddbdc2
    target1.innerHTML = target1.innerHTML + source ;
}

cnt_answers1.addEventListener("change",function (){
    let cnt = this.value;
    let target = document.getElementById("target1");
    target.innerHTML = "";
    for(let i =0; i < cnt; i++){
        let source =    "<br><div class='d-flex align-items-center'><label for="+i+"_question"+"></label>"+"<input type='text' class='form-control answer1' id='"+i+"_answer1"+"'/></label></div>";
        target.innerHTML = target.innerHTML + source ;
    }

})



submit1.addEventListener("click",function (){
    let answers = document.getElementsByClassName("answer1");
    let correct_answer = [];

    Array.from(answers).forEach(function (item,index){
        correct_answer.push(item.value);
    });

    let Json1 = {"question_type":"question_1","question":question1.value,"correct":correct_answer};
    console.log(Json1);

})

function f (value, target){
    for(let i =0; i < value; i++){
        let source =    "<label for="+i+"_question"+"></label>"+"<input type='text' class='answer2' id='"+i+"_answer2"+"'/></label>"+
            "<label for="+i+"_correct"+" ></label>"+"<input type='radio' class='answer2_match' id='"+i+"_answer2_match"+"'/></label>";

        target.innerHTML = target.innerHTML + source ;
    }
}
