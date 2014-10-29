 <?php
// file: security_functions.php

// define input array
$_POST['username']="myusername"; 
$_POST['password']='mypass';

// filter input
$clean=array();   
$input_array=$_POST;  // or $_POST, or $row 
$filter='post';
$clean= filter_vars($input_array, $filter);    


// ********* filter function *******************************
// pass input array and filter type (post, get, mysql, html)

function filter_vars($input_array, $filter) {
  print "<p>fnc filter_vars <br />input array: <br />"; 
  print "filter type is:  $filter</p>";
  print '<p>ln 23 '; print_r($input_array); print "<br />";

  $clean=array(); // declare new, empty array named $clean
  
  if($filter=='post') { // filter input from html form
    foreach($input_array as $key=> $value) {
      $clean[$key]= htmlentities($value, ENT_QUOTES, 'UTF-8');
	  print '<p>ln 30 clean[key]'.$clean[$key];
    }
  }
  
  if($filter=='get') {  // filter URL append GET var elements
    foreach($input_array as $key=> $value) {
      $clean[$key]= htmlentities($value, ENT_QUOTES, 'UTF-8');
    }
  } 
  
  if($filter=='mysql') {  // filter any user input to use with database (search term, insert record)
                          // AND, filter any output from database--assume record is tainted
    foreach($input_array as $key=> $value) {
    $clean[$key]= mysqli_real_escape_string($connection, $value);
    //$clean[$value]= mysql_real_escape_string($value);
    }
  }
   
  return $clean;
} // function filter_vars

?>