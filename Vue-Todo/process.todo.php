<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "spa";

$db = new mysqli($host, $username, $password, $database);
if ($db->connect_error) {
    die("Connection Failed..." . $db->connect_error);
}
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
        $result['message'] = "Todo added successfully!";
    } else {
        $result['error'] = true;
        $result['message'] = "Failed to add Todo";
    }
}
if ($action == 'update') {
    // form credentials
    $id = $_POST['id'];
    $name = $_POST['title'];
    $finished = $_POST['complete'];


    $sql = $db->query("UPDATE `todo` SET title='$name', complete=$finished WHERE `id`='$id' ");
    if ($sql) {
        $result['message'] = "Todo updated successfully!";
    } else {
        $result['error'] = true;
        $result['message'] = "Failed to update Todo";
    }
}
if ($action == 'delete') {
    // form credentials
    $id = $_POST['id'];
    $sql = $db->query("DELETE FROM todo WHERE id='$id'");
    if ($sql) {
        $result['message'] = "Todo deleted successfully!";
    } else {
        $result['error'] = true;
        $result['message'] = "Failed to delete Todo";
    }
}

$db->close();
echo json_encode($result);
