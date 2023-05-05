<?php
require 'functions.php';
$product_id = $_GET['product_id'];
session_start();
if (empty($_SESSION['user'])){
    header('Location: auth_form.php');
}
if (empty($product_id)){
    echo 'продукт не найден'; die();
}
$product = getProductsById($product_id);


?>


<!--<div>-->
<!--    <p>--><?//=$product['name']?><!--</p>-->
<!--    <h6>--><?//=$product['description']?><!--</h6>-->
<!--    <b>--><?//=$product['price']?><!--</b>-->
<!--    <i>--><?//=$product['count']?><!--</i>-->
<!---->
<!---->
<!--</div>-->

<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEERMAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="product_style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">Sport Petrovich</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Главная </a>
            </li>
        </ul>
    </div>
</nav>

<div class="wrapper mt-5 product-item mb-5">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h1><?=$product['name']?><?=$product['alc']?> <?=$product['type']?></h1>
            </div>

            <div class="col-sm-4">
                <div class="product-item-thumb d-flex justify-content-center">
                    <img src="https://pngimg.com/uploads/basketball/basketball_PNG102505.png" "
                         alt="">
                </div>

            </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-price">
                            <?=$product['price']?> РУБЛЕЙ
                            <span class="item-status">
                                    <i class="fas fa-check text-success"></i> В наличии  ( <?=$product['count']?> шт )
                                </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form class="form-inline">
                            <div class="input-group">
                                <input  value="1" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <hr>


                <div class="card-desc">
                    <p> <?=$product['description']?></p>
                </div>

            </div>


        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>