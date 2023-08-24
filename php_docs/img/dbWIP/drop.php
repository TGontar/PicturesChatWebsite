<?php
$dbConnected = mysqli_connect('localhost','root','');
if ($dbConnected) {
    $sql = "DROP DATABASE testdb";
    if(mysqli_query($dbConnected, $sql)) {
        echo "Database dropped successfuly";
    }
}
?>
