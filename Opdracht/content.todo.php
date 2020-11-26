<?php
require './config.inc.php';

$data = [];

$result = mysqli_query($mysqli, "SELECT * FROM `todo`");
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

$dist =  json_encode($data);

echo $dist;

