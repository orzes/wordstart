
    <div id="page">

   

    <div id="main">

        <div id="content" style="padding-left: 40px">
              <div id="header">
		          <h2>Get Teachers</h2>
                </div>
                 <?php foreach ($teacherResult as $teacherResults) :  ?>
         <?php print $teacherResults['teacherID'].'
		 '.$teacherResults['teacherLast'].'
		 '.$teacherResults['teacherFirst'].'
		 '.$teacherResults['teacherEmail'].'
		 '.$teacherResults['roleID'].'  
		 <a href="?controller=deleteTeacherProcess&teacherid='.$teacherResults['teacherID'].'">delete</a><br>'; ?> 
        
	<?php endforeach; ?>
        </div>
    </div>

    </div><!-- end page -->
    <div id="footer">
        
    </div>
