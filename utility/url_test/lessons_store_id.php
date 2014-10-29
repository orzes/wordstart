<?php
// file: lessons_store_id.php

session_start();

print '<p>post array ';
print_r($_POST);

print '<p>get array ';
print_r($_GET);

print '<p>session array ';
print_r($_SESSION);

$_SESSION['lesson_store_id']=$_GET['variable'];

// print 'file sessions store id, ln 14: Session lesson store id: '.$_SESSION['lesson_store_id'];

?>