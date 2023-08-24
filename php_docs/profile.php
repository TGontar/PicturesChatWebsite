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
            <a class="p-2 text-dark" href="dialog.php">Диалоги</a><?php
        endif;
        ?> <a class="p-2 text-dark" href="about.php">Контакты</a>
    </nav>
        <a class="p-2 text-grey" href="profile.php">Профиль</a>
</div>




<div class="container">
    <center>
         <br>
        <?php
        $k = false;
        $mysql = new mysqli('localhost', 'o977550v_dem', 'Registerdb54', 'o977550v_dem');
        $id = $_COOKIE['id'];
        $query = $mysql->query("SELECT `img` FROM `users` WHERE `users`.`id` = '$id'");
        $row = $query -> fetch_assoc();
        $k = true;
            ?>
        <?php if ($k):
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width=200px height=200px/>';
        ?>
        <br>
         <br>
         <?php else: ?>
            <img src="img/1.jpg" alt="Беды с фоткой" width=200px height=200px>
        <br>
        <?php endif; ?>
         <form action="validation-form/ava.php" method="post" enctype="multipart/form-data">
         <input type="file" name="image">
             <button type="submit">Сменить аватарку</button>
         </form>
        <h3>Добро пожаловать, <?=$_COOKIE['user']?>!</h3>
    </center>
</div>
<br>
<form action="validation-form/change.php" method="post">
<div class="container">
    <p>Ваш логин: <input type="text" id="newlogin" name="newlogin" placeholder="Ваш логин" value="<?=$_COOKIE['login']?>"></p>
    <p>Ваш пароль: <input type="text" id = "newpassword" name="newpassword" placeholder="Ваш пароль" value="<?=$_COOKIE['password']?>"></p>
    <p>Ваше имя: <input type="text"  id="newname" name="newname" placeholder="Ваше имя" value="<?=$_COOKIE['user']?>"></p>
    <p><button type="submit" class="btn btn-default">Изменить</button>
</div>
</form>
<div class="container">
    <a href="validation-form/exit.php"><button type="button" class="btn btn-danger">Выйти</button></a>
</div>
</body>
</html>
