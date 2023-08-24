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
    <script
            src="https://code.jquery.com/jquery-1.12.3.min.js"
            integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
            crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
<?php
$URL_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL = explode('/', trim($URL_path, ' /'));
$Page = array_shift($URL);
$login = $_COOKIE['login'];
if ($Page == 'message') include('message.php');
$userid = $_COOKIE['id'];
$CONNECT = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
$id = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM `dialog` WHERE `send` = '$userid' OR `recieve` = '$userid' ORDER BY `id` DESC"));

$Info = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `send`, `recieve` FROM `dialog` WHERE `id` = '$id[id]'"));
if (!in_array($userid, $Info)) echo 'Диалог не найден';

if ($Info['recieve'] == $userid) mysqli_query($CONNECT, "UPDATE `dialog` SET `status` = 1 WHERE `recieve` = '$userid'");
if ($Info['send'] == $userid) $Info['send'] = $Info['recieve'];
$User = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `id` = $Info[send]"));
echo "Диалог с ".$User['login'];


?>
<?php
$Query = mysqli_query($CONNECT, "SELECT * FROM `message` WHERE `did` = $id[id] ORDER BY `id` ASC");
while ($Row = mysqli_fetch_assoc($Query)) {
    if ($Row['user'] == $userid) $delete = '<a href="/control.php/message/id/'.$Row['id'].'">Удалить сообщение</a>';
    else $delete = '';



    $da = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `login` FROM `users` WHERE `id` = $Row[user]"));
    $img = base64_encode($Row['text']);
    echo '<br><div><span>'.$Row['date'].' от '.$da['login'].$delete.'</span>:<br><img src="data:image/gif;base64, '.$img.'" alt ="беды с фоткой" width="300px" height="300px"></div>';

}
?>
<div class="container">
    <br>
    <form method="POST" action="/sendmessage.php" enctype="multipart/form-data">
    <input type="hidden" name="login" value="<?php echo $User['login']?>">
        <br><input type="file" name = "uploadimg">
        <br><input type="submit" name="enter" value="Отправить"> <input type="reset" value="Очистить">
    </form>
</div>
</body>
</html>