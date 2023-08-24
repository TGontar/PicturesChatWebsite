<?php
$newlogin = filter_var(trim($_POST['newlogin']), FILTER_SANITIZE_STRING);
$newname = filter_var(trim($_POST['newname']), FILTER_SANITIZE_STRING);
$newpassword = filter_var(trim($_POST['newpassword']), FILTER_SANITIZE_STRING);


$mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
$id = $_COOKIE['id'];
$mysql->query("UPDATE `users` SET `login` = '$newlogin' WHERE `users`.`id` = '$id'");
$mysql->query("UPDATE `users` SET `name` = '$newname' WHERE `users`.`id` = '$id'");
$mysql->query("UPDATE `users` SET `password` = '$newpassword' WHERE `users`.`id` = '$id'");




$mysql->close();

header('Location: /signin.php');
?>