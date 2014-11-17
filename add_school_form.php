<?php
require('model/Database.php');
include ('view/header.php');

$query = 'SELECT *
          FROM schools
          ORDER BY schoolID';
$parents = $db->query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      
<!-- the head section -->
<head>
    <title>Schools</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="form_validation/form_validation_files/jquery-1.js"></script>
    <script src="form_validation/form_validation_files/jquery_002.js"></script>
    <script src="form_validation/form_validation_files/jquery.js"></script>
    
    
    <script>
$(document).ready(function(){
    $("#add_school_form").validate({
    
    rules: {
    	schoolID: {
    		required: true,
    		
    	}
		,schoolName: {
			required: true
		}          
		
		
    },
    messages: {
    	schoolName: {
    		required: "Required",
    		minlength: jQuery.format("y")
    	 }
		,schoolID: "Required"
    
         
    
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
		          <h2>Add a School</h2>
                </div>
           <form  action="add_school.php" method="post"
                  id="add_school_form">

                <label>School ID:</label>
                <input type="input" name="schoolID" />
                <br />

                <label>School Name:</label>
                <input type="input" name="schoolName" />
                <br />
               
            
                
                <label>&nbsp;</label>
                <input type="submit" value="Add School" />
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