let question = document.getElementById("question");
let cnt_answers = document.getElementById("cnt-answers");

cnt_answers.addEventListener("change",function (){
    let cnt = this.value;
    let target = document.getElementById("target");
    target.innerHTML = "";
    for(let i =0; i < cnt; i++){
        let source =    "<label for="+i+"_question"+"></label>"+"<input type='text' class='question' id="+i+"_question"+"/></label>"+
                        "<label for="+i+"_correct"+" ></label>"+"<input type='radio' class='correct' id="+i+"_correct"+"/></label>";

        target.innerHTML = target.innerHTML + source ;
    }
    for(let i = 0; i < cnt; i++){
        let questions = document.getElementsByClassName("question");
        let answers = document.getElementsByClassName("correct");



    }
})