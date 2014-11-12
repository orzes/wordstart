<?php
//print_r ($_POST);
//exit();

 $lesson_id = $_POST['lesson_id'];
 $student_id = $_POST['student_id'];
 $score_value = $_POST['lesson_score'];
  
// Update Score
require_once('Database.php');
//require_once('model/Score.php');


$query= 'UPDATE scores SET lessonID = "'.$lesson_id.'", studentID = "'.$student_id.'", step_completed = "'.$score_value.'"  WHERE lessonID = "'.$lesson_id.'" ';   
$scores = $db->query($query);
?>
<html>
<head>
<meta http-equiv="refresh" content="4;url=index.php">
</head>
<body>
The lesson has been successfully updated, returning to Student Management....
</body>
</html>








   
  
