 <?php
 
session_start();
include_once("../model/Classroom.php");
include_once("../model/Database.php");
//PDO connection 
global $db;
$classroom= new Classroom();
// create tests for Entity: 
// getEntity($id), getEntities(), displayEntity($id), displayEntities(),
// addEntity($array), updateEntity($array), deleteEntity($id)

//test calls all the classrooms. 
if (1) {
//this is PDO styling rules 
print '<h1>1 get all the classrooms - PDO </h1>';
$classroom_record_set=$classroom->getClassrooms();
foreach($classroom_record_set as $classroom_record) {
  print_r($classroom_record);
  print '<br><br>';
} }
if(1) {
print '<h1>2 get the classroom</h1>';
$classroom_id=2;
$classroom_record=$classroom->getClassroom($classroom_id);
print_r($classroom_record);

}
if(0) {
	//this works
  print "<h1>3 insert Classroom</h1>";
  $classSection= '1'; 	
  $classGradeLevel= '1' ; 	
  $teachID='1'; 	
  $schoolID='1';	

  $id=$classroom->addClassroom($classSection, $classGradeLevel, $teachID, $schoolID);

}
 

if(0) {
  print "<h1>4 update classrooms</h1>";
  $classroomID= '2'; 
  $classSection= '9'; 	
  $classGradeLevel= '9' ; 	
  $teachID='9'; 	
  $schoolID='9';

  $classroomID=$classroom->updateClassroom($classroomID, $classSection, $classGradeLevel, $teachID, $schoolID);
  $classroom_record=$classroom->getClassroom($classroomID);
  print_r($classroom_record);
  echo '<br /><br />';
}


if(0) {
  print "<h1>5 delete classroom</h1>";
  $classroomID=1;
  
  $classroom->deleteClassroom($classroomID);
  echo '<br /><br />';
}




