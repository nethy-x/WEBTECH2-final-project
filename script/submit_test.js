document.getElementById("Submit-Test").addEventListener("click", function () {
    let questions1 = document.querySelectorAll(".question1");

    let Json1 = {};

    questions1.forEach((item, index) => {
        let id = Number(index + 1);
        let answers1 = document.getElementsByClassName("answer1_" + id);
        let correct_answer1 = [];

        Array.from(answers1).forEach(function (item, index) {
            correct_answer1.push(item.value);
        });
        console.log(correct_answer1);
        let name = 'question' + id
        Json1[name] = {"question_type": "question_1", "question": item.value, "correct": correct_answer1};
    })

    console.log(Json1);

    /*-------------*/
    let questions2 = document.querySelectorAll(".question2");

    let Json2 = {};

    questions2.forEach((item, index) => {
        let id = Number(index + 1);
        let answers2 = document.getElementsByClassName("answer2_" + id);
        let correct_answer_element2 = document.getElementsByClassName("answer2_match_" + id);
        let correct_answer2 = [];
        let incorrect_answer2 = [];
        let answer_shuffle2 = [];

        Array.from(answers2).forEach(function (item, index) {
            let id_answer2 = item.id.split("_");
            let id_correct2 = Array.from(correct_answer_element2)[index].id.split("_");
            answer_shuffle2.push(item.value);
            if ((id_answer2[0] === id_correct2[0]) && Array.from(correct_answer_element2)[index].checked === true) {
                correct_answer2.push(item.value);
            } else {
                incorrect_answer2.push(item.value);
            }
        });
        let name = 'question' + id
        Json2[name] = {
            "question_type": "question_2",
            "question": item.value,
            "correct": correct_answer2,
            "answer": answer_shuffle2
        };
    });

    console.log(Json2)

    /*-----------------*/
    let questions3 = document.querySelectorAll(".question3");

    let Json3 = {};

    questions3.forEach((item, index) => {
        let id = Number(index + 1);
        let answers3 = document.getElementsByClassName("question3_answer_" + id);
        let answer_match3 = document.getElementsByClassName("question3_answer_match_" + id);

        let answer3 = {};
        let correct_answer_match3 = [];

        Array.from(answers3).forEach(function (item, index) {
            answer3[item.value] = answer_match3[index].value
        });
        let name = 'question' + id
        Json3[name] = {"question_type": "question_3", "question": item.value, "answer": answer3};
    });

    console.log(Json3);

    /*----------*/

    let question4 = document.getElementById("question4");
    let Json4 = {"question_type": "question_4", "question": question4.value};
    console.log(Json4);

    /*----------*/




    let questions5 = document.querySelectorAll(".question5");


    let Json5 = {};

    questions5.forEach((item, index) => {
        let id = Number(index + 1);
        let answer = document.getElementById("question5_" + id + "_output").innerHTML;

        let name = 'question' + id;
        Json5[name] = {"question_type": "question_5", "question": item.value, "question-math": answer};
    })

    console.log(Json5);

    /*----------*/
    let time_limit = document.getElementById("time_limit");
    /*----------*/

    let JSON = {Json1, Json2, Json3, Json4, Json5, "time_limit": time_limit.value};
    console.log(JSON);

    fetchDefineTest(JSON);

    document.getElementById("target").innerHTML = '<h1>Test bol uspesne vytvoreny</h1>'

})