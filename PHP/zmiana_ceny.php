<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wybierz auto do zmiany ceny:</title>
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
    echo "<h1>Wybierz auto do zmiany ceny:</h1>";

    // Zapytanie SQL pobierające tylko te samochody, które są dostępne (dostepnosc = 1)
    $sql = "SELECT * FROM cardb WHERE dostepnosc = 1";
    $result = $conn->query($sql);

    // Formularz umożliwiający użytkownikowi wypożyczenie samochodu
    echo "<form action='zmiana_ceny_2.php' method='post'>";

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
            echo "<td><input type='radio' name='cars[]' value='" . $row['id_car'] . "'></td>"; // Pole wyboru samochodu
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Wszystkie pojazdy są aktualnie wypożyczone</td></tr>"; // Komunikat wyświetlany w przypadku braku dostępnych samochodów w bazie
    }
    
    echo "</table>";
    echo "<input type='submit' value='Zatwierdź'>"; // Przycisk potwierdzający wybór samochodów
    echo "</form>";

    echo "<br>";
    echo "<form action='admin_hub.php' method='post'>";
    echo "<input type='submit' value='<-- cofnij.'>"; 
    echo "</form>";
    ?>

</body>
</html>
