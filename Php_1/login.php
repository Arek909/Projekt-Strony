<?php
session_start();
include "database.php";

$login = $_POST["login"];
$haslo = $_POST["haslo"];

if(empty($login) || empty($haslo)){
    echo "<strong>Uzupełnij brakujące dane logowania!</strong>";
} else {
    $sql = "SELECT * FROM logindb WHERE login = '$login' AND haslo = '$haslo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["login"] = $login;
        header("Location: wypozyczalnia_hub.php");
        exit();
    } else {
        echo "<strong>Podano błędne hasło</strong>";
        exit();
    }
}
?>
