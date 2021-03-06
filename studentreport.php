<?php
//print 'Post Array is:';
//print_r($_POST);
//exit();

include 'view/header.php';
include 'footer.php';

session_start();
if($_SESSION['roleID'] == 1) { 
//do nothing
} else { 
print 'Please login to see this page'; 
exit();
}

    require_once('model/Database.php');
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
                     			
			<table cellpadding="11">
                <tr>
                    <th width="308" height="41">Lesson</th>
                    <th width="144">Steps </th>
                    <th width="367">Time </th>
					
                </tr>
                <?php foreach ($scores as $score) : ?>
                <tr>
                    <td height="68"><?php echo $score['lessonName']; ?></td>
                    
                    <td>
						
						
						<form action="studentreportprocess.php" method="post"
                              id="update_score">
                       
						<select name="lesson_score">
						  <option value="1" <?php if($score['stepCompleted'] == '1') {?> 
                            selected>
                          <?php } else {?>
                           >
                          <?php } ?> 1</option>
						  <option value="2" <?php if($score['stepCompleted'] == '2') {?> 
                            selected>
                          <?php } else {?>
                           >
                          <?php } ?> 2</option>
						  <option value="3" <?php if($score['stepCompleted'] == '3') {?> 
                            selected>
                          <?php } else {?>
                           >
                          <?php } ?>3</option>
						  <option value="4" <?php if($score['stepCompleted'] == '4') {?> 
                            selected>
                          <?php } else {?>
                          >
                          <?php } ?>4</option>
						  <option value="5" <?php if($score['stepCompleted'] == '5') {?> 
                            selected>
                          <?php } else {?>
                           >
                          <?php } ?>5</option>
						  <option value="6" <?php if($score['stepCompleted'] == '6') {?> 
                            selected>
                          <?php } else {?>
                          >
                          <?php } ?>6</option>
						</select>
						
						
						
						<input type="hidden" name="student_id"
                               value="<?php echo $score['studentID']; ?>" />
							   
						<input type="hidden" name="lesson_id"
                               value="<?php echo $score['lessonID']; ?>" />
                            
						<input type="hidden" name="time"
                               value="<?php echo $score['time']; ?>" />
						
                        <input type="submit" value="Update" />
                        
                    </form></td>
                    
                    
                    <td>
                    
                    <form action="studentreportprocess.php" method="post">
                        
                    Time: <input name="time" type="text" value="<?php echo  date('i:s', $score['time']); ?>" size="4">
                        
                        <input type="hidden" name="lesson_score"
                               value="<?php echo $score['stepCompleted']; ?>" />
                        
                        <input type="hidden" name="student_id"
                               value="<?php echo $score['studentID']; ?>" />
							   
						<input type="hidden" name="lesson_id"
                               value="<?php echo $score['lessonID']; ?>" />    
                    
                    <input type="submit" value="Update"/>
                    
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