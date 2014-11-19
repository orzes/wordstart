<?php
Class School { 

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }
  
function getSchools() {
		global $db;
		$query = 'SELECT * FROM schools';
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
	} // get_school()	

 
function getSchool($School_id) {
		global $db;
		   
		$query= 'SELECT * FROM schools WHERE schoolID= :school_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':school_id', $school_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_school($school_id) 


function deleteSchool($school_id) {
		global $db;
		   
		$query= 'DELETE FROM schools WHERE schoolID= :school_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':school_id', $school_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_school($school_id) 

function updateSchool($schoolID, $schoolName) {
		global $db;
		   
		$query= 'UPDATE schools SET schoolName="'.$schoolName.'"' ;
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':school_id', $schoolID);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // get_school($school_id) 

function addSchool(schoolName) {
		global $db;
		   
		$query= 'INSERT INTO schools(schoolName)
              VALUES("'.$schoolName.'")';
		   
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
	} // get_school($school_id) 
	
	

}