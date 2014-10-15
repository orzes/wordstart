<?php
//CLASS:      Score
//PURPOSE:    Manage records for table scores (SELECT, ADD, UPDATE, DELETE)
//DEVELOPER:  Taylor McDowell
//CHANGE LOG: 10/15/2014
Class Score { 

  public function __construct(){
    //global variables for score accumulation during lessons...
    var $current_score = 0;
  }
  
  //INTERACTION related methods...
  //...
  //...
  function setPoints($value) {
    if ($count <= 6) {
      $this->current_score = $value;
    }
    else if ($count < 0){
      return "Invalid value. Cannot accept negatives!";
    }
    else {
      return "There are only 6 steps in a lesson.";
    }
  }
  
  function addPoint() {
    if ($count < 6) {
      $this->current_score += 1;
    }
    else {
      return "The score is perfect!";
    }
  }
  
  //DATABASE related methods...
  //...
  //...
  function getScores() {
		global $db;
		$query = 'SELECT * FROM scores, lessons, students WHERE scores.lessonID = lessons.lessonID AND scores.studentID = students.studentID';
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
	} // getScores()	

  function getScore($lesson_id, $student_id) {
		global $db;
		   
		$query= 'SELECT * FROM scores WHERE lessonID = :lesson_id AND studentID = :student_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':lesson_id', $lesson_id, ':student_id', $student_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // getScore(lesson_id) 

  function deleteScore($lesson_id, $student_id) {
		global $db;
		   
		$query= 'DELETE FROM scores WHERE lessonID = :lesson_id AND studentID = :student_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':lesson_id', $lesson_id, ':student_id', $student_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // deleteScore($lesson_id, $student_id) 

  function updateScore($lesson_id, $student_id, $score_value) {
		global $db;
		   
		$query= 'UPDATE scores SET lessonID = "'.$lesson_id.'", studentID = "'.$student_id.'", score = "'.$score_value.'", 
    WHERE lessonID = :lesson_id';
		   
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
	} // updateScore(lesson_id, student_id, score_value) 

  function addScore($lesson_id, $student_id, $score_value) {
		global $db;
		   
		$query= 'INSERT INTO scores(lessonID, studentID, score)
              VALUES("'.$lesson_id.'", "'.$student_id.'", "'.$score_value.'")';
		   
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
	} // addScore(lesson_id, student_id, score_value) 
}