<?php

//print_r ($_POST);
// Get the product data
include ('view/header.php');


$studentLast = $_POST['studentLast'];
$studentFirst = $_POST['studentFirst'];
$classroomID = $_POST['classroomID'];
$parentID = $_POST['parent'];
$roleID = $_POST['role'];

require_once('model/Database.php');



 $query='INSERT INTO students(studentLast, studentFirst, parentID, classroomID, roleID)
                VALUES("'.$studentLast.'", "'.$studentFirst.'", "'.$parentID.'", "'.$classroomID.'", "'.$roleID.'")';

  //print_r($query);
    $scores = $db->query($query);
     
    

?>
<html>
<head>
<meta http-equiv="refresh" content="2;url=index.php">
</head>
<body>
The Student has been successfully added, returning to Student Management....
</body>
</html>
<?php include ('view/footer.php'); ?>