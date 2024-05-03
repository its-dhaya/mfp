<?php
// Assuming you have a file named 'config.php' for database connection
require 'config.php';

// Function to fetch and display data from mfp_retailer_dash table
function viewRetailerData($conn) {
    $query = "SELECT * FROM mfp_retailer_dash";
    $result = mysqli_query($conn, $query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Retailer Data</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>Retailer Data</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>User</th>
                            <th>DOB</th>
                            <th>Qualification</th>
                            <th>Shop Name</th>
                            <th>Current Profit</th>
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
                            echo "<td>".$row['dob']."</td>";
                            echo "<td>".$row['qualification']."</td>";
                            echo "<td>".$row['shop_name']."</td>";
                            echo "<td>".$row['current_profit']."</td>";
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

// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Retrieve form data
    $add_user = $_SESSION['username'];
    $dob = $_POST["dob"];
    $qualification = $_POST["qualification"];
    $shopName = $_POST["shop_name"]; // Adjusted to match the input name in the HTML
    $currentProfit = $_POST["current_profit"]; // Adjusted to match the input name in the HTML
    $address = $_POST["address"];
    $aadhar = $_POST["aadhar"];
    $spouse = $_POST["spouse"];
    $children = $_POST["children"];

    // SQL query to insert data into the database
    $query = "INSERT INTO mfp_retailer_dash (add_user,dob, qualification, shop_name, current_profit, address, aadhar, spouse, children) VALUES ('$add_user','$dob', '$qualification', '$shopName', '$currentProfit', '$address', '$aadhar', '$spouse', '$children')";

    // Execute the query and check for success
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data saved successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Check if the 'view' parameter is set in the URL
if(isset($_GET['view']) && $_GET['view'] == 'true') {
    // Call the function to display retailer data
    viewRetailerData($conn);
    exit; // Stop executing the rest of the code after displaying data
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFP Retailer Dashboard</title>
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
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MFP Retailer Dashboard</a>
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
                                <label for="dob">DOB:</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                            <div class="form-group">
                                <label for="qualification">Educational Qualification:</label>
                                <input type="text" class="form-control" id="qualification" name="qualification">
                            </div>
                            <div class="form-group">
                                <label for="shop_name">Shop name:</label>
                                <input type="text" class="form-control" id="shop_name" name="shop_name">
                            </div>
                            <div class="form-group">
                                <label for="current_profit">Current profit (Rs):</label>
                                <input type="text" class="form-control" id="current_profit" name="current_profit">
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
                    <a href="<?php echo $_SERVER["PHP_SELF"]."?view=true"; ?>" class="btn btn-primary">View</a>
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
