<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("localhost", "root", "", "employeedb");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>