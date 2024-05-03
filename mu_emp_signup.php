<?php
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


if(isset($_POST["submit"])) {
    $spv_name = $_POST["spv_name"];
    $district_name = $_POST["district_name"];
    $state_name = $_POST["state_name"];
    $manufacturing_unit = $_POST["manufacturing_unit"];
    $employee_name = $_POST["employee_name"]; 
    $department_name = $_POST["department_name"]; 
    $designation = $_POST["designation"]; 
    $DOJ = $_POST["DOJ"];
    $email = $_POST["email"];
    $contact_number = $_POST["contact_number"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $duplicate = mysqli_query($conn, "SELECT * FROM mu_emp WHERE username = '$username' OR email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email is already taken');</script>";
    } else {
        if($password == $confirm_password) {
             $query = "INSERT INTO mu_emp (spv_name, district_name, state_name, manufacturing_unit, employee_name, department_name, designation, DOJ, email, contact_number, username, password) VALUES ('$spv_name', '$district_name', '$state_name', '$manufacturing_unit', '$employee_name', '$department_name', '$designation', '$DOJ', '$email', '$contact_number', '$username', '$password')";
            if(mysqli_query($conn, $query)) {
                echo "<script>alert('Registration successful');</script>";
                header("Location: mu_emp_login.php");
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
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
 <style>
    .container-box {
      border: 2px solid black;
      padding: 20px;
      border-radius: 10px;
    }
    .card-header{
        font-size: 23px;
        text-align: center;
    }
  </style>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 container-box">
        <h2 class="text-center mb-4">MU Employee Signup</h2>
        <form method="post" action="">
          <div class="form-group">
            <label for="spv_name">SPV Name:</label>
            <select class="form-control" id="spv_name" name="spv_name" required>
              <option value="">Select SPV</option>
              <?php echo getMFPNames($conn); ?>
            </select>
          </div> 
            <div class="form-group">
              <label for="district_name">District Name</label>
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
              <label for="state_name">State Name</label>
              <select class="form-control" id="state_name" name="state_name" required>
              <!-- List of states in Tamil Nadu -->
              <option value="Tamil Nadu">Tamil Nadu</option>
            </select>
            </div>
            <div class="form-group">
              <label for="manufacturing_unit">Manufacturing Unit</label>
              <!-- Display the list of MUs (Manufacturing Units) for the selected MFP here -->
              <select class="form-control" id="manufacturing_unit" name="manufacturing_unit" required>
                <!-- Option 1 -->
                <option value="mu1">MU 1</option>
                <!-- Option 2 -->
                <option value="mu2">MU 2</option>
                <!-- Add more options as needed -->
              </select>
            </div>
            <div class="form-group">
              <label for="employee_name">Employee Name</label>
              <input type="text" class="form-control" id="employee_name" name="employee_name" required>
            </div>
            <div class="form-group">
              <label for="department_name">Department Name</label>
              <input type="text" class="form-control" id="department_name" name="department_name" required>
            </div>
            <div class="form-group">
              <label for="designation">Designation</label>
              <input type="text" class="form-control" id="designation" name="designation" required>
            </div>
            <div class="form-group">
              <label for="doj">DOJ </label>
              <input type="date" class="form-control" id="DOJ" name="DOJ" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="contact_number">Contact Number</label>
              <input type="text" class="form-control" id="contact_number" name="contact_number" required>
            </div>
            <div class="form-group">
              <label for="username">User Name</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Registration</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
