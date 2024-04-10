<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawarte umowy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
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

        label {
            margin-right: 10px;
        }

        select {
            padding: 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Zawarte umowy</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="sortowanie">Sortuj według:</label>
            <select name="sortowanie" id="sortowanie">
                <option value="imie">Imię</option>
                <option value="nazwisko">Nazwisko</option>
                <option value="data_wypozyczenia">Data wypożyczenia</option>
                <option value="data_oddania">Data oddania</option>
            </select>
            <button type="submit">Sortuj</button>
        </form>
        <table>
            <tr>
                <th>Numer umowy</th>
                <th>Numer użytkownika</th>
                <th>Numer samochodu</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Data wypożyczenia</th>
                <th>Data oddania</th>
                <th>Cena total</th>
            </tr>
            <?php
            session_start();
            include "database.php";

            if (!isset($_SESSION["login"])) {
                // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
                header("Location: index.php");
                exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
            }

            // Sprawdzenie, czy użytkownik wysłał żądanie sortowania
            if(isset($_POST['sortowanie'])) {
                $sortowanie = $_POST['sortowanie']; // Pobranie wybranego kryterium sortowania
                $sql = "SELECT * FROM docsdb ORDER BY $sortowanie"; // Zapytanie SQL z uwzględnieniem sortowania
            } else {
                // Domyślne zapytanie SQL, jeśli nie ma żądania sortowania
                $sql = "SELECT * FROM docsdb";
            }
            $result = $conn->query($sql);

            // Wyświetlenie informacji o każdym samochodzie w bazie danych
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_umowy'] . "</td>";
                    echo "<td>" . $row['id_user'] . "</td>";
                    echo "<td>" . $row['id_car'] . "</td>";
                    echo "<td>" . $row['imie'] . "</td>";
                    echo "<td>" . $row['nazwisko'] . "</td>";
                    echo "<td>" . $row['data_wypozyczenia'] . "</td>";
                    echo "<td>" . $row['data_oddania'] . "</td>";
                    echo "<td>" . $row['cena_total'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Brak zawartych umów</td></tr>"; // Komunikat wyświetlany w przypadku braku zawartych umów w bazie
            }
            ?>
        </table>
        <form action="admin_hub.php" method="post">
            <button type="submit"><-- Cofnij</button>
        </form>
    </div>
</body>
</html>

