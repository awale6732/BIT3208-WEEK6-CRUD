<?php
include 'connection.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (fullname, email, department, position, salary) VALUES ('$fullname', '$email', '$department', '$position', '$salary')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Employee added successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f0f0f0; }
        .form-box { background: white; padding: 30px; border-radius: 10px; width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Add New Employee</h2>
        <form method="POST">
            <label>Full Name:</label>
            <input type="text" name="fullname" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Department:</label>
            <input type="text" name="department" required>
            <label>Position:</label>
            <input type="text" name="position" required>
            <label>Salary:</label>
            <input type="number" name="salary" required>
            <br><br>
            <button type="submit" name="submit">Add Employee</button>
        </form>
        <br>
        <a href="index.php">Back to Employee List</a>
    </div>
</body>
</html>