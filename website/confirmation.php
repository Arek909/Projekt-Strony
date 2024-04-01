<?php
session_start(); // Rozpoczęcie sesji
include "database.php"; // Wczytanie pliku z połączeniem do bazy danych

if(isset($_POST['cars'])) { // Sprawdzenie, czy formularz został wysłany i czy wybrane zostały samochody
    $wybrane_samochody = array(); // Inicjalizacja pustej tablicy na wybrane samochody
    foreach($_POST['cars'] as $id_car) { // Iteracja przez wybrane samochody
        $sql = "SELECT * FROM cardb WHERE id_car = $id_car"; // Zapytanie SQL w celu pobrania szczegółów o danym samochodzie
        $result = $conn->query($sql); // Wykonanie zapytania
        if($result->num_rows > 0) { // Sprawdzenie, czy wynik zapytania zawiera co najmniej jeden wiersz
            $row = $result->fetch_assoc(); // Pobranie wiersza z wyników zapytania
            $wybrane_samochody[] = $row; // Dodanie pobranego samochodu do tablicy wybranych samochodów
            
            // Update dostepnosc column to 0 for the selected car
            $update_sql = "UPDATE cardb SET dostepnosc = 0 WHERE id_car = $id_car";
            $conn->query($update_sql); // Wykonanie zapytania aktualizacji
        }
    }
    $_SESSION['wybrane_samochody'] = $wybrane_samochody; // Zapisanie wybranych samochodów do sesji
}

if(isset($_POST['days'])) { // Sprawdzenie, czy została określona liczba dni wypożyczenia
    $days = $_POST['days']; // Pobranie liczby dni z formularza
    $_SESSION['start_date'] = date('Y-m-d'); // Zapisanie daty wypożyczenia do sesji
    $_SESSION['end_date'] = date('Y-m-d', strtotime("+$days days")); // Obliczenie daty oddania samochodu na podstawie liczby dni i zapisanie do sesji
} else { // Jeśli liczba dni nie została określona, ustaw domyślną wartość na 1 dzień
    $days = 1; 
    $_SESSION['start_date'] = date('Y-m-d'); // Zapisanie daty wypożyczenia do sesji
    $_SESSION['end_date'] = date('Y-m-d', strtotime("+1 day")); // Obliczenie daty oddania samochodu na podstawie liczby dni i zapisanie do sesji
}

if(isset($_POST['update'])) { // Sprawdzenie, czy został wciśnięty przycisk "Aktualizuj"
    $days = $_POST['days']; // Pobranie liczby dni z formularza
    $_SESSION['start_date'] = date('Y-m-d'); // Zapisanie daty wypożyczenia do sesji
    $_SESSION['end_date'] = date('Y-m-d', strtotime("+$days days")); // Obliczenie daty oddania samochodu na podstawie liczby dni i zapisanie do sesji
}

if(isset($_SESSION['wybrane_samochody'])) { // Sprawdzenie, czy istnieją wybrane samochody w sesji
    $wybrane_samochody = $_SESSION['wybrane_samochody']; // Pobranie wybranych samochodów z sesji
    
    echo "<table border='1'>"; // Wyświetlenie tabeli HTML z nagłówkami kolumn
    echo "<tr>";
    echo "<th>Numer pojazdu:</th>";
    echo "<th>Marka:</th>";
    echo "<th>Model:</th>";
    echo "<th>Nadwozie:</th>";
    echo "<th>Rocznik:</th>";
    echo "<th>Cena za dzień:</th>";
    echo "<th>Liczba dni:</th>"; // New column for number of days
    echo "<th>Cena całkowita:</th>"; // New column for total price
    echo "</tr>";

    $suma_cen = 0;  // Inicjalizacja zmiennej na sumę cen wszystkich wybranych samochodów

    foreach($wybrane_samochody as $samochod) { // Iteracja przez wszystkie wybrane samochody
        echo "<tr>"; // Rozpoczęcie nowego wiersza tabeli
        echo "<td>" . $samochod['id_car'] . "</td>"; // Wyświetlenie numeru pojazdu
        echo "<td>" . $samochod['marka'] . "</td>"; // Wyświetlenie marki samochodu
        echo "<td>" . $samochod['model'] . "</td>"; // Wyświetlenie modelu samochodu
        echo "<td>" . $samochod['typ_nadwozia'] . "</td>"; // Wyświetlenie typu nadwozia
        echo "<td>" . $samochod['rocznik'] . "</td>"; // Wyświetlenie rocznika samochodu
        echo "<td>" . $samochod['cena'] . "</td>"; // Wyświetlenie ceny za dzień
        echo "<td>" . $days . "</td>"; // Display number of days
        // Calculate total price for the current car
        $total_price = $samochod['cena'] * $days;
        echo "<td>" . $total_price . "</td>"; // Display total price
        echo "</tr>";

        $suma_cen += $total_price; // Dodanie ceny całkowitej do sumy cen za wypożyczenie wszystkich samochodów
    }

    $_SESSION['suma_cen'] = $suma_cen; // Zapisanie sumy cen do sesji
    
    echo "</table>"; // Zamknięcie tabeli HTML

    echo "<p>Całkowity koszt wypożyczenia: {$_SESSION['suma_cen']} zł.</p>"; // Wyświetlenie całkowitego kosztu wypożyczenia
    echo "<p>Liczba dni: $days</p>"; // Wyświetlenie liczby dni wypożyczenia
    echo "<p>Data wypożyczenia: " . $_SESSION['start_date'] . "</p>"; // Wyświetlenie daty wypożyczenia z sesji
    echo "<p>Data oddania: " . $_SESSION['end_date'] . "</p>"; // Wyświetlenie daty oddania samochodu z sesji
} else {
    echo "Nie wybrano żadnych samochodów."; // Komunikat o braku wybranych samochodów
}
?>

<form action="" method="post"> <!-- Formularz przekierowujący do tej samej strony -->
    <label for="days">Liczba dni wypożyczenia:</label>
    <input type="number" id="days" name="days" min="1" required><br><br>
    <input type="submit" name="update" value="Aktualizuj">
</form>
<br>
<form action="order.php" method="post"> <!-- Formularz przekierowujący do tej samej strony -->
    <input type="submit" name="update" value="Złóż zamówienie">
</form>

<form action="cofanie_zamowienia.php" method="post"> <!-- Formularz przekierowujący do tej samej strony -->
    <input type="submit" name="update" value="<- cofnij">
</form>