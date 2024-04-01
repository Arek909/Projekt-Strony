<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WITAJ W WYPOZYCZALNI!</h1>
    <form action="wypozyczanie.php" method="post">
        <h2>Panel użytkownika</h2>
        <button type="submit">Wypożycz auto</button></br>
    </form>
    <br>
    <form action="twoje_dane.php" method="post">
        <button type="submit">Twoje dane</button></br>
    </form>
    <br>
    <form action="user_docs.php" method="post">
        <button type="submit">Twoje dokumenty</button></br>
    </form>
    <br>
    <form action="" method="post">
        <input type="submit" name="logout" value="Wyloguj">
    </form>
</body>
</html>
<?php
    
    session_start();
    include "logout_system.php";
?>
