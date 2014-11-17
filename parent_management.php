<?php
session_start();
//if($_SESSION['roleID'] == 1) { 
//do nothing
//} else { 
//print 'Please login to see this page'; 
//exit();
//}

    require_once('model/Database.php');
	//require_once('model/Parents.php');
	
    $query = "SELECT * FROM parents, students
			  WHERE parents.parentID = students.studentID
              ORDER BY parentLast";
    $students = $db->query($query); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      
<!-- the head section -->
<head>
    <title>Parents</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>


    <div id="page">

    <div id="header">
        <h1>Parent Accounts</h1>
    </div>

    <div id="main">

        

        <div id="content">
            <!-- display a table of parents -->
            
            <table>
                <tr>
                    <th>Parent ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
					          <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($parents as $parent) : ?>
                <tr>
                    <td><?php echo $student['parentID']; ?></td>
                    <td><?php echo $student['parentLast']; ?></td>
                    <td><?php echo $student['parentFirst']; ?></td>
					<td><?php echo $student['parentEmail']; ?></td>
                    <td><form action="lessons/lessons.php" method="post"
                              id="delete_parent_form">
                        <input type="hidden" name="parent_id"
                               value="<?php echo $student['parentID']; ?>" />
                                 <input type="hidden" name="role_id"
                               value="<?php echo $student['roleID']; ?>" />
                        
                        <input type="submit" value="launch lesson" />
                        
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        
        </div>
    </div>

    </div><!-- end page -->
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> </p>
    </div>

</body>
</html>