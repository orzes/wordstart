<?php
Class TeacherLogin { 

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }
  
function loginTeacher($teacherEmail, $teacherPassword) {
		global $db;
		$query= 'SELECT * FROM teachers WHERE teacherEmail = "'.$teacherEmail.'" AND teacherPass = "'.$teacherPassword.'"';
		   
		try {
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			if($result) { 
			
			$_SESSION['roleID'] = $result['roleID']; 
			$_SESSION['teacherID'] = $result['teacherID']; 
			
			} 
			
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
} // get_classoom($classroom_id) 
	
	

}