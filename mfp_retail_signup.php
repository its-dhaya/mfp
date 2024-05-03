<?php
// Include your database connection file
require 'config.php';
function getMFPNames($conn) {
    $query = "SELECT DISTINCT mfp_name FROM mofpi_admin_dash";
    $result = mysqli_query($conn, $query);
    $options = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='".$row['mfp_name']."'>".$row['mfp_name']."</option>";
    }
    return $options;
  }
// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Retrieve form data
    $spv_name = $_POST["spv_name"];
    $district_name = $_POST["district_name"];
    $state_name = $_POST["state_name"];
    $retailer_name = $_POST["retailer_name"];
    $products = $_POST["products"];
    $location = $_POST["location"];
    $DOJ = $_POST["DOJ"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check for duplicate username or email
    $duplicate = mysqli_query($conn, "SELECT * FROM mfp_ret WHERE username = '$username' OR email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email is already taken');</script>";
    } else {
        // Check if passwords match
        if($password == $confirm_password) {
            // Insert data into the database
            $query = "INSERT INTO mfp_ret (spv_name, district_name, state_name, retailer_name, products, location, DOJ, email, contact_number, username, password) VALUES ('$spv_name', '$district_name', '$state_name', '$retailer_name', '$products', '$location', '$DOJ', '$email', '$contact_number', '$username', '$password')";
            if(mysqli_query($conn, $query)) {
                echo "<script>alert('Registration successful');</script>";
                header("Location: mfp_retail_login.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Password does not match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-box {
            border: 2px solid black;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 container-box">
        <h2 class="text-center mb-4">MFP Retailer Signup</h2>
        <form method="post" action="">
          <div class="form-group">
            <label for="spv_name">SPV Name:</label>
            <select class="form-control" id="spv_name" name="spv_name" required>
              <option value="">Select SPV</option>
              <?php echo getMFPNames($conn); ?>
            </select>
          </div> 
                    <div class="form-group">
                        <label for="district_name">District Name:</label>
                        <select class="form-control" id="district_name" name="district_name" required>
              <option value="">Select District</option>
              <option value="Ariyalur">Ariyalur</option>
              <option value="Chengalpattu">Chengalpattu</option>
              <option value="Chennai">Chennai</option>
              <option value="Coimbatore">Coimbatore</option>
              <option value="Cuddalore">Cuddalore</option>
              <option value="Dharmapuri">Dharmapuri</option>
              <option value="Dindigul">Dindigul</option>
              <option value="Erode">Erode</option>
              <option value="Kallakurichi">Kallakurichi</option>
              <option value="Kanchipuram">Kanchipuram</option>
              <option value="Kanyakumari">Kanyakumari</option>
              <option value="Karur">Karur</option>
              <option value="Krishnagiri">Krishnagiri</option>
              <option value="Madurai">Madurai</option>
              <option value="Nagapattinam">Nagapattinam</option>
              <option value="Namakkal">Namakkal</option>
              <option value="Nilgiris">Nilgiris</option>
              <option value="Perambalur">Perambalur</option>
              <option value="Pudukkottai">Pudukkottai</option>
              <option value="Ramanathapuram">Ramanathapuram</option>
              <option value="Salem">Salem</option>
              <option value="Sivaganga">Sivaganga</option>
              <option value="Tenkasi">Tenkasi</option>
              <option value="Thanjavur">Thanjavur</option>
              <option value="Theni">Theni</option>
              <option value="Thoothukudi">Thoothukudi</option>
              <option value="Tiruchirappalli">Tiruchirappalli</option>
              <option value="Tirunelveli">Tirunelveli</option>
              <option value="Tirupathur">Tirupathur</option>
              <option value="Tiruppur">Tiruppur</option>
              <option value="Tiruvallur">Tiruvallur</option>
              <option value="Tiruvannamalai">Tiruvannamalai</option>
              <option value="Tiruvarur">Tiruvarur</option>
              <option value="Vellore">Vellore</option>
              <option value="Viluppuram">Viluppuram</option>
              <option value="Virudhunagar">Virudhunagar</option>
            </select>
                    </div>
                    <div class="form-group">
                        <label for="state_name">State Name:</label>
                        <select class="form-control" id="state_name" name="state_name" required>
              <!-- List of states in Tamil Nadu -->
              <option value="Tamil Nadu">Tamil Nadu</option>
            </select>
                    </div>
                    <div class="form-group">
                        <label for="retailer_name">Retailer Name:</label>
                        <input type="text" class="form-control" id="retailer_name" name="retailer_name">
                    </div>
                    <div class="form-group">
                        <label for="products">Products of this MFP:</label>
                        <input type="text" class="form-control" id="products" name="products">
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="doj">DOJ with this MFP:</label>
                        <input type="date" class="form-control" id="DOJ" name="DOJ" placeholder="dd/mm/yyyy" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Registration</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
