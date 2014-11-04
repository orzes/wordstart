<?php
require_once('model/database.php'); 
require_once('model/Students.php');

session_start();
if($_SESSION['roleID'] == 1) { 
//do nothing
} else { 
print 'Please login to see this page <a href="login.php">login</a>'; 
exit();
}

    
	
    $query = "SELECT * FROM students, parents
			  WHERE students.studentID = parents.parentID
              ORDER BY studentLast";
    $students = $db->query($query); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      
<!-- the head section -->
<head>
    <title>Students</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>


    <div id="page">

    <div id="header">
        <h1>Enrolled Students</h1>
    </div>

    <div id="main">

        

        <div id="content">
            <!-- display a table of products -->
            
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
					<th>Parent's First Name</th>
					<th>Parent's Email</th>
					<th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?php echo $student['studentID']; ?></td>
                    <td><?php echo $student['studentLast']; ?></td>
                    <td><?php echo $student['studentFirst']; ?></td>
					<td><?php echo $student['parentFirst']; ?></td>
					<td><?php echo $student['parentEmail']; ?></td>
                    <td><form action="lessons/lessons.php#!the-lessons/c3x8" method="post"
                              id="delete_student_form">
                        <input type="hidden" name="student_id"
                               value="<?php echo $student['studentID']; ?>" />
                                 <input type="hidden" name="role_id"
                               value="<?php echo $student['roleID']; ?>" />
                        
                        <input type="submit" value="launch lesson" />
                        
                    </form></td>
					
					<td>
					<form action="studentreport.php" method="post"
							id="student_report">
						<input type="hidden" name="student_id"
							value="<?php echo $student['studentID']; ?>" />
						<input type="submit" value="Student Report"/>	
					</form>
					</td>
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