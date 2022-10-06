<?php
$dbHost = "localhost";
$user = "root";
$pass = "root";
$dbName = "mydb";
$mysqli = mysqli_connect($dbHost, $user, $pass, $dbName);
if ($mysqli == false) {
    echo ("Ошибка подключения к БД");
}

$result = mysqli_query($mysqli, "SELECT * FROM `records` WHERE `importance` > 1");
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
                    <a data-fancybox data-src="#modal_about" href="javascript:;" class="header_btn" href="#">О создателе</a>
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
                            <li><a onclick="scrollToRecords()">Записи</a></li>
                            <li><a onclick="scrollToNews()">Новости</a></li>
                            <?php if ($_COOKIE['user'] == '') : ?>
                                <li><a data-fancybox data-src="#modal_auth" href="javascript:;">Войти</a></li>
                            <?php else : ?>
                                <li><a data-fancybox data-src="#modal_leave" href="javascript:;">Выйти</a></li>
                            <?php endif ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section class="slider">
        <div class="container">
            <div class="slider_inner">
                <div class="slider_item">
                    <div class="slider_item-content">
                        <div class="slider_item-content-inner">
                            <div class="slider_title">
                                Оценка состояния.
                            </div>
                            <div class="slider_text">
                                Введите свои данные, чтобы узнать состояние вашего организма.
                            </div>
                            <a data-fancybox data-src="#modal_ibm" href="javascript:;" class="slider_btn default_btn">
                                Ввести.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="slider_item">
                    <div class="slider_item-content">
                        <div class="slider_item-content-inner">
                            <div class="slider_title">
                                Предложить запись.
                            </div>
                            <div class="slider_text">
                                Вы можете предложить опубликовать свою историю тренировок, как вы питались, какие
                                упражнения
                                делали, с какими трудностями столкнулись и к чему это привело.
                                Для этого нужно авторизоваться.
                            </div>
                            <?php if ($_COOKIE['user'] == '') : ?>
                                <a data-fancybox data-src="#modal_auth" href="javascript:;" class="slider_btn default_btn">
                                    Авторизоваться.
                                </a>
                            <?php else : ?>
                                <a data-fancybox data-src="#modal_add_record" href="javascript:;" class="slider_btn default_btn">
                                    Предложить.
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <div class="services_btn">
                    <a href="records.php">
                        Все записи.
                    </a>
                </div>
            </div>
            <div class="services_items">
                <?php while ($records = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="services_item">
                        <div class="services_item_title">
                            <?php echo $records['title']; ?>
                        </div>
                        <div class="services_item_text">
                            <?php echo mb_strimwidth($records['text'], 0, 200, "..."); ?>
                        </div>
                        <button onclick="document.location='records.php'" class="services_item_btn">
                            Подробнее
                        </button>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <section id="news" class="news">
        <div class="container">
            <div class="news_top">
                <div class="news_title_box">
                    <div class="news_title">
                        Новости
                    </div>
                    <div class="news_text">
                        Новости о сайте.
                    </div>
                </div>
            </div>
            <div class="news_inner">
                <div class="news_slider">
                    <div class="news_slider_inner">
                        <div class="news_slider_item">
                            <div class="news_slider_item_title">
                                Изучение JS + React
                            </div>
                            <div class="news_slider_item_text">
                                В настоящее время, создатель сайта обучается разработке на React,
                                чтобы улучшить сайт и очень рассчитывает на вашу поддержку.
                            </div>
                        </div>
                        <div class="news_slider_item">
                            <div class="news_slider_item_title">
                                Изучение JS + React
                            </div>
                            <div class="news_slider_item_text">
                                В настоящее время, создатель сайта обучается разработке на React,
                                чтобы улучшить сайт и очень рассчитывает на вашу поддержку.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news_blog">
                    <div class="news_images">
                        <img src="img/news_1.jpg" alt="">
                        <div class="news_date">
                            30.05
                        </div>
                        <div class="news_blog_title">
                            Открытие
                        </div>
                        <div class="news_blog_text">
                            Сегодня 30.05 сайт был опубликован в открытый доступ.
                        </div>
                    </div>
                </div>
                <div class="news_blog">
                    <div class="news_images">
                        <img src="img/news_2.jpg" alt="">
                        <div class="news_date">
                            01.06
                        </div>
                        <div class="news_blog_title">
                            Первая предложенная запись
                        </div>
                        <div class="news_blog_text">
                            Впервые мне пришла обратная связь от вас. Евгений Тараскин написал
                            о своём опыте тренировок в зале, его мысли вы можете увидеть на первом
                            слайде раздела "Записи".
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require "footer.html";
    ?>

    <div id="modal_ibm">
        <form>
            <input id="height" type="text" placeholder="Введите рост в СМ">
            <input id="weight" type="text" placeholder="Введите вес в КГ">
            <button onclick="calculateBmi();" class="services_item_btn ibm">
                Узнать
            </button>
        </form>
    </div>

    <?php
    require "modals.html";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>