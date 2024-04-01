<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <h1>Wypożyczalnia aut</h1>
        <h2> Panel logowania: </h2>
        <label>Login: </label>
        <input type="text" name="login" placeholder="Login lub adres e-mail." required>
        <br>
        <label>Hasło: </label>
        <input type="password" name="haslo" placeholder="Hasło logowania." required>
        <br>
        <button type="submit">Zaloguj się!</button><br>
    </form>    

    <form action="register.php" method="post">
        <h2>Zarejestruj się!</h2>
        <label>Nie masz jeszcze konta? </label> <br>
        <button type="submit"> Załóż konto!</button>


    </form>
</body>
</html>

<?php
?>
