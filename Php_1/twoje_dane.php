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


$login = $_SESSION['login'];
$sql = "SELECT * FROM logindb WHERE login = '$login'";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    echo "<h1>Twoje dane:</h1>";
    echo "<p><strong>Użytkownik:</strong> " . $row['login'] . "</p>";
    echo "<p><strong>Imię:</strong> " . $row['imie'] . "</p>";
    echo "<p><strong>Nazwisko:</strong> " . $row['nazwisko'] . "</p>";
    echo "<p><strong>Data urodzenia:</strong> " . $row['data_urodzenia'] . "</p>";
    echo "<p><strong>Numer prawa jazdy:</strong> " . $row['nr_prawajazdy'] . "</p>";
} else {
    echo "Brak danych użytkownika.";
}
?>
    <form action="wypozyczalnia_hub.php" method="post">
        <h2>Wróć</h2>
        <button type="submit"><---</button></br>
    </form>

</body>
</html>

