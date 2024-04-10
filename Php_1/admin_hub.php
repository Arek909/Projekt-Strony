<?php
session_start();
include "database.php";

// Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
if (!isset($_SESSION["login"]) && $admin_perm == 0) {
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
    <title>Panel administratora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1, h2 {
            color: #333;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .btn-group {
            display: flex;
            flex-direction: row;
            gap: 10px;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .btn-red {
            background-color: #f44336;
        }

        .btn-blue {
            background-color: #008CBA;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 12px 20px;
            cursor: pointer;
        }

        .btn-blue:hover {
            background-color: #005f6b;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Panel administratora</h1>
        <div class="btn-group">
            <form action="add_car.php" method="post">
                <button type="submit">Dodaj auto</button>
            </form>
            <form action="delate_car.php" method="post">   
                <button type="submit">Usuń auto</button>
            </form>
        </div>
        <div class="btn-group">
            <form action="zmiana_ceny.php" method="post">
                <input type='submit' class="btn-blue" value='Zmień cenę'>
            </form>
            <form action="umowy.php" method="post">
                <input type='submit' class="btn-blue" value='Zawarte umowy'>
            </form>
        </div>
        <form action="logout_system.php" method="post">
            <button class="btn-red" type='submit' name='logout'>Wyloguj</button>
        </form>
    </div>
</body>
</html>


