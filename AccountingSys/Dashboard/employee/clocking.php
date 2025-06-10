<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $clockInId = $_POST['clock_in_id'];
  $clockInTime = $_POST['clock_in_curtime'];
  $clockOutId = $_POST['clock_out_id'];
  $clockOutTime = $_POST['clock_out_curtime'];
  
  
  
  
?>