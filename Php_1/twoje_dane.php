<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje dane</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        p {
            margin-left: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
session_start();
include "database.php";

if (!isset( $_SESSION["login"])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.php");
    exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
}

$login = $_SESSION['login'];
$sql = "SELECT * FROM logindb WHERE login = '$login'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    echo "<h1>Twoje dane:</h1>";
    echo "<p><strong>Użytkownik:</strong> " . $row['login'] . "</p>";
    echo "<p><strong>Imię:</strong> " . $row['imie'] . "</p>";
    echo "<p><strong>Nazwisko:</strong> " . $row['nazwisko'] . "</p>";
    echo "<p><strong>Data urodzenia:</strong> " . $row['data_urodzenia'] . "</p>";
    echo "<p><strong>Numer prawa jazdy:</strong> " . $row['nr_prawajazdy'] . "</p>";
} else {
    echo "<p style='text-align: center;'>Brak danych użytkownika.</p>";
}
?>
    <!-- Formularz przekierowujący do poprzedniej strony -->
    <form action="wypozyczalnia_hub.php" method="post">
        <h2>Wróć</h2>
        <button type="submit"><---</button><br>
    </form>

</body>
</html>


