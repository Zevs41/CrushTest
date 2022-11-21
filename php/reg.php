<script src="js/main.js"></script>

<---Подключение к БД--->
<?php

$dbHost = "localhost";
$user = "root";
$pass = "root";
$dbName = "mydb";
$mysqli = mysqli_connect($dbHost, $user, $pass, $dbName);
if ($mysqli == false) {
    echo ("Ошибка подключения к БД");
}

<---Валидация логина--->
$login = $_POST['login'];

if(mb_strlen($login) < 6 || mb_strlen($login)>20){
    echo("Недопустимая длина логина, минимум 6, максимум 20 символов");
    exit();
}

<---Валидация пароля--->
$pass = $_POST['pass'];

if(mb_strlen($pass) < 6 || mb_strlen($pass)>20){
    echo("Недопустимая длина пароля, минимум 6, максимум 20 символов");
    exit();
}

<---Выбор из БД всех пользователей с таким логином--->
$result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `name` = '$login'");

$user = mysqli_fetch_assoc($result);

if(count($user) > 0){
    echo("Пользователь с таким логином уже есть!");
    exit();
}

$pass = md5($pass);

<---Добавление в БД пользователя с таким логином и паролем--->
mysqli_query($mysqli, "INSERT INTO `users` (`name`, `password`) VALUES ('$login', '$pass')");

$mysqli -> close();

header('Location: /');

exit();

?>
