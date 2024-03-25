<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje dane</title>
</head>
<body>
<?php
// Rozpoczęcie sesji i wczytanie pliku z połączeniem do bazy danych
session_start();
include "database.php";

// Pobranie loginu użytkownika z sesji
$login = $_SESSION['login'];

// Zapytanie SQL pobierające dane użytkownika na podstawie loginu
$sql = "SELECT * FROM logindb WHERE login = '$login'";
$result = mysqli_query($conn, $sql);

// Sprawdzenie, czy wynik zapytania zawiera jakieś dane
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); // Pobranie danych użytkownika

    // Wyświetlenie danych użytkownika na stronie
    echo "<h1>Twoje dane:</h1>";
    echo "<p><strong>Użytkownik:</strong> " . $row['login'] . "</p>";
    echo "<p><strong>Imię:</strong> " . $row['imie'] . "</p>";
    echo "<p><strong>Nazwisko:</strong> " . $row['nazwisko'] . "</p>";
    echo "<p><strong>Data urodzenia:</strong> " . $row['data_urodzenia'] . "</p>";
    echo "<p><strong>Numer prawa jazdy:</strong> " . $row['nr_prawajazdy'] . "</p>";
} else {
    // Wyświetlenie komunikatu o braku danych użytkownika
    echo "Brak danych użytkownika.";
}
?>
    <!-- Formularz przekierowujący użytkownika do panelu głównego -->
    <form action="wypozyczalnia_hub.php" method="post">
        <h2>Wróć</h2>
        <button type="submit"><---</button></br>
    </form>
</body>
</html>

