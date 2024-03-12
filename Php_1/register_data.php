<?php

include "database.php";

$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$nr_prawajazdy = $_POST["nr_prawajazdy"];
$login = $_POST["login"];
$haslo = $_POST["haslo"];
$i = 0;


// Znalezienie maksymalnego numeru id_user w tabeli
$sql_max_id = "SELECT MAX(id_user) AS max_id FROM logindb";
$result_max_id = mysqli_query($conn, $sql_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id_user = $row_max_id['max_id'];

$next_id_user = $max_id_user + 1;

$sql = "INSERT INTO logindb (id_user, login, haslo, imie, nazwisko, nr_prawajazdy) 
VALUES ('$next_id_user',
        '$login',
        '$haslo',
        '$imie',
        '$nazwisko',
        '$nr_prawajazdy')";


if (mysqli_query($conn, $sql)){
    header("Location: registration_notice.php");
    }
else{
    echo"Błąd podczas rejestracji";
    exit();
}

?>