<!DOCTYPE html>

<?php
session_start();

print '
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<link href="x.css" rel="stylesheet">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
  var variableToSend = 9;
  
  var url= "lesson.php#l13;"
  
  var url3= window.location.hash;
  console.log ("ln 21 window location is: ", url3);
  console.log("current location line 11", "url2");

  $.get("lessons_store_id.php", {variable: url3});

</script>

</head>

<body>
<header><h1>Javascript Test</h1></header>

<nav><b><a href="index.html">Home</a> &nbsp; <a href="test.html">Test</a>  </nav>

<div id="content">
<h2>Test</h2>

';

print "<p>session vars "; print_r($_SESSION);

print '


</div>

<footer>

</footer>
</body>
</html>
';
?>