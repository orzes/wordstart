<?php
//CLASS:      Score
//PURPOSE:    Manage records for table scores (SELECT, ADD, UPDATE, DELETE)
//DEVELOPER:  Taylor McDowell
//CHANGE LOG: 11/3/2014
Class Score { 

  public function __construct(){
    //global variables for score accumulation during lessons...
    //var $current_score = 0;
    //var $current_time = '0000';
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
		   
		$query= 'SELECT * FROM scores WHERE scoreID = :score_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':score_id', $score_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // getScore(score_id) 

  function deleteScore($score_id) {
		global $db;
		   
		$query= 'DELETE FROM scores WHERE scoreID = :score_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':score_id', $score_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // deleteScore($lesson_id, $student_id) 

  function updateScore($score_id, $lesson_id, $student_id, $step_completed, $time) {
		global $db;
		   
		$query= 'UPDATE scores SET lessonID = "'.$lesson_id.'", studentID = "'.$student_id.'", step_completed = "'.$step_completed.'", time = "'.$time.'"';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':lesson_id', $lesson_id);
            $statement->bindValue(':student_id', $student_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();                                                                              
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // updateScore(lesson_id, student_id, step_completed, time) 

  function addScore($lesson_id, $student_id, $step_completed, $time) {
		global $db;
		   
		$query= 'INSERT INTO scores(lessonID, studentID, step_completed, time)
              VALUES("'.$lesson_id.'", "'.$student_id.'", "'.$step_completed.'", "'.$time.'")';
		try {
			$statement = $db->prepare($query);
			$statement->execute();
			//$result = $statement->fetch();
			$statement->closeCursor();
			//return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
	} // addScore(lesson_id, student_id, step_completed, time) 
}