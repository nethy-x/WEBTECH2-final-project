<form action="api/loginStudent.php" method="post">
    <div class="row mb-2">
        <div class="d-flex justify-content-center">
            <div class="p-2"><a href="index.php">Študent</a></div>
            <div class="p-2"><a href="index.php?role=professor">Učiteľ</a></div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-2">
            <div class="form-group col">
                <label for="code"><b>Kód testu</b></label>
            </div>
            <div class="form-group col">
                <input type="text" id="code" placeholder="Vložte kód testu" name="code" required>
            </div>
        </div>
        <div id="login" style="display: none;">
            <div class="row mb-2">
                <div class="form-group col">
                    <label for="name"><b>Meno</b></label>
                </div>
                <div class="form-group col">
                    <input type="text" id="name" placeholder="Vložte meno" name="name" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col">
                    <label for="surname"><b>Priezvisko</b></label>
                </div>
                <div class="form-group col">
                    <input type="text" id="surname" placeholder="Vložte priezvisko" name="surname" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col">
                    <label for="id_num"><b>Identifikačné číslo</b></label>
                </div>
                <div class="form-group col">
                    <input type="number" id="id_num" placeholder="Vložte identifikačné číslo" name="id_num" required>
                </div>
            </div>
            <div class="row mb-2">
                <button type="submit" class="btn btn-secondary mt-3">Prihlásiť sa</button>
            </div>
        </div>
    </div>
</form>
<script>
    $("#code").blur(function (e) {
        var code = document.getElementById("code");
        e.preventDefault();
        $.ajax({
            url: "api/validate.php",
            type: "get",
            data: {
                code: code.value
            },
            success: function (data) {
                if (data.code === "") {
                    document.getElementById("login").style.display = "none";
                    document.getElementById("code").style.borderColor = "red";
                } else {
                    document.getElementById("login").style.display = "block";
                    document.getElementById("code").style.borderColor = "green";
                }
            },
        })
    });
</script>
