<?php

print '<p>GET: ';
print_r($_GET);
print '<p>';

print '<p>start the lesson and the timer ';
// get the time in microseconds before your search
$start_time = microtime(true);

if(isset($_GET['stop_lesson']) ) {
	if($_GET['stop_lesson']==True){
		print '<p>do something to define the end of the lesson and stop the timer ';
		// get the time in microseconds when you search is done
		$end_time = microtime(true);

		// finally subtract and print the time elapsed
		print '<p> time elapsed ';
		echo  $end_time - $start_time;
		
		unset($_GET['stop_lesson']);
		
		exit(); // this lesson has been stopped 
	}
}


/**
 * your code here
 * 
 */

print '<p><a href="?stop_lesson=true">Click here to end the lesson</a>';
 
?>