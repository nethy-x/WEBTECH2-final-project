let question = document.getElementById("question");
let cnt_answers = document.getElementById("cnt-answers");
let submit = document.getElementById("submit-question");

cnt_answers.addEventListener("change",function (){
    let cnt = this.value;
    let target = document.getElementById("target");
    target.innerHTML = "";
    for(let i =0; i < cnt; i++){
        let source =    "<label for="+i+"_question"+"></label>"+"<input type='text' class='answer' id='"+i+"_answer"+"'/></label>"+
                        "<label for="+i+"_correct"+" ></label>"+"<input type='radio' class='correct' id='"+i+"_correct"+"'/></label>";

        target.innerHTML = target.innerHTML + source ;
    }

})

submit.addEventListener("click",function (){
    let answers = document.getElementsByClassName("answer");
    let correct_answer = document.getElementsByClassName("correct");

    Array.from(answers).forEach(function (item){
        let id_answer = item.id.split("_");
        console.log(id_answer);

    });
})

