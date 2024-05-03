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
            border: none;
            padding: 20px;
            border-radius: 10px;
            background-color: Transparent; /* Transparent background */
            color: white;
            animation: fadeInAnimation ease 2s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
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
            background-attachment: fixed;
            background-size: cover;
        }

        .row {
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            background-color: none;
        }

        /* Fade-in animation */
        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @font-face {
      font-family: myfont;
      src: url(akira.otf);
    }
    h1{
      font-family:myfont;
    }
    h4{
        color:black;
    }
   .text-center {
    background-color: transparent; /* Set background color to transparent */
}

    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 container-box">
                <h1 class="text-center mb-4">MEGA FOOD PARK</h1>
                <?php
if (isset($_POST['selected_role'])) {
    $selected_role = $_POST['selected_role'];
    switch ($selected_role) {
        case "MFP Administrator":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mfp_admin_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mfp_admin_login.php");
                exit;
            }
            break;
        case "MFP Employee":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mfp_emp_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mfp_emp_login.php");
                exit;
            }
            break;
        case "MFP Farmers":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mfp_farm_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mfp_farm_login.php");
                exit;
            }
            break;
        case "MFP Retailers":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mfp_retail_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mfp_retail_login.php");
                exit;
            }
            break;
        case "MU Administrators":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mu_admin_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mu_admin_login.php");
                exit;
            }
            break;
        case "MU Employee":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mu_emp_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mu_emp_login.php");
                exit;
            }
            break;
        case "MU Farmers/Fisher Men":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mu_farm_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mu_farm_login.php");
                exit;
            }
            break;
        case "MU Retailers":
            if (isset($_POST['mfp_sign'])) {
                header("Location: mu_retail_signup.php");
                exit;
            } elseif (isset($_POST['mfp_log'])) {
                header("Location: mu_retail_login.php");
                exit;
            }
            break;
        default:
            // Handle default case if necessary
            break;
        }
}
?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <h4 class="card-title">MFP Stakeholder</h4>
                                <form method="post">
                                    <div class="form-group">
                                        <select class="form-control form-select mb-2" name="selected_role">
                                            <option value="select">Select....</option>
                                            <option value="MFP Administrator">MFP Administrator</option>
                                            <option value="MFP Employee">MFP Employee</option>
                                            <option value="MFP Farmers">MFP Farmers</option>
                                            <option value="MFP Retailers">MFP Retailers</option>
                                            <option value="MU Administrators">MU Administrators</option>
                                            <option value="MU Employee">MU Employee</option>
                                            <option value="MU Farmers/Fisher Men">MU Farmers/Fisher Men</option>
                                            <option value="MU Retailers">MU Retailers</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mb-2" name="mfp_sign">Sign up</button>
                                    <button type="submit" class="btn btn-primary btn-block" name="mfp_log">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted text-center">Note: Please select your role from the options above.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>