<?php
session_start();
include "database.php";
// Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
if (!isset( $_SESSION["login"]) && $admin_perm == 0) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.php");
    exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_car.php" method="post">
        <h1>Panel administratora</h1>
        <h2> Akcje: </h2>
        <button type="submit">Dodaj auto</button><br>
    </form>
    <form action="delate_car.php" method="post">   
        <button type="submit">Usuń auto</button><br>
    </form>
    <form action="logout_system.php" method="post">
        <input type='submit' name='logout' value='Wyloguj'>
    </form>
</body>
</html>