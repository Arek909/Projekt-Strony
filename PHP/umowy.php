<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dodawanie:</h1>
    <?php
    // Rozpocznij sesję
    session_start();

    include "database.php";
    // Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
    if (!isset( $_SESSION["login"]) && $admin_perm == 0) {
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

    // Tabela wyświetlająca zawarte umowy
    echo "<table border='1'>
    <tr>
    <th>Numer umowy:</th>
    <th>Numer uzytkownika:</th>
    <th>Numer samochodu:</th>
    <th>Imie:</th>
    <th>Nazwisko:</th>
    <th>Data wypozyczenia:</th>
    <th>Data oddania:</th>
    <th>Cena total:</th>
    </tr>";

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
        echo "<tr><td colspan='7'>Brak zawartych umow</td></tr>"; // Komunikat wyświetlany w przypadku braku dostępnych samochodów w bazie
    }
    ?>
    <form action="admin_hub.php" method="post">
        <button type="submit"><- Cofnij</button>
    </form>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="sortowanie">Sortuj według:</label>
    <select name="sortowanie" id="sortowanie">
        <option value="imie">Imie</option>
        <option value="nazwisko">Nazwisko</option>
        <option value="data_wypozyczenia">Data wypozyczenia</option>
        <option value="data_oddania">Data oddania</option>
    </select>
    <button type="submit">Sortuj</button>
    </form>
</body>
</html>
<?php




?>