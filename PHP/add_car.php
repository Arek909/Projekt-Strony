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
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Brak wolnych aut</td></tr>"; // Komunikat wyświetlany w przypadku braku dostępnych samochodów w bazie
    }
    ?>
    <form action="admin_hub.php" method="post">
        <button type="submit"><- Cofnij</button>
    </form>
    <br>
    <form action="dodaj_auto.php" method="post">
        <label>Marka: </label>
        <input type="text" name="marka" placeholder="Marka" required><br>

        <label>Model: </label>
        <input type="text" name="model" placeholder="Model" required><br>

        <label>Typ nadwozia: </label>
        <select name="typ_nadwozia">
            <option value="sedan">sedan</option>
            <option value="SUV">SUV</option>
            <option value="pickup">pickup</option>
            <option value="hatchback">hatchback</option>
            <option value="coupe">coupe</option>
            <option value="van">van</option>
        </select><br>

        <label>Rocznik: </label>
        <input type="number" name="rocznik" placeholder="Rocznik" required><br>

        <label>Cena: </label>
        <input type="number" name="cena" placeholder="Cena" required><br>

        
     <button type="submit">Dodaj</button><br>
    </form>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="sortowanie">Sortuj według:</label>
    <select name="sortowanie" id="sortowanie">
        <option value="marka">Marka</option>
        <option value="model">Model</option>
        <option value="rocznik">Rocznik</option>
        <option value="cena">Cena za dzień</option>
    </select>
    <button type="submit">Sortuj</button>
    </form>
</body>
</html>
<?php




?>