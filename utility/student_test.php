<?php
//initializes the session
session_start();
//includes the class file for student and the Database model class file.
include_once("students.php");
include_once("../Db.php");
$db=new Db();

// create tests for Student: 
// getStudent($id), getStudents(), displayStudent($id), displayStudent(),
// addStudent($array), updateStudent($array), deleteStudent($id)

//Note: not sure why but displayStudents() is not working so nothing will display. 
$newstudent = new Student();

if (1) 
{
  print "<p>1 generic get and show </p>";
  $studentID=3;
  
  $studentarray=$newstudent->getStudent($studentID);
  $newstudent->showStudent($studentarray);  
  print_r($studentarray);
    echo '<br /><br />';
}

if (0) 
{
  print "<p>2 show all students</p>";
  $result=$newstudent->getStudents();
  $newstudent->showStudents($result);
  echo '<br /><br />';
}

if(0) 
{
  print "<p>3 insertStudent(array)</p>";
  // define post vars
 // $p['studentID']=8; 
  $p['studentFirst']= 'first999'; 	
  $p['studentLast']= 'last999' ; 	
  $p['parentID']='699'; 	
  $p['classID']='699';		

  
  $last=$newstudent->insertStudent($p);
  $studentarray=$newstudent->getStudent($last);
  $newstudent->showStudent($studentarray); 
  
  echo '<br /><br />';
}


if(0) {
  print "<p>4 update($ ID, $ array)</p>";
  
  // define post vars
  $ID= 5;  // must define for update query WHERE
  $p['studentID']=8; 
  $p['studentFirst']= 'first999'; 	
  $p['studentLast']= 'last999' ; 	
  $p['parentID']='699'; 	
  $p['classID']='699';		

   
  $newstudent->updateStudent($ID, $p);  
  $student=$newstudent->getStudent($ID); 
  $newstudent->showStudent($student);  
  echo '<br /><br />';
}


if(0) {
  print "<p>5 delete($ studentid)</p>";
  $studentID=5;
  
  $newstudent->deleteStudent($studentID);
  echo '<br /><br />';
}



?>