<?php
//CLASS:      Lesson
//PURPOSE:    Manage records for table lessons (SELECT, ADD, UPDATE, DELETE)
//DEVELOPER:  Taylor McDowell
//CHANGE LOG: 10/06/2014
Class Lesson { 

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
  }

//GET ALL of the lessons  
function getLessons() {
		global $db;
		$query = 'SELECT * FROM lessons';
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
	} // getLessons()

//GET ONE lesson specified 
function getLesson($lesson_id) {
		global $db;
		   
		$query= 'SELECT * FROM lessons WHERE lessonID= :lesson_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':lesson_id', $lesson_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} //getLesson(lesson_id)

//DELETE ONE lesson record
function deleteLesson($lesson_id) {
		global $db;
		   
		$query= 'DELETE FROM lessons WHERE lessonID= :lesson_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':lesson_id', $lesson_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // deleteLesson(lesson_id) 

//UPDATE the selected record
function updateLesson($lesson_id, $lesson_name) {
		global $db;
		   
		$query= 'UPDATE lessons SET lessonID="'.$lesson_id.'", lessonName="'.$lesson_name.'"';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':lesson_id', $lesson_id, ':lesson_name', $lesson_name);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // updateLesson(lesson_id, lesson_name) 

//ADD another lesson to the table
function addLesson($lesson_name) {
		global $db;
		   
		$query= 'INSERT INTO lessons(lessonName)
              VALUES("'.$lesson_name.'")';
		   
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
	} // addLesson(lesson_name) 
}