let testJSON;
function fetchDefineTest(test) {
    let url = "api/defineTestApi.php";
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
                console.log(data.id);
            } else {
                console.log("error");
            }
        });
}

function fetchTest(element) {
    let url = "api/fetchTestApi.php";
    let request = new Request(url, {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    });

    fetch(request)
        .then((response) => response.json())
        .then((data) => {
            if (!data.error) {
                testJSON = data.test;
              
                console.log(data.test);
                query_question_1(data, element);
                query_question_2(data, element);
                query_question_3(data, element);
                query_question_4(data, element);
                query_question_5(data, element);

                let submit_button = document.createElement("input");
                let scriptForSubmit = document.createElement("script");
                let scriptForSortableQuestion3 = document.createElement("script");
                scriptForSubmit.src = "script/student_test_perspective/submit_test.js"
                scriptForSortableQuestion3.src = "script/sortable/sortable_script.js";
                submit_button.type = "button";
                submit_button.classList.add("btn");
                submit_button.classList.add("btn-danger");
                submit_button.value = "submit";
                submit_button.id = "submit_test";
                element.append(submit_button);
                element.append(scriptForSubmit);
                element.append(scriptForSortableQuestion3);
                element.style.marginBottom = "270px"

            } else {
                console.log("error");
                element.innerHTML = "chyba";
            }
        });

}

function fetchActivation(code, status) {
    let url = "api/activationApi.php?code=" + code + "&status=" + status;
    let request = new Request(url, {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }
    });
    fetch(request)
        .then((response) => response.json())
        .then((data) => {
            if (!data.error) {
                console.log(data.code);
                console.log(data.status);
            } else {
                console.log("error");
            }
        });
}

function query_question_1(data, element) {
    let target_div_for_all_question_type_1 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 1";
    target_div_for_all_question_type_1.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_1.classList.add("bg-light");

    let iterator = 0;
    for(let i in data.test.Json1){
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-4")
        target_div_for_question.style.padding = "25px"

        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
            "<p style='text-align: center' class='question1_question'>" + data.test.Json1[i].question + "</p>";



        let answer = document.createElement("input");
        answer.type = "input";
        answer.classList.add("form-control");
        answer.classList.add("m-2");
        answer.classList.add("question1_answer")
        answer.placeholder = "answer";
        answer.id = "q_1"+iterator.toString();
        iterator++;
        target_div_for_question.append(answer);

        target_div_for_all_question_type_1.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_1)
}

function query_question_2(data, element) {
    let target_div_for_all_question_type_2 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 2";
    target_div_for_all_question_type_2.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_2.classList.add("bg-light");

    let question_iterator = 0;
    for (let i in data.test.Json2) {
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-4")
        target_div_for_question.style.padding = "25px"

        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
            "<p style='text-align: center' id='question2_"+question_iterator+"' class='question2_question>" + data.test.Json2[i].question + "</p>";

        let answerIterator = 0;
        for(let j in data.test.Json2[i].answer){
            let divForFlexStyle = document.createElement("div")
            divForFlexStyle.classList.add("d-flex");

            let answer = document.createElement("p");
            let checkbox = document.createElement("input");
            answer.classList.add("form-control");
            answer.classList.add("p-2");
            answer.classList.add("d-flex");
            answer.classList.add("question2_answer")
            answer.id = "question2_"+question_iterator+"_"+answerIterator;
            answer.innerHTML = data.test.Json2[i].answer[j];

            checkbox.type = "checkbox";
            checkbox.classList.add("m-2")
            checkbox.classList.add("checkbox2_answer")
            checkbox.id = "checkbox2_"+question_iterator+"_"+answerIterator;

            answerIterator++;

            divForFlexStyle.append(answer);
            divForFlexStyle.append(checkbox);
            target_div_for_question.append(divForFlexStyle);
        }
        answerIterator = 0;
        question_iterator++;
        target_div_for_all_question_type_2.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_2)
}

function query_question_3(data, element) {
    let target_div_for_all_question_type_3 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 3";
    target_div_for_all_question_type_3.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_3.classList.add("bg-light");

    for (let i in data.test.Json3) {
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-8")
        target_div_for_question.style.padding = "25px"

        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
            "<p style='text-align: center'>" + data.test.Json3[i].question + "</p>";

        let divForFlexStyle = document.documentElement;
        let divForLeftAnswer = document.documentElement;
        let divForRightAnswer = document.documentElement;

        divForLeftAnswer = document.createElement("div");
        divForLeftAnswer.classList.add("col-md-6");

        divForRightAnswer = document.createElement("div");
        divForRightAnswer.classList.add("col-md-6");

        for (let key in data.test.Json3[i].answer) {
            divForFlexStyle = document.createElement("div")
            divForFlexStyle.classList.add("d-flex");

            let left_answer = document.createElement("p");
            left_answer.classList.add("form-control");
            left_answer.classList.add("p-2");
            left_answer.classList.add("left_answer");
            left_answer.style.marginRight = "25%"
            left_answer.classList.add("d-flex");

            let right_answer = document.createElement("p");
            right_answer.classList.add("right_answer");
            right_answer.classList.add("form-control");
            right_answer.classList.add("p-2");
            right_answer.classList.add("d-flex");

            left_answer.innerHTML = key
            right_answer.innerHTML = data.test.Json3[i].answer[key];

            divForLeftAnswer.append(left_answer);
            divForRightAnswer.append(right_answer);
        }
        divForFlexStyle.append(divForLeftAnswer);
        divForFlexStyle.append(divForRightAnswer);
        target_div_for_question.append(divForFlexStyle);
        target_div_for_all_question_type_3.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_3)
}

function query_question_4(data, element) {
    let target_div_for_all_question_type_4 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 4";
    target_div_for_all_question_type_4.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_4.classList.add("bg-light");

    // for(let i in data.test.Json4){
    let target_div_for_question = document.createElement("div");
    target_div_for_question.classList.add("col-md-4")
    target_div_for_question.style.padding = "25px"


    target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
        "<p style='text-align: center'>" + data.test.Json4.question + "</p>";

    let canvas = document.createElement('canvas');
    let script = document.createElement("script");

    canvas.classList.add("bg-dark")
    canvas.id = "canvas";

    script.canvas = "canvas";

    target_div_for_question.append(canvas);
    target_div_for_question.append(script);

    target_div_for_all_question_type_4.append(target_div_for_question);
    //  }
    element.append(target_div_for_all_question_type_4)
}

function query_question_5(data, element) {
    let target_div_for_all_question_type_5 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 5";
    target_div_for_all_question_type_5.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_5.classList.add("bg-light");

    let iterator = 0;
    for(let i in data.test.Json5){
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-4")
        target_div_for_question.style.padding = "25px"


        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
            "<p style='text-align: center'>"+data.test.Json5[i].question+"</p>";


            let question = new MathfieldElement();
            question.setOptions({
            readOnly: true,
            });
            question.style.fontSize = "32px";
            question.style.padding = "8px";
            question.style.borderRadius = "8px";
            question.style.border = "1px solid black";
            question.style.boxShadow = "0 0 8px rgba(0,0,0,.2)";
            question.value = data.test.Json5[i]["question-math"];


            let answer = document.createElement("math-field");

            answer.setAttribute("virtual-keyboard-mode","manual");
            answer.style.fontSize = "32px";
            answer.style.padding = "8px";
            answer.style.borderRadius = "8px";
            answer.style.border = "1px solid black";
            answer.style.boxShadow = "0 0 8px rgba(0,0,0,.2)";
            answer.id = "q_5"+iterator.toString();
            iterator++;

            target_div_for_question.append(question);
            target_div_for_question.append(answer);

        target_div_for_all_question_type_5.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_5)
}


