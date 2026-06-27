<?php
include 'connection.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'manager') {
    header('location:login.php');
    exit();
}

$sql = "SELECT * FROM users WHERE role='admin'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Dashboard</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f0f0f0; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #673AB7; color: white; }
        .btn { padding: 5px 10px; border-radius: 5px; text-decoration: none; color: white; }
        .delete { background: #f44336; }
        .logout { background: #f44336; padding: 10px; border-radius: 5px; color: white; text-decoration: none; float: right; }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a>
    <h2>Manager Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['username']; ?> (Manager)</p>
    <a href="employee_dashboard.php">View All Employees</a>
    <br><br>
    <h3>Manage Admins</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Delete this admin?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>