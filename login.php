<?php
session_start();

include 'include/database.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM employees WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if ($email === $row['email'] && password_verify($password, $hash)) {
                $_SESSION['user_id'] = $row['employee_id'];
                header("Location: user.php");
                exit();
            } else {
                echo "Login failed: Incorrect email or password.<br><br>";
                echo "<a href='login.php' style='text-decoration: none; color: #d35400;'>Try Again</a>";
                exit();
            }
        } else {
            echo "Login failed: User not found.<br><br>";
            echo "<a href='login.php' style='text-decoration: none; color: #d35400;'>Try Again</a>";
            exit();
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <header>
            <h2>Log In</h2>
        </header>
        <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="email" required><br><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="password" required><br><br>

            <input type="submit" name="submit" class="btn btn-primary" value="Log In">
        </form>
    </div>
    <nav>
        <a href="index.php" class="btn btn-link">Back To Registration</a>
    </nav>
</body>
<?php include 'include/footer.php'; ?>
</html>