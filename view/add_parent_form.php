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
    <title>Add Parent</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <script src="form_validation/form_validation_files/jquery-1.js"></script>
    <script src="form_validation/form_validation_files/jquery_002.js"></script>
    <script src="form_validation/form_validation_files/jquery.js"></script>
    
    
    <script>
$(document).ready(function(){
    $("#add_parent_form").validate({
    
    rules: {
    	parentLast: {
    		required: true,
    		
    	}
		,parentFirst: {
			required: true
		}
        ,parentEmail: {
			required: true
		}  
		,parentPass: {
			required: true
		} 
		
    },
    messages: {
    	parentLast: {
    		required: "Required",
    		minlength: jQuery.format("y")
    	 }
		,parentFirst: "Required"
		,parentEmail: "Required"
        ,parentPass: "Required"
    
         
    
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
		          <h2>Add a Parent</h2>
                </div>
           <form  action="add_parent_process.php" method="post"
                  id="add_parent_form">

                <label>Parent Last Name:</label>
                <input type="input" name="parentLast" placeholder="Last Name"/>
                <br />

                <label>Parent First Name:</label>
                <input type="input" name="parentFirst" placeholder="First Name"/>
                <br />
               
               <label>Email:</label>
                <input type="input" name="parentEmail" placeholder="Email"/>
                <br />
                
                <label>Password:</label>
                <input type="password" name="parentPass" placeholder="Must be 8 characters or more"/>         
               
                <br />
               
               
                
                <input type="hidden" name="roleID" value="1"/>
               
                
                <label>&nbsp;</label>
                <input type="submit" value="Add Parent" />
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