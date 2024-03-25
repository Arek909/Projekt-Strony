<?php
session_start(); // Rozpoczęcie sesji
include "database.php"; // Wczytanie pliku z połączeniem do bazy danych

$login = $_POST["login"]; // Pobranie wartości pola "login" z formularza logowania
$haslo = $_POST["haslo"]; // Pobranie wartości pola "haslo" z formularza logowania

if(empty($login) || empty($haslo)){ // Sprawdzenie, czy pola login i hasło nie są puste
    echo "<strong>Uzupełnij brakujące dane logowania!</strong>"; // Wyświetlenie komunikatu o braku uzupełnionych danych
} else {
    $sql = "SELECT * FROM logindb WHERE login = '$login' AND haslo = '$haslo'"; // Zapytanie SQL w celu sprawdzenia poprawności danych logowania
    $result = mysqli_query($conn, $sql); // Wykonanie zapytania na bazie danych

    if (mysqli_num_rows($result) > 0) { // Sprawdzenie, czy wynik zapytania zawiera co najmniej jeden wiersz
        // Jeśli dane logowania są poprawne, ustaw zmienną sesji logged_in na true i zapisz login użytkownika
        $_SESSION['logged_in'] = true;
        $_SESSION["login"] = $login; // Ustawienie zmiennej sesyjnej "login" na wartość podanego loginu
        header("Location: wypozyczalnia_hub.php"); // Przekierowanie użytkownika do strony wypożyczalni po poprawnym zalogowaniu
        exit(); // Zakończenie wykonywania skryptu
    } else {
        echo "<strong>Podano błędne hasło</strong>"; // Wyświetlenie komunikatu o podaniu błędnego hasła
        exit(); // Zakończenie wykonywania skryptu
    }
}
?>
