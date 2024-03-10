<?php
include "db_conn.php";
    if (isset($_POST["id_user"]) && isset($_POST["haslo"])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $id_user = validate($_POST["id_user"]);
        $haslo = validate($_POST["haslo"]);
        if (empty($id_user) || empty($haslo)) {
            header("Location: index.php?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM logindb WHERE id_user= '$id_user' AND haslo='$haslo'"; 
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                echo "Witamy w wypożyczalni";
            }
            else{
                header("Location: index.php?error=invalidLoginOrPassword");
            exit();
            }
        }
    } else {
        header("Location: index.php");
        exit();
    }
?>