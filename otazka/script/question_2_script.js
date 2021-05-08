let question2 = document.getElementById("question");
let cnt_answers2 = document.getElementById("cnt-answers2");


let value2 = cnt_answers2.value;
let target2 = document.getElementById("target2");
f(value2,target2)

cnt_answers2.addEventListener("change",function (){
    let cnt = this.value;
    let target = document.getElementById("target2");
    target.innerHTML = "";
    f(cnt,target);

    let radios = document.getElementsByTagName('input');
    for(let i=0; i<radios.length; i++ ) {
        radios[i].onclick = function(e) {
            if(e.ctrlKey || e.metaKey) {
                this.checked = false;
            }
        }
    }
})



function f (value, target){
    for(let i =0; i < value; i++){
        let source =    "<div class='d-flex align-items-center'> <label for="+i+"_question"+"></label>"+"<input type='text' class='form-control answer2' id='"+i+"_answer2"+"'/></label>"+
            "<label for="+i+"_correct"+" ></label>"+"<input type='radio' class='m-lg-4 answer2_match' id='"+i+"_answer2_match"+"'/></label></div>";

        target.innerHTML = target.innerHTML + source ;
    }

}