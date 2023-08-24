<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Профиль
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
            <a class="p-2 text-grey" href="dialog.php">Диалоги</a><?php
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

<h1>Диалоги</h1><br>
<?php
    $CONNECT = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
    $userid = $_COOKIE['id'];
    $login = $_COOKIE['login'];
    $Count = mysqli_fetch_row(mysqli_query($CONNECT,  "SELECT COUNT(`id`) FROM `dialog` WHERE `send` = $userid OR `recieve` = $userid"));
    $Result = mysqli_query($CONNECT, "SELECT * FROM `dialog` WHERE `send` = '$userid' OR `recieve` = '$userid' ORDER BY `id` DESC");

    $Count = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT COUNT(`id`) FROM `dialog` WHERE `send` = '$userid' OR `recieve` = '$userid'"));
    if (!$Count) {
        echo "'У вас нет диалогов '.<br><a href='index.php'></a>";
    }

while ($Row = mysqli_fetch_assoc($Result)) {
        if ($Row['status']) $status = 'Прочитано';
        else $status = 'Не прочитано';

        if ($Row['send'] == $userid) $delete = '<a href="control.php/dialog/id/'.$Row['id'].'">Удалить диалог</a>';
        else $delete = '';

        if ($Row['recieve'] == $userid) $Row['recieve'] = $Row['send'];
        $User = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `id` = $Row[recieve]"));
        echo '<div><b><span>'.$status.$delete.' </b></span><a href="message.php/id/'.$Row['id'].'">Диалог с '.$User['login'].'</a></div>';
    }
    mysqli_query($CONNECT, "UPDATE `dialog` SET `status` = 1 WHERE `uid` = '$userid' AND `status` =0");
    ?>





</body>
</html>