<?php

use Dom\Mysql;

 include 'db.php';
session_start();
      $errorMessage = "";
      $resetErrorMsg = "";
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['verify'])){
          $resetCompanyID = $_POST['company-id'];
          $resetEmail = $_POST['email'];
          if(empty($resetCompanyID) || empty($resetEmail)){
            $resetErrorMsg = "";
          }
          else{
            $resetQuery = "SELECT * FROM employee_table WHERE company_id = '$resetCompanyID' AND email = '$resetEmail'";
            $resetResult = mysqli_query($conn, $resetQuery);
            if(mysqli_num_rows($resetResult) === 1){
              
            }
            else{
              
            }
          }
          
        }
        if(isset($_POST['login'])) {
          $company_id = $_POST['lgn_company_id'];
          $password = $_POST['lgn_password'];
          if(empty($company_id) || empty($password)){
            $errorMessage = "";
          }
          else {
            $emp_query = "SELECT * FROM employee_table WHERE password = '$password' AND company_id = '$company_id'";
            $emp_result = mysqli_query($conn, $emp_query);
            $admin_query = "SELECT * FROM admin_table WHERE password = '$password' AND company_id = '$company_id'";
            $admin_result = mysqli_query($conn, $admin_query);
            if(mysqli_num_rows($emp_result) == 1){
              $user_data = mysqli_fetch_assoc($emp_result);
              $_SESSION['employee_id'] = $user_data['employee_id'];
              $_SESSION['employee_first_name'] = $user_data['first_name'];
              $_SESSION['employee_middle_name'] = $user_data['middle_name'];
              $_SESSION['employee_last_name'] = $user_data['last_name'];
              $_SESSION['employee_email'] = $user_data['email'];
              $_SESSION['company_id'] = $user_data['company_id'];
              $_SESSION['password'] = $user_data['password'];
              header("Location: ../Dashboard/employee/employee_dashboard.php");
              exit();
            }
            elseif(mysqli_num_rows($admin_result) == 1){
              $user_data = mysqli_fetch_assoc($admin_result);
              $_SESSION['admin_id'] = $user_data['admin_id'];
              $_SESSION['admin_first_name'] = $user_data['first_name'];
              $_SESSION['admin_middle_name'] = $user_data['middle_name'];
              $_SESSION['admin_last_name'] = $user_data['last_name']; 
              $_SESSION['admin_email'] = $user_data['email'];
              $_SESSION['company_id'] = $user_data['company_id'];
              $_SESSION['password'] = $user_data['password'];
              header("Location: ../Dashboard/admin/admin_dashboard.php");
              exit();
            }
            else {
              $errorMessage = "invalidLogin";
            }
          }
        }
      }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Styles/styles.css?v=1.0">
  <title>Login </title>
  </head>
  
<body> 
  <div class="outer-box">
    <h2 class="brand-namin">HEROES TEACH<span style="color: greenyellow">TRACK</span></h2>
      <h1 class="background-text-bottom">ACCOUNTING•MANAGEMENT•SYSTEM</h1>
      <h1 class="background-text-bottom2">ACCOUNTING•MANAGEMENT•SYSTEM</h1>
      <h1 class="background-text-top">ACCOUNTING•MANAGEMENT•SYSTEM</h1>
      <h1 class="background-text-top2">ACCOUNTING•MANAGEMENT•SYSTEM</h1>
    <div class="overlay">
      <h6 class="copyright">©2025 All Rights Reserved.</h6>
    </div>
    <form class="login-form" id="loginForm" method="POST" action="">
      <div class="form-header">
        <h2 class="lgn-header"> Login </h2>
      </div>
      <?php
        function hasInvalidCredentials($errorMessage){
          return $errorMessage === "invalidLogin";
        }
      ?> 

      <div class="form-content">
        <p class="error" id="lgn-error" style="display:<?php echo hasInvalidCredentials($errorMessage) ? 'flex' : 'none'?>; opacity: <?php echo hasInvalidCredentials($errorMessage) ? '1' : '0'?>">Invalid Company ID/Password.</p>
        <input onclick="toggleAnimation()" type="number" id="lgn-company-id" name="lgn_company_id" placeholder="Company ID#" required>
        <input type="password" id="lgn-password" name="lgn_password" placeholder="Password" required>
        <button type="submit" id="login-btn" name="login">Login</button>
        <h5 onclick="showForgot()" class="forgot-pass" style="text-decoration: underline">Forgot Password?</h5>
      </div>
    </form>
    
    
    <form class="forgotPass-form" action="" method="POST">
      <div class="form-header">
        <h2 class="forgotPass-header">Password Recovery</h2>
      </div>
      <div class="form-content">
        <p class="error" id="recovery-error">Invalid Company ID/Email.</p>
        <input type="number" name="company_id" id="company-id" placeholder="Company ID#" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <button type="submit" name="verify" id="verify-btn"><img src="" alt="">Verify</button>
        <h5 onclick="showForgot()" class="remember-pass" style="text-decoration: underline">Remember Password? Login </h5>  
      </div>
    </form>
  </div>
  <script src="main.js"></script>
</body>
</html>
