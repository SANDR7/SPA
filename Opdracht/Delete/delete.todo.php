<?php require "../config.inc.php";
$ID = htmlentities(
    $_GET["id"],
    ENT_QUOTES
);

$result = mysqli_query($mysqli, "DELETE FROM `todo` WHERE `id` = $ID");


if ($result) {
    echo "OK";
} else {
    echo "FOUT";
}


