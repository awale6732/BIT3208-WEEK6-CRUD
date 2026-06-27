<?php
include 'connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $sql = "UPDATE books SET book_id='$book_id', title='$title', author='$author', category='$category' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Book updated successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h2>Edit Book</h2>
    <form method="POST">
        <label>Book ID:</label><br>
        <input type="text" name="book_id" value="<?php echo $row['book_id']; ?>" required><br><br>
        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
        <label>Author:</label><br>
        <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br><br>
        <label>Category:</label><br>
        <input type="text" name="category" value="<?php echo $row['category']; ?>" required><br><br>
        <input type="submit" name="submit" value="Update Book">
    </form>
    <br>
    <a href="index.php">Back to Books List</a>
</body>
</html>