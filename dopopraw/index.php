<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post"> <!-- Formularz logowania wysyłający dane do pliku login.php -->
        <h1>Wypożyczalnia aut</h1>
        <h2>Panel logowania:</h2>
        <label>Login:</label>
        <input type="text" name="login" placeholder="Login lub adres e-mail." required> <!-- Pole do wprowadzenia loginu -->
        <br>
        <label>Hasło:</label>
        <input type="password" name="haslo" placeholder="Hasło logowania." required> <!-- Pole do wprowadzenia hasła -->
        <br>
        <button type="submit">Zaloguj się!</button><br> <!-- Przycisk do zatwierdzenia danych logowania -->
    </form>    

    <form action="register.php" method="post"> <!-- Formularz rejestracji wysyłający dane do pliku register.php -->
        <h2>Zarejestruj się!</h2>
        <label>Nie masz jeszcze konta? </label><br>
        <button type="submit">Załóż konto!</button> <!-- Przycisk przenoszący do formularza rejestracji -->
    </form>
</body>
</html>
