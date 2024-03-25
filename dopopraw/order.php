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
session_start(); // Rozpocznij sesję na początku każdej strony

// Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: login.php");
    exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
}
include "logout_system.php"; // Wczytanie pliku obsługującego system wylogowywania



    // Odbierz dane z formularza
    
    $data_wypozyczenia = $_POST['start_date'];
    $data_oddania = $_POST['end_date'];
    $cena_total = $_POST['cenatotal'];

    // Odczytaj login aktualnie zalogowanego użytkownika
    $login = $_SESSION['login'];

    // Połącz się z bazą danych
    include "database.php";

    $sql_user = "SELECT id_user, imie, nazwisko FROM logindb WHERE login = '$login'";
    $result_user = $conn->query($sql_user);
    
    if ($result_user->num_rows > 0) {
        $row_user = $result_user->fetch_assoc();
        $id_user = $row_user['id_user'];
        $imie = $row_user['imie'];
        $nazwisko = $row_user['nazwisko'];
    }
    
    $sql_max_id = "SELECT MAX(id_umowy) AS max_id FROM docsdb";
    $result_max_id = mysqli_query($conn, $sql_max_id);
    $row_max_id = mysqli_fetch_assoc($result_max_id);
    $max_id_umowy = $row_max_id['max_id'];

    $next_id_umowy = $max_id_umowy + 1; // Wygenerowanie kolejnego identyfikatora użytkownika

    // Zapytanie SQL dodające nowego użytkownika do bazy danych
    $sql_insert = "INSERT INTO docsdb (id_umowy, id_user, imie, nazwisko, data_wypozyczenia, data_oddania, cena_total) 
    VALUES ('$next_id_umowy', '$id_user', '$imie', '$nazwisko', '$data_wypozyczenia', '$data_oddania', '$cena_total')";
?>



