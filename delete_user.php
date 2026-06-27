<?php
include 'connection.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'manager') {
    header('location:login.php');
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Admin deleted successfully!'); window.location='manager_dashboard.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>