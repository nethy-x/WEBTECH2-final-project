document.getElementById("submit_test").addEventListener("click",function (){
    let questionFromForm1 = document.getElementsByClassName("question1_question");
    let answerFromForm1 = document.getElementsByClassName("question1_answer");
    let questionFromForm2 = document.getElementsByClassName("question2_question");
    let answerFromForm2 = document.getElementsByClassName("question2_answer");
    let checkboxFromForm2 = document.getElementsByClassName("checkbox2_answer");

    let question1 = {};
    let question2 = {};

    Array.from(answerFromForm1).forEach(function (item,index){
       question1[questionFromForm1[index].innerHTML] =  answerFromForm1[index].value;
    })

    let JSON1 = {"question1":question1};
    let JSON2 = {"question2":question2};
    let tmp = {JSON1,JSON2};
    console.log(tmp);


    /*
    let question2 = document.getElementsByClassName("question2_answer");
    let checkbox2 = document.getElementsByClassName("checkbox2_answer");
    let checked_answer = {}
    let unchecked_answer = {}

    Array.from(question2).forEach(function (item,index){
       let id = item.id.split("_");

       if(id[1] === checkbox2[index].id.split("_")[1]){
                if(checkbox2[index].value === "true"){
                    checked_answer[index] = item.value;
                }
       }
    });

    Array.from(question2).forEach(function (item,index){
        let id = item.id.split("_");

        if(id[1] === checkbox2[index].id.split("_")[1]){
            if(checkbox2[index].value !== "true"){
                unchecked_answer[index] = item.value;
            }
        }
    });

    let answer2={"question2":checked_answer,unchecked_answer};
*/

})

