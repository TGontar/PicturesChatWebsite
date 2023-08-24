<?php
setcookie('user', $user['name'], time() - 3600 * 24 * 7, "/");
setcookie('login', $user['login'], time() - 3600 * 24 * 7, "/");
setcookie('password', $user['password'], time() - 3600 * 24 * 7, "/");
setcookie('id', $user['id'], time() - 3600 * 24 * 7, "/");
header('Location: /')
?>