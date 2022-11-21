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

<---Запрос на выбор всех записей с выжностью больше 0 из БД--->
$result = mysqli_query($mysqli, "SELECT * FROM `records` WHERE `importance` > 0");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrushTest</title>
    <link rel="icon" href="img/logo.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <header class="header">
        <div class="header_top">
            <div class="container">
                <div class="header_contacts">
                    <a class="header_gmail" href="mailto:zeus21032003@gmail.com">zeus21032003@gmail.com</a>
                    <a data-fancybox data-src="#modal" href="javascript:;" class="header_btn" href="#">О создателе</a>
                </div>
            </div>
        </div>
        <div class="header_content">
            <div class="container">
                <div class="header_content-inner">
                    <div class="header_logo">
                        <a href="index.php">
                            <img src="img/logo.png" alt="">
                        </a>
                        <div class="logo_text">
                            Crush test yourself
                        </div>
                    </div>
                    <nav class="menu">
                        <div class="header_btn_menu">
                            <span class="icon-bars"></span>
                        </div>
                        <ul>
                            <?php if ($_COOKIE['user'] == '') : ?>
                                <li><a data-fancybox data-src="#modal3" href="javascript:;">Войти</a></li>
                            <?php else : ?>
                                <li><a data-fancybox data-src="#modal5" href="javascript:;">Выйти</a></li>
                            <?php endif ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section id="records" class="services">
        <div class="container">
            <div class="services_top">
                <div class="services_title_box">
                    <div class="services_title">
                        Записи
                    </div>
                    <div class="services_text">
                        Здесь публикуются записи реальных людей.
                    </div>
                </div>
            </div>
            <div class="services_items_record">
                <---Вывод записей из БД--->
                <?php while ($records = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="services_item_record">
                        <div class="services_item_title_record">
                            <?php echo $records['title']; ?>
                        </div>
                        <div class="services_item_text_record">
                            <?php echo $records['text']; ?>
                        </div>
                        <div class="services_item_author_record">
                            <?php echo $records['author']; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    
    <---Подключение футера--->
    <?php
    require "footer.html";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>

</body>
<---Подключение модальных окон--->
<?php
require "modals.html";
?>

</html>
