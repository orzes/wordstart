<!doctype html>
<html>
<head>

<script>
  var hash = window.location.hash;
  console.log ( hash );

$.ajax({
    url: 'model/lesson.php',
    data: {hash: hash},
    success: function(){}
})

</script>
 
<meta charset="utf-8">
<title>Lesson #2</title>
</head>
<body>
</body>
</html>
