<?php

include "database.php";

$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$nr_prawajazdy = $_POST["nr_prawajazdy"];
$login = $_POST["login"];
$haslo = $_POST["haslo"];
$i = 0;

// sprawdz czy login lub mail nie jest zajety
$sgl_check_login = "SELECT * FROM logindb WHERE login = '$login'";
$result_check_login = mysqli_query($conn, $sgl_check_login);
if (mysqli_num_rows($result_check_login) > 0) {
    // jesli login lub mail sie powtarzaja ustaw sesje z komunikatem
    session_start();
    $_SESSION['username_taken'] = true;
    // Przekieruj użytkownika z powrotem do formularza rejestracji
    header("Location: register.php");
    exit();
}
// Sprawdź, czy numer prawa jazdy nie istnieje już w bazie danych
$sql_check_nr_prawajazdy = "SELECT * FROM logindb WHERE nr_prawajazdy = '$nr_prawajazdy'";
$result_check_nr_prawajazdy = mysqli_query($conn, $sql_check_nr_prawajazdy);
if (mysqli_num_rows($result_check_nr_prawajazdy) > 0) {
    // Jeśli numer prawa jazdy już istnieje, ustaw sesję z komunikatem
    session_start();
    $_SESSION['nr_prawajazdy_taken'] = true;
    // Przekieruj użytkownika z powrotem do formularza rejestracji
    header("Location: register.php");
    exit();
}

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