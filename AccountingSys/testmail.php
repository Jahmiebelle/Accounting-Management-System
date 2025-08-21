<?php
//sample ng mail sending through xampp sendmail.ini, need ng app verification code eto gamitin nio
//credentials sa sendmail.ini
//smtp_server=smtp.gmail.com
//smtp_port=587
//smtp_ssl=auto
//auth_username=heroesteachtrack@gmail.com
//itong nasa baba ang auth pass
//aajr ovdj dqmv mtpr
$to = "cyruscabanes@gmail.com"; // dito sesend ung email
$subject = "OTP Test Email";
$otp = rand(100000, 999999);
$message = "Your One-Time Password (OTP) is: " . $otp;
$headers = "From: heroesteachtrack@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "✅ OTP email sent successfully to $to";
} else {
    echo "❌ Failed to send email.";
}
?>
