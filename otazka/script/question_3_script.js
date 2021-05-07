let question3 = document.getElementById("question3");
let cnt_answers3 = document.getElementById("cnt-answers3");

let value3 = cnt_answers3.value;
let target3 = document.getElementById("target3");

for(let i =0; i < value3; i++){

    let source = "<div class='d-flex align-items-center'><label for="+i+"_answer"+"></label>"+"<input type='text' class='form-control answer3' id='"+i+"_answer3"+"'/></label>"+
        "<label for="+i+"_answer3_match"+" ></label>"+"<input type='text' class='m-lg-2 form-control answer3_match' id='"+i+"_answer3_match"+"'/></label></div>" + "<br>";


    target3.innerHTML = target3.innerHTML + source ;
}


cnt_answers3.addEventListener("change",function (){
    let cnt = this.value;
    let target = document.getElementById("target3");
    target.innerHTML = "";
    for(let i =0; i < cnt; i++){

        let source = "<div class='d-flex align-items-center'><label for="+i+"_answer"+"></label>"+"<input type='text' class='form-control answer3' id='"+i+"_answer3"+"'/></label>"+
            "<label for="+i+"_answer3_match"+" ></label>"+"<input type='text' class='m-lg-2 form-control answer3_match' id='"+i+"_answer3_match"+"'/></label></div>" + "<br>";

        target.innerHTML = target.innerHTML + source ;
    }
})




