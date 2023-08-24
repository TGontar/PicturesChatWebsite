<?php
$dbConnected = mysqli_connect('localhost','root','');
if ($dbConnected) {
    $sql = "CREATE DATABASE testdb";
    if(mysqli_query($dbConnected, $sql)) {
        echo "Database created successfuly";
    }
}
?>
