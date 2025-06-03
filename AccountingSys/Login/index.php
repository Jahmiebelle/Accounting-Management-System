<?php include 'db.php';
session_start();
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $company_id = $_POST['lgn_company_id'];
        $password = $_POST['lgn_password'];
        $role = $_POST['position'];
        if(isset($_POST['login'])) {
          if(empty($company_id) || empty($password)){
            echo "<script>alert('Missing Credentials');</script>";
          }
          else {
            if($role == 'employee'){
              $emp_query = "SELECT * FROM employee_table WHERE password = '$password' AND company_id = '$company_id'";
              $emp_result = mysqli_query($conn, $emp_query);
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
              else {
                echo "<script>alert('Invalid Credentials');</script>";
              }
            }
            else {
              $admin_query = "SELECT * FROM admin_table WHERE password = '$password' AND company_id = '$company_id'";
              $admin_result = mysqli_query($conn, $admin_query);
              if(mysqli_num_rows($admin_result) == 1) {
                $user_data = mysqli_fetch_assoc($result);
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
                echo "<script>alert('Invalid Credentials');</script>";
              }
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
    <h2 class="brand-namin">Teach<span style="color: greenyellow">Track</span></h2>
      <h1 class="background-text-bottom">EMPLOYEE•MANAGEMENT•SYSTEM</h1>
      <h1 class="background-text-bottom2">EMPLOYEE•MANAGEMENT•SYSTEM</h1>
      <h1 class="background-text-top">EMPLOYEE•MANAGEMENT•SYSTEM</h1>
      <h1 class="background-text-top2">EMPLOYEE•MANAGEMENT•SYSTEM</h1>
    <div class="overlay">
      <h6 class="copyright">©2025 All Rights Reserved.</h6>
    </div>
    <form class="login-form" id="loginForm" method="POST" action="">
      <div class="form-header">
        <h2 class="lgn-header"> Login </h2>
      </div>
      <div class="form-content">
        <input onclick="toggleAnimation()" type="number" id="lgn-company-id" name="lgn_company_id" placeholder="Company ID#">
        <input type="password" id="lgn-password" name="lgn_password" placeholder="Password">
        <select class="position" name="position" id="position">
          <option value="employee">Employee</option>
          <option value="admin">Admin</option>
          <option value="payroll">Payroll Officer</option>
        </select>
        <button type="submit" id="login-btn" name="login">Login</button>
        <h5 onclick="showForgot()" class="forgot-pass" style="text-decoration: underline">Forgot Password?</h5>
      </div>
    </form>
    
    
    <form class="forgotPass-form" action="" method="POST">
      <div class="form-header">
        <h2 class="forgotPass-header">Password Recovery</h2>
      </div>
      <div class="form-content">
        <input type="number" name="company_id" id="company-id" placeholder="Company ID#">
        <input type="email" name="email" id="email" placeholder="Email">
        <button type="submit" name="verify" id="verify-btn"><img src="" alt="">Verify</button>
        <h5 onclick="showForgot()" class="remember-pass" style="text-decoration: underline">Remember Password? Login </h5>  
      </div>
    </form>
  </div>
  <script src="main.js"></script>
</body>
</html>
