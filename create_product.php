<?php
require 'functions.php';

session_start();
if (empty($_SESSION['user'])) {
    header('Location: auth_form.php');
}

$product = getProductsType();

$error = '';
if (!empty($_POST['type_id'])
    && !empty($_POST['price'])&& !empty($_POST['count'])) {
    $type_id = $_POST['type_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    if (createProduct($type_id, $description, $price, $count)) {
        header('Location: index.php');
    } else {
        $error = 'Ошибка при создании товара';
    }
}
?>

<form method="post">
    <label>Выбор товара</label>
    <select name="type_id">
        <?php foreach ($product as $prod): ?>
            <option value="<?= $prod['id'] ?>"><?= $prod['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Описание товара</label>
    <textarea name="description"></textarea>
    <label>Цена товара</label>
    <input type="text" name="price">
    <label>Количество товара</label>
    <input type="number" name="count">
    <input type="submit">
</form>
