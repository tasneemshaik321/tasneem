<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Resume Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }

        .faq-question {
            width: 100%;
            text-align: left;
            padding: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .faq-answer {
            display: none;
            background: white;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }

        .search-box input {
            width: 80%;
            padding: 10px;
        }

        .search-box button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
        }

        footer {
            background: #343a40;
            color: white;
            padding: 30px 0;
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
            <a class="navbar-brand fw-bold text-primary" href="webhome.html">
                <img src="https://images.sftcdn.net/images/t_app-icon-m/p/d51f87d4-1944-4b83-8290-64ac2ddca11b/3357068923/resume-maker-free-resume%20maker.png" alt="Logo" height="40" class="me-2"> AI Resume Generator
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="webhome.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link active" href="webfaq.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="webcontact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="container my-5 text-center">
        <h1 class="fw-bold text-primary mb-3">Frequently Asked Questions</h1>
        <p class="text-muted">Find answers to common resume-related queries</p>
    </div>

    <!-- Search -->
    <div class="container mb-4 text-center">
        <div class="search-box">
            <input type="text" id="search" placeholder="Search job application tips">
            <button onclick="searchFAQs()">Search</button>
        </div>
    </div>

    <!-- FAQs -->
    <div class="container mb-5">
        <div class="faq">
            <button class="faq-question">What are the key sections to include in a resume?</button>
            <div class="faq-answer">Contact info, summary, work experience, education, skills, and certifications.</div>
        </div>
        <div class="faq">
            <button class="faq-question">How long should my resume be?</button>
            <div class="faq-answer">Ideally one page for beginners and two pages for experienced professionals.</div>
        </div>
        <div class="faq">
            <button class="faq-question">What is the best format for a resume?</button>
            <div class="faq-answer">Reverse chronological is best, but functional or hybrid formats work in some cases.</div>
        </div>
        <div class="faq">
            <button class="faq-question">How do I write a strong summary statement?</button>
            <div class="faq-answer">Focus on skills, experience, and career goals in 2-3 impactful sentences.</div>
        </div>
        <div class="faq">
            <button class="faq-question">Should I include a photo in my resume?</button>
            <div class="faq-answer">Not recommended in most countries; check industry and location norms.</div>
        </div>
        <div class="faq">
            <button class="faq-question">How can I tailor my resume for different job applications?</button>
            <div class="faq-answer">Use keywords, highlight relevant skills, and customize each application.</div>
        </div>
        <div class="faq">
            <button class="faq-question">What are common resume mistakes to avoid?</button>
            <div class="faq-answer">Typos, too much info, generic content, unprofessional email, poor formatting.</div>
        </div>
        <div class="faq">
            <button class="faq-question">How can I make my resume stand out?</button>
            <div class="faq-answer">Use quantifiable achievements, a clean design, strong action words, and no errors.</div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2025 Resume Generator. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle FAQ
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
            });
        });

        function searchFAQs() {
            const searchTerm = document.getElementById("search").value.toLowerCase();
            document.querySelectorAll(".faq").forEach(faq => {
                const question = faq.querySelector(".faq-question").textContent.toLowerCase();
                const answer = faq.querySelector(".faq-answer").textContent.toLowerCase();
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    faq.style.display = "block";
                } else {
                    faq.style.display = "none";
                }
            });
        }
    </script>

</body>
</html>
