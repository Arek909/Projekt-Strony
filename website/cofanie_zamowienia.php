<?php
include "database.php";

session_start(); // Rozpoczęcie sesji

// Sprawdzenie, czy zmienna $auto została ustawiona
if(isset($_SESSION['wybrane_samochody'])) {
    $auto = $_SESSION['wybrane_samochody']; 
    
    // Iteracja przez wartości w zmiennej $auto
    foreach($auto as $car) {
        $id_car = $car['id_car']; // Pobranie wartości id_car
        // Zaktualizowanie wartości kolumny dostepnosc na 1 dla danego id_car
        $update_sql = "UPDATE cardb SET dostepnosc = 1 WHERE id_car = $id_car";
        $conn->query($update_sql); // Wykonanie zapytania aktualizacji
    }
    
    // Komunikat o pomyślnym zaktualizowaniu wartości
    header("Location: wypozyczanie.php");
} else {
    // Komunikat o nieustawionej zmiennej $auto
    echo "Zmienna \$auto nie została ustawiona.";
}
?>

