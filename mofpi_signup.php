<?php
require 'config.php';
if(isset($_POST["submit"])){
    $administrator_name = $_POST["administrator_name"];
    $designation = $_POST["designation"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];
    $duplicate = mysqli_query($conn, "SELECT *FROM mofpi_admin WHERE username = '$username' OR email = '$email' ");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('username or email is already taken'); </script>";
    }
    else{
        if($password == $confirmpass){
           $query = "INSERT INTO mofpi_admin (administrator_name, designation, email, contact_number, username, password, confirmpass) VALUES ('$administrator_name', '$designation', '$email', '$contact_number', '$username', '$password', '$confirmpass')";

            mysqli_query($conn,$query);
            echo
             "<script> alert('registration successful'); </script>";
             header("Location: mofpi_login.php");
        }
        else{
            echo
             "<script> alert('password does not match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>MOFPI Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
      transition: background-color 0.3s ease-in-out;
    }
    .container {
      opacity: 0;
      transition: opacity 0.8s ease-in-out;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <h2 class="text-center mb-4">MOFPI Signup</h2>
                <form id="signupForm" action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="administrator_name">Administrator Name</label>
                        <input type="text" class="form-control" id="administrator_name" name="administrator_name">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number">
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmpass">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpass" name="confirmpass">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" name="submit" >register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain Bootstrap features like dropdowns) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function () {
      $(".container").css("opacity", "1");
    });
  </script>
</body>

</html>