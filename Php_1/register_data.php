<?php

include "database.php"; // Wczytanie pliku z połączeniem do bazy danych

$imie = $_POST["imie"]; // Pobranie imienia użytkownika z formularza
$nazwisko = $_POST["nazwisko"]; // Pobranie nazwiska użytkownika z formularza
$nr_prawajazdy = $_POST["nr_prawajazdy"]; // Pobranie numeru prawa jazdy użytkownika z formularza
$data_urodzenia = $_POST["data_urodzenia"]; // Pobranie daty urodzenia użytkownika z formularza
$login = $_POST["login"]; // Pobranie loginu użytkownika z formularza
$haslo = $_POST["haslo"]; // Pobranie hasła użytkownika z formularza
$i = 0; // Inicjalizacja zmiennej pomocniczej

// Funkcja obliczająca wiek na podstawie daty urodzenia
function oblicz_wiek($data_urodzenia) {
    $dzisiaj = new DateTime(); // Pobranie dzisiejszej daty
    $urodzenie = new DateTime($data_urodzenia); // Konwersja daty urodzenia na obiekt DateTime
    $roznica = $dzisiaj->diff($urodzenie); // Obliczenie różnicy między datami
    return $roznica->y; // Zwrócenie liczby lat
}

// Sprawdzenie, czy użytkownik ma co najmniej 18 lat
if (oblicz_wiek($data_urodzenia) < 18) {
    // Ustawienie sesji informującej o zbyt młodym wieku użytkownika
    session_start();
    $_SESSION['birthdate'] = true;
    // Przekierowanie użytkownika z powrotem do formularza rejestracji
    header("Location: register.php");
    exit();
}

// Funkcja sprawdzająca, czy numer prawa jazdy składa się z samych cyfr
if (ctype_digit($nr_prawajazdy)) {
    // Numer prawa jazdy składa się z samych cyfr
} else {
    // Ustawienie sesji informującej o błędzie w numerze prawa jazdy
    session_start();
    $_SESSION['wrong_number_value'] = true;
    // Przekierowanie użytkownika z powrotem do formularza rejestracji
    header("Location: register.php");
    exit();
}

// Sprawdzenie, czy podany login nie jest już zajęty
$sgl_check_login = "SELECT * FROM logindb WHERE login = '$login'";
$result_check_login = mysqli_query($conn, $sgl_check_login);
if (mysqli_num_rows($result_check_login) > 0) {
    // Ustawienie sesji informującej o zajętości loginu
    session_start();
    $_SESSION['username_taken'] = true;
    // Przekierowanie użytkownika z powrotem do formularza rejestracji
    header("Location: register.php");
    exit();
}

// Sprawdzenie, czy numer prawa jazdy nie istnieje już w bazie danych
$sql_check_nr_prawajazdy = "SELECT * FROM logindb WHERE nr_prawajazdy = '$nr_prawajazdy'";
$result_check_nr_prawajazdy = mysqli_query($conn, $sql_check_nr_prawajazdy);
if (mysqli_num_rows($result_check_nr_prawajazdy) > 0) {
    // Ustawienie sesji informującej o zajętości numeru prawa jazdy
    session_start();
    $_SESSION['nr_prawajazdy_taken'] = true;
    // Przekierowanie użytkownika z powrotem do formularza rejestracji
    header("Location: register.php");
    exit();
}

// Znalezienie maksymalnego numeru id_user w tabeli
$sql_max_id = "SELECT MAX(id_user) AS max_id FROM logindb";
$result_max_id = mysqli_query($conn, $sql_max_id);
$row_max_id = mysqli_fetch_assoc($result_max_id);
$max_id_user = $row_max_id['max_id'];

$next_id_user = $max_id_user + 1; // Wygenerowanie kolejnego identyfikatora użytkownika

// Zapytanie SQL dodające nowego użytkownika do bazy danych
$sql = "INSERT INTO logindb (id_user, login, haslo, imie, nazwisko, nr_prawajazdy, data_urodzenia) 
VALUES ('$next_id_user',
        '$login',
        '$haslo',
        '$imie',
        '$nazwisko',
        '$nr_prawajazdy',
        '$data_urodzenia')";

// Wykonanie zapytania SQL do bazy danych
if (mysqli_query($conn, $sql)) {
    header("Location: registration_notice.php"); // Przekierowanie użytkownika do strony potwierdzenia rejestracji
} else {
    echo "Błąd podczas rejestracji"; // Wyświetlenie komunikatu o błędzie w przypadku niepowodzenia zapytania
    exit(); // Zakończenie działania skryptu
}
?>
