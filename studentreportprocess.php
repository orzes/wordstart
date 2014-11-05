<?php


$lesson_id = $_POST['lesson_id'];
$student_id = $_POST['student_id'];
$score_value = $_POST['lesson_score'];

//print_r ($_POST);
//exit();


// Update Score
require_once('model/Database.php');

$query= 'UPDATE scores SET lessonID = "'.$lesson_id.'", studentID = "'.$student_id.'", step_completed = "'.$score_value.'", 
    WHERE lessonID = "'.$lesson_id.'" ';
    

echo "Updating"


?>