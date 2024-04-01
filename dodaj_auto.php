<?php
session_start();
include "database.php";

$marka = $_POST["marka"];
$model = $_POST["model"];
$typ_nadwozia = $_POST["typ_nadwozia"];
$rocznik = $_POST["rocznik"];
$cena = $_POST["cena"];
$dostepnosc = 1;

// Znalezienie maksymalnego numeru id_user w tabeli
$sql_max_id = "SELECT MAX(id_car) AS max_id FROM cardb";
$result_max_id = mysqli_query($conn, $sql_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id_car = $row_max_id['max_id'];

$next_id_car = $max_id_car + 1;

$sql = "INSERT INTO cardb (id_car, marka, model, typ_nadwozia, rocznik, cena, dostepnosc) 
VALUES ('$next_id_car',
        '$marka',
        '$model',
        '$typ_nadwozia',
        '$rocznik',
        '$cena',
        '$dostepnosc')";



if (mysqli_query($conn, $sql)){
    header("Location: add_car.php");
}
else{
    echo"Błąd podczas usuwania";
}
exit();
?>