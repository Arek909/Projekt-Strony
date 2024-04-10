<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożycz samochód</title>
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

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        select {
            padding: 10px;
            margin: 10px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .button:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <?php
    // Rozpoczęcie sesji i wczytanie plików z połączeniem do bazy danych oraz systemem wylogowania
    session_start();
    include "database.php";


    if (!isset( $_SESSION["login"])) {
        // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
        header("Location: index.php");
        exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
    }

    // Nagłówek informujący użytkownika o celu strony
    echo "<h1>Wypożycz samochód:</h1>";

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="sortowanie">Sortuj według:</label>
    <select name="sortowanie" id="sortowanie">
        <option value="marka">Marka</option>
        <option value="model">Model</option>
        <option value="rocznik">Rocznik</option>
        <option value="cena">Cena za dzień</option>
    </select>
    <button type="submit" class="button">Sortuj</button>
    </form>
    <?php
    if(isset($_POST['sortowanie'])) {
        $sortowanie = $_POST['sortowanie']; // Pobranie wybranego kryterium sortowania
        $sql = "SELECT * FROM cardb WHERE dostepnosc = 1 ORDER BY $sortowanie"; // Zapytanie SQL z uwzględnieniem sortowania
    } else {
        // Domyślne zapytanie SQL, jeśli nie ma żądania sortowania
        $sql = "SELECT * FROM cardb WHERE dostepnosc = 1";
    }
    $result = $conn->query($sql);

    // Formularz umożliwiający użytkownikowi wypożyczenie samochodu
    echo "<form action='confirmation.php' method='post'>";

    // Tabela wyświetlająca dostępne samochody wypożyczalni
    echo "<table>
    <tr>
    <th>Numer pojazdu</th>
    <th>Marka</th>
    <th>Model</th>
    <th>Nadwozie</th>
    <th>Rocznik</th>
    <th>Cena za dzień</th>
    <th>Wybierz</th>
    </tr>";

    // Wyświetlenie informacji o każdym samochodzie w bazie danych
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_car'] . "</td>";
            echo "<td>" . $row['marka'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['typ_nadwozia'] . "</td>";
            echo "<td>" . $row['rocznik'] . "</td>";
            echo "<td>" . $row['cena'] . "</td>";
            echo "<td><input type='radio' name='cars[]' value='" . $row['id_car'] . "'></td>"; // Pole wyboru samochodu
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Brak dostępnych samochodów w bazie danych</td></tr>"; // Komunikat wyświetlany w przypadku braku dostępnych samochodów w bazie
    }
    
    echo "</table>";
    echo "<button type='submit' class='button'>Zatwierdź</button>"; // Przycisk potwierdzający wybór samochodów
    echo "</form>";

    echo "<form action='wypozyczalnia_hub.php' method='post'>";
    echo "<button type='submit' class='button'>Powrót</button>"; 
    echo "</form>";
    ?>

</body>
</html>


