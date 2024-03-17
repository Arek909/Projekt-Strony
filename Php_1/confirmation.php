<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
</head>
<body>
    <h1>Wybrane samochody:</h1>

    <?php
   session_start();
   include "database.php";
   
   if(isset($_POST['cars'])) {
       $wybrane_samochody = array();
       foreach($_POST['cars'] as $id_car) {
           $sql = "SELECT * FROM cardb WHERE id_car = $id_car";
           $result = $conn->query($sql);
           if($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $wybrane_samochody[] = $row;
           }
       }
       $_SESSION['wybrane_samochody'] = $wybrane_samochody;
   }
   
    if(isset($_POST['days'])) {
        $days = $_POST['days'];

        $data_oddania = date('d-m-Y', strtotime("+$days days"));

    } else {
        $days = 1; 
        $data_oddania = date('d-m-Y', strtotime("+1 day")); 
    }


    if(isset($_SESSION['wybrane_samochody'])) {
        $wybrane_samochody = $_SESSION['wybrane_samochody'];
        
        echo "<table border='1'>
        <tr>
            <th>Numer pojazdu:</th>
            <th>Marka:</th>
            <th>Model:</th>
            <th>Nadwozie:</th>
            <th>Rocznik:</th>
            <th>Cena za dzień:</th>
        </tr>";

        $suma_cen = 0; 

        foreach($wybrane_samochody as $samochod) {
            echo "<tr>";
            echo "<td>" . $samochod['id_car'] . "</td>";
            echo "<td>" . $samochod['marka'] . "</td>";
            echo "<td>" . $samochod['model'] . "</td>";
            echo "<td>" . $samochod['typ_nadwozia'] . "</td>";
            echo "<td>" . $samochod['rocznik'] . "</td>";
            echo "<td>" . $samochod['cena'] . "</td>";
            echo "</tr>";


            $suma_cen += $samochod['cena'] * $days;
        }

        echo "</table>";

  
        echo "<p>Całkowity koszt wypożyczenia: {$suma_cen} zł.</p>";
    
        echo "<p>Liczba dni: $days</p>";
        echo "<p>Data wypożyczenia: " . date('d-m-Y') . "</p>";
        echo "<p>Data oddania: $data_oddania</p>";
    } else {
        echo "Nie wybrano żadnych samochodów.";
    }
    ?>

    <form action="" method="post">
        <label for="days">Ilość dni:</label>
        <input type="number" id="days" name="days" value="<?php echo $days; ?>" min="1">
        <input type="submit" value="Aktualizuj">
    </form>
    <br>
    <form action="wypozyczanie.php" method="post">
        <input type="submit" value="<--- Wróć do wyboru pojazdów.">
    </form>
    <br>
    <form action="order.php" method="post">
        <input type="submit" value="Złóż zamówienie.">
    </form>
</body>
</html>
