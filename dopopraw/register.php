<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <h1>Rejestracja:</h1>
    <?php
    // Rozpoczęcie sesji
    session_start();

    // Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
        header("Location: login.php");
        exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
    }

    // Sprawdzenie, czy istnieje sesja z komunikatem o zajętej nazwie użytkownika lub numerze prawa jazdy
    if (isset($_SESSION['username_taken']) && isset($_SESSION ['nr_prawajazdy_taken'])) {
        // Wyświetlenie komunikatu o zajętej nazwie użytkownika i numerze prawa jazdy
        echo "<p style='color: red;'>Nazwa użytkownika i numer prawajazdy są już zajęte.</p>";
        // Usunięcie sesji z komunikatem po wyświetleniu
        unset($_SESSION['username_taken']);
        unset($_SESSION['nr_prawajazdy_taken']);
    } elseif (isset($_SESSION['username_taken'])) {
        // Wyświetlenie komunikatu o zajętej nazwie użytkownika
        echo "<p style='color: red;'>Nazwa użytkownika jest już zajęta.</p>";
        // Usunięcie sesji z komunikatem po wyświetleniu
        unset($_SESSION['username_taken']);
    } elseif (isset($_SESSION['nr_prawajazdy_taken'])) {
        // Wyświetlenie komunikatu o zajętym numerze prawa jazdy
        echo "<p style='color: red;'>Numer prawa jazdy jest już zajęty.</p>";
        // Usunięcie sesji z komunikatem po wyświetleniu
        unset($_SESSION['nr_prawajazdy_taken']);
    } elseif (isset($_SESSION['wrong_number_value'])) {
        // Wyświetlenie komunikatu o nieprawidłowym numerze prawa jazdy
        echo "<p style='color: red;'>Nieprawidłowy numer prawa jazdy.</p>";
        // Usunięcie sesji z komunikatem po wyświetleniu
        unset($_SESSION['wrong_number_value']);
    } elseif (isset($_SESSION['birthdate'])) {
        // Wyświetlenie komunikatu o zbyt młodym wieku użytkownika
        echo "<p style='color: red;'>Niestety jesteś niepełnoletni.</p>";
        // Usunięcie sesji z komunikatem po wyświetleniu
        unset($_SESSION['birthdate']);
    }
    ?>
    <!-- Formularz rejestracji -->
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
        
        <label>Data urodzenia: </label>
        <input type="date" name="data_urodzenia" required><br>
        
        <label>Login lub adres e-mail: </label>
        <input type="text" name="login" placeholder="Login lub adres e-mail:" required><br>

        <label>Hasło: </label>
        <input type="password" name="haslo" placeholder="Hasło" required><br>

        <button type="submit">Zarejestruj</button>
    </form>
</body>
</html>
