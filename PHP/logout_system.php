<?php
if(isset($_POST['logout'])) {
    // Usuń wszystkie zmienne sesji
    session_unset();
    
    // Zniszcz sesję
    session_destroy();
    
    // Przekieruj użytkownika na stronę logowania (lub inną stronę)
    header("Location: index.php"); // Tutaj wpisz odpowiednią ścieżkę
    exit();
}
?>
