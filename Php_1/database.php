<?php

$db_server = "localhost"; // Adres serwera bazy danych
$db_user = "root"; // Nazwa użytkownika bazy danych
$db_password = ""; // Hasło użytkownika bazy danych
$db_name = "project"; // Nazwa bazy danych
$conn = ""; // Zmienna przechowująca połączenie

// Nawiązanie połączenia z bazą danych
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

// Sprawdzenie, czy połączenie zostało pomyślnie ustanowione
if (!$conn) {
    echo "BRAK połączenia z bazą danych"; // Wyświetlenie komunikatu o braku połączenia
}
?>
