<?php
require 'config.php';

// Start session

if(isset($_POST["submit"])) {
    // Retrieve the username of the currently logged-in user
    $add_user = $_SESSION['username']; // Assuming username is stored in the session
    
    // Retrieve form data
    $departments = $_POST["departments"];
    $num_employees = $_POST["num_employees"];
    $num_farmers = $_POST["num_farmers"];
    $num_distributors = $_POST["num_distributors"];
    $num_facilities = $_POST["num_facilities"];
    $transport_details = $_POST["transport_details"];
    $num_ppc = $_POST["num_ppc"];
    $num_cc = $_POST["num_cc"];
    $cc_names = $_POST["cc_names"];
    $num_manufacturing_units = $_POST["num_manufacturing_units"];
    $manufacturing_units = $_POST["manufacturing_units"];

    // Insert data into the database
    $query = "INSERT INTO mfp_ad_dash (add_user, departments, num_employees, num_farmers, num_distributors, num_facilities, transport_details, num_ppc, num_cc, cc_names, num_manufacturing_units, manufacturing_units) VALUES ('$add_user', '$departments', '$num_employees', '$num_farmers', '$num_distributors', '$num_facilities', '$transport_details', '$num_ppc', '$num_cc', '$cc_names', '$num_manufacturing_units', '$manufacturing_units')";

    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data saved successfully');</script>";
        // Redirect to view_data.php after successful data insertion
        echo "<script>window.location.href = '$_SERVER[PHP_SELF]?view=true';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Fetch data from the database if 'view' parameter is set in URL
if(isset($_GET['view']) && $_GET['view'] == 'true') {
    $query = "SELECT * FROM mfp_ad_dash";
    $result = mysqli_query($conn, $query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Data</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>View Data</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Departments</th>
                            <th>No. of Employees</th>
                            <th>No. of Farmers</th>
                            <th>No. of Distributors</th>
                            <th>No. of Facilities</th>
                            <th>Transport Details</th>
                            <th>No. of PPC</th>
                            <th>No. of CC</th>
                            <th>CC Names</th>
                            <th>No. of Manufacturing Units</th>
                            <th>Manufacturing Units</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['add_user']."</td>";
                            echo "<td>".$row['departments']."</td>";
                            echo "<td>".$row['num_employees']."</td>";
                            echo "<td>".$row['num_farmers']."</td>";
                            echo "<td>".$row['num_distributors']."</td>";
                            echo "<td>".$row['num_facilities']."</td>";
                            echo "<td>".$row['transport_details']."</td>";
                            echo "<td>".$row['num_ppc']."</td>";
                            echo "<td>".$row['num_cc']."</td>";
                            echo "<td>".$row['cc_names']."</td>";
                            echo "<td>".$row['num_manufacturing_units']."</td>";
                            echo "<td>".$row['manufacturing_units']."</td>";
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
    exit; // Stop executing the rest of the code after displaying data
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFP Dashboard</title>
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
            width: 300px; /* Adjust as needed */
            margin-bottom: 5px; /* Optional spacing between label and input */
        }

        .form-group input[type="checkbox"] {
            margin-top: 10px; /* Optional spacing for checkboxes */
        }

        .button-group {
            display: flex;
            justify-content: space-around;
        }

        .button-group button {
            flex: 1;
            margin-left: 5px;
            margin-right: 5px;
        }

        .button-group button:last-child {
            margin-right: 0; /* No margin for the last button */
        }

        .navbar-brand {
            font-weight: bold;
        }
        *{
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MFP Admin Dashboard</a>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card no-border">
                    <div class="card-body">
                        <h5 class="card-title">Add details</h5>
                        <form method="post">
                        <div class="form-group">
                                <label for="add_user">Username</label>
                                <input type="text" class="form-control" id="add_user" name="add_user" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="district">Enter the names of the departments in CPC</label>
                                <input type="text" class="form-control" id="district" name="departments" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="state">No.of Employees attached to CPC</label>
                                <input type="text" class="form-control" id="state" name="num_employees" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="land">No.of Farmers attached to CPC</label>
                                <input type="text" class="form-control" id="land" name="num_farmers" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="leasable">No.of Distributors/Retailers attached to CPC</label>
                                <input type="text" class="form-control" id="leasable" name="num_distributors" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No.of central facilities available in CPC</label>
                                <input type="text" class="form-control" id="vacant" name="num_facilities" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the Transport facilities details</label>
                                <input type="text" class="form-control" id="vacant" name="transport_details" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No.of Primary Processing Centres(PPC)</label>
                                <input type="text" class="form-control" id="vacant" name="num_ppc" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="vacant">No.of Collection Centres (CC)</label>
                                <input type="text" class="form-control" id="vacant" name="num_cc" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the names of the CC </label>
                                <input type="text" class="form-control" id="vacant" name="cc_names" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No.of Manufacturing Units in the MFP</label>
                                <input type="text" class="form-control" id="vacant" name="num_manufacturing_units" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the Manufacturing Units </label>
                                <input type="text" class="form-control" id="vacant" name="manufacturing_units" placeholder=" ">
                            </div>
                            <!-- Rest of the form fields -->
 
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    <a href="<?php echo $_SERVER["PHP_SELF"]."?view=true"; ?>" class="btn btn-primary">View</a>
                    <button class="btn btn-primary">Display the assessment link</button>
                </div>
                <br>
                <div class="form-group">
                    <label for="associatedMFP">Are you currently associated with this MFP?</label>
                    <input type="checkbox" id="associatedMFP">
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
