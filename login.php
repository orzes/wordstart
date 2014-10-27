<?php
 
session_start();
include_once("model/teacherLogin.php");
include_once("model/database.php");
//PDO connection 
global $db;
$teacherLogin= new TeacherLogin();
// create tests for Entity: 
// getEntity($id), getEntities(), displayEntity($id), displayEntities(),
// addEntity($array), updateEntity($array), deleteEntity($id)

if(1) {
print '<h1>Login Form - Basic</h1>';
//bobwood@yahoo.com
//wood4144
if($_SESSION['roleID'] == 2 or !$_SESSION['roleID']) { 

print '<form action="login.php" method="post">
First name: <input type="text" name="teachEmail"><br>
Last name: <input type="password" name="teachPass">
<input type="submit" name="submit" value="submit"/>
</form>'; 

} else { 

print 'The ID is '.$_SESSION['id'].' and role id is '.$_SESSION['roleID'].' <a href="?action=logout">logout</a>
<br>
';
}


if($_POST['submit'] == 'submit') { 
$classroom_record=$teacherLogin->loginTeacher($_POST['teachEmail'], $_POST['teachPass']);
	//if(!$classroom_record) { print 'Incorrect login'; }
	header("Location: index.php"); 
	exit();
}

}

if($_GET['action']=='logout') {
$_SESSION['id'] = '';
$_SESSION['roleID'] = '';
	header("Location: login.php"); /* Redirect browser */
	exit();

}