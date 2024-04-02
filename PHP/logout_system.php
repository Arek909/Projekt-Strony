<?php
if(isset($_POST['logout'])) {
    // Usuń wszystkie zmienne sesji
    session_unset();
    
    // Zniszcz sesję
    session_destroy();
    

    header("Location: index.php"); 
    exit();
}
?>
