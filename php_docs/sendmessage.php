<?php
$CONNECT = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
function sendMessage($p1, $p2) {
    global $CONNECT;

    $p1 = FormChars($p1, 1);
    $imagetmp=addslashes(file_get_contents($p2['tmp_name']));
    $p2 = $imagetmp;
    $userid = $_COOKIE['id'];
    $ID = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `login` = '$p1' "));
    $ROW = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `id` from `dialog` WHERE `recieve` = '$ID[id]' AND `send` = '$userid' OR `recieve` = '$userid' AND `send` = '$ID[id]' "));
    if ($ROW) {
        $DID = $ROW['id'];
        mysqli_query($CONNECT, "UPDATE `dialog` SET `status` = 0, `send` = $userid, `recieve` = '$ID[id]' WHERE `id` = '$ROW[id]'");
    }
    else {
        mysqli_query($CONNECT, "INSERT INTO `dialog` (`status`, `send`, `recieve`)VALUES (0, $userid, $ID[id])");
        $DID = mysqli_insert_id($CONNECT);
    }
    mysqli_query($CONNECT, "INSERT INTO `message` (`did`, `user`, `text`, `date`) VALUES ($DID, $userid, '$p2', NOW())");
}
function FormChars ($a, $b = 0) {
    global $CONNECT;
    return mysqli_real_escape_string($CONNECT, $a);

}
if ($_POST['enter'] and $_FILES['uploadimg'] and $_POST['login']) {
    sendMessage($_POST['login'], $_FILES['uploadimg']);
}
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;

?>
