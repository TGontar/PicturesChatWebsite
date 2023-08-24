<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Войти
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
        <a class="p-2 text-dark" href="about.php">Контакты</a>
    </nav>
    <a class="btn btn-primary" href="signin.php">Войти</a>
</div>


<div class="container mt-4" align="center">
    <link rel="stylesheet" href="css/style.css">
    <h1>Вход</h1>
    <form action="validation-form/auth.php" method="post">
        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
        <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
        <button class="btn btn-success" type="submit">Войти</button>
    </form>
</div>
<div class="container">
    <center>
        Нет акккаунта? <a href="signup.php"> Зарегистрируйтесь </a>
    </center>
</div>


</body>
</html>