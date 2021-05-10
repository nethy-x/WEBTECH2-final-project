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
                }
                console.log(data.test);*/
                query_question_1(data,element)

            } else {
                console.log("error");
                element.innerHTML = "chyba";
            }
        });

}

function query_question_1(data ,element){
    let target_div_for_all_question_type_1 = document.createElement("div");
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