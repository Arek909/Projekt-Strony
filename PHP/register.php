<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <h2>Rejestracja</h2>
    <<form action="sendregisterdata.php" method="post">
        <label>Login: </label>
        <input type="text" name="login" placeholder="Login" required>

        <label>Hasło: </label>
        <input type="password" name="haslo" placeholder="Hasło" required>

        <label>Imię: </label>
        <input type="text" name="imie" placeholder="Imię" required>

        <label>Nazwisko: </label>
        <input type="text" name="nazwisko" placeholder="Nazwisko" required>

        <label>Numer prawa jazdy: </label>
        <input type="text" name="nr_prawajazdy" placeholder="Numer prawa jazdy" required>
    
      
        <button type="submit">Zarejestruj</button>
    </form>
</body>
</html>
