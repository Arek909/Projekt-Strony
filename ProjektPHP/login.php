<?php
include "db_conn.php";
    if (isset($_POST["username"]) && isset($_POST["pass_word"])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $username = validate($_POST["username"]);
        $pass_word = validate($_POST["pass_word"]);
        if (empty($username) || empty($pass_word)) {
            header("Location: index.php?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE username= '$username' AND pass_word='$pass_word'"; 
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