<?php
include 'include/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['empid'])) {
    $empid = $_GET['empid'];

    $sql = "DELETE FROM employees WHERE employee_id = '$empid'";
    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
        echo "Employee Record Deleted Successfully";
    } else {
        echo "<script>alert('Error Deleting Record');</script>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>