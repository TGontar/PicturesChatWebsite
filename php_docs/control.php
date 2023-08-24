<?php
$CONNECT = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
$userid = $_COOKIE['id'];
$URL_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL = explode('/', trim($URL_path, ' /'));
$Page = array_shift($URL);
$actid = array_pop($URL);
echo $actid;
if ($Page == 'control') include ('control.php');
$type = array_shift($URL);
if ($type == 'dialog') {
    if (!mysqli_num_rows(mysqli_query($CONNECT, "SELECT `id` FROM `dialog` WHERE `id` = '$actid' AND `send` = '$userid'"))) echo $_COOKIE['user']." вы не можете удалить этот диалог";

    else {
        mysqli_query($CONNECT, "DELETE FROM `dialog`  WHERE `id` = '$actid'");
        mysqli_query($CONNECT, "DELETE FROM `message`  WHERE `id` = '$actid'");
        echo "Диалог удален";
    }


} else if ($type == 'message') {
    if (!mysqli_num_rows(mysqli_query($CONNECT, "SELECT `id` FROM `message` WHERE `id` = '$actid' AND `user` = '$userid'"))) echo $_COOKIE['name']."не можете удалить это сообщение";
    else {
        mysqli_query($CONNECT, "DELETE FROM `message`  WHERE `id` = '$actid'");
        echo "Сообщение удалено";
    }

}


header("Location: {$_SERVER['HTTP_REFERER']}");



?>