<?php
session_start();
if($_SESSION['roleID'] == 1) { 
//do nothing
} else { 
print 'Please login to see this page'; 
exit();
}
	 
?>
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
                </tr>
                <?php foreach ($studentResult as $student) : ?>
                <tr>
                    <td><?php echo $student['studentID']; ?></td>
                    <td><?php echo $student['studentLast']; ?></td>
                    <td><?php echo $student['studentFirst']; ?></td>
					<td><?php echo $student['parentFirst']; ?></td>
					<td><?php echo $student['parentEmail']; ?></td>
                    <td><form action="lessons/lessons.php" method="post"
                              id="delete_student_form">
                        <input type="hidden" name="student_id"
                               value="<?php echo $student['studentID']; ?>" />
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