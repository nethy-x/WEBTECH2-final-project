document.getElementById("submit_test").addEventListener("click",function (){
    let questionFromForm1 = document.getElementsByClassName("question1_question");
    let answerFromForm1 = document.getElementsByClassName("question1_answer");

    let questionFromForm2 = document.getElementsByClassName("question2_question");
    let answerFromForm2 = document.getElementsByClassName("question2_answer");
    let checkboxFromForm2 = document.getElementsByClassName("checkbox2_answer");

    let question1 = {};


    Array.from(answerFromForm1).forEach(function (item,index){
       question1[questionFromForm1[index].innerHTML] =  answerFromForm1[index].value;
    })

    let question2 = {}
    Array.from(questionFromForm2).forEach(function (question,questionIndex){
        let answerIteratorForJsonKey = 0;
        let tmp = {};
        Array.from(answerFromForm2).forEach(function (answer,answerIndex){
            if(question.id.split("_")[1] === answer.id.split("_")[1]){
                Array.from(checkboxFromForm2).forEach(function(checkbox,xIndex){
                    if(answer.id.split("_")[2] === checkboxFromForm2[xIndex].id.split("_")[2]){

                            tmp[checkboxFromForm2[answerIndex].checked + "_"+questionIndex+"_"+answerIteratorForJsonKey] = answer.innerHTML;
                    }
                })
                answerIteratorForJsonKey++;
            }
        });
        question2[question.innerHTML] = tmp;
        tmp = {};
        answerIteratorForJsonKey = 0;

    });

    console.log(question2)
    let JSON1 = {"question1":question1};
    let JSON2 = {"question2":question2};
    let tmp2 = {JSON1,JSON2};
    console.log(tmp2);




})

