<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje dokumenty</title>
</head>
<body>
    <?php
    echo "<h1>Twoje dokumenty:</h1>"; // Wyświetlenie nagłówka "Twoje dokumenty"
    ?>
    <!-- Formularz przekierowujący użytkownika do panelu głównego -->
    <form action="wypozyczalnia_hub.php" method="post">
        <h2>Wróć</h2> <!-- Nagłówek "Wróć" -->
        <button type="submit"><---</button></br> <!-- Przycisk "Wróć" -->
    </form>
</body>
</html>
