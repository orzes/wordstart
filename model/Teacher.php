<?php
Class Teacher { 

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }
  
function getTeachers() {
		global $db;
		$query = 'SELECT * FROM teachers';
		try {
			$statement = $db->prepare($query);
			// $statement->bindValue(':category_id', $category_id);
			$statement->execute();
			$result = $statement->fetchAll();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_teacher()	

 
function getTeacher($teach_id) {
		global $db;
		   
		$query= 'SELECT * FROM teachers WHERE teachID= :teach_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':teach_id', $teach_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_teacher($teach_id) 


function deleteTeacher($teach_id) {
		global $db;
		   
		$query= 'DELETE FROM teachers WHERE teacherID= :teach_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':teach_id', $teach_id);
			$statement->execute();
			//$result = $statement->fetch(); Not needed
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_teacher($teach_id) 

function updateTeacher($teachID, $teachlast, $teachFirst, $teachEmail, $teachPass) {
		global $db;
		   
		$query= 'UPDATE teachers SET teachLast="'.$teachLast.'", teachFirst="'.$teachFirst.'", teachEmail="'.$teachEmail.'", teachPass="'.$teachPass.'"' ;
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':teach_id', $teachID, ':schoolID', $schoolID);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_teacher($teach_id) 

function addTeacher($teachLast, $teachFirst, $teachEmail, $teachPass, $roleID) {
		global $db;
		   
		$query= 'INSERT INTO teachers(teacherLast, teacherFirst, teacherEmail, teacherPass, roleID)
              VALUES("'.$teachLast.'", "'.$teachFirst.'", "'.$teachEmail.'", "'.$teachPass.'","'.$roleID.'")';
		   
		try {
			$statement = $db->prepare($query);
			$statement->execute();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_teacher($teacher_id) 
	
	

}