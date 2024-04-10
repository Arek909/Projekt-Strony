<?php
session_start();
include "database.php";

if (!isset($_SESSION["login"]) && $admin_perm == 0) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.php");
    exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuwanie aut</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 80%;
            max-width: 1200px;
            margin-top: 20px;
        }

        .form-container {
            flex: 1;
            margin-right: 20px;
        }

        .form-container h1 {
            text-align: center;
        }

        .form-container form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button[type="submit"],
        .form-container button[type="button"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover,
        .form-container button[type="button"]:hover {
            background-color: #45a049;
        }

        .sort-form {
            margin-bottom: 20px;
        }

        .sort-form label,
        .sort-form select,
        .sort-form button {
            margin-right: 10px;
        }

        .table-container {
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h1>Usuwanie:</h1>
        <form action="admin_hub.php" method="post">
            <button type="submit"><-- Cofnij</button>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="sort-form">
            <label for="sortowanie">Sortuj według:</label>
            <select name="sortowanie" id="sortowanie">
                <option value="marka">Marka</option>
                <option value="model">Model</option>
                <option value="rocznik">Rocznik</option>
                <option value="cena">Cena za dzień</option>
            </select>
            <button type="submit">Sortuj</button>
        </form>
        <form action="usuwanie_aut.php" method="post">
            <?php
            // Sprawdzenie, czy użytkownik wysłał żądanie sortowania
            if (isset($_POST['sortowanie'])) {
                $sortowanie = $_POST['sortowanie']; // Pobranie wybranego kryterium sortowania
                $sql = "SELECT * FROM cardb WHERE dostepnosc = 1 ORDER BY $sortowanie"; // Zapytanie SQL z uwzględnieniem sortowania
            } else {
                // Domyślne zapytanie SQL, jeśli nie ma żądania sortowania
                $sql = "SELECT * FROM cardb WHERE dostepnosc = 1";
            }
            $result = $conn->query($sql);

            // Tabela wyświetlająca dostępne samochody wypożyczalni
            echo "<table border='1'>
            <tr>
            <th>Numer pojazdu:</th>
            <th>Marka:</th>
            <th>Model:</th>
            <th>Nadwozie:</th>
            <th>Rocznik:</th>
            <th>Cena za dzień:</th>
            <th>Wybierz</th>
            </tr>";

            // Wyświetlenie informacji o każdym samochodzie w bazie danych
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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
                echo "<tr><td colspan='7'>Brak wolnych aut do usunięcia</td></tr>"; // Komunikat wyświetlany w przypadku braku dostępnych samochodów w bazie
            }

            echo "</table>";
            echo "<button type='submit'>Zatwierdź usuwanie</button>"; // Przycisk potwierdzający wybór samochodów
            ?>
        </form>
    </div>
</div>
</body>
</html>


    