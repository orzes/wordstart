<?php
//CLASS:      Timer
//PURPOSE:    Calculate the duration of the lesson
//DEVELOPER:  Taylor McDowell
//CHANGE LOG: 10/15/2014

class Timer {

   var $classname = "Timer";
   var $start     = 0;
   var $stop      = 0;
   var $elapsed   = 0;

   //Constructor
   function Timer( $start = true ) {
      if ( $start )
         $this->start();
   }

   //Start counting time
   function start() {
      $this->start = $this->_gettime();
   }

   //Stop counting time
   function stop() {
      $this->stop    = $this->_gettime();
      $this->elapsed = $this->_compute();
   }

   //Get Elapsed Time
   function elapsed() {
      if ( !$elapsed )
         $this->stop();

      return $this->elapsed;
   }

   //Resets Timer so it can be used again
   function reset() {
      $this->start   = 0;
      $this->stop    = 0;
      $this->elapsed = 0;
   }

   //Get Current Time
   function _gettime() {
      $mtime = microtime();
      $mtime = explode( " ", $mtime );
      return $mtime[1] + $mtime[0];
   }

   //Compute elapsed time
   function _compute() {
      return $this->stop - $this->start;
   }
}
//USAGE example(s):
//$t = new Timer(); //Starts the timer automatically
//
//[some operations]
//
//$t->_gettime();   //Displays the current time 
//
//$t->stop();       //Stops timer
//
//$t->elapsed();    //Shows duration and stops timer automatically