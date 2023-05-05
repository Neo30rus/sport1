<?php
require 'functions.php';
$errorMessage = '';

session_start();
if (!empty($_SESSION['user'])){
    header('Location: main.php');
}

if (!empty($_POST['email'])
    && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = login($email, $password);
    if ($result['result']){
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['id'] = $result['user']['id'];
        $_SESSION['user']['is_admin'] = $result['user']['is_admin'];
        header('Location: main.php');
    } else {
        $errorMessage = 'Неправильный эмейл или пароль';
    }
}
?>
<!--<form method="post">-->
<!--    <label> 'эмейл </label>-->
<!--    <input type="email" name="email">-->
<!--    <br>-->
<!--    <label> пароль </label>-->
<!--    <input type="password" name="password">-->
<!--    <br>-->
<!--    <input type="submit">-->
<!--    <div>-->
<!--        <b style="color: crimson">-->
<!--            --><?//=$errorMessage?>
<!--        </b>-->
<!--    </div>-->
<!--</form>-->
<!--<a href="register_form.php">Регистрация</a>-->
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Petrovich</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
</head>
<body>
<section class="thank_you">

    <form method="post" class="container-fluid text-center">
        <div class="why_shoose_us">
            <div class="heading-content text-center">
                <h1><strong>E-mail</strong></h1>
            </div>
        </div>
        <div class="container overflow-hidden text-center">
            <div class="mb-5">
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="login">
            </div>
        </div>
        <div class="container overflow-hidden text-center">
            <div class="mb-5">
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password">
            </div>
        </div>
        <input type="submit">
        <div>
            <b style="color: crimson">
                <?=$errorMessage?>
            </b>
        </div>
        <div class="more">
            <a href="register_form.php" class="link-dark"><strong>Регистрация</strong></a>
        </div>
    </form>

</section>
</body>
</html>