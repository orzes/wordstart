<?php
// Get the product data


$lname = $_POST['lname'];
$fname = $_POST['fname'];

// Validate inputs
if (empty($lname) || empty($fname)  ) {
    $error = "Invalid student data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO students
                 (studentLast, studentFirst)
              VALUES
                 ('$lname', '$fname')";
    $db->exec($query);

    // Display the Product List page
    include('index.php');
}
?>