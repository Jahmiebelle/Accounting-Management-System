<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $sss_tax = $_POST['sss_tax'] / 100;
  $pagibig_tax = $_POST['pagibig_tax'] / 100;
  $philhealth_tax = $_POST['philhealth_tax'] / 100;
  $income_tax = $_POST['income_tax'] / 100;
  $updateTaxQuery = "UPDATE admin_taxation_table SET sss_tax = '$sss_tax', pagibig_tax = '$pagibig_tax', philhealth_tax = '$philhealth_tax', income_tax = '$income_tax';";
  
?>