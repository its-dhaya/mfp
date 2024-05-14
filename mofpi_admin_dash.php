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
                            <th>Google Form Link</th> <!-- Added column -->
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
                            echo "<td>".$row['form_link']."</td>"; 
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
    $form_link = $_POST["form_link"]; // Retrieve Google Form link

    $query = "INSERT INTO mofpi_admin_dash (mfp_name, district, state, land, leasable, vacant, form_link) VALUES ('$mfp_name', '$district', '$state', '$land', '$leasable', '$vacant', '$form_link')";

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
                            <form action="mofpi_admin_dash.php" method="post">
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
                                    <p>Create the google form link</p>
                                    <a href="https://docs.google.com/forms/d/13U9EvwA2kskMgG7h-pI6AF10lLr8i7_II3gJgzzCKlM/edit" target="_blank">Create Google Form</a>
                                    <div class="form-group">
                                        <label for="form">Paste the link here</label>
                                        <input type="text" class="form-control" name="form_link" id="form_link" placeholder="Google Form Link">

                                    </div>
                                    
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo $_SERVER["PHP_SELF"]."?view=true"; ?>" class="btn btn-primary">View</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <div class="form-group">
                            <label for="mfp_select">Select the MFP</label>
                            <select class="form-control" id="mfp_select" name="mfp_name">
                                <?php
                                $mfp_query = "SELECT DISTINCT mfp_name FROM mofpi_admin_dash";
                                $mfp_result = mysqli_query($conn, $mfp_query);
                                while ($mfp_row = mysqli_fetch_assoc($mfp_result)) {
                                    echo "<option value='" . $mfp_row['mfp_name'] . "'>" . $mfp_row['mfp_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_select">Select the Category</label>
                            <select class="form-control" id="category_select">
                                <option value="MFP Administrator">MFP Administrator</option>
                                <option value="MFP Employee">MFP Employee</option>
                                <option value="MFP Farmers">MFP Farmers</option>
                                <option value="MFP Retailers">MFP Retailers</option>
                            </select> 
 
                            <br>
                            <div class="form-group1">
                                <button class="btn btn-primary" onclick="viewDetails('MFP')">View Details</button>
                                <button class="btn btn-success" onclick="postLink('MFP')">Post Link to Dashboard</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mu_select">Select the MU</label>
                            <select class="form-control" id="mu_select" name="mu_name">
                                <?php
                                $mu_query = "SELECT DISTINCT mfp_name FROM mofpi_admin_dash"; // Replace 'your_mu_table' with your MU table name
                                $mu_result = mysqli_query($conn, $mu_query);
                                while ($mu_row = mysqli_fetch_assoc($mu_result)) {
                                    echo "<option value='" . $mfp_row['mfp_name'] . "'>" . $mu_row['mfp_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_select">Select the Category</label>
                            <select class="form-control" id="category_select">
                                <option value="MU Administrators">MU Administrators</option>
                                <option value="MU Employee">MU Employee</option>
                                <option value="MU Farmers/Fisher Men">MU Farmers/Fisher Men</option>
                                <option value="MU Retailers">MU Retailers</option>
                            </select>
                           
                            <br>
                            <div class="form-group1">
                                <button class="btn btn-primary" onclick="viewDetails('MU')">View Details</button>
                                <button class="btn btn-success" onclick="postLink('MU')">Post Link to Dashboard</button>
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
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function viewDetails(type) {
            // Function to handle viewing details based on MFP or MU selection
            // You can implement this function as per your requirement
            console.log('Viewing details for ' + type);
        }

        function postLink(type) {
            // Function to handle posting link to dashboard based on MFP or MU selection
            // You can implement this function as per your requirement
            console.log('Posting link to dashboard for ' + type);
        }
    </script>
</body>
</html>
