<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountingsys";
$termux = "/data/data/com.termux/files/usr/var/run/mysqld.sock";

// remove mo yung port & termux sa parameter if di ka sa termux
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306, $termux); 


if (!$conn) {
    
    die("<script>alert('❌ DB Connection Failed: " . mysqli_connect_error() . "');</script>");

    $db_status = "fail";
}
else {
    $db_status = "success";
}
?>