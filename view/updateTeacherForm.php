<?php include 'includes/header.php';
// file: view/bookUpdateForm.php

$teacherID=$row['teacherID'];
$teacherLast=$row['teacherLast'];
$teacherFirst=$row['first_name'];
$teacherEmail=$row['teacherEmail'];
$teacherPass=$row['teacherPass'];
$price=$row['price'];
$description=$row['description'];

print '
<div id="main">
<h1>Update Teacher</h1>
<br /><br />
<hr />

<form action="index.php" method="post" id="teacherAddForm">

  <input type="hidden" name="teachId" value='.$teacherID.' />        
  <input type="hidden" name="controller" value="teacherUpdateProcess" />

  <label>Last Name:</label>
  <input type="input" name="teacherLast" placeholder="Last Name" size="50" value="'.$teacherLast.'"/><br />

  <label>First Name:</label>
  <input type="input" name="teacherFirst" placeholder="First Name" size="50" value="'.$teacherFirst.'"/><br />
        
  <label>Teacher Email:</label>
  <input type="input" name="teacherEmail" placeholder="Email" size="50" value="'.$teacherEmail.'"/><br />
      
  <label>Teacher Password:</label>
  <input type="password" name="teacherPass" placeholder="Must be 8 characters or more" size="50" value="'.$teacherPass.'"  /><br />
                      
  <label>&nbsp;</label>
  <input type="submit" value="Update Teacher" />
  
<br /><br />
</form>    
</div>';

include 'includes/footer.php'; 
?>