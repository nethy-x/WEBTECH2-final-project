document.getElementById("submit_test").addEventListener("click",function (){
    let question1 = document.getElementsByClassName("question1_answer");

    let answer1 = {}
    let JSON1 = {}

    Array.from(question1).forEach(function (item,index){
        /*let cnt_question = "question"+index+1;
        JSON1 = {cnt_question :answer1[index] = item.value.toString()};*/
    })


    console.log(JSON1);

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


})

