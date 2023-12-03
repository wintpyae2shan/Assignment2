<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #222;
            color: #ddd;
        }

        h2 {
            text-align: center;
            color: #ffcc00;
            padding: 20px;
            font-size: 32px;
        }


        nav {
            text-align: center;
            margin-top: 10px;
        }

        .btn-link {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            font-size: 21px;
        }

        .btn-link:hover {
            text-decoration: underline;
            color: #ffa500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #ddd;
        }

        th,
        td {
            border: 1px solid #ffcc00;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #d35400;
            color: #fff;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>You Can Edit Or Delete Record Here</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'include/database.php';

                $sql = "SELECT * FROM employees";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['sn']; ?>
                            </td>
                            <td><img src='img/<?php echo $row['image']; ?>' width='80'></td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['employee_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['department']; ?>
                            </td>
                            <td>
                                <?php echo $row['start_date']; ?>
                            </td>
                            <td>
                                <?php echo $row['gender']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <a href="edit.php?empid=<?php echo $row['employee_id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?empid=<?php echo $row['employee_id']; ?>" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <nav>
        <a href="index.php" class="btn btn-link">Exit</a>
    </nav>
</body>
<?php include 'include/footer.php'; ?>
</html>
<?php
mysqli_close($conn);
?>