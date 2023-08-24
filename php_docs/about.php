<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Об авторе
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<!--ШАПКА САЙТА-->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h4 class="my-0 mr-md-auto font-weight-normal">Марюсчат</h4>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Главная</a>
        <?php
        error_reporting(0);
        if (@$_COOKIE['user'] != ''):
            ?>
            <a class="p-2 text-dark" href="dialog.php">Диалоги</a><?php
        endif;
        ?> <a class="p-2 text-grey" href="about.php">Контакты</a>
    </nav>
    <?php
    error_reporting(0);


    if (@$_COOKIE['user'] == ''):
        ?>
        <a class="btn btn-outline-primary" href="signin.php">Войти</a>
    <?php
    else:
        ?>
        <a class="p-2 text-dark" href="profile.php">Профиль</a>
    <?php
    endif;
    ?>
</div>

<div class="container">
    <h1>О Марюсчате</h1>
    <p>Марюсчат - уникальный проект, позволяющий пользлователям выражать свои мысли через
        картинки.<br />
        Преставляет собой социальную сеть, в которой пользователи вместо сообщений обмениваются изображениями,
        общаясь с помощью так называемых "демотиваторов" и "мемов".
    </p>
</div>
<br />
<div class="container">
    <h1>Об авторах</h1>
    <p>Создатель: Гонтарь Тимур Сергеевич</p>
</div>
<div class="container">
    <p>По вопросам сотрудничества писать timur21112004228@gmail.com</p>
</div>
<div class="container">
    <br>
    <video>
        <source src="https://www.youtube.com/watch?v=qz7Hs-p62wE">
    </video>
</div>
</body>
</html>