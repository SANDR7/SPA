<!-- Hier wordt het lid getoond om te worden verwijdered-->
<?php
    require_once '../session.inc.php';
    require_once '../config.inc.php';

    // lees het ID uit de URL
    $id = $_GET['id'];
    // controleer of het ID een nummer is
    if(is_numeric($id)) {
        $resultaat = mysqli_query($mysqli, "SELECT * FROM back2_leden WHERE id = $id");
        if(mysqli_num_rows($resultaat) == 1) {
            // ja, lees het lid uit de dataset
            $row = mysqli_fetch_array($resultaat);
        } else {
            echo "Geen lid gevonden!";
            exit;
        }
    } else {
        //  het ID was geen nummer
        echo "onjuist ID!";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Verwijderen || 84231</title>
</head>
<style>
    label {
        font-weight: bold;
    }
</style>
<body style="margin: 10rem">
    <b>PHP Herhaling 2020 | 84231</b>
    <h1>VERWIJDER</h1>
    <div>Lid verwijderen</div>
    <br>
    <p>
        Weet je zeker dat je het lid <b><?php echo $row['first_name'] . " " . $row['last_name'] ?></b> wilt verwijderen?
    </p>
    <br>
    <p>
        <a href="../Delete/lid_verwijder_verwerk.php?id=<?php echo $id;?>" class="btn btn-primary">Ja, verwijderen</a>
        <a href="home.php" class="btn">Nee, terug</a>
    </p>
</body>
</html>