

function addMathQuestion(id) {
    return `<div class=\"col-md-4\">\n` +
        `    <label class=\"form-label \" for=\"question5_${id}\">Otázka</label>\n` +
        `    <input class=\"form-control question5\" id=\"question5_${id}\" type=\"text\">\n` +
        `    <label class=\"form-label\" for=\"mf-question5_${id}\">Príklad</label>\n` +
        `    <math-field class=\"mf_question5\" id=\"mf_question5_${id}\" virtual-keyboard-mode=\"manual\">\n` +
        `    </math-field>\n` +
        `    <div class="question5_output" id=\"question5_${id}_output\"></div>\n` +
        `    </div>\n<hr>\n`;

}
// function addListenerQuestion5(id){
//
//     document.getElementById('mf_question5_'+ id).addEventListener('input', (ev) => {
//         document.getElementById('question5_'+ id + '_output').innerHTML = ev.target.getValue();});
// }

function addQuestion5Answers() {
    let question_cnts = document.querySelectorAll(".mf_question5");

    question_cnts.forEach((item, index) => {
        item.addEventListener("input", function (event) {
            let id = Number(index + 1)
            let target = document.getElementById("question5_" + id + "_output");
            let cnt = this.value;
            target.innerHTML = event.target.getValue();
        });
    });
}