window.addEventListener("DOMContentLoaded", ()=>{
    let activations = document.querySelectorAll(".activation");

    activations.forEach((element) => {
        element.addEventListener("click", () => {
            let status = "inactive";
            if(element.checked){
                status = "active";
            }
            fetchActivation(element.id, status);
        })
    });
});