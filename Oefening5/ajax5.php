<?php require "./config.inc.php";
$invoer = htmlentities(
    $_POST["invoer"],
    ENT_QUOTES
);

$result = mysqli_query($mysqli, "INSERT INTO `todo` (`title`) VALUES ('{$invoer}')");
