<?php

//print_r ($_POST);
// Get the product data
include ('view/header.php');


$teachLast = $_POST['teachLast'];
$teachFirst = $_POST['teachFirst'];
$teachEmail = $_POST['teachEmail'];
$teachPass = $_POST['parent'];
$roleID = $_POST['roleID'];

require_once('model/Database.php');
require_once('model/Teacher.php');
global $db;
$teacher= new Teacher();


$id=$teacher->addteacher($teachLast, $teachFirst, $teachEmail, $teachPass);

 //$query='INSERT INTO teachers(teachLast, teachFirst, teachEmail, teachPass, roleID)
//                VALUES("'.$teachLast.'", "'.$teachFirst.'", "'.$teachEmail.'", "'.$teachPass.'", "'.$roleID.'")';

  //print_r($query);
//    $scores = $db->query($query);
     
    

?>
<html>
<head>
<meta http-equiv="refresh" content="2;url=index.php">
</head>
<body>
The Teacher has been successfully added, returning to Teacher Management....
</body>
</html>
<?php include ('view/footer.php'); ?>