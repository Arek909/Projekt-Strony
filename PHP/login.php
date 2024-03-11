<?php
// import pliku db_php
include "db_conn.php";
    if (isset($_POST["id_user"]) && isset($_POST["haslo"])) {
        // funkcja wyczyszcza dane wejsciowe ze znakow specjalnych
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // pobranie danych z formularza przypisanie ich do zmiennej $id_user oraz $haslo
        $id_user = validate($_POST["id_user"]);
        $haslo = validate($_POST["haslo"]);
        // sprawdza czy urzytkownik nie podal pustego pola jesli tak wyswietla komunikat o pustym polu w linku
        if (empty($id_user) || empty($haslo)) {
            header("Location: index.php?error=emptyfields");
            exit();
        } else {
            // w przeciwnym razie wysylamy zapytanie do bazy sprawdza czy dane sie zgadzaja z baza danych logowania
            $sql = "SELECT * FROM logindb WHERE id_user= '$id_user' AND haslo='$haslo'"; 
            $result = mysqli_query($conn, $sql);
            // jesli tak wyswietla komunikat
            if (mysqli_num_rows($result)) {
                echo "Witamy w wypożyczalni";
            }
            // jesli nie wyswietla blad w linku
            else{
                header("Location: index.php?error=invalidLoginOrPassword");
            exit();
            }
        }
    } else {
        header("Location: index.php");
        exit();
    }
?>