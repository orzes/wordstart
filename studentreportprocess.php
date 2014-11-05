<?php



//print_r ($_POST);
//exit();

 $lesson_id = $_POST['lesson_id'];
 $student_id = $_POST['student_id'];
 $score_value = $_POST['lesson_score'];
  
// Update Score
require_once('Database.php');
require_once('model/Score.php');



$score = new Score();

$scoreResult=$score->updateScore($lesson_id, $student_id, $step_completed);

//$sql= 'UPDATE scores SET lessonID = "'.$lesson_id.'", studentID = "'.$student_id.'", step_completed = "'.$score_value.'"  WHERE lessonID = "'.$lesson_id.'" ';
    
//print $sql;


echo "Updating"



   
  

 
?>