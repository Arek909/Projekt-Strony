<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Rejestracja:</h1>
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
