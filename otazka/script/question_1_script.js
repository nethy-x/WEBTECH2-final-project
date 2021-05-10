window.addEventListener('DOMContentLoaded', (event) => {
    addQuestion1Answers();
});

function addQuestion1Answers() {
    let question_cnts = document.querySelectorAll(".question1_cnt");

    question_cnts.forEach((item, index) => {
        item.addEventListener("change", function (event) {
            let id = Number(index + 1)
            let target = document.getElementById("question1_" + id + "_target");
            let cnt = this.value;
            addQuestion1Target(target, cnt, id);
        });
    });
}

function addQuestion1Target(target, cnt, id){
    target.innerHTML = "";
    for (let i = 1; i <= cnt; i++) {
        let source =
            "<div class='d-flex align-items-center mt-2'>" +
            "<label for='question1_" + id + "_answer_" + i + "'></label>" +
            "<input type='text' class='form-control answer1_"+id+"' id='question1_" + id + "_answer_" + i + "'/>" +
            "</div>";
        target.innerHTML = target.innerHTML + source;
    }
}

function addShortAnswerQuestion(id) {
    return `<div class=\"col-md-4\">\n` +
        `    <label class=\"form-label\" for=\"question1_${id}\">Otázka</label>\n` +
        `    <input class=\"form-control question1\" id=\"question1_${id}\" type=\"text\">\n` +
        `    <label class=\"form-label\" for=\"cnt-answers1_${id}\">Počet správnych odpovedí</label>\n` +
        `    <select class=\"form-control question1_cnt\" id=\"question1_${id}_cnt\">\n` +
        "        <option>1</option>\n" +
        "        <option>2</option>\n" +
        "        <option>3</option>\n" +
        "        <option>4</option>\n" +
        "        <option>5</option>\n" +
        "        <option>6</option>\n" +
        "        <option>7</option>\n" +
        "        <option>8</option>\n" +
        "    </select>\n" +
        `    <div class="question1_target" id=\"question1_${id}_target\">\n` +
        `        <div class="d-flex align-items-center mt-2">\n` +
        `             <label for='question1_${id}_answer_1'></label>\n` +
        `             <input type='text' class='form-control answer1_${id}' id='question1_${id}_answer_1'/>\n` +
        "        </div>\n" +
        "    </div>\n" +
        "</div>\n<hr>\n";
}