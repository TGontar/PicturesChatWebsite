<?php
$mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
//Получаем содержимое изображения и добавляем к нему слеш
$id = $_COOKIE['id'];
$imagetmp=addslashes(file_get_contents($_FILES['image']['tmp_name']));

//Вставляем имя изображения и содержимое изображения в image_table
$mysql->query("UPDATE `users` SET `img` = '$imagetmp' WHERE `users`.`id` = '$id'");

header('Location: /profile.php')
?>