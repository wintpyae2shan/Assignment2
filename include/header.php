<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #FFD700;
        }

        header {
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
        }

        header h1 {
            margin-bottom: 20px;
            font-size: 50px;
            font-weight: bold;
            color: #FFD700;
        }

        .options {
            text-align: center;
            margin-top: 20px;
        }

        .options p {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .options a {
            display: inline-block;
            padding: 15px 25px;
            margin: 5px;
            text-decoration: none;
            color: #FFD700;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .options a[href="login.php"] {
            text-decoration: underline;
        }

        .options a:hover {
            text-decoration: underline;
            font-size: 22px;
            font-weight: normal;
        }
    </style>
</head>

<body>
    <header>
        <h1>Register Here</h1>
        <span>OR</span>
        <div class="options">
            <p>Already Registered? <a href="login.php">Log In Here</a></p>
            <a href="view.php">View Employees</a>
        </div>
    </header>
</body>

</html>
