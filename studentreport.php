<?php
//print 'Post Array is:';
//print_r($_POST);


session_start();
if($_SESSION['roleID'] == 1) { 
//do nothing
} else { 
print 'Please login to see this page'; 
exit();
}

    require_once('model/database.php');
	
	
	
	
	if(isset($_POST['student_id'])){
		$student_id= @ $_POST['student_id'];
		
		}
	else{
		$student_id = 1;
		}
		
    $query = "SELECT * FROM scores, lessons
			  WHERE lessons.lessonID = scores.lessonID AND scores.studentID = $student_id";
    $scores = $db->query($query); 
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
        <h1>Report Form</h1>
    </div>

    <div id="main">

        

        <div id="content">
                     			
			<table>
                <tr>
                    <th>Lesson</th>
                    <th>Score</th>
                    <th>Time Taken</th>
					
                </tr>
                <?php foreach ($scores as $score) : ?>
                <tr>
                    <td><?php echo $score['lessonName']; ?></td>
                    <td><?php echo $score['score']; ?></td>
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