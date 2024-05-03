<?php
require 'config.php';
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM mofpi_admin WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: mofpi_admin_dash.php");
    }
    else{
        echo
        "<script> alert('wrong password'); </script>";

    }

}
else{
    echo
    "<script> alert('user not registered'); </script>";
}
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>MOFPI Login</title>
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
                <h2 class="text-center mb-4">MOFPI Login</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name = "submit">Sign in</button>
                </form>
                <div class="text-center mt-3">
                    <a href="mofpi_signup.php" class="btn btn-link">Signup</a>
                </div>
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