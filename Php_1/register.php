<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .back-button button {
            background-color: #e74c3c;
        }

        .back-button button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Rejestracja</h1>
    <form action="register_data.php" method="post">
        <label for="imie">Imię:</label>
        <input type="text" name="imie" id="imie" placeholder="Imię" required>

        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko" required>

        <label for="data_urodzenia">Data urodzenia (YYYY-MM-DD):</label>
        <input type="text" name="data_urodzenia" id="data_urodzenia" placeholder="Data urodzenia (YYYY-MM-DD)" pattern="\d{4}-\d{2}-\d{2}" required>

        <label for="nr_prawajazdy">Numer prawa jazdy:</label>
        <input type="text" name="nr_prawajazdy" id="nr_prawajazdy" placeholder="Numer prawa jazdy" required>

        <label for="login">Login lub adres e-mail:</label>
        <input type="text" name="login" id="login" placeholder="Login lub adres e-mail:" required>

        <label for="haslo">Hasło:</label>
        <input type="password" name="haslo" id="haslo" placeholder="Hasło" required>

        <button type="submit">Zarejestruj</button>
    </form>

    <div class="back-button">
        <button onclick="window.location.href='index.php';">← Cofnij</button>
    </div>
</body>
</html>

