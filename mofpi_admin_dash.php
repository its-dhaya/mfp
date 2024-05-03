<?php
require 'config.php';

// Function to fetch and display data from mofpi_admin_dash table
function viewMFPData($conn) {
    $query = "SELECT * FROM mofpi_admin_dash";
    $result = mysqli_query($conn, $query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View MFP Data</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>MFP Data</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>MFP Name</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Land</th>
                            <th>Leasable</th>
                            <th>Vacant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['mfp_name']."</td>";
                            echo "<td>".$row['district']."</td>";
                            echo "<td>".$row['state']."</td>";
                            echo "<td>".$row['land']."</td>";
                            echo "<td>".$row['leasable']."</td>";
                            echo "<td>".$row['vacant']."</td>";
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
    $mfp_name = $_POST["mfp_name"];
    $district = $_POST["district"];
    $state = $_POST["state"];
    $land = $_POST["land"];
    $leasable = $_POST["leasable"];
    $vacant = $_POST["vacant"];

    $query = "INSERT INTO mofpi_admin_dash (mfp_name, district, state, land, leasable, vacant) VALUES ('$mfp_name', '$district', '$state', '$land', '$leasable', '$vacant')";

    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data saved successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Check if the 'view' parameter is set in the URL
if(isset($_GET['view']) && $_GET['view'] == 'true') {
    // Call the function to display MFP data
    viewMFPData($conn);
    exit; // Stop executing the rest of the code after displaying data
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOFPI Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
            .form-group1 {
            display: flex;
            flex-direction:row;
            margin-right:10px;
            justify-content: space-between;
        }
        
        /* Style for the navbar */
        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
            margin-bottom: 20px;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">
                    <h1 class="navbar-brand">MOFPI Admin Dashboard</h1>
                </nav>
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                <form action="mofpi_admin_dash.php" method="post"> <!-- Assuming mofpi_admin_dash.php handles form submission -->
    <!-- Display MFP Details -->
    <!-- Assuming x is the number of MFPs, you can repeat this section dynamically -->
    <div class="mfp-details">
        <h2>MFP Details</h2>
        <div class="form-group">
            <label for="mfp_name">MFP Name</label>
            <input type="text" class="form-control" name="mfp_name" id="mfp_name" placeholder="Enter MFP Name">
        </div>
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" class="form-control" name="district" id="district" placeholder="Enter District Name">
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" name="state" id="state" placeholder="Enter State Name">
        </div>
        <div class="form-group">
            <label for="land">Total Land Area</label>
            <input type="text" class="form-control" name="land" id="land" placeholder="Total Land Area">
        </div>
        <div class="form-group">
            <label for="leasable">Total Leasable Area</label>
            <input type="text" class="form-control" name="leasable" id="leasable" placeholder="Total Leasable Area">
        </div>
        <div class="form-group">
            <label for="vacant">Total Vacant Area</label>
            <input type="text" class="form-control" name="vacant" id="vacant" placeholder="Total Vacant Area">
        </div>
        <!-- Other details like Land Area, Leasable Area, Vacant Area, etc. -->
    </div>
    <form action="mofpi_admin_dash.php" method="get">
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
    <a href="<?php echo $_SERVER["PHP_SELF"]."?view=true"; ?>" class="btn btn-primary">View</a>
</form>

</form>

                </div>
            </div>
            <div class="col-md-6">

                
                <br>
                <div class="form-group">
                    <label for="mfp_select">Select the MFP</label>
                    <select class="form-control" id="mfp_select">
                        <!-- Dynamically populated options -->
                        <option value="Integrated_mfp">Integrated_mfp</option>
                            <option value="srini_mfp">srini_mfp</option>
                            <option value="Northeast_mfp">Northeast_mfp</option>
                            <option value="jangipur_mfp">jangipur_mfp</option>
                            <option value="godavari_mfp">godavari_mfp</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_select">Select the Category</label>
                    <select class="form-control" id="category_select">
                        <!-- Dynamically populated options -->

                        <option value="MFP Administrator">MFP Administrator</option>
                            <option value="MFP Employee">MFP Employee</option>
                            <option value="MFP Farmers">MFP Farmers</option>
                            <option value="MFP Retailers">MFP Retailers</option>
                    </select>
                    <br>
                    <div class="form-group1">
                        <button class="btn btn-primary">View Details</button>
                        <button class="btn btn-success">Post Link to Dashboard</button>
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="mfp_select">Select the MU</label>
                    <select class="form-control" id="mfp_select">
                        <!-- Dynamically populated options -->
                        <option value="Integrated_mfp">Integrated_mfp</option>
                            <option value="srini_mfp">srini_mfp</option>
                            <option value="Northeast_mfp">Northeast_mfp</option>
                            <option value="jangipur_mfp">jangipur_mfp</option>
                            <option value="godavari_mfp">godavari_mfp</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_select">Select the Category</label>
                    <select class="form-control" id="category_select">
                        <!-- Dynamically populated options -->
                        <option value="MU Administrators">MU Administrators</option>
                            <option value="MU Employee">MU Employee</option>
                            <option value="MU Farmers/Fisher Men">MU Farmers/Fisher Men</option>
                            <option value="MU Retailers">MU Retailers</option>
                    </select>
                    <br>
                    <div class="form-group1">
                        <button class="btn btn-primary">View Details</button>
                        <button class="btn btn-success">Post Link to Dashboard</button>
                       
                    </div>
                </div>
                <h2>View Assessment Data</h2>
                <div class="form-group">
                    <label for="link_sent_date">Date of the Link sent</label>
                    <input type="text" class="form-control" id="link_sent_date" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group">
                    <label for="category_select">Select the Category</label>
                    <select class="form-control" id="category_select">
                        <!-- Dynamically populated options -->
                        <option value="MFP Administrator">MFP Administrator</option>
                            <option value="MFP Employee">MFP Employee</option>
                            <option value="MFP Farmers">MFP Farmers</option>
                            <option value="MFP Retailers">MFP Retailers</option>
                            <option value="MU Administrators">MU Administrators</option>
                            <option value="MU Employee">MU Employee</option>
                            <option value="MU Farmers/Fisher Men">MU Farmers/Fisher Men</option>
                            <option value="MU Retailers">MU Retailers</option>
                    </select>
                    <br>
                    <button class="btn btn-primary">View</button>
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