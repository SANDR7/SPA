<?php
$host = "127.0.0.1";
$username = "84231";
$password = "Abmp!019";
$database = "84231_Back1-2";

// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "spa";

$db = new mysqli($host, $username, $password, $database);
if ($db->connect_error) {
    die("Connection Failed..." . $db->connect_error);
}
//================================================================================ 
//===================================if statements spreken voor zich 
//================================================================================ 
$result = array('error' => false);
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action == 'read') {
    $sql = $db->query("SELECT * FROM todo");
    $todos = array();
    while ($row = $sql->fetch_assoc()) {
        array_push($todos, $row);
    }

    $result['todos'] = $todos;
}

if ($action == 'create') {
    // form credentials
    $name = $_POST['name'];
    // $finished = $_PORT['finished'];

    $sql = $db->query("INSERT INTO todo (title, complete) VALUES('$name', 0)");
    if ($sql) {
        $result['message'] = "Todo succesvol toegevoegd!";
    } else {
        $result['error'] = true;
        $result['message'] = "Fout bij Todo toevoegen";
    }
}
if ($action == 'update') {
    // form credentials
    $id = $_POST['id'];
    $name = $_POST['title'];
    $name = str_replace("'", "\'", $name);
    $finished = $_POST['complete'];


    $sql = $db->query("UPDATE `todo` SET title='$name' , complete=$finished WHERE `id`='$id' ");
    if ($sql) {
        $result['message'] = "Todo succesvol bijgewerkt!";
    } else {
        $result['error'] = true;
        $result['message'] = "Fout bij Todo updaten";
    }
}
if ($action == 'delete') {
    // form credentials
    $id = $_POST['id'];
    $sql = $db->query("DELETE FROM todo WHERE id='$id'");
    if ($sql) {
        $result['message'] = "Todo succesvol verwijderd!";
    } else {
        $result['error'] = true;
        $result['message'] = "Fout bij Todo verwijderen";
    }
}

$db->close();
echo json_encode($result);
