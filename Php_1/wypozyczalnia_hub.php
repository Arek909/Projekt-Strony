<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h1>WITAJ W WYPOZYCZALNI!</h1>
    <form action="wypozyczanie.php" method="post">
        <h2>Panel użytkownika</h2>
        <button type="submit">Wypożycz auto</button><br>
    </form>
    <form action="twoje_dane.php" method="post">
        <button type="submit">Twoje dane</button><br>
    </form>
    <form action="user_docs.php" method="post">
        <button type="submit">Twoje dokumenty</button><br>
    </form>
    <form action="" method="post">
        <input type="submit" name="logout" value="Wyloguj">
    </form>
</body>
</html>
<?php
    
    session_start();
    include "logout_system.php";
?>