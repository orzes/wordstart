<?php
// file: lessons_store_id.php

session_start();

$_SESSION['lesson_store_id']=$_POST['url_data'];
print_r($_SESSION);

?>