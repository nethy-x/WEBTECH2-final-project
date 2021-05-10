document.getElementById("create-test").addEventListener("click", function () {
    let target = document.getElementById("target")
    target.style.display = "block";
    this.remove()

    const question1Container = document.getElementById("question1-container");
    const question2Container = document.getElementById("question2-container");
    const question3Container = document.getElementById("question3-container");
    const question4Container = document.getElementById("question4-container");
    const question5Container = document.getElementById("question5-container");

    let question1id = 2;
    let question2id = 2;
    let question3id = 2;
    let question4id = 2;
    let question5id = 2;

    const newQuestion1 = document.getElementById("new-question1");
    newQuestion1.addEventListener("click", (target) => {
        question1Container.innerHTML += addShortAnswerQuestion(question1id);
        addQuestion1Answers();
        question1id++;

    });
    const newQuestion2 = document.getElementById("new-question2");
    newQuestion2.addEventListener("click", () => {
        question2Container.innerHTML += addSelectQuestion(question2id);
        addQuestion2Answers();
        question2id++;
    });
    const newQuestion3 = document.getElementById("new-question3");
    newQuestion3.addEventListener("click", () => {
        question3Container.innerHTML += addPairQuestion(question3id);
        addQuestion3Answer();
        question3id++;
    });

});

