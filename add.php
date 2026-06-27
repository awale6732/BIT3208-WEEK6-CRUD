<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (fullname, email, course) VALUES ('$fullname', '$email', '$course')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Student added successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="POST">
        <label>Full Name:</label><br>
        <input type="text" name="fullname" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Course:</label><br>
        <input type="text" name="course" required><br><br>
        <input type="submit" name="submit" value="Add Student">
    </form>
    <br>
    <a href="index.php">Back to Students List</a>
</body>
</html>