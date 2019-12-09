<?php
//https://www.php.net/manual/tr/function.mysqli-connect.php
$link = mysqli_connect("localhost", "root", "root", "mysql");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>