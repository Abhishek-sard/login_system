<?php
include '../../db.php';

// Fetch Booked Seats
$booked_seats = [];
$result_seats = $conn->query("SELECT seat_number FROM booked");
while ($row = $result_seats->fetch_assoc()) {
    $booked_seats[] = $row['seat_number'];
}

// Add Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bus_name = $_POST['bus_name'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $seat_number = $_POST['seat_number'];
    $date_of_travel = $_POST['date_of_travel'];
    $time_of_travel = $_POST['time_of_travel'];

    $sql = "INSERT INTO booked (bus_name, full_name, contact_number, email_address, seat_number, date_of_travel, time_of_travel) 
            VALUES ('$bus_name', '$full_name', '$contact_number', '$email_address', '$seat_number', '$date_of_travel', '$time_of_travel')";
    $conn->query($sql);
    header("Location: booked.php"); // Reload the page to reflect changes
    exit;
}

// Delete Booking
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM booked WHERE id=$id");
    header("Location: booked.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking</title>
    <link rel="stylesheet" href="../../css/booked.css">
</head>
<body>
    <div class="container">
        <h1>Admin Seats Booked</h1>

        <!-- Booking Form -->
        <form method="POST">
            <input type="text" name="bus_name" placeholder="Bus Name" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="contact_number" placeholder="Contact Number" required>
            <input type="email" name="email_address" placeholder="Email Address" required>
            <input type="date" name="date_of_travel" required>
            <input type="time" name="time_of_travel" required>
            <input type="hidden" name="seat_number" id="seat_number">
            <button type="submit">Book Seat</button>
        </form>

        <!-- Seats Display -->
        <div class="seats">
            <h2>Available Seats</h2>
            <?php
            $rows = ['A', 'B'];
            $cols = 10;
            foreach ($rows as $row) {
                for ($i = 1; $i <= $cols; $i++) {
                    $seat = $row . $i;
                    $disabled = in_array($seat, $booked_seats) ? 'disabled' : '';
                    echo "<button class='seat $disabled' data-seat='$seat' $disabled>$seat</button>";
                }
                echo "<br>";
            }
            ?>
        </div>

        <!-- Booked List -->
        <h2>Booked Seats</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Name</th>
                    <th>Seat Number</th>
                    <th>Full Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM booked");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['bus_name']}</td>
                        <td>{$row['seat_number']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['contact_number']}</td>
                        <td>{$row['email_address']}</td>
                        <td>{$row['date_of_travel']}</td>
                        <td>{$row['time_of_travel']}</td>
                        <td><a href='?delete={$row['id']}' class='btn-delete'>Delete</a></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll('.seat').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('seat_number').value = button.dataset.seat;
                alert(`Selected Seat: ${button.dataset.seat}`);
            });
        });
    </script>
</body>
</html>
