<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Rejestracja:</h1>
    <?php
    // Rozpocznij sesję
    session_start();

    // Sprawdź, czy istnieje sesja z komunikatem o zajętej nazwie użytkownika
    if (isset($_SESSION['username_taken']) && isset($_SESSION ['nr_prawajazdy_taken'])) {
        // Wyświetl komunikat o zajętej nazwie użytkownika i numerze prawa jazdy
        echo "<p style='color: red;'>Nazwa użytkownika i numer prawajazdy są już zajęte.</p>";
        // Usuń sesję z komunikatem po wyświetleniu
        unset($_SESSION['username_taken']);
        unset($_SESSION['$nr_prawajazdy_taken']);
    }elseif (isset($_SESSION['username_taken'])){
         // Wyświetl komunikat o zajętej nazwie użytkownika i numerze prawa jazdy
         echo "<p style='color: red;'>Nazwa użytkownika jest już zajęta.</p>";
         // Usuń sesję z komunikatem po wyświetleniu
         unset($_SESSION['username_taken']);
    }elseif (isset($_SESSION['nr_prawajazdy_taken'])){
        // Wyświetl komunikat o zajętej nazwie użytkownika i numerze prawa jazdy
        echo "<p style='color: red;'>Numer prawa jazdy jest już zajęty.</p>";
        // Usuń sesję z komunikatem po wyświetleniu
        unset($_SESSION['$nr_prawajazdy_taken']);
    }
    ?>
    <form action="index.php" method="post">
        <button type="submit"><- Cofnij</button>
    </form>
    <br>
    <form action="register_data.php" method="post">
        <label>Imię: </label>
        <input type="text" name="imie" placeholder="Imię" required><br>

        <label>Nazwisko: </label>
        <input type="text" name="nazwisko" placeholder="Nazwisko" required><br>

        <label>Numer prawa jazdy: </label>
        <input type="text" name="nr_prawajazdy" placeholder="Numer prawa jazdy" required><br>
        
        <label>Login lub adres e-mail: </label>
        <input type="text" name="login" placeholder="Login lub adres e-mail:" required><br>

        <label>Hasło: </label>
        <input type="password" name="haslo" placeholder="Hasło" required><br>

        
     <button type="submit">Zarejestruj</button>
    </form>
</body>
</html>
<?php




?>
