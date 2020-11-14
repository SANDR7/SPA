<!-- Hier wordt gebruikt voor beveiliging -->
<?php
// sessie starten
    session_start();

    if (!isset($_SESSION['username']) || strlen($_SESSION['username']) == 0) {
        header("Location:index.php");
        exit;
    }
?>