<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';
include 'functions.php';
include 'header.php';
//$email = $_POST['signin_email'];
//$password = $_POST['signin_password'];
//debug($email);
//debug($password);

if (isset($_POST['sign_in'])) {
    signIn($bdd, $_POST['signin_email'], $_POST['signin-password']);
}else{
    echo "Merci de vous connecter";
}


?>
<div class="container text-center mx-auto col-md-2 mt-3">
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Merci de vous identifier</h1>
        <input type="email" name="signin_email" class="form-control mb-3" placeholder="Adresse email"
               required autofocus>
        <input type="password" name="signin-password" class="form-control mb-3"
               placeholder="Mot de passe" required>
        <!--    <div class="checkbox mb-3">-->
        <!--        <label>-->
        <!--            <input type="checkbox" value="remember-me"> Remember me-->
        <!--        </label>-->
        <!--    </div>-->
        <button class="btn btn-primary" type="submit" name="sign_in">Sign in</button>
    </form>
</div>