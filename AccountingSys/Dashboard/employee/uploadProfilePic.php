<?php
include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();

if (isset($_POST['submitFile']) && isset($_FILES['fileInput'])) {
    $empId = $_SESSION['employee_id'];
    $file = $_FILES['fileInput'];

    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];
    $fileError = $file['error'];

    if ($fileError === 0) {
        $uploadDir = '../../Assets/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uniqueName = uniqid("IMG_", true) . "." . pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadPath = $uploadDir . $uniqueName;

        if (move_uploaded_file($tmpName, $uploadPath)) {
            $uploadImagePath = "UPDATE employee_table SET image = '$uploadPath' WHERE employee_id = '$empId';";
            $imageResult = mysqli_query($conn, $uploadImagePath);
            header("Location: employee_profile.php");
            exit();
        } else {
            echo "Failed to move the uploaded file.";
        }
    } else {
        echo "Upload error: $fileError";
    }
}
?>