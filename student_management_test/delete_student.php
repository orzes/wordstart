<?php
// Get IDs
$student_id = $_POST['studentID'];


// Delete the product from the database
require_once('database.php');
$query = "DELETE FROM students
          WHERE studentID = '$student_id'";
$db->exec($query);

// display the Product List page
include('index.php');
?>