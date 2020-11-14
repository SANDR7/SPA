<!-- Foto's uploaden met beveiliging -->
<?php   
// lees het ID uit de URL
    $id = $_GET['id'];
    
    $bestand = $_FILES['foto'];
    echo "<pre>";
        var_dump($bestand); 
    echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Afbeelding uploaden</title>
</head>
<style>
    label {
        font-weight: bold;
    }
</style>
<body style="margin: 10rem">
    <b>PHP Herhaling 2020 | 84231</b>
    <h1>FOTO</h1>
    <div>Afbeelding uploaden</div>
    <br>
    <form action="../Update/foto_verwerk.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" name="id" value="<?php echo $id;?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Upload foto</label>
            <div class="col-sm-10">
                <input type="file" class="btn btn-secondary" id="foto" name="foto" required="required" style="cursor:pointer">
            </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-10">
          <input type="submit" value="Uploaden" name="submit" id="submit" class="btn btn-primary"/>
          <button onclick="history.back();return false;" class="btn btn-secondary">Annuleer</button>
        </div>
      </div>
    </form>
    <?php
    if (file_exists(__DIR__  .'..'.'/uploads/'.$id.'.jpg')) {
        echo "<div><img src='../uploads/" . $id .".jpg' alt='foto' /></div>";

    }
    ?>
</body>

</html>