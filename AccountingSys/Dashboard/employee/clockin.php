<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $clockInId = $_POST['clock_in_id'];
  $clockInTime = $_POST['clock_in_curtime'];
  
  $clockInDate = new DateTime($clockInTime);
  echo $clockInDate;
?>