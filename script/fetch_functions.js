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

function fetchTest(element){
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
              //  element.innerHTML = data.test;
                /*for(let i in data.test){
                    let question = data.test[i];
                    console.log(question);
                }*/

                console.log(data.test);
                //query_question_1(data,element)
                //query_question_2(data,element)
                query_question_3(data,element);

            } else {
                console.log("error");
                element.innerHTML = "chyba";
            }
        });

}


function query_question_1(data ,element){
    let target_div_for_all_question_type_1 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 1";
    target_div_for_all_question_type_1.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_1.classList.add("bg-light");

    for(let i in data.test.Json1){
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-4")
        target_div_for_question.style.padding = "25px"


        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
                                            "<p style='text-align: center'>"+data.test.Json1[i].question+"</p>";

        for(let j in data.test.Json1[i].correct){
            let question = document.createElement("input");
            question.type = "input";
            question.classList.add("form-control");
            question.classList.add("m-2");
            question.placeholder = "answer";
            target_div_for_question.append(question);
        }
        target_div_for_all_question_type_1.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_1)
}

function query_question_2(data ,element){
    let target_div_for_all_question_type_1 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 2";
    target_div_for_all_question_type_1.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_1.classList.add("bg-light");

    for(let i in data.test.Json2){
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-4")
        target_div_for_question.style.padding = "25px"

        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
            "<p style='text-align: center'>"+data.test.Json2[i].question+"</p>";

        for(let j in data.test.Json2[i].answer){
            let divForFlexStyle = document.createElement("div")
            divForFlexStyle.classList.add("d-flex");

            let question = document.createElement("p");
            question.classList.add("form-control");
            question.classList.add("p-2");
            question.classList.add("d-flex");
            let checkbox = document.createElement("input");

            checkbox.type = "checkbox";
            //TODO zarovnat checkbox do stredu
            checkbox.classList.add("m-2")
            question.innerHTML = data.test.Json2[i].answer[j];
            divForFlexStyle.append(question);
            divForFlexStyle.append(checkbox);
            target_div_for_question.append(divForFlexStyle);
        }
        target_div_for_all_question_type_1.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_1)
}

function query_question_3(data,element){
    let target_div_for_all_question_type_1 = document.createElement("div");
    let tmp_header_for_identify_queried_questions = document.createElement("h2");

    tmp_header_for_identify_queried_questions.innerHTML = "Otazky typu 3";
    target_div_for_all_question_type_1.append(tmp_header_for_identify_queried_questions);

    target_div_for_all_question_type_1.classList.add("bg-light");

    for(let i in data.test.Json3){
        let target_div_for_question = document.createElement("div");
        target_div_for_question.classList.add("col-md-8")
        target_div_for_question.style.padding = "25px"

        target_div_for_question.innerHTML = "<h5 style='text-align: center'>otazka</h5>" +
            "<p style='text-align: center'>"+data.test.Json3[i].question+"</p>";


        for(let key in data.test.Json3[i].answer){
            let divForFlexStyle = document.createElement("div")
            divForFlexStyle.classList.add("d-flex");

            let left_answer = document.createElement("p");
            left_answer.classList.add("form-control");
            left_answer.classList.add("p-2");
            left_answer.style.marginRight = "25%"
            left_answer.classList.add("d-flex");

            let right_answer = document.createElement("p");
            right_answer.classList.add("form-control");
            right_answer.classList.add("p-2");
            right_answer.classList.add("d-flex");

            left_answer.innerHTML = key
            right_answer.innerHTML = data.test.Json3[i].answer[key];

            console.log(data.test.Json3[i].answer)
            divForFlexStyle.append(left_answer);
            divForFlexStyle.append(right_answer);
            target_div_for_question.append(divForFlexStyle);
        }
        target_div_for_all_question_type_1.append(target_div_for_question);
    }
    element.append(target_div_for_all_question_type_1)
}