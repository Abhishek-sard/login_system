<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$admin = $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar and Image Slider Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
    <!-- Link to Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="logo">
            <h2>Sajilo Ticket</h2>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about"><i class="fa-solid fa-border-all"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services"><i class="fas fa-cogs"></i> Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Image Slider (Carousel) -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/image1.png" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="images/Screenshot 2024-11-29 151537.png" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="images/Screenshot 2024-11-29 151658.png" class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleAutoplaying" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleAutoplaying" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--body parts-->
    <div class="d-flex justify-content-center align-items-center text-center" style="min-height: 45vh; overflow: hidden;">
    <div class="body-parts">
        <h1 style="color: orange; font-weight: bold;">About Us</h1>
        <p style="font-size: 1.5rem;">Sajilo Ticket aims to make your travel experience smooth and convenient <br>
            by providing a user-friendly ticket booking system. Whether you're booking <br>
            for business or leisure, we've got you covered.
        </p>
    </div>
</div>





    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>