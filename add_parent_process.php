<?php

//print_r ($_POST);
// Get the product data
include ('view/header.php');


$parentLast = $_POST['parentLast'];
$parentFirst = $_POST['parentFirst'];
$parentEmail = $_POST['parentEmail'];
$parentPass = $_POST['parentPass'];
$roleID = $_POST['roleID'];

require_once('model/Database.php');
require_once('model/Parents.php');
global $db;
$teacher= new Parents();


$id=$parents->addparents($parentLast, $parentFirst, $parentEmail, $parentPass);


    

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