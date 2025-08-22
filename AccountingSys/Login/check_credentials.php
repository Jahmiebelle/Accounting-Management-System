<?php
include "db.php";

$company_id = $_POST['company_id'];
$email = $_POST['email'];
$to = $email; // dito sesend ung email
$subject = "Reset Password";
$otp = rand(100000, 999999);
$message = "Your One-Time Password (OTP) is: " . $otp;
$headers = "From: heroesteachtrack@gmail.com";

$query = "SELECT * FROM employee_table WHERE company_id = '$company_id' AND email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    echo "success";
    mail($to, $subject, $message, $headers);

} else {
    echo "error";
}
?>
