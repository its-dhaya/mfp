<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
  <style>
    /* Add custom styles here */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      border: none;
      outline: none;
      scroll-behavior: smooth;
    }

    html {
      overflow-x: hidden;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 2rem 5%; /* Adjusted padding for smaller screens */
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 100;
    }

    .Logo {
      color: #fff;
      text-decoration: none;
      font-weight: 700;
      cursor: pointer;
      font-size: 1.5rem; /* Adjusted font size for smaller screens */
    }

    section {
      padding: 8rem 5% 2rem; /* Adjusted padding for smaller screens */
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .navbar a:hover,
    .navbar a:active {
      color: #ef6e12;
    }

    .navbar a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      display: inline-block;
      margin-left: 2rem; /* Adjusted margin for smaller screens */
      font-size: 1.2rem; /* Adjusted font size for smaller screens */
      transition: .2s;
    }

    .all-heading {
      font-size: 2rem; /* Adjusted font size for smaller screens */
      color: #ef6e12;
      text-align: left;
      margin-left: 5%; /* Adjusted margin for smaller screens */
    }

    .about-content {
      font-size: 1.2rem; /* Adjusted font size for smaller screens */
      color: #fff;
      margin-top: 1rem; /* Adjusted margin for smaller screens */
    }

    .contact-form {
      max-width: 90%; /* Adjusted maximum width for smaller screens */
      margin: 0 auto;
    }

    body {
      transition:  0.5s ease-in-out;
      margin: 0;
      background-color: #166d3b;
      background-image: linear-gradient(147deg, #166d3b 0%, #000000 74%);
    }

    .intro {
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100vh;
      background-color: transparent;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h1 {
      font-family: "Rubik Mono One", monospace;
      font-weight: 400;
      font-style: normal;
      color: #ffffff;
      margin: 0;
    }

    .logo {
      display: inline-block;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .active {
      opacity: 1;
    }

    .fade {
      opacity: 0;
    }

    .stay {
      opacity: 1;
    }

    .text-center {
      margin-bottom: 170px;
    }

    /* Media query for smaller screens */
    @media (max-width: 768px) {
      .header {
        padding: 1rem 5%; /* Adjusted padding for smaller screens */
      }

      .Logo {
        font-size: 1.3rem; /* Adjusted font size for smaller screens */
      }

      .navbar a {
        margin-left: 1rem; /* Adjusted margin for smaller screens */
        font-size: 1rem; /* Adjusted font size for smaller screens */
      }

      .all-heading {
        font-size: 1.5rem; /* Adjusted font size for smaller screens */
        margin-left: 5%; /* Adjusted margin for smaller screens */
      }

      .about-content {
        font-size: 1rem; /* Adjusted font size for smaller screens */
        margin-top: 0.5rem; /* Adjusted margin for smaller screens */
      }
    }
  </style>
</head>

<body>
  <header class="header">
    <img src="logo.jpeg" alt="Your Logo" width="100"> <!-- Add your logo here -->
    
    <nav class="navbar">
      <a href="#Home">Home</a>
      <a href="#About">About</a>
      <a href="#Contact">Contact Us</a>
    </nav>
  </header>
  <section class="Home" id="Home">
    <div class="intro">
      <div class="container text-center">
        <h1 class="logo-header">
          <span class="logo">Welcome to </span> <span class="logo">Mega Food Park</span>
        </h1>
        <div class="mt-4">
          <a href="mofpi_admin.php" class="btn btn-primary btn-lg mr-4">MOFPI Administrator</a>
          <a href="mfp_sh.php" class="btn btn-success btn-lg">MFP Stakeholder</a>
        </div>
      </div>
    </div>
  </section>
  <section class="About" id="About">
    <div class="container">
      <h2 class="all-heading">About <span>Section</span></h2>
      <p class="about-content">The Mega Food Project aims to revolutionize the food processing industry by establishing state-of-the-art infrastructure and facilities to support food processing units.</p>
    </div>
  </section>
  <section class="Contact" id="Contact">
    <div class="container">
      <h2 class="all-heading">Contact <span>Section</span></h2>
      <div class="contact-form">
        <form action="#" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>
    </div>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const logoSpans = document.querySelectorAll('.logo');
      const intro = document.querySelector('.intro');

      setTimeout(() => {
        logoSpans.forEach((span, idx) => {
          setTimeout(() => {
            span.classList.add('active');
          }, (idx + 1) * 400);
        });

        // Remove the fading animation
        logoSpans.forEach((span, idx) => {
          setTimeout(() => {
            span.classList.remove('active');
            span.classList.add('stay'); // Add a class to ensure it stays visible
          }, (idx + 1) * 300);
        });
      });
    });
  </script>
</body>

</html>
