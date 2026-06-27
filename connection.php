<?php
$conn = mysqli_connect("localhost", "root", "", "librarydb");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>