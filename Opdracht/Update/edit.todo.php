<?php
require '../config.inc.php';

// $id = $_GET["id"];
$invoer = htmlentities(
    $_POST["invoer"],
    ENT_QUOTES
);
// $id = htmlentities(
//     $_POST["id_todo"],
//     ENT_QUOTES
// );
$id = $_POST["id_todo"];

// $finished = $_POST['complete'];


$result = mysqli_query($mysqli, "UPDATE `todo` SET title='$invoer' WHERE `id`='$id' ");

if ($result) {
    echo "OK";
} else {
    echo "FOUT";
}
