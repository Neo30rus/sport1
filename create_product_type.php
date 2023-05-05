<?php
require 'functions.php';

session_start();
if (empty($_SESSION['user'])){
    header('Location: auth_form.php');
}

$error = '';
if (!empty($_POST['title'])) {
    $title = $_POST['title'];
    if (createProductType($title)){
        header('Location: index.php');
    } else {
        $error = 'Ошибка при создании типа товара';
    }
}
?>

<form method="post">
    <label> Название </label>
    <input type="text" name="title">
    <br>
    <input type="submit">
</form>
