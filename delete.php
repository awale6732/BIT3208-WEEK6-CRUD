<?php
include 'connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM employees WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Employee deleted successfully!'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>