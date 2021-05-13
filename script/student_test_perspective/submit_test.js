document.getElementById("submit_test").addEventListener("click",function (){
    let questionFromForm1 = document.getElementsByClassName("question1_question");
    let answerFromForm1 = document.getElementsByClassName("question1_answer");

    let questionFromForm2 = document.getElementsByClassName("question2_question");
    let answerFromForm2 = document.getElementsByClassName("question2_answer");
    let checkboxFromForm2 = document.getElementsByClassName("checkbox2_answer");

    let questionFromForm3 = document.getElementsByClassName("question3_question");
    let leftAnswerFromInput3 = document.getElementsByClassName("question3_leftAnswer")
    let rightAnswerFromInput3 = document.getElementsByClassName("question3_rightAnswer")

    let questionFromForm5 = document.getElementsByClassName("question5_question");
    let mathQuestionFromForm5 = document.getElementsByClassName("mathQuestion");
    let mathAnswerFromForm5 = document.getElementsByClassName("mathAnswer");


    let question1 = {};
    let question2 = {};
    let question3 = {};
    let question5 = {};

    Array.from(answerFromForm1).forEach(function (item,index){
        question1[questionFromForm1[index].innerHTML] =  answerFromForm1[index].value;
    })

    Array.from(questionFromForm2).forEach(function (question,questionIndex){
        let answerIteratorForJsonKey = 0;
        let tmp = {};
        Array.from(answerFromForm2).forEach(function (answer,answerIndex){
            if(question.id.split("_")[1] === answer.id.split("_")[1]){
                Array.from(checkboxFromForm2).forEach(function(checkbox,xIndex){
                    if(answer.id.split("_")[2] === checkboxFromForm2[xIndex].id.split("_")[2]){

                        tmp[answer.innerHTML] = checkboxFromForm2[answerIndex].checked;
                    }
                })
                answerIteratorForJsonKey++;
            }
        });
        question2[question.innerHTML] = tmp;
        tmp = {};
        answerIteratorForJsonKey = 0;
    });

    Array.from(questionFromForm3).forEach(function (question,questionIndex){
        let tmp = {}
        Array.from(leftAnswerFromInput3).forEach(function (leftAnswer,leftAnswerIndex){
            if(question.id.split("_")[1] === leftAnswer.id.split("_")[1]){
                tmp[leftAnswer.innerHTML] = rightAnswerFromInput3[leftAnswerIndex].innerHTML;
            }
        })
        question3[question.innerHTML+"_"+questionIndex] = tmp;
        tmp = {};
    });

   Array.from(questionFromForm5).forEach(function (item,index){
       let tmp = {};
       if(mathQuestionFromForm5[index].id.split("_")[1] === mathAnswerFromForm5[index].id.split("_")[1]){
           tmp[mathQuestionFromForm5[index].value] = mathAnswerFromForm5[index].value;
       }
       question5[item.innerHTML+"_"+index] = tmp;
       //TODO odstranit indexovanie
   })

    let JSON1 = {"question1":question1};
    let JSON2 = {"question2":question2};
    let JSON3 = {"question3":question3};
    let JSON5 = {"question5":question5};
    let FinalJson = {JSON1,JSON2,JSON3,JSON5};

    fetchDefineTest(FinalJson);
})

function fetchDefineTest(test) {
    let url = "api/evaluation/evaluateApi.php";
    let request = new Request(url, {
        method: 'POST',
        body: JSON.stringify({
            test: test
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    });

    fetch(request)
        .then((response) => response.json())
        .then((data) => {
            if (!data.error) {
                console.log(data)
            } else {

            }
        });
}

