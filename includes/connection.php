<?php
function getDBConnection() {
    $config = include 'config.php';

    $dbhost = $config['dbhost'];
    $dbuser = $config['dbuser'];
    $dbpass = $config['dbpass'];
    $dbname = $config['dbname'];

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}