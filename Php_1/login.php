 <?php

include "database.php";

$login = $_POST["login"];
$haslo = $_POST["haslo"];

if(empty($login) || empty($haslo)){
    echo"Uzupełnij brakujące dane logowania!";
}
else{
    $sql = "SELECT * FROM logindb WHERE login= '$login' AND haslo='$haslo'";
    $result = mysqli_query($conn, $sql);
}

if (mysqli_num_rows($result)) {
    header("Location: wypozyczalnia_hub.php");
    exit();
}
else{
    echo("Podano błędne hasło");
    exit();
}

?>