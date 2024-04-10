<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmiana cen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #3c763d;
            color: #3c763d;
            border-radius: 4px;
        }

        .form-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .form-container input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Zmiana cen</h1>
        <?php
        session_start();
        include "database.php"; 

        if (!isset($_SESSION["login"])) {
            // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
            header("Location: index.php");
            exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
        }

        if(isset($_POST['update']) && isset($_POST['new_prices'])) { // Sprawdzenie, czy formularz został wysłany i czy przesłano nowe ceny
            $new_prices = $_POST['new_prices']; // Pobranie nowych cen z formularza
            
            foreach($new_prices as $id_car => $new_price) { // Iteracja przez nowe ceny
                // Aktualizacja ceny samochodu w bazie danych
                $sql = "UPDATE cardb SET cena = $new_price WHERE id_car = $id_car";
                $conn->query($sql);
            }
            
            echo "<div class='message'>Ceny zostały zmienione.</div>"; // Komunikat o zmianie cen
        } else {
            echo "<div class='message'>Nie udało się zmienić cen.</div>"; // Komunikat o niepowodzeniu zmiany cen
        }
        ?>
        <div class="back-button">
            <form action="zmiana_ceny.php" method="post">
                <input type="submit" value="<-- Cofnij">
            </form>
        </div>
    </div>
</body>
</html>

