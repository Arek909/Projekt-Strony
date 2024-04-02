<?php
session_start();
include "database.php"; 

if (!isset($_SESSION["login"])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.php");
    exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
}

if(isset($_POST['cars'])) { // Sprawdzenie, czy formularz został wysłany i czy wybrane zostały samochody
    $wybrane_samochody = array(); // Inicjalizacja pustej tablicy na wybrane samochody
    foreach($_POST['cars'] as $id_car) { // Iteracja przez wybrane samochody
        $sql = "SELECT * FROM cardb WHERE id_car = $id_car"; // Zapytanie SQL w celu pobrania szczegółów o danym samochodzie
        $result = $conn->query($sql); // Wykonanie zapytania
        if($result->num_rows > 0) { // Sprawdzenie, czy wynik zapytania zawiera co najmniej jeden wiersz
            $row = $result->fetch_assoc(); // Pobranie wiersza z wyników zapytania
            $wybrane_samochody[] = $row; // Dodanie pobranego samochodu do tablicy wybranych samochodów
            
        }
    }
    $_SESSION['wybrane_samochody'] = $wybrane_samochody; // Zapisanie wybranych samochodów do sesji
}

if(isset($_SESSION['wybrane_samochody'])) { // Sprawdzenie, czy istnieją wybrane samochody w sesji
    $wybrane_samochody = $_SESSION['wybrane_samochody']; // Pobranie wybranych samochodów z sesji
    
    echo "<form action='zmiana_ceny_system.php' method='post'>"; // Formularz dla zmiany ceny
    echo "<table border='1'>"; // Wyświetlenie tabeli HTML z nagłówkami kolumn
    echo "<tr>";
    echo "<th>Numer pojazdu:</th>";
    echo "<th>Marka:</th>";
    echo "<th>Model:</th>";
    echo "<th>Cena za dzień:</th>";
    echo "<th>Nowa cena:</th>"; // Nowa kolumna dla wprowadzenia nowej ceny
    echo "</tr>";

    foreach($wybrane_samochody as $samochod) { // Iteracja przez wszystkie wybrane samochody
        echo "<tr>"; // Rozpoczęcie nowego wiersza tabeli
        echo "<td>" . $samochod['id_car'] . "</td>"; // Wyświetlenie numeru pojazdu
        echo "<td>" . $samochod['marka'] . "</td>"; // Wyświetlenie marki samochodu
        echo "<td>" . $samochod['model'] . "</td>"; // Wyświetlenie modelu samochodu
        echo "<td>" . $samochod['cena'] . "</td>"; // Wyświetlenie ceny za dzień
        echo "<td><input type='number' name='new_prices[".$samochod['id_car']."]' required></td>"; // Pole tekstowe dla nowej ceny
        echo "</tr>";
    }

    echo "</table>"; // Zamknięcie tabeli HTML

    echo "<input type='submit' name='update' value='Zmień cenę'>"; // Przycisk do wysłania formularza
    echo "</form>"; // Zamknięcie formularza
} else {
    echo "Nie wybrano żadnych samochodów do zmiany ceny."; // Komunikat o braku wybranych samochodów
}
?>

<form action="zmiana_ceny.php" method="post"> 
    <input type="submit" name="update" value="<- cofnij">
</form>
