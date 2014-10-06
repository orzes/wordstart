<?php
// file: students.php
// purpose:  define OOP class Book functions to manage database driven data in applicaiton
// code originated from MVC books, edited to students by Joe Brennan
  
Class Student { 

  public function __construct()
  {
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }
  
  
  function getStudents() 
  {  
      global $db; // $db is object of Class Db(), and is out of scope unless made global inside this method
		$query = 'SELECT * FROM students, parents, classrooms WHERE students.parentID = parents.parentID  AND students.classroomID=classrooms.classroomID';
      try 
      {
			$statement = $db->prepare($query);
			// $statement->bindValue(':category_id', $category_id);
			$statement->execute();
			//$result = $statement->fetchAll();
			$statement->closeCursor();
			return $result;
      } 
      catch (PDOException $e) 
      {
			$error_message = $e->getMessage();
			display_db_error($error_message);
      }
  } // getStudents()	
  
  function getStudent($studentID) 
  {
    global $db;
$query= 'SELECT * FROM students WHERE studentID= :student_id';
		   
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':student_id', $student_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
  } // getStudent($student_id)

    function addStudent($studentLast, $studentFirst, $parentID, $classroomID) 
    {
        global $db;

        $query='INSERT INTO students(studentLast, studentFirst, parentID, classroomID)
                VALUES("'.$studentLast.'", "'.$studentFirst.'", "'.$parentID.'", "'.$classroomID.'")';

        try 
        {
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} 
        catch (PDOException $e) 
        {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
    }//end function addStudent


  function updateStudent($studentID, $studentLast, $studentFirst, $parentID, $classroomID) {
    global $db;  
    
    $query= 'UPDATE students SET studentLast="'.$studentLast.'", studentFirst="'.$studentFirst.'", parentID="'.$parentID.'", 
    classroomID="'.$classroomID.'" WHERE studentID="'.$studentID.'" ';
    
        try 
        {
			$statement = $db->prepare($query);
			$statement->bindValue(':student_id', $studentID);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		} 
        catch (PDOException $e) 
        {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
  }

  function deleteStudent($studentID) {
    global $db;
    
    $query='DELETE FROM students WHERE studentID="'.$studentID.'" ';
    
      try 
      {
			$statement = $db->prepare($query);
			$statement->bindValue(':classroom_id', $classroom_id);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
      } 
      catch (PDOException $e) 
        {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
  }

}  //   end of Class Student


?>