<?php

$date1= date('Y-m-d H:i:s');
print '<p>1 current time, date1, created when page loads: '.$date1;


print '<p>2 now, use date1 as strtotime 2014-11-03 17:32:36';

$date1 = '2014-11-03 17:32:36';

print '<p>3  stop timer/lesson';

$date2= date('Y-m-d H:i:s');


print '<p>now date1 '.$date1;
print '<p>now date2 '.$date2;

$interval = (strtotime($date2) -  strtotime($date1));

print '<p>now interval '.$interval;

$interval_minutes = ($interval / 60);
$interval_seconds = $interval % 60;

print '<p>$interval_minutes'.':'.$interval_seconds;
 

    
	
?>