<?php
// file: students.php
// purpose:  define OOP class Book functions to manage database driven data in applicaiton
// code originated from MVC books, edited to students by Joe Brennan
  
Class Student { 

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }
  
  
  function getStudents() {  
      global $db; // $db is object of Class Db(), and is out of scope unless made global inside this method
      $sql='SELECT * FROM students ORDER BY studentLast';  
      $db_result=$db->query($sql);
      return $db_result;
  }


  function getStudent($studentID) {
    global $db;
    $sql='SELECT * FROM students WHERE studentID="'.$studentID.'" ';

    // used for testing 
    print 'sql '.$sql; 
    exit;

    $db_result=$db->query($sql);
    return $db_result;
  }


  function addStudent($studentLast, $studentFirst, $parentID, $classID) {
    global $db;
    
    $sql='INSERT INTO students(studentLast, studentFirst, parentID, classID)
              VALUES("'.$studentLast.'", "'.$studentFirst.'", "'.$parentID.'", "'.$classID.'")';
    
    print 'Testing, addStudent sql '.$sql; 
    exit;
              
    $db_result_set=$db->query($sql);    
    return mysqli_affected_rows();
  }


  function updateStudent($studentID, $studentLast, $studentFirst, $parentID, $classID) {
    global $db;  
    
    $sql='UPDATE students SET studentLast="'.$studentLast.'", studentFirst="'.$studentFirst.'", parentID="'.$parentID.'", 
    classID="'.$classID.'" WHERE studentID="'.$studentID.'" ';
    
    print 'Testing, updateBook sql'.$sql; 
    exit;
        
    $db_result_set=$db->query($sql);
    
    return $db->affectedRows();
  }

  function deleteStudent($studentID) {
    global $db;
    
    $sql='DELETE FROM students WHERE studentID="'.$studentID.'" ';
    
    print 'Testing, deleteStudent sql '.$sql; 
    exit;
        
    $db_result_set=$db->query($sql);
    return mysqli_affected_rows();
  }

}  //   end of Class Student


?>