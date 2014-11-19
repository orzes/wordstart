<?php

//print_r ($_POST);
// Get the product data
include ('view/header.php');



$schoolID = $_POST['schoolID'];
$schoolName = $_POST['schoolName'];


require_once('model/Database.php');
require_once('model/School.php');
global $db;
$school= new School();


$id=$school->addschool($schoolName);


 //$query='INSERT INTO schools(schoolID, schoolName)
                //VALUES("'.$schoolID.'", "'.$schoolName.'")';

  //print_r($query);
   // $scores = $db->query($query);
     
    

?>
<html>
<head>
<meta http-equiv="refresh" content="2;url=index.php">
</head>
<body>
The School has been successfully added, returning to Student Management....
</body>
</html>
<?php include ('view/footer.php'); ?>