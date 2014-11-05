<?php
//print 'Post Array is:';
//print_r($_POST);
//exit();


session_start();
if($_SESSION['roleID'] == 1) { 
//do nothing
} else { 
print 'Please login to see this page'; 
exit();
}

    require_once('model/database.php');
	//require_once('model/Score.php');
	
	
	
	if(isset($_POST['student_id'])){
		$student_id= @ $_POST['student_id'];
		
		}
	else{
		$student_id = 1;
		}
		
    $query = "SELECT * FROM scores, lessons
			  WHERE lessons.lessonID = scores.lessonID AND scores.studentID = $student_id";
    $scores = $db->query($query); 
	
	$query = "SELECT * FROM students
			  WHERE studentID = $student_id";
	
	
	$students = $db->query($query);
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
		<?php foreach ($students as $student) : ?>
		<h1>Report Form for <?php echo $student['studentFirst']; ?></h1>	
		<?php endforeach; ?>
    </div>

    <div id="main">

        

        <div id="content">
                     			
			<table>
                <tr>
                    <th>Lesson</th>
                    <th>Steps Completed</th>
                    <th>Time Taken</th>
					
                </tr>
                <?php foreach ($scores as $score) : ?>
                <tr>
                    <td><?php echo $score['lessonName']; ?></td>
                    
                    <td>
						<?php echo $score['step_completed'];?>
						
						<form action="studentreportprocess.php" method="post"
                              id="update_score">
                       
						<select name="lesson_score">
						  <option value="0">0</option>
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						</select>
						
						
						
						<input type="hidden" name="student_id"
                               value="<?php echo $score['studentID']; ?>" />
							   
						<input type="hidden" name="lesson_id"
                               value="<?php echo $score['lessonID']; ?>" />
						
						
                        <input type="submit" value="Update" />
                        
                    </form></td>
                    <td><?php echo $score['time']; ?></td>
					

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