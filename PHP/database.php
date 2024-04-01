<?php

$db_server= "localhost";
$db_user= "root";
$db_password = "";
$db_name = "project";
$conn = "";


    $conn = mysqli_connect($db_server,
                        $db_user,
                        $db_password,
                        $db_name);


if (!$conn){
    echo "BRAK połączenia z bazą danych";
}
?>
