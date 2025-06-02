<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountingsys";


// remove mo yung port & termux sa parameter if di ka sa termux
$conn = mysqli_connect($servername, $username, $password, $dbname); 

if(!$conn) {
    $db_status = "fail";
    
} else {
    $db_status = "success";
    
}
?>

