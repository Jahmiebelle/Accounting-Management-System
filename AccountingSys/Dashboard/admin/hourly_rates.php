<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $getRoleRates = "SELECT * FROM role_hourly_rate;";
  $roleRateResult = mysqli_query($conn, $getRoleRates);

  $professorRate;
  $instructorRate;
  $partTimeRate;

  while ($rateRows = mysqli_fetch_assoc($roleRateResult)) {
    $roleName = $rateRows['role_name'];

    if ($roleName === 'professor') {
      $professorRate = $rateRows['hourly_rate'];
    } 
    elseif ($roleName === 'instructor') {
      $instructorRate = $rateRows['hourly_rate'];
    } 
    elseif ($roleName === 'part_time_staff') {
      $partTimeRate = $rateRows['hourly_rate'];
    }
  }
?>