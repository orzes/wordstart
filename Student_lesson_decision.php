<?php

//print 'Post Array is:';
//print_r($_POST); 
//exit();


session_start();
$_SESSION['endTime'] = date("H:i:s");

@$begTime = strtotime($_SESSION['beginningTime']);
$endTime = strtotime($_SESSION['endTime']);
$timeTook = $endTime - $begTime;

    require_once('model/database.php');
	require_once('model/Score.php');

    global $db;
    $score= new Score();



$str =  $_SESSION['lesson_store_id'];
$arr1 = str_split($str, 1);
$scoretodb=$score->addScore($arr1[3], $_SESSION['id'], $arr1[4], $timeTook);
  
$score_record=$score->getScore($lesson_id, $student_id);
	
	
/*	
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
*/
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
             			
			<table width="435" style= "padding: 150px">
               
                <tr>
                    <th width="48" height="31">Lesson</th>
                    <th width="50">Steps </th>
                    <th width="38">Time </th>
					
                </tr>
                <?php foreach ($scores as $score) : ?>
                <tr>
                    <td height="39">
					
					<?php 
					
					$str =  $_SESSION['lesson_store_id'];

						$arr1 = str_split($str, 1);
						
						print_r($arr1[3]);;
					
					//print $_SESSION['lesson_store_id']; ?>
                    
                    </td> 
                   
                    <td>
						<?php print_r($arr1[4]); ?>
						
						<form action="studentreportprocess.php" method="post"
                              id="update_score">
						
						
						
						<input type="hidden" name="student_id"
                               value="<?php echo $score['studentID']; ?>" />
							   
						<input type="hidden" name="lesson_id"
                               value="<?php echo $score['lessonID']; ?>" />
						
						
                       </form></td>
                    
                    <td><?php print $timeTook; ?></td>
					

                </tr>
                <?php endforeach; ?>
            </table> 
         
            
            <form action="login.php">
              <p>
                <input type="submit" value="Home">
              </p>
              <p>&nbsp;</p>
          </form> 
           
			
      </div>
    </div>


    <?php
include 'view/footer.php';
?>
</body>
</html>
