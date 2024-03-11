<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <!-- logowanie  -->
        <h2>Logowanie</h2>
        <label>Nazwa użytkownika: </label>
        <input type="text" name="id_user" placeholder="login">

        <label>Hasło: </label>
        <input type="text" name="haslo" placeholder="haslo">

        <button type="submit">Zaloguj</button></br>
    </form>
         <!-- Przycisk do rejestracji -->
    <form action="register.php" method="post">
        <label>Nie masz jeszcze konta? </label>

        <button type="submit">Zarejestruj sie</button></br>
    </form>
</body>
</html>