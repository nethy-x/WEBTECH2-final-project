document.getElementById("Submit-Test").addEventListener("click",function (){
    let answers1 = document.getElementsByClassName("answer1");
    let correct_answer1 = [];

    Array.from(answers1).forEach(function (item,index){
        correct_answer1.push(item.value);
    });

    let Json1 = {"question_type":"question_1","question":question1.value,"correct":correct_answer1};
    console.log(Json1);

    /*-------------*/
    let answers2 = document.getElementsByClassName("answer2");
    let correct_answer_element2 = document.getElementsByClassName("answer2_match");

    let correct_answer2 = [];
    let incorrect_answer2 =[];
    let answer_shuffle2 = [];
    Array.from(answers2).forEach(function (item,index){
        let id_answer2 = item.id.split("_");
        let id_correct2 = Array.from(correct_answer_element2)[index].id.split("_");
        answer_shuffle2.push(item.value);
        if((id_answer2[0] === id_correct2[0]) && Array.from(correct_answer_element2)[index].checked=== true){
            correct_answer2.push(item.value);
        }else{
            incorrect_answer2.push(item.value);
        }
    });

    let Json2 = {"question_type":"question_2","question":question2.value,"correct":correct_answer2,"answer":answer_shuffle2};
    console.log(Json2)

    /*-----------------*/

    let answers3 = document.getElementsByClassName("answer3");
    let answer_match3 = document.getElementsByClassName("answer3_match");

    let answer3 = {};
    let correct_answer_match3 = [];

    Array.from(answers3).forEach(function (item,index){
        answer3[item.value]=answer_match3[index].value


    });

    let Json3 = {"question_type":"question_3","question":question3.value,"answer":answer3};
    console.log(Json3);
    /*----------*/
    let question4 = document.getElementById("question4");
    let Json4 = {"question_type":"question_4","question":question4.value};
    console.log(Json4);

    let question5 = document.getElementById("question5");
    let answer5 = document.getElementById('output').innerHTML;
    let Json5 = {"question_type":"question_5","question":question5.value,"question-math":answer5};
    console.log(Json5);

    let JSON = {Json1,Json2,Json3,Json4,Json5};
    console.log(JSON);
    fetchDefineTest(JSON);
})