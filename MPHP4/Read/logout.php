<!-- Hier wordt het logout-systeem verwerkt -->
<?php
    session_start();
    session_destroy();

    header("Location:../index.html");
?>