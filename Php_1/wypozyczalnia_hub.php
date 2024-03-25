<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witaj w wypożyczalni!</title>
</head>
<body>
    <h1>WITAJ W WYPOŻYCZALNI!</h1> <!-- Nagłówek witający użytkownika -->

    <!-- Formularz przekierowujący użytkownika do panelu wypożyczania samochodu -->
    <form action="wypozyczanie.php" method="post">
        <h2>Panel użytkownika</h2> <!-- Nagłówek "Panel użytkownika" -->
        <button type="submit">Wypożycz auto</button></br> <!-- Przycisk "Wypożycz auto" -->
    </form>
    <br>

    <!-- Formularz przekierowujący użytkownika do strony z jego danymi osobowymi -->
    <form action="twoje_dane.php" method="post">
        <button type="submit">Twoje dane</button></br> <!-- Przycisk "Twoje dane" -->
    </form>
    <br>

    <!-- Formularz przekierowujący użytkownika do strony z jego dokumentami -->
    <form action="user_docs.php" method="post">
        <button type="submit">Twoje dokumenty</button></br> <!-- Przycisk "Twoje dokumenty" -->
    </form>
    <br>

    <!-- Formularz do wylogowania użytkownika -->
    <form action="" method="post">
        <input type="submit" name="logout" value="Wyloguj"> <!-- Przycisk "Wyloguj" -->
    </form>
</body>
</html>
