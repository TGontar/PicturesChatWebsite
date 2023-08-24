<?php
    error_reporting(0);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $img = addslashes(file_get_contents('https://eaassets-a.akamaihd.net/battlelog/prod/emblem/236/734/320/2955060602438839644.png?v=1393499026'));

    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "<div class='container'><h1>Недопустимая длина логина (нужно 5-90 символов)</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    } else if (mb_strlen($name) < 5 || mb_strlen($name) > 50) {
        echo "<div class='container'><h1>Недопустимая длина имени(нужно 3-50 символов)</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    } else if (mb_strlen($password) < 2 || mb_strlen($password) > 20) {
        echo "<div class='container'><h1>Недопустимая длина пароля (нужно 2-20 символов)</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    }

    $mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');

    $unique = $mysql->query("SELECT * FROM `users` WHERE `login`  = '$login'");
    $arrayunique = $unique->fetch_assoc();
    if (count($arrayunique) > 0) {
        echo "<div class='container'><h1>Такой логин уже существует. сделайте другой.</h1>";
        echo "<br><a href='/signup.php'>назад</a></div>";
        exit();
    } else {
        $mysql->query("INSERT INTO `users` (`login`, `password`, `name`, `img`)
    VALUES('$login', '$password', '$name', '$img')
    ");
    }

    $mysql->close();

    header('Location: /signin.php');
?>
