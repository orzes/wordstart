<?php
$dsn = 'mysql:host=localhost;dbname=cita420wordstart';
$username = 'webuser';
$password = 'webuser';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'database_error.php';
    exit;
}

function display_db_error($error_message) {
    global $app_path;
    include 'database_error.php';
    exit;
}

