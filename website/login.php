<?php
session_start();
include "database.php";

$login = $_POST["login"];
$haslo = $_POST["haslo"];

if (empty($login) || empty($haslo)) {
    echo "<strong>Uzupełnij brakujące dane logowania!</strong>";
} else {
    $sql = "SELECT * FROM logindb WHERE login = '$login' AND haslo = '$haslo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $admin_perm = $row['admin_perm'];

        // Pobranie dodatkowych informacji o użytkowniku z bazy danych
        $id_user = $row['id_user'];
        $imie = $row['imie'];
        $nazwisko = $row['nazwisko'];

        // Zapisanie danych użytkownika do sesji
        $_SESSION["login"] = $login;
        $_SESSION["admin_perm"] = $admin_perm;
        $_SESSION["id_user"] = $id_user;
        $_SESSION["imie"] = $imie;
        $_SESSION["nazwisko"] = $nazwisko;
        $_SESSION["data_urodzenia"] = $data_urodzenia;

        if ($admin_perm == 0) {
            header("Location: wypozyczalnia_hub.php");
            exit();
        } else {
            header("Location: admin_hub.php");
            exit();
        }
    } else {
        echo "<strong>Podano błędne hasło</strong>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='submit' value='Zaloguj ponownie.'>"; 
        echo "</form>";
        exit();
    }
}
?>
