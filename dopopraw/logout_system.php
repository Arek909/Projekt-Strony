<?php
if(isset($_POST['logout'])) { // Sprawdzenie, czy został wysłany formularz wylogowania
    // Usuń wszystkie zmienne sesji
    session_unset();
    
    // Zniszcz sesję
    session_destroy();
    
    // Przekieruj użytkownika na stronę logowania (lub inną stronę)
    header("Location: index.php"); // Przekierowanie użytkownika na stronę logowania
    exit(); // Zakończenie wykonywania skryptu
}
?>
