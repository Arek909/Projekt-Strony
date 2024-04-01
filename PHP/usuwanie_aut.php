<?php
session_start();
include "database.php";
if(isset($_POST['cars'])) { // Sprawdzenie, czy formularz został wysłany i czy wybrane zostały samochody
    foreach($_POST['cars'] as $id_car) { // Iteracja przez wybrane samochody
        $sql = "DELETE FROM cardb WHERE id_car = $id_car";
        $result = $conn->query($sql); // Wykonanie zapytania 
    }
}
header("Location: delate_car.php");
exit(); // Upewniamy się, że skrypt kończy działanie po przekierowaniu
?>