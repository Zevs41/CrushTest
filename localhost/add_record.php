<?php

$dbHost = "localhost";
$user = "root";
$pass = "root";
$dbName = "fish";
$mysqli = mysqli_connect($dbHost, $user, $pass, $dbName);
if ($mysqli == false) {
    echo ("Ошибка подключения к БД");
}

$title = $_POST['name'];

if(mb_strlen($title) < 2 || mb_strlen($title)>20){
    echo("Недопустимая длина имени, минимум 2, максимум 20 символов");
    exit();
}

$text = $_POST['text'];

if(mb_strlen($text) < 20 || mb_strlen($text)>500){
    echo("Недопустимая длина текста, минимум 20, максимум 500 символов");
    exit();
}

$author = $_POST['author'];

if(mb_strlen($text) < 10 || mb_strlen($text)>40){
    echo("Недопустимая длина текста, минимум 10, максимум 40 символов");
    exit();
}

mysqli_query($mysqli, "INSERT INTO `records` (`title`, `text`, `author`) VALUES ('$title', '$text', '$author')");

$mysqli -> close();

echo("Регистрация прошла успешно!");

header('Location: /');

exit();

?>