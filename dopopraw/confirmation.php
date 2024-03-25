<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie</title>
</head>
<body>
    <h1>Wybrane samochody:</h1>

    <?php
   session_start(); // Rozpoczęcie sesji
    // Sprawdź, czy zmienna sesji logged_in jest ustawiona i czy jest true
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
        header("Location: login.php");
        exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
    }
   include "database.php"; // Wczytanie pliku z połączeniem do bazy danych
   
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
   
    if(isset($_POST['days'])) { // Sprawdzenie, czy została określona liczba dni wypożyczenia
        $days = $_POST['days']; // Pobranie liczby dni z formularza

        $data_oddania = date('d-m-Y', strtotime("+$days days")); // Obliczenie daty oddania samochodu na podstawie liczby dni

    } else { // Jeśli liczba dni nie została określona, ustaw domyślną wartość na 1 dzień
        $days = 1; 
        $data_oddania = date('d-m-Y', strtotime("+1 day")); 
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
            echo "</tr>";

            $suma_cen += $samochod['cena'] * $days; // Obliczenie sumy cen za wypożyczenie wszystkich samochodów
        }
        
        echo "</table>"; // Zamknięcie tabeli HTML

        echo "<p>Całkowity koszt wypożyczenia: {$suma_cen} zł.</p>"; // Wyświetlenie całkowitego kosztu wypożyczenia
        echo "<p>Liczba dni: $days</p>"; // Wyświetlenie liczby dni wypożyczenia
        echo "<p>Data wypożyczenia: " . date('d-m-Y') . "</p>"; // Wyświetlenie daty wypożyczenia
        echo "<p>Data oddania: $data_oddania</p>"; // Wyświetlenie daty oddania samochodu
    } else {
        echo "Nie wybrano żadnych samochodów."; // Komunikat o braku wybranych samochodów
    }
    ?>

    <form action="" method="post"> <!-- Formularz umożliwiający aktualizację liczby dni wypożyczenia -->
        <label for="days">Ilość dni:</label>
        <input type="number" id="days" name="days" value="<?php echo $days; ?>" min="1">
        <input type="submit" value="Aktualizuj">
    </form>
    <br>
    <form action="wypozyczanie.php" method="post"> <!-- Formularz przekierowujący do strony wyboru pojazdów -->
        <input type="submit" value="<--- Wróć do wyboru pojazdów.">
    </form>
    <br>
    <form action="order.php" method="post"> <!-- Formularz przekierowujący do strony złożenia zamówienia -->
             <!--// wysylanie i zapis id-car musze jeszcze przekinic bo to sie kumuluje i jest problem -->
            <!-- Ukryte pole do przesłania daty wypożyczenia -->
            <input type="hidden" name="start_date" value="<?php echo date('d-m-Y'); ?>">
            <!-- Ukryte pole do przesłania daty oddania -->
            <input type="hidden" name="end_date" value="<?php echo $data_oddania; ?>">
            <!-- Ukryte pole do przesłania daty oddania -->
            <input type="hidden" name="cenatotal" value="<?php echo $suma_cen; ?>">
            <input type="submit" value="Złóż zamówienie.">
    </form>
</body>
</html>
