<!-- Hier wordt het formulier verwerkt voor het nieuwe lid-->
<?php
    require_once '../session.inc.php';
    require_once '../config.inc.php';

    $gender = $_POST['gender'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birth_date = $_POST['birth_date'];
    $member_since = $_POST['member_since'];




    // controleren of alle formuliervelden waren ingevuld
    if(
        strlen($first_name)     > 0 &&
        strlen($last_name)      > 0 &&
        strlen($birth_date)     > 0 &&
        strlen($member_since)   > 0 &&
        strlen($gender)         > 0) {
        // controleren of de data wel correct zijn
        $checkBirth = strtotime($birth_date);
        $checkMem = strtotime($member_since);
        if(date('Y-m-d', $checkBirth) == $birth_date && date('Y-m-d', $checkMem) == $member_since) {
            $query = "INSERT INTO back2_leden (gender, first_name, last_name, birth_date, member_since) VALUES (
                '$gender',
                '$first_name',
                '$last_name',
                '$birth_date',
                '$member_since'
            )";

            $resultaat = mysqli_query($mysqli, $query);

            if($resultaat) {
                header("Location:../Read/home.php");
                exit;
            } else {
                echo 'Er ging wat mis met het toevoegen!';
            }
        } else {
            // er is iets mis met een datum
            echo 'Eén van de ingevulde datums was ongeldig!';
        }
    } else {
        echo 'Niet alle velden waren ingevuld!';
    }
?>