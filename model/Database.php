<?php
$dsn = 'mysql:host=136.204.252.60;dbname=cita420wordstart;port=3306';
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

