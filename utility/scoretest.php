 <?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
 
session_start();
include_once("Model/Score.php");
include_once("../database.php");
//PDO connection 
global $db;
$score= new Score();
// create tests for Entity: 
// getEntity($id), getEntities(), displayEntity($id), displayEntities(),
// addEntity($array), updateEntity($array), deleteEntity($id)
//test calls all the Teachers. 
if (1) {
//this is PDO styling rules 
print '<h1>1 get all the scores - PDO </h1>';
$score_record_set=$score->getScores();
foreach($score_record_set as $score_record) {
  print_r($score_record);
  print '<br><br>';
} }
if(1) {
print '<h1>2 get the score</h1>';
$lesson_id=2;
$student_id=1;
$score_record=$score->getScore($score_id, $student_id);
print_r($score_record);

}
if(1) {
	//this works
  print "<h1>3 insert Scores</h1>";
  $teachLast= '1'; 	
 

  $id=$score->addscore($teachLast, $teachFirst, $teachEmail, $teachPass);

}

if(1) {
  print "<h1>4 update Teachers</h1>";
  $teachID= '2'; 
  $teachLast= '9'; 	
  $teachFirst= '9' ; 	
  $teachEmail='9'; 	
  $teachPass='9';

  $teachID=$score->updatescore($teachID, $teachLast, $teachFirst, $teachEmail, $teachPass);
  $score_record=$score->getscore($teachID);
  print_r($score_record);
  echo '<br /><br />';
}

if(0) {
  print "<h1>5 delete score</h1>";
  $scoreID=1;
  
  $score->deleteTeacher($scoreID);
  echo '<br /><br />';

}