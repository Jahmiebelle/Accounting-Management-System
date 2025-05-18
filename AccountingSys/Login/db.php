<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountingsys";
$port = 3306;
$termux = "/data/data/com.termux/files/usr/var/run/mysqld.sock";

// remove mo yung port & termux sa parameter if di ka sa termux
$conn = new mysqli($servername, $username, $password, $dbname, $port, $termux); 


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else {
    echo "Connected to the database!";
}
?>