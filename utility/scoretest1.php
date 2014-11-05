<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include_once("../model/Score.php");
include_once("../model/Database.php");
//PDO connection 
global $db;
$score= new Score();
// create tests for Entity: 
// getEntity($id), getEntities(), displayEntity($id), displayEntities(),
// addEntity($array), updateEntity($array), deleteEntity($id)
//test calls all the Scoress. 
if (1) {
//this is PDO styling rules 
print '<h1>1 get all the scores - PDO </h1>';
$score_record_set=$score->getScores();
    foreach($score_record_set as $score_record) {
      print_r($score_record);
      print '<br><br>';
    } 
}

if(1) {
print '<h1>2 get the score</h1>';
$lesson_id=2;
$student_id=1;
$score_record=$score->getScore($lesson_id,$student_id);
print_r($score_record);

}
?>