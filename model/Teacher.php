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


function getTeacher($teacher_id) {
        global $db;

        $query= 'SELECT * FROM teachers WHERE teacherID= :teacher_id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':teacher_id', $teacher_id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_teacher($teacher_id)


function deleteTeacher($teacher_id) {
        global $db;

        $query= 'DELETE FROM teachers WHERE teacherID= :teacher_id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':teacher_id', $teacher_id);
            $statement->execute();
            //$result = $statement->fetch(); Not needed
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_teacher($teacher_id)

function updateTeacher($teacherID, $teacherlast, $teacherFirst, $teacherEmail, $teacherPass) {
        global $db;

        $query= 'UPDATE teachers SET teacherLast="'.$teacherLast.'", teacherFirst="'.$teacherFirst.'", teacherEmail="'.$teacherEmail.'", teacherPass="'.$teacherPass.'"' ;

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':teacher_id', $teacherID, ':schoolID', $schoolID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_teacherer($teacher_id)

function addTeacher($teacherLast, $teacherFirst, $teacherEmail, $teacherPass, $roleID) {
        global $db;

        $query= 'INSERT INTO teachers(teacherLast, teacherFirst, teacherEmail, teacherPass, roleID)
              VALUES("'.$teacherLast.'", "'.$teacherFirst.'", "'.$teacherEmail.'", "'.$teacherPass.'","'.$roleID.'")';

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
