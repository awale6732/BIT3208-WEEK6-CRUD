<?php
include 'connection.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM employees WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET fullname='$fullname', email='$email', department='$department', position='$position', salary='$salary' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Employee updated successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f0f0f0; }
        .form-box { background: white; padding: 30px; border-radius: 10px; width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #2196F3; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Edit Employee</h2>
        <form method="POST">
            <label>Full Name:</label>
            <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            <label>Department:</label>
            <input type="text" name="department" value="<?php echo $row['department']; ?>" required>
            <label>Position:</label>
            <input type="text" name="position" value="<?php echo $row['position']; ?>" required>
            <label>Salary:</label>
            <input type="number" name="salary" value="<?php echo $row['salary']; ?>" required>
            <br><br>
            <button type="submit" name="submit">Update Employee</button>
        </form>
        <br>
        <a href="index.php">Back to Employee List</a>
    </div>
</body>
</html>