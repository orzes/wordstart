<?php 

print '
<div id="main">
  <h1>teacher List</h1>
  
  <table border="1"> ';  
  
  $numRows=$db->numRows();
  print '<p>Number of Teachers in the List: '.$numRows; print '<br >';
      print '<tr>'; 
      print '<td><strong>Teach ID</strong></td>';
	  print '<td><strong>Teacher  FirstName</strong></td>'; 
	   print '<td><strong>Teacher Lastname</strong></td>'; 
	    print '<td><strong>Teacher Email</strong></td>'; 
	    print '</tr>'; 
  for($i=0; $i<$numRows; $i++) {      
    $row=$db->getRow();    
	  print '<tr>'; 
    // print_r($row); this is a good debugging technique        
      print '<td>'.$row['teachID'].'</td>';
	  print '<td>'.$row['teachFirst'].'</td>'; 
	   print '<td>'.$row['teachLast'].'</td>'; 
	    print '<td>'.$row['teachEmail'].'</td>'; 
       print '</tr>';       
  } // end for $i   



  print '</table>
  <br /><br />'; 

print '</div>';
?>