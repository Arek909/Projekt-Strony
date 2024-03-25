<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dziękujemy za złożenie zamówienia.</h1>
    <h2>Więcej informacji znajdziesz w zakładce "Twoje dokumenty"</h2>
    <br>
    <form action="user_docs.php" method="post"> <!-- Formularz przekierowujący do zakładki "Twoje dokumenty" -->
        <input type="submit" value="Twoje dokumenty.">
    </form>
    <br>
    <form action="" method="post"> <!-- Formularz wylogowania -->
        <input type="submit" name="logout" value="Wyloguj">
    </form>
</body>
</html>
<?php
include "logout_system.php"; // Wczytanie pliku obsługującego system wylogowywania

include "database.php"; // Wczytanie pliku z połączeniem do bazy danych


// Sprawdź, czy dane dotyczące samochodów zostały przesłane
if(isset($_POST['car_ids']) && is_array($_POST['car_ids'])) {
    // Wyświetl wybrane samochody
    echo "<h2>Wybrane samochody:</h2>";
    echo "<ul>";
    foreach($_POST['car_ids'] as $car_id) {
        echo "<li>Numer pojazdu: $car_id</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Nie wybrano żadnych samochodów.</p>";
}

// Sprawdź, czy data wypożyczenia została przesłana
if(isset($_POST['start_date'])) {
    $start_date = $_POST['start_date'];
    echo "<p>Data wypożyczenia: $start_date</p>";
}

// Sprawdź, czy data oddania została przesłana
if(isset($_POST['end_date'])) {
    $end_date = $_POST['end_date'];
    echo "<p>Data oddania: $end_date</p>";
}
?>



