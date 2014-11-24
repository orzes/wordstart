<?php
/*file: index.php

  This application illustrates a Model-View-Controller MVC framework

  The Model: manages all database driven data in the application.
  The View: builds the html interface the user interacts with in the application.
  The Controller: manages user interaction (link, button events).

  This file, index.php is the "controller" script in the MVC framework
  Based on user input, a local $controller variable calls "model" functions, and builds appropriate "views".   */
include 'view/header.php';

require('model/Database.php');
require("model/teacherLogin.php");
require("model/Students.php");
require("model/Teacher.php");
require("model/Parents.php");

global $db;
session_start();
if($_SESSION['roleID'] == 1) {
//do nothing
}
else {
//do nothing
}
if (isset($_POST['controller'])) {
        $controller = $_POST['controller'];
    } else if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    } else {
        $controller = 'studentsList';// default
    }
/*
--------------------------------------
Controller
--------------------------------------



--------------------------------------
Model
--------------------------------------
classrooms
lessons
students
database


--------------------------------------
Views
--------------------------------------
debugView.php
*/




/********** Debug View ****************************************************************************/

//include('view/debugView.php');

/**************************************************************************************************/


/**********  controller: list all students in database  **********************************************/
if ($controller == 'studentslist') {
  $students=new Student();

  $studentResult=$student->getStudents();

  include('view/studentList.php');
}  /***********************************************************************************************/


/**********  controller:  show the form to add a student  ********************************************/
else if ($controller == 'studentAddForm') {
  //include('view/studentAddForm.php');
}  /***********************************************************************************************/


/**********  controller: process the html form vars and INSERT a student record  *********************/
else if ($controller=='studentAddProcess') {
  // include('view/debugView.php');
  $student=new Student();
/*
  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $price=$_POST['price'];
  $first_name=$_POST['authorFirstName'];
  $last_name=$_POST['authorLastName'];
  $description=$_POST['description'];
*/
//$studentLast
//$studentFirst
  $studentResult=$student->addStudent($studentLast, $studentFirst, 1,1);

  if($studentResult==1) {
    header("Location: index.php");
  }
  else {
    print '<p>The student was NOT successfully added.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: show html form to add a new student  ***************************************/
else if ($controller=='studentUpdateForm') {
  // include('view/debugView.php');

  $student=new Student();
  $id=$_GET['id'];

  $studentResult=$student->getStudent($id);
  $row=mysqli_fetch_assoc($studentResult);

  include('view/studentUpdateForm.php');
}  /***********************************************************************************************/


/**********  controller: process html form vars, build and execute INSERT query  ******************/
else if ($controller=='studentUpdateFormProcess') {
  // include('view/debugView.php');

  $student=new Student();
/*
  $id=$_POST['id'];
  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $price=$_POST['price'];
  $first_name=$_POST['authorFirstName'];
  $last_name=$_POST['authorLastName'];
  $description=$_POST['description'];

  $studentResult=$student->updateStudent($id, $title, $publisher, $price, $first_name, $last_name, $description);
*/
  if($studentResult==1) {
    header("Location: index.php?controller=studentsManage");
  }
  else {
    print '<p>The student was NOT successfully updated.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: show list of students with links to update and delete a student record  **********/
else if ($controller=='studentsManage') {
  // include('view/debugView.php');

  $student=new Student();
  $studentResult=$student->getStudents();

  include('view/studentsManage.php');
}  /***********************************************************************************************/


/* *********  controller: process html form vars, build and execute INSERT query  ******************/
else if ($controller=='studentUpdateProcess') {
  // include('view/debugView.php');

  $student=new Student();
/*
  $studentid=$_POST['studentID'];
  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $price=$_POST['price'];
  $first_name=$_POST['authorFirstName'];
  $last_name=$_POST['authorLastName'];
  $description=$_POST['description'];
*/
$studentResult=$student->updateStudent($id, $title, $publisher, $price, $first_name, $last_name, $description);

  if($studentResult==1) {
    header("Location: index.php?controller=studentsManage");
  }
  else {
    print '<p>The student was NOT successfully updated.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: execute delete query  *******************************************************/
else if ($controller=='studentDeleteProcess') {
  // include('view/debugView.php');

  $id=$_GET['id'];
  $student=new Student();
  $studentResult=$student->deleteStudent($id);

  if($studentResult==1) {
    header("Location: index.php?controller=studentsManage");
  }
  else {
    print '<p>The student was NOT successfully deleted.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: show html form to manage user input of title search term  ***************/
if ($controller == 'studentSearchTitleForm') {
 // include('view/debugView.php');

  include('view/studentSearchTitleForm.php');
}  /***********************************************************************************************/


/**********  controller: search student database using search term  **************************************/
if ($controller == 'studentSearchProcess') {
  // include('view/debugView.php');

  $searchTerm=$_POST['searchTerm'];

  $student=new Student();
  $studentResult=$student->searchStudentsByName($searchTerm);

  // the view studentList.php used with results of search
  include('view/studentsList.php');
}  /***********************************************************************************************/






/**********  TEACHER PART CREATED BY SAM AND JOE  **************************************/



if ($controller == 'login') {
  // include('view/debugView.php');

  $teacherLogin= new TeacherLogin();
  // the view studentList.php used with results of search
  include('view/loginView.php');
}  /***********************************************************************************************/

       /**********  controller: search student database using search term  **************************************/
if ($controller == 'logout') {
    //created by sam ryan
    //edited: 11/19/14
    //login form
$_SESSION['id'] = '';
$_SESSION['roleID'] = '';
    header("Location: index.php?controller=login"); /* Redirect browser */
    exit();
}  /***********************************************************************************************/

 if ($controller == 'addTeacher') {
    //created by sam ryan
    //edited: 11/19/14
  // the view studentList.php used with results of search
  include('view/addTeacher.php');
}  /***********************************************************************************************/

if ($controller == 'addTeacherProcess') {
    //created by sam ryan
    //edited: 11/19/14
    //add teacher process
 $teacher= new Teacher();


$teachLast = $_POST['teachLast'];
$teachFirst = $_POST['teachFirst'];
$teachEmail = $_POST['teachEmail'];
$teachPass = $_POST['teachPass'];
$roleID = $_POST['roleID'];


$id=$teacher->addTeacher($teachLast, $teachFirst, $teachEmail, $teachPass, $roleID);

header('Location: ?controller=getTeachers');
exit();

}  /***********************************************************************************************/
 if ($controller == 'getTeachers') {
    //created by sam ryan
    //edited: 11/19/14
    //get teacher process
$teacher= new Teacher();


$teacherResult=$teacher->getTeachers();


  include('view/getTeachers.php');
}  /***********************************************************************************************/


  if ($controller == 'deleteTeacherProcess') {
    //created by sam ryan
    //edited: 11/19/14
    //delete teacher process
$teacher= new Teacher();

$id = $_GET['teacherid'];

$teacherResult=$teacher->deleteTeacher($id);
header('Location: ?controller=getTeachers');
exit();

  include('view/getTeachers.php');
}  /***********************************************************************************************/

include 'view/footer.php';
?>
