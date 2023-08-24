<?php

$dbConnected = mysqli_connect('localhost', 'root', '', 'testDB');
if ($dbConnected) {
    $sql = "DROP TABLE testtable";
    if (mysqli_query($dbConnected, $sql)) {
        echo "Table dropped successfuly";
    }
}
?>