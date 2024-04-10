<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - Wypożyczalnia aut</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h1, h2 {
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        button[type="submit"] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <h1>Wypożyczalnia aut</h1>
        <h2>Panel logowania</h2>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" placeholder="Login lub adres e-mail" required>
        <br>
        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo" placeholder="Hasło logowania" required>
        <br>
        <button type="submit">Zaloguj się!</button>
    </form>    

    <form action="register.php" method="post">
        <h2>Zarejestruj się!</h2>
        <label for="register-info">Nie masz jeszcze konta?</label> <br>
        <button type="submit">Załóż konto!</button>
    </form>
</body>
</html>
