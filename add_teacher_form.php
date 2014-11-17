<?php
require('model/Database.php');
include ('view/header.php');

$query = 'SELECT *
          FROM teachers
          ORDER BY teachID';
$teachers = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      
<!-- the head section -->
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="form_validation/form_validation_files/jquery-1.js"></script>
    <script src="form_validation/form_validation_files/jquery_002.js"></script>
    <script src="form_validation/form_validation_files/jquery.js"></script>
    
    
    <script>
$(document).ready(function(){
    $("#add_teacher_form").validate({
    
    rules: {
    	teachLast: {
    		required: true,
    		
    	}
		,teachFirst: {
			required: true
		}
        ,teachEmail: {
			required: true
		}  
		,teachPass: {
			required: true
		} 
		
    },
    messages: {
    	teachLast: {
    		required: "Required",
    		minlength: jQuery.format("y")
    	 }
		,teachFirst: "Required"
		,teachEmail: "Required"
        ,teachPass: "Required"
    
         
    
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

        <div id="content" style="padding-left: 40px">
              <div id="header">
		          <h2>Add a Teacher</h2>
                </div>
           <form  action="add_teacher_process.php" method="post"
                  id="add_teacher_form">

                <label>Teacher Last Name:</label>
                <input type="input" name="teachLast" />
                <br />

                <label>Teacher First Name:</label>
                <input type="input" name="teachFirst" />
                <br />
               
               <label>Email:</label>
                <input type="input" name="teachEmail" />
                <br />
                
                <label>Password:</label>
                <input type="password" name="teachPass" />         
               
                <br />
                
                <input type="hidden" name="roleID" value="1"/>
               
                
                <label>&nbsp;</label>
                <input type="submit" value="Add Teacher" />
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