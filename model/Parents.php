<?php
Class Parents {

  public function __construct(){
    // class variables are defined in constructor
    // in this application, all data is stored in the database
    // database table books: id title publisher price first_name last_name description
  }

function getParents() {
        global $db;
        $query = 'SELECT * FROM parents';
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
    } // get_parent()


function getParents($parent_id) {
        global $db;

        $query= 'SELECT * FROM parents WHERE parentID= :parent_id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':parent_id', $parent_id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_parent($parent_id)


function deleteParents($parent_id) {
        global $db;

        $query= 'DELETE FROM parents WHERE parentID= :parent_id';

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':parent_id', $parent_id);
            $statement->execute();
            //$result = $statement->fetch(); Not needed
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_parent($parent_id)

function updateParents($parentID, $parentlast, $parentFirst, $parentEmail, $parentPass) {
        global $db;

        $query= 'UPDATE parents SET parentLast="'.$parentLast.'", parentFirst="'.$parentFirst.'", parentEmail="'.$parentEmail.'", parentPass="'.$parentPass.'"' ;

        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':parent_id', $parentID, ':schoolID', $schoolID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_parent($parent_id)

function addParents($parentLast, $parentFirst, $parentEmail, $parentPass, $roleID) {
        global $db;

        $query= 'INSERT INTO parents(parentLast, parentFirst, parentEmail, parentPass, roleID)
              VALUES("'.$parentLast.'", "'.$parentFirst.'", "'.$parentEmail.'", "'.$parentPass.'","'.$roleID.'")';

        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    } // get_parent($parent_id)



}
