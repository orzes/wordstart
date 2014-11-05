<?php
//CLASS:      Timer
//PURPOSE:    Calculate the duration of the lesson
//DEVELOPER:  Taylor McDowell
//CHANGE LOG: 10/15/2014
//SOURCE:     http://stackoverflow.com/questions/8310487/start-and-stop-a-timer-php

class Timer {

   var $classname = "Timer";
   var $start     = '';
   var $current   = '[initial value]';
   var $interval  = 905;
   var $minutes   = 0;
   var $seconds   = 0;

   //Constructor
   function Timer() {
      $this->begin();
   }

   //Start counting time
   function begin() {
      $this->start = date('H:i:s');
      $this->show_time();
   }
   
   //Stop to set the current time
   function stop() {
      $this->current = date('2014-11-06 12:30:25');
   }
   
   //Calculate duration
   function calculate() {
      $this->interval = (strtotime($this->current) - strtotime($this->start));
      $this->minutes  = (int)($this->interval / 60);
      $this->seconds  = $this->interval % 60;
   }

   //Stop counting time
   function show_time() {
      $this->calculate();
      //if ($this->seconds < 10) {
        //return $this->minutes.':0'.$this->seconds;
      //}
      //else {
        //return $this->minutes.':'.$this->seconds;
      //}
      return $this->start.'  -  '.$this->current;
   }
}
//USAGE example(s):
//$t = new Timer(); //Starts the timer automatically once instantiated
//
//[some operations]
//
//$t->_gettime();   //Displays the current time 
//
//$t->stop();       //Stops timer
//
//$t->elapsed();    //Shows elapsed time and stops timer automatically