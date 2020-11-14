<!-- Hier wordt het lid verwerkt om te worden verwijderd-->
<?php
    require_once '../session.inc.php';
    require_once '../config.inc.php';

    // lees het ID uit de URL
    $id = $_GET['id'];
    // controleer of het ID een nummer is
    if(is_numeric($id)) {
        $resultaat = mysqli_query($mysqli, "DELETE FROM back2_leden WHERE id = $id");
        if($resultaat) {
            // alles Ok, stuur terug naar de homepage
            header("Location:../Read/home.php");
        } else {
            echo "Er ging wat mis met het verwijderen!";
            exit;
        }
    } else {
        //  het ID was geen nummer
        echo "onjuist ID!";
        exit;
    }
?>