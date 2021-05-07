let question3 = document.getElementById("question3");
let cnt_answers3 = document.getElementById("cnt-answers3");
let submit3 = document.getElementById("submit-question3");

let value3 = cnt_answers3.value;
let target3 = document.getElementById("target3");

for(let i =0; i < value3; i++){
    let source = "<label for="+i+"_answer"+"></label>"+"<input type='text' class='answer3' id='"+i+"_answer3"+"'/></label>"+
        "<label for="+i+"_answer3_match"+" ></label>"+"<input type='text' class='answer3_match' id='"+i+"_answer3_match"+"'/></label>" + "<br>";

    target3.innerHTML = target3.innerHTML + source ;
}


cnt_answers3.addEventListener("change",function (){
    let cnt = this.value;
    let target = document.getElementById("target3");
    target.innerHTML = "";
    for(let i =0; i < cnt; i++){
        let source = "<label for="+i+"_answer"+"></label>"+"<input type='text' class='answer3' id='"+i+"_answer3"+"'/></label>"+
            "<label for="+i+"_answer3_match"+" ></label>"+"<input type='text' class='answer3_match' id='"+i+"_answer3_match"+"'/></label>" + "<br>";

        target.innerHTML = target.innerHTML + source ;
    }
})



submit3.addEventListener("click",function (){
    let answers = document.getElementsByClassName("answer3");
    let answer_match = document.getElementsByClassName("answer3_match");

    let answer = {};
    let correct_answer_match = [];

    Array.from(answers).forEach(function (item,index){
        answer[item.value]=answer_match[index].value


    });

    let Json = {"question_type":"question_3","question":question3.value,"answer":answer};
    console.log(Json);

})

