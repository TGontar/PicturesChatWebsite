<?php
$mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
$username = $_COOKIE['user'];
$message =addslashes(file_get_contents($_FILES['inputimg']['tmp_name']));
$id = $_COOKIE['id'];


$result = $mysql->query("INSERT INTO `messages` (`username`, `message`)
    VALUES('$username', '$message')
    ");


header('Location: /index.php');
?>

