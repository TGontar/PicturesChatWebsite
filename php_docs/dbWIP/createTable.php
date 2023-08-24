<?php

$dbConnected = mysqli_connect('localhost', 'root', '', 'testDB');
if ($dbConnected) {
    $sql = "CREATE TABLE testtable(
        number INT NOT NULL PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        surname VARCHAR(30) NOT NULL
        )
";
    if (mysqli_query($dbConnected, $sql)) {
        echo "Table created successfuly";
    }
}

?>