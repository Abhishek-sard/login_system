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
                    <a class="nav-link" href="Dashboard/dashboard.php"><i class="fa-solid fa-border-all"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Features"><i class="fas fa-cogs"></i>Features</a>
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
    <!--adding all the cards------------------------>
    <div class="container my-5">
        <div class="big-card mx-auto">
            <h2 class="text-center mb-4">Services we provide</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Image 1 -->
                <div class="col">
                    <img src="images/darjeeling.jpg" class="img-fluid card-img" alt="Image 1">
                    <h5 class="text-center mt-2">Jhumka To Darjeeling</h5>
                    <p class="text-center">⭐⭐⭐⭐Rs.15,000</p>
                </div>
                <!-- Image 2 -->
                <div class="col">
                    <img src="images/dharan.jpg" class="img-fluid card-img" alt="Image 2">
                    <h5 class="text-center mt-2">Jhumka To Dharan</h5>
                    <p class="text-center">⭐⭐⭐⭐⭐Rs.1,000</p>
                </div>
                <!-- Image 3 -->
                <div class="col">
                    <img src="images/GANGTOK.jpg" class="img-fluid card-img" alt="Image 3">
                    <h5 class="text-center mt-2">Jhumka To Gangtok</h5>
                    <p class="text-center">⭐⭐⭐⭐Rs.25,000</p>
                </div>
                <!-- Image 4 -->
                <div class="col">
                    <img src="images/kathmandu.jpg" class="img-fluid card-img" alt="Image 4">
                    <h5 class="text-center mt-2">Jhumka To Kathmandu</h5>
                    <p class="text-center">⭐⭐⭐⭐⭐Rs.1,600</p>
                </div>
                <!-- Image 5 -->
                <div class="col">
                    <img src="images/mt everest.jpg" class="img-fluid card-img" alt="Image 5">
                    <h5 class="text-center mt-2">Jhumka To Mt.Everest </h5>
                    <p class="text-center">⭐⭐⭐⭐Rs.35,000</p>
                </div>
                <!-- Image 6 -->
                <div class="col">
                    <img src="images/mustang.jpg" class="img-fluid card-img" alt="Image 6">
                    <h5 class="text-center mt-2">Jhumka To Mustang</h5>
                    <p class="text-center">⭐⭐⭐⭐⭐Rs.45,000</p>
                </div>
                <!-- Image 7 -->
                <div class="col">
                    <img src="images/pokhara.jpg" class="img-fluid card-img" alt="Image 7">
                    <h5 class="text-center mt-2">Jhumka To Pokhara</h5>
                    <p class="text-center">⭐⭐⭐⭐Rs.35,000</p>
                </div>
                <!-- Image 8 -->
                <div class="col">
                    <img src="images/sapa.jpg" class="img-fluid card-img" alt="Image 8">
                    <h5 class="text-center mt-2">Jhumka To Sapa</h5>
                    <p class="text-center">⭐⭐⭐⭐Rs.55,000</p>
                </div>
                <!-- Image 9 -->
                <div class="col">
                    <img src="images/taplajung.jpg" class="img-fluid card-img" alt="Image 9">
                    <h5 class="text-center mt-2">Jhumka to Taplajung</h5>
                    <p class="text-center">⭐⭐⭐⭐⭐Rs.15,000</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <!-- Footer Column 1: About -->
                <div class="col-md-4 mb-4">
                    <h5>About Us</h5>
                    <p>Jhumka Ticket is your go-to platform for booking tickets to the most beautiful and iconic destinations in Nepal and beyond.</p>
                </div>
                <!-- Footer Column 2: Quick Links -->
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Services</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                        <li><a href="#" class="text-white">FAQ</a></li>
                    </ul>
                </div>
                <!-- Footer Column 3: Contact Info -->
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p><i class="bi bi-telephone"></i> Phone: +977 123 456 789</p>
                    <p><i class="bi bi-envelope"></i> Email: info@jhumkaticket.com</p>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="text-center pt-3">
                <p>&copy; 2024 Jhumka Ticket. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>