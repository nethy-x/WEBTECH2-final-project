window.addEventListener('DOMContentLoaded', (event) => {
    addQuestion2Answers();
    addDisableRadio();
});

function addQuestion2Answers() {
    let question_cnts = document.querySelectorAll(".question2_cnt");

    question_cnts.forEach((item, index) => {
        item.addEventListener("change", function (event) {
            let id = Number(index + 1)
            let target = document.getElementById("question2_" + id + "_target");
            let cnt = this.value;
            addQuestion2Target(target, cnt, id);
            addDisableRadio();
        });
    });
}

function addDisableRadio() {
    let radios = document.getElementsByTagName('input');
    for (let i = 0; i < radios.length; i++) {
        radios[i].onclick = function (e) {
            if (e.ctrlKey || e.metaKey) {
                this.checked = false;
            }
        }
    }
}

function addQuestion2Target(target, cnt, id) {
    target.innerHTML = "";
    for (let i = 0; i < cnt; i++) {
        let source = "<div class='d-flex align-items-center mt-2'>\n" +
            "            <label for='question2_" + id + "_answer_" + i + "'></label>\n" +
            "            <input type='text' class='form-control answer2_" + id + "' id='question2_" + id + "_answer_" + i + "'/>\n" +
            "            <label for='question2_" + id + "_answer_" + i + "_match'></label>\n" +
            "            <input type='radio' class='m-lg-4 answer2_match_" + id + "' id='question2_" + id + "_answer_" + i + "_match'/>\n" +
            "        </div>";
        target.innerHTML = target.innerHTML + source;
    }

}

function addSelectQuestion(id) {
    return "<div class=\"col-md-4\">\n" +
        `    <label class=\"form-label\" for=\"question2_${id}\">Otázka</label>\n` +
        `    <input class=\"form-control question2\" id=\"question2_${id}\" type=\"text\">\n` +
        `    <label class=\"form-label\" for=\"question2_${id}_cnt\">Počet odpovedí</label>\n` +
        `    <select class=\"form-control question2_cnt\" id=\"question2_${id}_cnt\">\n` +
        "        <option>1</option>\n" +
        "        <option>2</option>\n" +
        "        <option>3</option>\n" +
        "        <option>4</option>\n" +
        "        <option>5</option>\n" +
        "        <option>6</option>\n" +
        "        <option>7</option>\n" +
        "        <option>8</option>\n" +
        "    </select>\n" +
        `    <div class=\"question2_target\" id=\"question2_${id}_target\">\n` +
        "        <div class='d-flex align-items-center mt-2'>\n" +
        `           <label for='question2_${id}_answer_1'></label>\n` +
        `           <input type='text' class='form-control answer2_${id}' id='question2_${id}_answer_1'/>\n` +
        `           <label for='question2_${id}_answer_1_match'></label>\n` +
        `           <input type='radio' class='m-lg-4 answer2_match_${id}' id='question2_${id}_answer_1_match'/>\n` +
        `       </div>\n` +
        "    </div>\n" +
        "</div>";
}