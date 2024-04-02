<?php
session_start();
include "database.php"; 

if (!isset($_SESSION["login"])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header("Location: index.php");
    exit(); // Upewnij się, że skrypt kończy działanie po przekierowaniu
}

if(isset($_POST['update']) && isset($_POST['new_prices'])) { // Sprawdzenie, czy formularz został wysłany i czy przesłano nowe ceny
    $new_prices = $_POST['new_prices']; // Pobranie nowych cen z formularza
    
    foreach($new_prices as $id_car => $new_price) { // Iteracja przez nowe ceny
        // Aktualizacja ceny samochodu w bazie danych
        $sql = "UPDATE cardb SET cena = $new_price WHERE id_car = $id_car";
        $conn->query($sql);
    }
    
    echo "Ceny zostały zmienione."; // Komunikat o zmianie cen
} else {
    echo "Nie udało się zmienić cen."; // Komunikat o niepowodzeniu zmiany cen
}

echo "<form action='zmiana_ceny.php' method='post'>";
    echo "<input type='submit' value='<-- cofnij.'>"; 
    echo "</form>";
?>

<br>
<form action="admin_hub.php" method="post"> 
    <input type="submit" name="update" value="Powrót do panelu">
</form>
