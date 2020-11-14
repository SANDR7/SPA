<!-- Hier wordt alle instellingen ingesteld -->
<?php

    //database logingegevens
    $db_hostname = '127.0.0.1';
    $db_username = '84231_Back1-2';
    $db_password = 'y7yVJrA.9j';
    $db_database = '84231_Back1-2';


    // //database logingegevens local
    // $db_hostname = 'localhost';
    // $db_username = 'root';
    // $db_password = '';
    // $db_database = 'back2local';

    //maak de database-verbinding
    $mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

    //als de verbinding niet kan gemaakt kan worden: geef een fout melding
    if (!$mysqli) {
        echo "Error! Er is iets mis met de Databaseverbinding. <br/>";
        // echo `Error: ${mysqli_connect_errno()} <br/>`;
        // echo `Error: ${mysqli_connect_error()} <br/>`;
        exit;
    }

    //foutmelding zichtbaar maken
    error_reporting(E_ALL);
    ini_set('display_error', '1');
?>