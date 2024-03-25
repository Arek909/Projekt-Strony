<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożycz samochód</title>
</head>
<body>
    <?php
    session_start(); // Rozpocznij sesję na początku każdej strony

    // Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
        header("Location: login.php");
        exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
    }
    include "database.php";
    include "logout_system.php";

    // Nagłówek informujący użytkownika o celu strony
    echo "<h1>Wypożycz samochód:</h1>";

    // Zapytanie SQL pobierające wszystkie samochody z bazy danych
    $sql = "SELECT * FROM cardb";
    $result = $conn->query($sql);

    // Formularz umożliwiający użytkownikowi wypożyczenie samochodu
    echo "<form action='confirmation.php' method='post'>";

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
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_car'] . "</td>";
            echo "<td>" . $row['marka'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['typ_nadwozia'] . "</td>";
            echo "<td>" . $row['rocznik'] . "</td>";
            echo "<td>" . $row['cena'] . "</td>";
            echo "<td><input type='checkbox' name='cars[]' value='" . $row['id_car'] . "'></td>"; // Pole wyboru samochodu
            echo "</tr>";
        }
    } else {
        echo "Brak danych w bazie danych"; // Komunikat wyświetlany w przypadku braku danych w bazie
    }
    
    echo "</table>";
    echo "<input type='submit' value='Zatwierdź'>"; // Przycisk potwierdzający wybór samochodów
    echo "</form>";
    ?>

</body>
</html>
