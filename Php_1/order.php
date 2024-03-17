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
    <form action="user_docs.php" method="post">
        <input type="submit" value="Twoje dokumenty.">
    </form>
    <br>
    <form action="" method="post">
        <input type="submit" name="logout" value="Wyloguj">
    </form>
</body>
</html>
<?php
include "logout_system.php";
?>