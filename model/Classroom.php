<?php
Class Classroom { 

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }
  
function getClassrooms() {
		global $db;
		$query = 'SELECT * FROM classrooms, teachers, schools WHERE classrooms.teachID = teachers.teachID  AND schools.schoolID=classrooms.schoolID';
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
	} // get_classoom()	

 
function getClassroom($classroom_id) {
		global $db;
		   
		$query= 'SELECT * FROM classrooms WHERE classroomID= :classroom_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':classroom_id', $classroom_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_classoom($classroom_id) 


function deleteClassroom($classroom_id) {
		global $db;
		   
		$query= 'DELETE FROM classrooms WHERE classroomID= :classroom_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':classroom_id', $classroom_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_classoom($classroom_id) 

function updateClassroom($classroomID, $classSection, $classGradeLevel, $teachID, $schoolID) {
		global $db;
		   
		$query= 'UPDATE classrooms SET classSection="'.$classSection.'", classGradeLevel="'.$classGradeLevel.'", teachID="'.$teachID.'", 
    schoolID= :schoolID WHERE classroomID = :classroom_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':classroom_id', $classroomID, ':schoolID', $schoolID);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_classoom($classroom_id) 

function addClassroom($classSection, $classGradeLevel, $teachID, $schoolID) {
		global $db;
		   
		$query= 'INSERT INTO classrooms(classSection, classGradeLevel, teachID, schoolID)
              VALUES("'.$classSection.'", "'.$classGradeLevel.'", "'.$teachID.'", "'.$schoolID.'")';
		   
		try {
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_classoom($classroom_id) 
	
	

}