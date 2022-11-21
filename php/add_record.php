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

<---Валидация заголовка--->
$title = $_POST['title'];

if(mb_strlen($title) < 4 || mb_strlen($title)>50){
    echo("Недопустимая длина заголовка, минимум 4, максимум 50 символов");
    exit();
}

<---Валидация текста--->
$text = $_POST['text'];

if(mb_strlen($text) < 500 || mb_strlen($text)>5000){
    echo("Недопустимая длина текста, минимум 500, максимум 5000 символов");
    exit();
}

<---Добавление записи в БД--->
mysqli_query($mysqli, "INSERT INTO `records` (`title`, `text`, `author`) VALUES ('$title', '$text', '$_COOKIE[user]')");

$mysqli -> close();

echo("Регистрация прошла успешно!");

header('Location: /');

exit();

?>
