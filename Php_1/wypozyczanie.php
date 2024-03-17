<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include "database.php";
    include "logout_system.php";

    echo "<h1>Wypożycz samochód:</h1>";
    $sql = "SELECT * FROM cardb";
    $result = $conn->query($sql);

    echo "<form action='confirmation.php' method='post'>";

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

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_car'] . "</td>";
            echo "<td>" . $row['marka'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['typ_nadwozia'] . "</td>";
            echo "<td>" . $row['rocznik'] . "</td>";
            echo "<td>" . $row['cena'] . "</td>";
            echo "<td><input type='checkbox' name='cars[]' value='" . $row['id_car'] . "'></td>";
            echo "</tr>";
        }
    } else {
        echo "Brak danych w bazie danych";
    }
    
    echo "</table>";
    echo "<input type='submit' value='Zatwierdź'>";
    echo "</form>";
    ?>

</body>
</html>
