<?php
require 'config.php';

// Function to fetch and display data from mfp_emp_dash table
function viewEmployeeData($conn) {
    $query = "SELECT * FROM mu_employee_dash";
    $result = mysqli_query($conn, $query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Employee Data</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Employee Data</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>User</th>
                            <th>Employee Name</th>
                            <th>DOB</th>
                            <th>Qualification</th>
                            <th>Salary</th>
                            <th>Address</th>
                            <th>Aadhar Number</th>
                            <th>Spouse/Parent Name</th>
                            <th>No. of Children</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['add_user']."</td>";
                            echo "<td>".$row['employeeName']."</td>";
                            echo "<td>".$row['dob']."</td>";
                            echo "<td>".$row['qualification']."</td>";
                            echo "<td>".$row['salary']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td>".$row['aadhar']."</td>";
                            echo "<td>".$row['spouse']."</td>";
                            echo "<td>".$row['children']."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}

// Insert data into the database when form is submitted
if(isset($_POST["submit"])) {
    $add_user = $_SESSION['username'];
    $employeeName = $_POST["employeeName"];
    $dob = $_POST["dob"];
    $qualification = $_POST["qualification"];
    $salary = $_POST["salary"];
    $address = $_POST["address"];
    $aadhar = $_POST["aadhar"];
    $spouse = $_POST["spouse"];
    $children = $_POST["children"];

    $query = "INSERT INTO mu_employee_dash (add_user,employeeName, dob, qualification, salary, address, aadhar, spouse, children) VALUES ('$add_user','$employeeName', '$dob', '$qualification', '$salary', '$address', '$aadhar', '$spouse', '$children')";

    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data saved successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Check if the 'view' parameter is set in the URL
if(isset($_GET['view']) && $_GET['view'] == 'true') {
    // Call the function to display employee data
    viewEmployeeData($conn);
    exit; // Stop executing the rest of the code after displaying data
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MU Employee Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
             /* Remove border around the card */
        .card.no-border {
            border: none;
            box-shadow: none;
        }

        /* Align input fields to the right of the labels */
        .form-group label {
            display: inline-block;
            width: 180px; /* Adjust as needed */
            margin-bottom: 5px; /* Optional spacing between label and input */
        }

        .form-group input[type="checkbox"] {
            margin-top: 10px; /* Optional spacing for checkboxes */
        }

        .navbar-heading {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand navbar-heading" href="#">MU Employee Dashboard</a>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card no-border">
                    <div class="card-body">
                        <h5 class="card-title">Add details</h5>
                        
                        <form method="post">


                            <div class="form-group">
                                <label for="employeeName">Employee Name:</label>
                                <input type="text" class="form-control" id="employeeName" name="employeeName">
                            </div>
                            <div class="form-group">
                                <label for="dob">DOB:</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="form-group">
                                <label for="qualification">Educational Qualification:</label>
                                <input type="text" class="form-control" id="qualification" name="qualification">
                            </div>
                            <div class="form-group">
                                <label for="salary">Current Salary (Rs):</label>
                                <input type="text" class="form-control" id="salary" name="salary">
                            </div>
                            <div class="form-group">
                                <label for="address">Residential Address:</label>
                                <textarea class="form-control" id="address" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="aadhar">Aadhar Number:</label>
                                <input type="text" class="form-control" id="aadhar" name="aadhar">
                            </div>
                            <div class="form-group">
                                <label for="spouse">Spouse/Parent Name:</label>
                                <input type="text" class="form-control" id="spouse" name="spouse">
                            </div>
                            <div class="form-group">
                                <label for="children">No. of Children:</label>
                                <input type="number" class="form-control" id="children" name="children">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    <!-- View button to display MU Employee data -->
                    <a href="<?php echo $_SERVER['PHP_SELF']."?view=true"; ?>" class="btn btn-primary">View</a>
                    <button class="btn btn-primary">Display the assessment link</button>
                </div>
                <br>
                <div class="form-group">
                    <label for="associatedMFP">Are you currently associated with this MFP?</label>
                    <input type="checkbox" id="associatedMFP" name="associatedMFP">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
