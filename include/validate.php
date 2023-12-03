<?php
session_start();

include 'include/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $empid = $_POST['empid'];
    $department = $_POST['dpt'];
    $start_date = $_POST['sd'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $tmpName = $_FILES['image']['tmp_name'];

    $validExtensions = ['.jpg', '.jpeg', '.png'];
    $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array("." . $imageExtension, $validExtensions)) {
        echo "<script>alert('Invalid Image format. Please upload a JPG, JPEG, or PNG file');</script>";
        echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
        exit();
    } elseif ($fileSize > 1000000) {
        echo "<script>alert('Image file size is too large. Please upload an image under 1MB');</script>";
        echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
        exit();
    }

    $newImageName = uniqid() . '.' . $imageExtension;
    $uploadDirectory = 'img/';

    if (move_uploaded_file($tmpName, $uploadDirectory . $newImageName)) {
        $checkEmail = "SELECT * FROM employees WHERE email = '$email'";
        $emailResult = mysqli_query($conn, $checkEmail);
        
        if (mysqli_num_rows($emailResult) > 0) {
            echo "<script>alert('Email already exists');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }

        $checkEmpID = "SELECT * FROM employees WHERE employee_id = '$empid'";
        $empIDResult = mysqli_query($conn, $checkEmpID);
        
        if (mysqli_num_rows($empIDResult) > 0) {
            echo "<script>alert('Employee ID already exists');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }

        $checkName = "SELECT * FROM employees WHERE name = '$name'";
        $nameResult = mysqli_query($conn, $checkName);
        
        if (mysqli_num_rows($nameResult) > 0) {
            echo "<script>alert('Name already exists');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }

        if (!preg_match("/^[a-zA-Z -]+$/", $name)) {
            echo "<script>alert('Invalid name format');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }

        if (!preg_match("/^[0-9]+$/", $empid)) {
            echo "<script>alert('Invalid employee ID format');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }

        $sql = "INSERT INTO employees (image, name, employee_id, department, start_date, gender, email, password) VALUES
                ('$newImageName','$name', '$empid', '$department', '$start_date', '$gender', '$email', '$hash')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registration successful');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        } else {
            echo "<script>alert('Error Registration " . mysqli_error($conn) . "');</script>";
            echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
            exit();
        }
    } else {
        echo "<script>alert('Error uploading image');</script>";
        echo "<a href='index.php' style='text-decoration: none; color: #d35400;'>Back To Registration</a>";
        exit();
    }
}
?>