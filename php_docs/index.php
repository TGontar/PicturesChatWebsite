<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Главная
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
        <a class="p-2 text-grey" href="index.php">Главная</a>
        <?php
        error_reporting(0);
        if (@$_COOKIE['user'] != ''):
        ?>
        <a class="p-2 text-dark" href="dialog.php">Диалоги</a><?php
        endif;
        ?> <a class="p-2 text-dark" href="about.php">Контакты</a>
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
    <?php
    if (@$_COOKIE['user'] == ''):
    ?>
        <h2><a href="signin.php">Войдите</a> или <a href="signup.php">зарегистрируйтесь</a>, чтобы просматривать контент</h2>

    <?php
    else:
    ?>

        <?php
        $URL_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $URL = explode('/', trim($URL_path), '/');
        $Page = array_shift($URL);
        if ($Page == 'message') include('message.php');
    $CONNECT = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');


    ?>
    <h1>Добро пожаловать, <?=$_COOKIE['user']?>, в Марюсчат</h1><br><br>
    <a href="/dialog.php">МОИ ДИАЛОГИ</a><br><br><br>

    <form method = "POST" action="sendmessage.php"  enctype="multipart/form-data">
        <input type="text" name="login" placeholder="Логин получателя" required>
        <br><input type="file" name = "uploadimg">
        <br><input type="submit" name="enter" value="Отправить"> <input type="reset" value="Очистить">
    </form>
</div>
<?php
endif;
?>

</body>
</html>