<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFP</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-box {
            border: 2px white;
            padding: 20px;
            border-radius: 10px;
        }

        .selected-role {
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }

        .form-select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Center the content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
           transition:  0.5s ease-in-out;
      margin: 0;
      background-color: #166d3b;
background-image: linear-gradient(147deg, #166d3b 0%, #000000 74%);
            background-position: center;
            background-attachment: fixed; /* Fixed background so it doesn't move when scrolling */
            background-size: cover;
        }
        .row{
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        /* Animation */
        .fade-in {
            animation: fadeInAnimation ease 2s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Change color of "MEGA FOOD PARK" text to white */
        h1,h4 {
            color: #ffffff; /* White color */
        }

        /* Change background color of MOFPI Administrator container to black */
        .mofpi-admin-container {
            background-color: Transparent; 
            border:none;/* Black color */
        }
        @font-face {
      font-family: myfont;
      src: url(akira.otf);
    }
    h1{
      font-family:myfont;
    }

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 fade-in"> <!-- Add fade-in class here -->
                <h1 class="text-center mb-4">MEGA FOOD PARK</h1>
                <?php
                // Handle form submission
                if (isset($_POST['selected_role'])) {
                    $selected_role = $_POST['selected_role'];
                    if ($selected_role === "MOFPI Administrator") {
                        header("Location: mofpi_signup.php"); // Redirect to mofpi_signup.php
                        exit;
                    } elseif ($selected_role === "MOFPI Administrator login") {
                        header("Location: mofpi_login.php"); // Redirect to mofpi_login.php
                        exit;
                    } 
                    echo "<p class='text-center selected-role'>Selected Role: $selected_role</p>";
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mofpi-admin-container"> <!-- Add mofpi-admin-container class here -->
                            <div class="card-body">
                                <h4 class="card-title text-center">MOFPI Administrator</h4>
                                <form method="post">
                                    <button type="submit" class="btn btn-primary btn-block mb-2" name="selected_role" value="MOFPI Administrator">Sign up</button>
                                    <button type="submit" class="btn btn-primary btn-block" name="selected_role" value="MOFPI Administrator login">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>