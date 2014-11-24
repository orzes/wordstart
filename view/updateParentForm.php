<?php include 'includes/header.php';
// file: view/bookUpdateForm.php

$parentID=$row['parentID'];
$parentLast=$row['parentLast'];
$parentFirst=$row['parentFirst'];
$parentEmail=$row['parentEmail'];
$parentPass=$row['parentPass'];


print '
<div id="main">
<h1>Update Parent</h1>
<br /><br />
<hr />

<form action="index.php" method="post" id="parentAddForm">

  <input type="hidden" name="teachId" value='.$parentID.' />        
  <input type="hidden" name="controller" value="parentUpdateProcess" />

  <label>Last Name:</label>
  <input type="input" name="parentLast" placeholder="Last Name" size="50" value="'.$parentLast.'"/><br />

  <label>First Name:</label>
  <input type="input" name="parentFirst" placeholder="First Name" size="50" value="'.$parentFirst.'"/><br />
        
  <label>Parent Email:</label>
  <input type="input" name="parentEmail" placeholder="Email" size="50" value="'.$parentEmail.'"/><br />
      
  <label>Parent Password:</label>
  <input type="password" name="parentPass" placeholder="Must be 8 characters or more" size="50" value="'.$parentPass.'"  /><br />
                      
  <label>&nbsp;</label>
  <input type="submit" value="Update Parent" />
  
<br /><br />
</form>    
</div>';

include 'includes/footer.php'; 
?>