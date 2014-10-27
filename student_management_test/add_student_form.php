<?php
require('database.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- the head section -->
<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">
        <div id="header">
            <h1>Add Student</h1>
        </div>

        <div id="main">
            <h1>Student Information</h1>
            <form action="add_student.php" method="post"
                  id="add_student_form">

                <label>Student Last Name:</label>
                <input type="input" name="lname" />
                <br />

                <label>Student First Name:</label>
                <input type="input" name="fname" />
                <br />

                <!--<label>List Price:</label>
                <input type="input" name="price" />
                <br /> -->

                <label>&nbsp;</label>
                <input type="submit" value="Add Student" />
                <br />
            </form>
            <p><a href="index.php">View Student List</a></p>
        </div><!-- end main -->

        <div id="footer">
            
        </div>

    </div><!-- end page -->
</body>
</html>