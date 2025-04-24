<?php
   session_start();
   if (!isset($_SESSION['username'])) {
       header('Location: login.php'); // Redirect if not logged in
       exit();
   }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resume Builder</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --bg: #f0f4f8;
      --text: #333;
      --card: white;
      --input: #fff;
    }

    body.dark {
      --bg: #1c1c1c;
      --text: #f0f0f0;
      --card: #2a2a2a;
      --input: #333;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://ak0.picdn.net/shutterstock/videos/1253170/thumb/8.jpg?i10c=img.resize(height:160)') no-repeat center center;
      background-size: cover;
      color: var(--text);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
      transition: background 0.3s ease, color 0.3s ease;
      position: relative;
    }

    .container {
      background: var(--card);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 850px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
    }

    .theme-toggle,
    .view-profile {
      position: absolute;
      top: 20px;
      cursor: pointer;
      font-size: 16px;
      color: var(--text);
      background: var(--card);
      padding: 8px 12px;
      border-radius: 6px;
      transition: background 0.3s ease;
    }

    .theme-toggle {
      right: 140px;
    }

    .view-profile {
      right: 30px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    label {
      font-weight: 600;
      margin-bottom: 5px;
      display: block;
    }

    .input-group {
      position: relative;
    }

    .input-group i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"],
    textarea,
    select {
      width: 100%;
      padding: 12px 12px 12px 35px;
      background: var(--input);
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 15px;
      color: var(--text);
    }
    textarea {
      resize: vertical;
      min-height: 80px;
    }
    .full-width {
      grid-column: 1 / 3;
    }

    input[type="submit"] {
      background-color: #2d89ef;
      color: white;
      border: none;
      padding: 14px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #1b6ec2;
    }

    #profile-box {
      display: none;
      position: absolute;
      top: 60px;
      right: 30px;
      background: var(--card);
      color: var(--text);
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      z-index: 999;
    }

    #profile-box p {
      margin-bottom: 8px;
    }

    @media (max-width: 700px) {
      .form-grid {
        grid-template-columns: 1fr;
      }

      .full-width {
        grid-column: 1 / 2;
      }

      .theme-toggle,
      .view-profile {
        font-size: 14px;
        padding: 6px 8px;
        top: 15px;
      }

      .theme-toggle {
        right: 120px;
      }

      #profile-box {
        width: 250px;
        right: 20px;
      }
    }
  </style>
</head>
<body>
  
  <div id="profile-box">
    <strong>Profile:</strong><br>
    <?php echo htmlspecialchars($_SESSION['username']); ?><br>
    <?php echo htmlspecialchars($_SESSION['email']); ?><br>

    <form action="signup.php" method="post" style="margin-top: 8px;">
      <button type="submit" style="margin-top: 5px;">Logout</button>
    </form>
  </div>


  <div class="theme-toggle" onclick="toggleTheme()" title="Toggle Theme">
    🌙 Theme
  </div>

  <button class="view-profile" onclick="toggleProfile()" title="View Profile">
    👤 Profile
  </button>

  <div class="container">
    <h2>🌟 Build Your Resume</h2>
    <form action="generate_resume.php" method="post" enctype="multipart/form-data">
      <div class="form-grid">
        <div>
          <label>Full Name:</label>
          <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="name" required>
          </div>

          <label>Email:</label>
          <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" required>
          </div>

          <label>Profile Picture:</label>
          <input type="file" name="photo" accept="image/*">
        </div>

        <div>
          <label>Skills:</label>
          <div class="input-group">
            <i class="fas fa-tools"></i>
            <textarea name="skills" required></textarea>
          </div>

          <label>Experience:</label>
          <div class="input-group">
            <i class="fas fa-briefcase"></i>
            <textarea name="experience" required></textarea>
          </div>

          <label>Certifications:</label>
          <div class="input-group">
            <i class="fas fa-certificate"></i>
            <textarea name="certifications"></textarea>
          </div>
        </div>

        <div class="full-width">
          <label>Education:</label>
          <div class="input-group">
            <i class="fas fa-graduation-cap"></i>
            <textarea name="education" required></textarea>
          </div>
        </div>

        <div class="full-width">
          <label>Hobbies:</label>
          <div class="input-group">
            <i class="fas fa-heart"></i>
            <textarea name="hobbies"></textarea>
          </div>
        </div>

        <div class="full-width">
          <label>LinkedIn / GitHub:</label>
          <div class="input-group">
            <i class="fas fa-link"></i>
            <input type="text" name="links" placeholder="https://linkedin.com/in/you">
          </div>
        </div>

        <div class="full-width">
          <input type="submit" value="Generate PDF Resume">
        </div>
      </div>
    </form>
  </div>

  <script>
    function toggleTheme() {
      document.body.classList.toggle("dark");
    }

    // Toggle the profile box visibility
    function toggleProfile() {
      var profileBox = document.getElementById("profile-box");
      if (profileBox.style.display === "none" || profileBox.style.display === "") {
        profileBox.style.display = "block";
      } else {
        profileBox.style.display = "none";
      }
    }
  </script>
</body>
</html>
