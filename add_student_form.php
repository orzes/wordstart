<?php
require('database.php');
$query = 'SELECT *
          FROM parents
          ORDER BY parentID';
$parents = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      
<!-- the head section -->
<head>
    <title>Student Report</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>


    <div id="page">

    <div id="header">
		<h2>Add a Student</h2>
    </div>

    <div id="main">

        <div id="content">
           <form action="add_student.php" method="post"
                  id="add_student_form">

                <label>Student Last Name:</label>
                <input type="input" name="studentLast" />
                <br />

                <label>Student First Name:</label>
                <input type="input" name="studentFirst" />
                <br />
               
               <label>Classroom ID:</label>
                <input type="input" name="classroomID" />
                <br />
                
                <label>Parent:</label>
                
                
                <select name="parent">
                 <?php foreach ($parents as $parent) : ?>
                <option value=<?php echo $parent['parentID'];?> >
                <?php echo $parent['parentFirst']; ?></option>
                <?php endforeach; ?>
                </select>
                
               
                <br />
                
                <input type="hidden" name="role" value="2"/>
               
                
                <label>&nbsp;</label>
                <input type="submit" value="Add Student" />
                <br />
            </form>          			
			
        
		
        </div>
    </div>

    </div><!-- end page -->
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> </p>
    </div>

</body>
</html>