<?php
require('model/Database.php');
include ('view/header.php');

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
    <script src="form_validation/form_validation_files/jquery-1.js"></script>
    <script src="form_validation/form_validation_files/jquery_002.js"></script>
    <script src="form_validation/form_validation_files/jquery.js"></script>
    
    
    <script>
$(document).ready(function(){
    $("#add_student_form").validate({
    
    rules: {
    	studentLast: {
    		required: true,
    		
    	}
		,studentFirst: {
			required: true
		}          
		,classroomID: {
			required: true
		}  
		,parentID: {
			required: true
		} 
		
    },
    messages: {
    	studentLast: {
    		required: "Required",
    		minlength: jQuery.format("y")
    	 }
		,studentFirst: "Required"
		,classroomID: "Required"
    
         
    
    }
    
    });
	
	$("commentForm").submit(function(e){
    	e.preventDefault()
	})
});

</script>

</head>

<!-- the body section -->
<body>


    <div id="page">

   

    <div id="main">

        <div id="content" >
              <div id="header">
		          <h1>Add a Student</h1>
                </div>
           <form  action="add_student.php" method="post"
                  id="add_student_form">
               <table>
                <tr>
                <td><label>Student Last Name:</label></td>
                <td><input type="input" name="studentLast" /></td>
                <br />
                </tr>
                <tr>
                
                <td><label>Student First Name:</label></td>
                <td><input type="input" name="studentFirst" /></td>
                <br />
               </tr>
                <tr>
              <td> <label>Classroom ID:</label></td>
               <td> <input type="input" name="classroomID" /></td>
                <br />
                </tr>
                <tr>
                <td><label>Parent:</label>    </td> 
                <td><select name="parent">
                 <?php foreach ($parents as $parent) : ?>
               <option value=<?php echo $parent['parentID'];?> >
                <?php echo $parent['parentFirst'].' '.$parent['parentLast']; ?></option>
                <?php endforeach; ?>
                </select></td>
               </tr>
                
               
                <br />
                
                <input type="hidden" name="role" value="2"/>
               
                
                <tr>
                <td>
                <input type="submit" value="Add Student" />
                </td>
                </tr>
                </table>
                <br />
            </form>          			
			
        
		
        </div>
    </div>

    </div><!-- end page -->
    <div id="footer">
        
    </div>

</body>
</html>
<?php include ('view/footer.php'); ?>