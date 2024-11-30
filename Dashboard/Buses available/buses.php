<?php
include '../../db.php'; 

// Handle Add Operation
if (isset($_POST['add'])) {
    $busname = $_POST['busname'];
    $bus_to_bus = $_POST['bus_to_bus'];
    $contact = $_POST['contact'];

    // Handle File Upload
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);

    // Check if the directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO buses (busname, bus_to_bus, contact, image) VALUES ('$busname', '$bus_to_bus', '$contact', '$image')";
        $conn->query($sql);
    } else {
        echo "Failed to upload the image.";
    }
}

// Handle Delete Operation
if (isset($_GET['delete'])) {
    $bus_id = $_GET['delete'];

    // Delete Image File
    $result = $conn->query("SELECT image FROM buses WHERE bus_id=$bus_id");
    $row = $result->fetch_assoc();
    unlink("../uploads/" . $row['image']); // Delete the image from the server

    $sql = "DELETE FROM buses WHERE bus_id=$bus_id";
    $conn->query($sql);
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $bus_id = $_POST['bus_id'];
    $busname = $_POST['busname'];
    $bus_to_bus = $_POST['bus_to_bus'];
    $contact = $_POST['contact'];

    if (!empty($_FILES['image']['name'])) {
        // Handle File Upload
        $image = $_FILES['image']['name'];
        $target_file = "../uploads/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Delete the old image
            $result = $conn->query("SELECT image FROM buses WHERE bus_id=$bus_id");
            $row = $result->fetch_assoc();
            unlink("../uploads/" . $row['image']); // Delete the old image

            $sql = "UPDATE buses SET busname='$busname', bus_to_bus='$bus_to_bus', contact='$contact', image='$image' WHERE bus_id=$bus_id";
        } else {
            echo "Failed to upload the new image.";
        }
    } else {
        $sql = "UPDATE buses SET busname='$busname', bus_to_bus='$bus_to_bus', contact='$contact' WHERE bus_id=$bus_id";
    }

    $conn->query($sql);
}

// Fetch Buses
$result = $conn->query("SELECT * FROM buses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Availability</title>
    <link rel="stylesheet" href="../../css/buses.css">
</head>
<body>
    <div class="container">
        <h1>Bus Availability</h1>

        <!-- Create Form -->
        <form method="POST" enctype="multipart/form-data" class="form-container">
            <input type="text" name="busname" placeholder="Bus Name" required>
            <input type="text" name="bus_to_bus" placeholder="Bus To Bus" required>
            <input type="text" name="contact" placeholder="Contact" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" name="add">Add Bus</button>
        </form>

        <!-- Buses Table -->
        <table>
            <thead>
                <tr>
                    <th>Bus ID</th>
                    <th>Image</th>
                    <th>Bus Name</th>
                    <th>Route</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['bus_id']; ?></td>
                        <td><img src="../uploads/<?php echo $row['image']; ?>" alt="Bus Image" class="circle"></td>
                        <td><?php echo $row['busname']; ?></td>
                        <td><?php echo $row['bus_to_bus']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td>
                            <a href="?delete=<?php echo $row['bus_id']; ?>" class="btn-delete">Delete</a>
                            <a href="edit.php?bus_id=<?php echo $row['bus_id']; ?>" class="btn-edit">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
