<?php
//print_r ($_POST);
//exit();
include 'view/header.php';
include 'footer.php';

 $lesson_id = $_POST['lesson_id'];
 $student_id = $_POST['student_id'];
 $score_value = $_POST['lesson_score'];
 $time = $_POST['time'];

// Update Score
require_once('Database.php');
//require_once('model/Score.php');


$query= 'UPDATE scores SET time = "'.$time.'", lessonID = "'.$lesson_id.'", studentID = "'.$student_id.'", step_completed = "'.$score_value.'"  WHERE lessonID = "'.$lesson_id.'" ';   
$scores = $db->query($query);
?>
<html>
<head>
<meta http-equiv="refresh" content="2;url=index.php">
</head>
<body>
The lesson has been successfully updated, returning to Student Management....
</body>
</html>








   
  
