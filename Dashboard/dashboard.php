<?php
include '../db.php';

// Handle Create Operation
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    $conn->query($sql);
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";
    $conn->query($sql);
}

// Fetch Users
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Booking Counter</h2>
            <ul>
                <li><a href="#" id="home-button" class="active">Passangers</a></li>
                <li><a href="Buses available/buses.php">Buses available</a></li>
                <li><a href="Booking/bookings.php">Booking</a></li>
                <li><a href="Booked/booked.php">Seat Booked </a></li>
                <li><a href="#">Offers</a></li>
            </ul>
        </div>
  

        <!-- Main Content -->
        <div class="main-content" id="home-section">
            <h1>PASSANGERS REGISTERED</h1>
            <form method="POST" class="form-container">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="add">Add User</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="?delete=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>