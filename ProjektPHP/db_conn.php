<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "logindb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn){
    echo "Brak połączenia z bazą danych";
}
