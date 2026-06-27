<?php
include 'connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM books WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Book deleted successfully!'); window.location='index.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>