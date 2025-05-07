<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $companyId = $_POST['lgn-company-id'];
    $password = $_POST['lgn-password'];
    $position = $_POST['position'];

    if ($companyId === "1234" && $password === "password") {
        header("Location: ../Dashboard/employee/employee_dashboard.html");
        exit;
    } else {
        echo "Invalid credentials. Try again.";
    }
}
?>