<?php
require_once 'db.php';


function register($email, $password, $repeatPassword)
{
    if ($password != $repeatPassword) {
        return false;
    }
    $users = select('SELECT * FROM users WHERE email = :email', ['email' => $email]);
    if (!empty($users)) {
        return false;
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $user_id = insert("INSERT INTO users (email,password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => $hash,
    ]);
    return !empty($user_id);
}

function login($email, $password)
{
    $user = select('SELECT * FROM users WHERE email = :email', ['email' => $email]);
    if (!empty($user)) {
        return [
            'result' => password_verify($password, $user[0]['password']),
            'user' => $user[0]
        ];
    }
    return [
        'result' => false,
        'user' => null
    ];
}

function createProduct($type_id, $description, $price, $count)
{

    $product_id = insert("INSERT INTO catalog (type_id, description, price, count)
                            VALUES (:type_id, :description, :price,:count)",
        [
            'type_id' => $type_id,
            'description' => $description,
            'price' => $price,
            'count' => $count,
        ]
    );
    return isset($product_id);
}

function createMessage($message, $userId, $topicId)
{
    $message_id = insert("INSERT INTO messages (text, user_id, topic_id)
                            VALUES (:text, :user_id, :topic_id)",
        [
            'text' => $message,
            'user_id' => $userId,
            'topic_id' => $topicId,
        ]
    );
    return isset($message_id);
}

function createProductType($topicTitle)
{
    $topic_id = insert("INSERT INTO product_type (name) VALUES (:name)", [
        'name' => $topicTitle,
    ]);
    return isset($topic_id);
}

function getProductsType()
{
    $types = select('SELECT * FROM product_type');
    return $types;
}
function getProducts()
{
    $product = select('select c.id, pt.name, c.description, c.price, c.count  from catalog as c
left join product_type pt on pt.id = c.type_id
');
    return $product;
}
function getProductsById($product_id)
{
    $product = select('select c.id, pt.name, c.description, c.price, c.count  from catalog as c
left join product_type pt on pt.id = c.type_id where c.id = :id
',[
    'id' => $product_id
    ]);
    return $product[0];
}