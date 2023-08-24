<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


$mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');

$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();


if ($user == '') {
    echo "<div class='container'><h1>Такой пользователь отсутствует</h1>";
    echo "<br><a href='/signin.php'>Назад</a>";
    echo "<br><a href='/signup.php'>Зарегаться</a></div>";
    exit();
}
setcookie('user', $user['name'], time() + 3600 * 24 * 7, "/");
setcookie('login', $user['login'], time() + 3600 * 24 * 7, "/");
setcookie('password', $user['password'], time() + 3600 * 24 * 7, "/");
setcookie('id', $user['id'], time() + 3600 * 24 * 7, "/");


$mysql->close();

header('Location: /index.php');
exit;
?>

