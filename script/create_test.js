document.getElementById("create-test").addEventListener("click",function (){
    document.getElementById("target").innerHTML =`
                <form>
                    <div>
                        <h2>question1</h2>    
                    </div>
                    <div>
                        <h2>question2</h2>
                    </div>
                    <div>
                        <h2>question3</h2>
                    </div>
                    <div>
                        <h2>question4</h2>
                    </div>
                    <div>
                        <h2>question5</h2>
                    </div>
            </form>`

    this.remove()
})