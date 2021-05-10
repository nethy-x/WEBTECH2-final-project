window.addEventListener('DOMContentLoaded', (event) => {
    addQuestion3Answer();
});

function addQuestion3Answer() {
    let question_cnts = document.querySelectorAll(".question3_cnt");

    question_cnts.forEach((item, index) => {
        item.addEventListener("change", function (event) {
            let id = Number(index + 1)
            let target = document.getElementById("question3_" + id + "_target");
            let cnt = this.value;
            addQuestion3Target(target, cnt, id);
        })
    });

}

function addQuestion3Target(target, cnt, id) {
    target.innerHTML = "";
    for (let i = 0; i < cnt; i++) {
        let source = "<div class='d-flex align-items-center mt-2'>" +
            "<label for=question3_" + id + "_answer_" + i + "></label>" +
            "<input type='text' class='form-control question3_answer_" + id + "' id='question3_" + id + "_answer_" + i + "'/>" +
            "<label for=question3_" + id + "_answer_" + i + "_match ></label>" +
            "<input type='text' class='m-lg-2 form-control question3_answer_match_" + id + "' id='question3_" + id + "_answer_" + i + "_match'/>" +
            "</div>";
        target.innerHTML = target.innerHTML + source;
    }

}

function addPairQuestion(id) {
    return "<div class=\"col-md-4\">\n" +
        `    <label class=\"form-label\" for=\"question3_${id}\">Otázka</label>\n` +
        `    <input class=\"form-control question3\" id=\"question3_${id}\" type=\"text\">\n` +
        `    <label class=\"form-label\" for=\"question3_${id}_cnt\">Počet párových odpovedí</label>\n` +
        `    <select class=\"form-control question3_cnt\" id=\"question3_${id}_cnt\">\n` +
        "        <option>1</option>\n" +
        "        <option>2</option>\n" +
        "        <option>3</option>\n" +
        "        <option>4</option>\n" +
        "        <option>5</option>\n" +
        "        <option>6</option>\n" +
        "        <option>7</option>\n" +
        "        <option>8</option>\n" +
        "    </select>\n" +
        `    <div class=\"question3_target\" id=\"question3_${id}_target\">\n` +
        "        <div class='d-flex align-items-center mt-2'>\n" +
        `            <label for=question3_${id}_answer_1></label>\n` +
        `            <input type='text' class='form-control question3_answer_${id}' id='question3_${id}_answer_1'/>\n` +
        `            <label for=question3_${id}_answer_1_match ></label>\n` +
        `            <input type='text' class='m-lg-2 form-control question3_answer_match_${id}' id='question3_${id}_answer_1_match'/>\n` +
        "            </div>\n" +
        "    </div>\n" +
        "</div>";
}




