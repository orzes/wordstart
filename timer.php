<?php
session_start();
include_once("model/Timer.php");
$timer= new Timer();
$timer->start();
?>

<script>
function echoTime()
{
 alert("<?php stopTimer(); ?>");
}
</script>

<?php
function stopTimer()
{
 global $timer;
 $timer->stop();
 echo 'Time Elapsed: '.$timer->elapsed();
}
?>
<h1>Timer Test:</h1>
<button onclick="echoTime()">Stop Timer</button>