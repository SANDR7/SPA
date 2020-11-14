<!-- Hier wordt het lid verwerkt om te worden bewerkt-->
<?php
    require_once '../session.inc.php';
    require_once '../config.inc.php';

    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $member_since = $_POST['member_since'];




    // controleren of alle formuliervelden waren ingevuld
    if( is_numeric($id) &&
        strlen($first_name) > 0 &&
        strlen($last_name) > 0 &&
        strlen($birth_date) > 0 &&
        strlen($member_since) > 0 &&
        strlen($gender) > 0
    ) {
        $query = "UPDATE back2_leden SET 
        gender = '$gender',
        first_name = '$first_name',
        last_name = '$last_name',
        birth_date = '$birth_date',
        member_since = '$member_since'
        WHERE id = $id";

        $resultaat = mysqli_query($mysqli, $query);
        
        if($resultaat) {
            header("Location:../Read/home.php");
            exit;
        } else {
            echo 'Er ging wat mis met het toevoegen!';
        }
    } else {
        echo 'Niet alle velden waren ingevuld!';
    }
?>