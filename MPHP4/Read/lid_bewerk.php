<!-- Hier wordt het lid getoond om te worden bewerkt-->
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
    <title>Bewerken || 84231</title>
</head>
<style>
    label {
        font-weight: bold;
    }
</style>
<body style="margin: 10rem">
  <b>PHP Herhaling 2020 | 84231</b>
  <h1>BEWERKEN</h1>
  <div>Lid bewerken</div>
<form role="form" method="post" action="../Update/lid_bewerk_verwerk.php" style="width: 50%;">

    <div class="form-group row">
        <div class="col-sm-10">
            <input type="hidden" name="id" value="<?php echo $id;?>">
        </div>
    </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">
          <input type="radio" class="form-check-label" id="gender_m" value="M" name="gender"
          <?php if ($row['gender'] == 'M') echo 'checked="checked"'?>>
          
            Man
        </label>
        <label class="col-sm-2 col-form-label">
          <input type="radio" class="form-check-label" id="gender_f" value="F" name="gender"
          <?php if ($row['gender'] == 'F') echo 'checked="checked"'?>>
          
            Vrouw
        </label>
      </div>
      <div class="form-group row">
        <label for="first_name" class="col-sm-3 col-form-label">Voornaam:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="first_name" name="first_name" required="required"
          value="<?php echo $row['first_name']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="last_name" class="col-sm-3 col-form-label">Achternaam:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="last_name" name="last_name" required="required"
          value="<?php echo $row['last_name']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="birth_date" class="col-sm-3 col-form-label">Geboortedatum:</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="birth_date" name="birth_date" required="required"
          value="<?php echo $row['birth_date']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="member_since" class="col-sm-3 col-form-label">Lid sinds:</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="member_since" name="member_since" required="required"
          value="<?php echo $row['member_since']?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <input type="submit" value="Opslaan" name="submit" class="btn btn-primary"/>
          <button onclick="history.back();return false;" class="btn btn-secondary">Annuleer</button>
        </div>
      </div>
    </form>
</body>
</html>