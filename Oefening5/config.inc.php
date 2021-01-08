<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'test_spa';

//maak de database-verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

//als de verbinding niet kan gemaakt kan worden: geef een fout melding
if (!$mysqli) {
    echo "Error! Er is iets mis met de Databaseverbinding. <br/>"; 
    exit;
}

//foutmelding zichtbaar maken
// error_reporting(E_ALL);
// ini_set('display_error', '1');
?>