<form action="api/loginProfessor.php" method="post">
    <div class="row mb-2">
        <div class=" d-flex justify-content-center">
            <div class="p-2"><a href="index.php" class="page_link">Študent</a></div>
            <div class="p-2"><a href="index.php?role=professor" class="page_link" style="color: yellow; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Učiteľ</a></div>
        </div>
    </div>
    <div class="container mt-5">
        <hr>
        <div class="row mb-2">
            <div class="form-group col">
                <label for="email" class="col-form-label"><b>Email</b></label>
            </div>
            <div class="form-group col-lg-8">
                <input class="form-control" type="text" id="email" placeholder="Vložte email" name="email" required>
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col">
                <label for="psw" class="col-form-label"><b>Heslo</b></label>
            </div>
            <div class="form-group col-lg-8">
                <div class="form-group col">
                    <input class="form-control" type="password" id="psw" placeholder="Vložte heslo" name="psw" required>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-2">

            <button type="submit" class="btn btn-secondary mt-5">Prihlásiť sa</button>
        </div>
    </div>
    <div class="row mb-2">
        <p>Ak nie ste zaregistrovaný, registrujte sa na odkaze: <a href="registration.php" class="reglog">Registrácia</a></p>
    </div>
</form>