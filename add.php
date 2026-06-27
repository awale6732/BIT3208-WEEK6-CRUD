<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $sql = "INSERT INTO books (book_id, title, author, category) VALUES ('$book_id', '$title', '$author', '$category')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Book added successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>Add New Book</h2>
    <form method="POST">
        <label>Book ID:</label><br>
        <input type="text" name="book_id" required><br><br>
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>
        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>
        <label>Category:</label><br>
        <input type="text" name="category" required><br><br>
        <input type="submit" name="submit" value="Add Book">
    </form>
    <br>
    <a href="index.php">Back to Books List</a>
</body>
</html>