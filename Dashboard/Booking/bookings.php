<?php
include '../../db.php'; 

// Handle Create Operation
if (isset($_POST['add'])) {
    $bus_name = $_POST['bus_name'];
    $full_name = $_POST['full_name'];
    $contact_n = $_POST['contact_n'];
    $email_address = $_POST['email_address'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date_of_travel = $_POST['date_of_travel'];
    $time_of_travel = $_POST['time_of_travel'];
    $numbers_of_seats = $_POST['numbers_of_seats'];
    $seat_selection = $_POST['seat_selection'];
    $payment_method = $_POST['payment_method'];

    $sql = "INSERT INTO bookings (bus_name, full_name, contact_n, email_address, `from`, `to`, date_of_travel, time_of_travel, numbers_of_seats, seat_selection, payment_method) 
            VALUES ('$bus_name', '$full_name', '$contact_n', '$email_address', '$from', '$to', '$date_of_travel', '$time_of_travel', $numbers_of_seats, '$seat_selection', '$payment_method')";
    $conn->query($sql);
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM bookings WHERE id=$id";
    $conn->query($sql);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $bus_name = $_POST['bus_name'];
    $full_name = $_POST['full_name'];
    $contact_n = $_POST['contact_n'];
    $email_address = $_POST['email_address'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date_of_travel = $_POST['date_of_travel'];
    $time_of_travel = $_POST['time_of_travel'];
    $numbers_of_seats = $_POST['numbers_of_seats'];
    $seat_selection = $_POST['seat_selection'];
    $payment_method = $_POST['payment_method'];

    $sql = "UPDATE bookings SET 
            bus_name='$bus_name', full_name='$full_name', contact_n='$contact_n', email_address='$email_address', 
            `from`='$from', `to`='$to', date_of_travel='$date_of_travel', time_of_travel='$time_of_travel', 
            numbers_of_seats=$numbers_of_seats, seat_selection='$seat_selection', payment_method='$payment_method' 
            WHERE id=$id";
    $conn->query($sql);
}

// Fetch Bookings
$result = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
    <link rel="stylesheet" href="../../css/bookings.css">
</head>
<body>
    <div class="container">
        <h1>Booking Management</h1>

        <!-- Create Form -->
        <form method="POST" class="form-container">
            <input type="text" name="bus_name" placeholder="Bus Name" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="contact_n" placeholder="Contact Number" required>
            <input type="email" name="email_address" placeholder="Email Address" required>
            <input type="text" name="from" placeholder="From" required>
            <input type="text" name="to" placeholder="To" required>
            <input type="date" name="date_of_travel" required>
            <input type="time" name="time_of_travel" required>
            <input type="number" name="numbers_of_seats" placeholder="Number of Seats" required>
            <input type="text" name="seat_selection" placeholder="Seat Selection (e.g., A1, A2)" required>
            <input type="text" name="payment_method" placeholder="Payment Method (e.g., Cash, Card)" required>
            <button type="submit" name="add">Add Booking</button>
        </form>

        <!-- Bookings Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Name</th>
                    <th>Full Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Seats</th>
                    <th>Seat Selection</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['bus_name']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['contact_n']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['from']; ?></td>
                        <td><?php echo $row['to']; ?></td>
                        <td><?php echo $row['date_of_travel']; ?></td>
                        <td><?php echo $row['time_of_travel']; ?></td>
                        <td><?php echo $row['numbers_of_seats']; ?></td>
                        <td><?php echo $row['seat_selection']; ?></td>
                        <td><?php echo $row['payment_method']; ?></td>
                        <td>
                            <a href="?delete=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
