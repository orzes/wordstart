<?php
// Report all errors
ini_set('display_errors', 'On');
error_reporting(E_ALL);

date_default_timezone_set("America/New_York");

include_once("model/Timer.php");
$timer= new Timer();

print '<p>'.$timer->show_time().'<\p>';
//$timer->show_time();

session_start();
?>

<script>
function echoTime()
{
 alert("<?php stopTimer(); ?>");
}

function startTime()
{
 alert("<?php beginTimer(); ?>");
}
</script>

<?php

function stopTimer()
{
 global $timer;
 $timer->stop();
 echo 'Time Elapsed: '.$timer->show_time();
}

function beginTimer()
{
 global $timer;
 $timer->begin();
 echo 'Time Elapsed: '.$timer->show_time();
}
?>
<h1>Timer Test:</h1>
<button onclick="startTime()">Start Timer</button>
<button onclick="echoTime()">Stop Timer</button>