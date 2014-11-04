<?php 
// file: get lesson id.php
// action: set the variable that is sent through as post in a session
session_start();
$_SESSION['variable'] = $_GET['variable'];
print 'session '.$_SESSION['variable'];
?>
