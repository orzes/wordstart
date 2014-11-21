<?php

$query = 'SELECT *
          FROM teachers
          ORDER BY teacherID';
$teachers = $db->query($query);
?>


    <div id="page">

   

    <div id="main">

        <div id="content" style="padding-left: 40px">
              <div id="header">
		          <h2>Add a Teacher</h2>
                </div>
           <form  action="?controller=addTeacherProcess" method="post"
                  id="add_teacher_form">

                <label>Teacher Last Name:</label>
                <input type="input" name="teachLast" placeholder="Last Name"/>
                <br />

                <label>Teacher First Name:</label>
                <input type="input" name="teachFirst" placeholder="First Name"/>
                <br />
               
               <label>Email:</label>
                <input type="input" name="teachEmail" placeholder="Email"/>
                <br />
                
                <label>Password:</label>
                <input type="password" name="teachPass" placeholder="Must be 8 characters or more"/>         
               
                <br />
               
              
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
