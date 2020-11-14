<?php
    // controleer of de upload geslaagd is
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        if( $_FILES['foto']['type'] == "image/jpg" ||
            $_FILES['foto']['type'] == "image/jpeg" ||
            $_FILES['foto']['type'] == "image/png" ||
            $_FILES['foto']['type'] == "image/pjpng") {
                $map = __DIR__ ."../uploads/";
                $bestand = $_POST['id']. '.jpg';

            move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);
            
            header("Location:../Read/foto.php?id=". $_POST['id']);
        } else {
            echo "Het bestand is van het verkeerde type!";
        }
    } else {
        echo "er ging iets fout bij het uploaden!";
    }
?>