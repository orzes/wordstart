 <?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
 
session_start();
include_once("../model/Teacher.php");
include_once("../model/Database.php");
//PDO connection 
global $db;
$teacher= new Teacher();
// create tests for Entity: 
// getEntity($id), getEntities(), displayEntity($id), displayEntities(),
// addEntity($array), updateEntity($array), deleteEntity($id)

//test calls all the Teachers. 
if (1) {
//this is PDO styling rules 
print '<h1>1 get all the teacher - PDO </h1>';
$teacher_record_set=$teacher->getTeachers();
foreach($teacher_record_set as $teacher_record) {
  print_r($teacher_record);
  print '<br><br>';
} }
if(1) {
print '<h1>2 get the teacher</h1>';
$teacher_id=2;
$teacher_record=$teacher->getTeacher($teacher_id);
print_r($teacher_record);

}
if(0) {
	//this works
  print "<h1>3 insert Teachers</h1>";
  $teachLast= '1'; 	
  $teachFirst= '1' ; 	
  $teachEmail='1'; 	
  $teachPass='1';	

  $id=$teacher->addteacher($teachLast, $teachFirst, $teachEmail, $teachPass);

}
 

if(0) {
  print "<h1>4 update Teachers</h1>";
  $teachID= '2'; 
  $teachLast= '9'; 	
  $teachFirst= '9' ; 	
  $teachEmail='9'; 	
  $teachPass='9';

  $teachID=$teacher->updateteacher($teachID, $teachLast, $teachFirst, $teachEmail, $teachPass);
  $teacher_record=$teacher->getteacher($teachID);
  print_r($teacher_record);
  echo '<br /><br />';
}


if(0) {
  print "<h1>5 delete teacher</h1>";
  $teacherID=1;
  
  $teacher->deleteTeacher($teacherID);
  echo '<br /><br />';

}




