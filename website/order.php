<?php
session_start(); // Rozpoczęcie sesji
include "database.php"; // Wczytanie pliku z połączeniem do bazy danych

if(isset($_SESSION['wybrane_samochody'])) {
    // Pobranie danych z sesji
    $wybrane_samochody = $_SESSION['wybrane_samochody'];
    $start_date = $_SESSION['start_date']; // Pobranie daty wypożyczenia z sesji
    $end_date = $_SESSION['end_date']; // Pobranie daty oddania z sesji
    $suma_cen = $_SESSION['suma_cen']; // Pobranie sumy cen z sesji

    // Zakładając, że istnieje mechanizm logowania i zapisywania ID użytkownika w sesji
    $id_user = $_SESSION['id_user']; // Zakładam, że ID użytkownika jest przechowywane w sesji
    $imie = $_SESSION['imie']; // Zakładam, że imię użytkownika jest przechowywane w sesji
    $nazwisko = $_SESSION['nazwisko']; // Zakładam, że nazwisko użytkownika jest przechowywane w sesji
    $suma_cen = $_SESSION['suma_cen'];

    // Pobranie maksymalnego id_umowy z bazy danych
    $sql_max_id = "SELECT MAX(id_umowy) AS max_id FROM docsdb";
    $result_max_id = $conn->query($sql_max_id);
    $row = $result_max_id->fetch_assoc();
    $max_id = $row["max_id"];
    $new_id = $max_id + 1;

    // Przygotowanie zapytania SQL do wstawienia danych zamówienia do tabeli
    $sql_insert = "INSERT INTO docsdb (id_umowy, id_car, id_user, data_oddania, data_wypozyczenia, imie, nazwisko, cena_total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Przygotowanie i wykonanie przygotowanego zapytania
    $stmt = $conn->prepare($sql_insert);

    foreach($wybrane_samochody as $samochod) {
        // Generowanie unikalnego identyfikatora umowy
        $id_umowy = $new_id;

        // Bindowanie parametrów
        $stmt->bind_param("siissssi", $id_umowy, $samochod['id_car'], $id_user, $end_date, $start_date, $imie, $nazwisko, $suma_cen);
        // Wykonanie zapytania
        $stmt->execute();

        // Zwiększenie wartości nowego id_umowy
        $new_id++;
    }

    // Zamknięcie połączenia
    $stmt->close();
    $conn->close();

    // Komunikat o złożeniu zamówienia
    echo "<h1>Dziękujemy za złożenie zamówienia.</h1>";
    echo "<h2>Więcej informacji znajdziesz w zakładce 'Twoje dokumenty'</h2>";
    echo "<br>";
    echo "<form action='user_docs.php' method='post'>";
    echo "<input type='submit' value='Twoje dokumenty.'>";
    echo "</form>";
    echo "<br>";
    echo "<form action='logout_system.php' method='post'>";
    echo "<input type='submit' name='logout' value='Wyloguj'>";
    echo "</form>";
} else {
    echo "<p>Nie wszystkie wymagane dane zostały przekazane.</p>";
}

?>
