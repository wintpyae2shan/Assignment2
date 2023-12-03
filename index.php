<?php
include 'include/header.php';
include 'include/database.php';
include 'include/validate.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="container">
        <header>
            <h2>Employee Registration Form</h2>
        </header>
        <form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name" class="name" required><br><br>

            <label for="empid">Employee ID</label><br>
            <input type="text" id="empid" name="empid" class="empid" required><br><br>

            <label for="dpt">Department</label><br>
            <select id="dpt" name="dpt">
                <option value="" disabled selected>Select Department</option>
                <option value="IT">IT</option>
                <option value="HR">HR</option>
                <option value="PR">PR</option>
                <option value="Finance">Finance</option>
                <option value="Marketing">Marketing</option>
            </select><br><br>

            <label for="image">Choose a Photo</label><br>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"><br><br>

            <label for="sd">Start Date</label><br>
            <input type="date" id="dob" name="sd"><br><br>

            <label for="gender">Gender</label><br>

            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label><br>

            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label><br>

            <input type="radio" id="others" name="gender" value="Others">
            <label for="others">Others</label><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" class="email" required><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" class="password" required><br><br>

            <input type="submit" name="submit" class="btn btn-primary" value="Register">
        </form>
    </div>
</body>
<?php include 'include/footer.php'; ?>
</html>