<?php

$dbHost = "localhost";
$user = "root";
$pass = "root";
$dbName = "mydb";
$mysqli = mysqli_connect($dbHost, $user, $pass, $dbName);
if ($mysqli == false) {
    echo ("Ошибка подключения к БД");
}

$login = $_POST['login'];

if(mb_strlen($login) < 6 || mb_strlen($login)>20){
    echo("Недопустимая длина логина, минимум 6, максимум 20 символов");
    exit();
}

$pass = $_POST['pass'];

if(mb_strlen($pass) < 6 || mb_strlen($pass)>20){
    echo("Недопустимая длина пароля, минимум 6, максимум 20 символов");
    exit();
}

echo($login);

echo($pass);

$pass = md5($pass);

$result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `name` = '$login' AND `password`= '$pass'");

$user = mysqli_fetch_assoc($result);

if(count($user) == 0){
    echo("Пользователь не найден!");
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysqli -> close();

echo("Добро пожаловать!" + $login);

header('Location: /');

exit();

?>