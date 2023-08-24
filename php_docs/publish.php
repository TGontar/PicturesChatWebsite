<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Проверка данных
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<?php
$mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
$username = $_COOKIE['user'];
$name = rand(1, 1000000000).".png";
$tmpname = $_FILES['inputimg']['tmp_name'];
$message = $name;
move_uploaded_file($tmpname, 'upload/'.$name);
$result = $mysql->query("INSERT INTO `messages` (`username`, `message`)
    VALUES('$username', '$message')
    ");
header('Location: /index.php');
?>
</body>
</html>
