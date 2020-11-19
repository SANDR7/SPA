<?php
require './config.inc.php';

$data = [];

$result = mysqli_query($mysqli, "SELECT * FROM `todo`");
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);
