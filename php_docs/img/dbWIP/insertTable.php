<?php

$dbConnected = mysqli_connect('localhost', 'root', '', 'testDB');
if ($dbConnected) {
    for ($i = 1; $i <= 5; $i++) {
        $sql = "INSERT INTO testtable(number, name, surname)
        VALUES('$i', 'Maryus$i', 'Spangelis$i')";
        if (mysqli_query($dbConnected, $sql)) {
            echo "Table inserted successfuly<br>";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Изменение таблицы </title>
</head>
<body>
<table border="1">
    <tr>
        <td>number</td>
        <td>name</td>
        <td>surname</td>
    </tr>
<?php
$query = mysqli_query($dbConnected, "SELECT * FROM testtable");
$numrows = mysqli_num_rows($query);
$i = 0;
while($row = mysqli_fetch_assoc($query)) {
    $i++;
    echo '<tr><td>'.$row['number'].'</td><td>'.$row['name'].'</td><td> '.$row['surname'].'</td></tr>';
}
?>
</table>
</body>
</html>
