<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountingsys";
$port = 3306;
$termux = "/data/data/com.termux/files/usr/var/run/mysqld.sock";

// remove mo yung port & termux sa parameter if di ka sa termux
$conn = mysqli_connect($servername, $username, $password, $dbname, $port, $termux); 


if ($conn->connect_error) {
    echo "<script>alert('cant connect to db');</script>";
    die("Connection failed: " . $conn->connect_error);
}

else {
    echo "<script>alert('Connected to db');</script>";
    
}
?>