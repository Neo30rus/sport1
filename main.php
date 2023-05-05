<?php
require "functions.php";

session_start();
if (empty($_SESSION['user'])){
    header('Location: auth_form.php');
}
$list = getProducts();


?>

<a href="logout.php">Выход</a>
<a href="create_product.php">Создать продукт</a>
<a href="create_product_type.php">Создать тип продукта</a>
<a href="index.php">Выйти на сайт</a>
<div>
    <table>
        <tr>
            <th>#</th>
            <th>категория</th>
            <th>описание</th>
            <th>цена</th>
            <th>количество</th>
            <th>действие</th>

        </tr>
        <?php foreach ($list as $item) :?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
                <td><?=$item['description']?></td>
                <td><?=$item['price']?></td>
                <td><?=$item['count']?></td>
                <td><a href="product.php?product_id=<?=$item['id']?>">открыть</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>