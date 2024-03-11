<?php
// Sprawdzenie, czy formularz został przesłany
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Nawiązanie połączenia z bazą danych
          include "db_conn.php"; // Zaimportowanie pliku db_conn.php

          // Funkcja do oczyszczania danych
          function validate($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }
        // Pobranie i oczyszczenie danych z formularza
        $login = validate($_POST["login"]);
        $haslo = validate($_POST["haslo"]);
        $imie = validate($_POST["imie"]);
        $nazwisko = validate($_POST["nazwisko"]);
        $nr_prawajazdy = validate($_POST["nr_prawajazdy"]);
        
        // Znalezienie maksymalnego numeru id_user w tabeli
        $sql_max_id = "SELECT MAX(id_user) AS max_id FROM logindb";
        $result_max_id = mysqli_query($conn, $sql_max_id);
        $row_max_id = mysqli_fetch_assoc($result_max_id);
        $max_id_user = $row_max_id['max_id'];
        
        $next_id_user = $max_id_user + 1;
        // Zapisanie danych do bazy danych
        $sql = "INSERT INTO logindb (id_user, login, haslo, imie, nazwisko, nr_prawajazdy) VALUES ('$next_id_user','$login', '$haslo', '$imie', '$nazwisko', '$nr_prawajazdy')";
        if (mysqli_query($conn, $sql)) {
            // Jeśli zapis do bazy danych powiódł się, wyświetl komunikat
            echo "Rejestracja zakończona pomyślnie!";
        } else {
            // Jeśli wystąpił błąd podczas zapisu do bazy danych, wyświetl komunikat o błędzie
            echo "Błąd podczas rejestracji: " . mysqli_error($conn);
        }

        // Zamknięcie połączenia z bazą danych
        mysqli_close($conn);
    }
?>