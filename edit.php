<?php
session_start();
include 'include/database.php';

$empid = $_GET['empid'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash= password_hash($password, PASSWORD_DEFAULT);

    $updateSql = "UPDATE employees SET 
        name = '$name',   
        email = '$email', 
        password = '$hash' 
        WHERE employee_id = '$empid'";

    if (mysqli_query($conn, $updateSql)) {
        echo "<script>alert('Record Updated Successfully');</script>";
    } else {
        echo "<script>alert('Error Updating Record " . mysqli_error($conn) . "');</script>";
    }
}

$sql = "SELECT * FROM employees WHERE employee_id = '$empid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h2>Edit Employee Info</h2>
        </header>
        <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?empid=' . $empid); ?>" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="name" value="<?php echo $row['name']; ?>"><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="email" value="<?php echo $row['email']; ?>"><br><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="password" value="<?php echo $row['password']; ?>"><br><br>

            <input type="submit" name="submit" class="btn btn-success" value="Save Changes">
        </form>
    </div>
    <nav>
        <a href="view.php" class="btn btn-link">View</a>
    </nav>
</body>
</html>