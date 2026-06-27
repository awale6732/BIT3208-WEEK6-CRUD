<?php
include 'connection.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}

$search = "";
if (isset($_POST['search_btn'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM employees WHERE fullname LIKE '%$search%' OR department LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM employees";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Records</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f0f0f0; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #4CAF50; color: white; }
        tr:hover { background: #f5f5f5; }
        .btn { padding: 5px 10px; border-radius: 5px; text-decoration: none; color: white; }
        .edit { background: #2196F3; }
        .delete { background: #f44336; }
        .add { background: #4CAF50; padding: 10px; border-radius: 5px; color: white; text-decoration: none; }
        .logout { background: #f44336; padding: 10px; border-radius: 5px; color: white; text-decoration: none; float: right; }
        input[type=text] { padding: 8px; width: 200px; }
        button { padding: 8px 15px; background: #333; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a>
    <h2>Employee Records System</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    
    <form method="POST">
        <input type="text" name="search" placeholder="Search by name or department" value="<?php echo $search; ?>">
        <button type="submit" name="search_btn">Search</button>
    </form>
    <br>
    <a href="add.php" class="add">Add New Employee</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['position']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>