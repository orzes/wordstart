
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
    <?php
    include 'view/header.php';
?>

    <div id="page">

    <div id="header">
		<?php foreach ($students as $student) : ?>
		<h1>Report Form for <?php echo $student['studentFirst']; ?></h1>	
		<?php endforeach; ?>
    </div>

    <div id="main">

        

        <div id="content">
             			
			<table style= "padding: 150px">
               
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
						
						
						
						<input type="hidden" name="student_id"
                               value="<?php echo $score['studentID']; ?>" />
							   
						<input type="hidden" name="lesson_id"
                               value="<?php echo $score['lessonID']; ?>" />
						
						
                       </form></td>
                    
                    <td><?php echo $score['time']; ?></td>
					

                </tr>
                <?php endforeach; ?>
            </table> 
         
            
            <form action="../wordstart/login.php">
    <input type="submit" value="Back to Index Home">
</form> 
            <form action="../wordstart/lessons/lessons.php#!the-lessons/c3x8">
    <input type="submit" value="Try Another Lesson">
</form> 
            
			
        </div>
    </div>

    </div><!-- end page -->
    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> </p>
    </div>
    <?php
include 'view/footer.php';
?>
</body>
</html>
