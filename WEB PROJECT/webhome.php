<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Resume Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-section { 
            background: url('https://img.freepik.com/premium-vector/_589019-2874.jpg?w=900') center/cover no-repeat; 
            height: 80vh; 
            display: flex; 
            align-items: center; 
            text-align: center;
        }
        .feature-card { padding: 20px; border-radius: 10px; margin-bottom: 20px; text-align: center; }
        
        .scroll-top-btn { position: fixed; bottom: 80px; right: 20px; z-index: 99; }
        footer { background: #343a40; color: white; padding: 30px 0; }
        .btn-white { 
            background-color: white; 
            color: black; 
            border: 2px solid black; 
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-white:hover {
            background-color: lightgray;
            color: black;
        }
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar bg-dark text-light p-2 d-flex justify-content-between">
        <div>👋 Welcome to Resume Generator - Build Your Perfect Resume Instantly!</div>
        <div>
            <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-light mx-2"><i class="fab fa-linkedin"></i></a>
            <a href="#" class="text-light mx-2"><i class="fab fa-youtube"></i></a>
            <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
            <span class="ms-3">📍 Amaravati, India</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <img src="https://images.sftcdn.net/images/t_app-icon-m/p/d51f87d4-1944-4b83-8290-64ac2ddca11b/3357068923/resume-maker-free-resume%20maker.png" alt="Logo" height="40" class="me-2"> AI Resume Generator
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="webfaq.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="webcontact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container">
            <h1 class="display-4 fw-bold">Create Your Professional Resume in Minutes</h1>
            <p class="lead">Resume builder to help you stand out</p>
            <a href="signup.php" class="btn btn-white btn-lg me-2">Start Building</a>
        </div>
    </section>

    <!-- Features -->
    <section class="container my-5 text-center">
        <h2 class="mb-5">Why Choose Our Resume Generator?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card shadow">
                    <i class="fas fa-magic fa-3x mb-3 text-primary"></i>
                    <h5>Smart Suggestions</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card shadow">
                    <i class="fas fa-file-alt fa-3x mb-3 text-primary"></i>
                    <h5>Professional Templates</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card shadow">
                    <i class="fas fa-download fa-3x mb-3 text-primary"></i>
                    <h5>Instant Download</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container my-5 text-center">
        <h2>Contact Us</h2>
        <p>Get in touch for any queries or assistance.</p>
        <div class="bg-light p-4 rounded mb-4">
            <i class="fas fa-phone-alt text-primary me-3"></i>
            <span>+91 1234567890</span>
        </div>
        <div class="bg-light p-4 rounded">
            <i class="fas fa-envelope text-primary me-3"></i>
            <span>contact@airesume.com</span>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2025 Resume Generator. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>