<!-- Hier wordt het volledige ledenlijst getoond -->
<?php
    require_once '../session.inc.php';
    require_once '../config.inc.php';

    $resultaat = mysqli_query($mysqli, "SELECT * FROM back2_leden ORDER BY last_name");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>LedenBeheer van 84231</title>
</head>
<style>
table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
tr:nth-child(even) {background-color: #f7f7f7;}
</style>
<body style="margin: 10rem">
    <b>PHP Herhaling 2020 | 84231</b>
    <h1>LedenBeheer</h1>
    <div>Overzicht:</div>
    <table>
    <?php
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Geslacht</th>";
        echo "<th>Voornaam</th>";
        echo "<th>Achternaam</th>";
        echo "<th>Geboortedatum</th>";
        echo "<th>Lid sinds</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($resultaat)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['birth_date'] . "</td>";
        echo "<td>" . $row['member_since'] . "</td>";
        echo "<td><a href='lid_bewerk.php?id=". $row['id'] ."'>Bewerken</a></td>";
        echo "<td><a href='lid_verwijder.php?id=". $row['id'] ."'>Verwijderen</a></td>";
        echo "<td><a href='foto.php?id=". $row['id'] ."'>Afbeelding</a></td>";
        echo "</tr>";
        }    

    ?>
    </table>
    <br>
    <p><a href="lid_nieuw.php">Klik hier</a> om een nieuw lid in te schrijven.</p>
    <br>
    <p>Je bent ingelogd als <?php echo $_SESSION['username'];?><br>
    <a href="../Read/logout.php">Klik hier</a> om uit te loggen</p>
      
</body>
</html>