<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "database.php"; // Podłączenie do bazy danych
    session_start(); // Rozpoczęcie sesji
    if (!isset( $_SESSION["login"])) {
        // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
        header("Location: index.php");
        exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
    }
    
 
    $id_user = $_SESSION['id_user']; // Pobranie ID aktualnie zalogowanego użytkownika

    echo "<h1>Twoje dokumenty:</h1>";

    // Zapytanie SQL w celu pobrania danych z tabeli docsdb oraz cardb dla aktualnie zalogowanego użytkownika
    $sql = "SELECT d.id_umowy, d.id_car, d.imie, d.nazwisko, d.data_wypozyczenia, d.data_oddania, d.cena_total, c.marka, c.model, c.typ_nadwozia, c.rocznik
            FROM docsdb d
            INNER JOIN cardb c ON d.id_car = c.id_car
            WHERE d.id_user = $id_user";
    $result = $conn->query($sql); // Wykonanie zapytania

    if ($result->num_rows > 0) { // Sprawdzenie, czy wynik zapytania zawiera co najmniej jeden wiersz
        echo "<table border='1'>"; // Rozpoczęcie tabeli HTML
        echo "<tr>";
        echo "<th>Numer umowy</th>";
        echo "<th>Marka</th>";
        echo "<th>Model</th>";
        echo "<th>Typ nadwozia</th>";
        echo "<th>Rocznik</th>";
        echo "<th>Numer katalogowy pojazdu</th>";
        echo "<th>Imię</th>";
        echo "<th>Nazwisko</th>";
        echo "<th>Data wypożyczenia</th>";
        echo "<th>Data oddania</th>";
        echo "<th>Cena całkowita</th>";
        echo "</tr>";

        // Iteracja przez wyniki zapytania i wyświetlanie danych w tabeli
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_umowy'] . "</td>";
            echo "<td>" . $row['marka'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['typ_nadwozia'] . "</td>";
            echo "<td>" . $row['rocznik'] . "</td>";
            echo "<td>" . $row['id_car'] . "</td>";
            echo "<td>" . $row['imie'] . "</td>";
            echo "<td>" . $row['nazwisko'] . "</td>";
            echo "<td>" . $row['data_wypozyczenia'] . "</td>";
            echo "<td>" . $row['data_oddania'] . "</td>";
            echo "<td>" . $row['cena_total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; // Zamknięcie tabeli HTML
    } else {
        echo "Brak danych do wyświetlenia."; // Komunikat o braku danych
    }
    ?>

    <!-- Formularz przekierowujący do poprzedniej strony -->
    <form action="wypozyczalnia_hub.php" method="post">
        <h2>Wróć</h2>
        <button type="submit"><---</button><br>
    </form>
</body>
</html>
