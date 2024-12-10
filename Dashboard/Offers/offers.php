<?php
// Include database connection
include '../../db.php';

// Fetch offers from the database
$sql = "SELECT title, description, validity FROM offers";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers - Sajilo Ticket</title>
    <link rel="stylesheet" href="../../css/offer.css">
</head>

<body>
    <div class="header">
        <h1>Special Offers</h1>
    </div>

    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="offer-card">
                    <h2>' . htmlspecialchars($row['title']) . '</h2>
                    <p>' . htmlspecialchars($row['description']) . '</p>
                    <p class="validity">Valid until: ' . htmlspecialchars($row['validity']) . '</p>
                </div>';
            }
        } else {
            echo '<p>No offers available at the moment.</p>';
        }
        ?>
    </div>

    <!-- Back Button -->
    <div class="back-button">
        <a href="javascript:history.back()" class="button">Go Back</a>
    </div>

    <div class="footer">
        &copy; 2024 Sajilo Ticket. All rights reserved. - Developed by Abhishek Sardar ⭐⭐⭐
    </div>
</body>

</html>
