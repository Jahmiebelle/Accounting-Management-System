<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountingsys";
$termux = "/data/data/com.termux/files/usr/var/run/mysqld.sock";
global $db_status;

// remove mo yung port & termux sa parameter if di ka sa termux
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306, $termux); 

if (!$conn) {
    $db_status = "fail";
    echo "<script>console.error('❌ DB Connection Failed: " . mysqli_connect_error() . "');</script>";
} else {
    $db_status = "success";
    echo "<script>console.log('✅ Connected to DB successfully');</script>";
}
?>

