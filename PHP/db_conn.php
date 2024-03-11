<?php
// polaczenie z baza danych w PHP
$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "project";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
// Gdy wystapi blad wyswietl brak polaczenia
if (!$conn){
    echo "Brak połączenia z bazą danych";
}
