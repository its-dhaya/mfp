<?php
require 'config.php';

// Check if the form is submitted
if(isset($_POST["submit"])) {
    // Retrieve form data
    $add_user = $_SESSION['username'];
    $muxtimes = $_POST["muxtimes"];
    $emp_mu = $_POST["emp_mu"];
    $farm_mu = $_POST["farm_mu"];
    $ret_mu = $_POST["ret_mu"];
    $mua = $_POST["mua"];
    $mu_ytimes = $_POST["mu_ytimes"];
    $mupf = $_POST["mupf"];
    $mupc = $_POST["mupc"];
    $muppc = $_POST["muppc"];
    $mucc = $_POST["mucc"];
    $muccn = $_POST["muccn"];
    $muMFP = $_POST["muMFP"];
    $ntimes = $_POST["ntimes"];
    
    // SQL query to insert data into the database
    $query = "INSERT INTO mu_admin_dash (add_user,muxtimes, emp_mu, farm_mu, ret_mu, mua, mu_ytimes, mupf, mupc, muppc, mucc, muccn, muMFP, ntimes) 
              VALUES ('$add_user','$muxtimes', '$emp_mu', '$farm_mu', '$ret_mu', '$mua', '$mu_ytimes', '$mupf', '$mupc', '$muppc', '$mucc', '$muccn', '$muMFP', '$ntimes')";

    // Execute the query and check for success
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data saved successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Check if the 'view' parameter is set in the URL
if(isset($_GET['view']) && $_GET['view'] == 'true') {
    // Call the function to display MU Admin data
    viewMUAdminData($conn);
    exit; // Stop executing the rest of the code after displaying data
}

function viewMUAdminData($conn) {
    $query = "SELECT * FROM mu_admin_dash";
    $result = mysqli_query($conn, $query);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View MU Admin Data</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2>MU Admin Data</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>User</th>
                            <th>MUX Times</th>
                            <th>Employees Attached</th>
                            <th>Farmers Attached</th>
                            <th>Retailers Attached</th>
                            <th>Central Facilities</th>
                            <th>Central Facilities Used Times</th>
                            <th>Processing Facilities</th>
                            <th>Processing Facilities Used Times</th>
                            <th>Transport Facilities</th>
                            <th>Primary Processing Centres</th>
                            <th>Districts of PPC</th>
                            <th>Collection Centres</th>
                            <th>Names of CC</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$row['add_user']."</td>";
                            echo "<td>".$row['muxtimes']."</td>";
                            echo "<td>".$row['emp_mu']."</td>";
                            echo "<td>".$row['farm_mu']."</td>";
                            echo "<td>".$row['ret_mu']."</td>";
                            echo "<td>".$row['mua']."</td>";
                            echo "<td>".$row['mu_ytimes']."</td>";
                            echo "<td>".$row['mupf']."</td>";
                            echo "<td>".$row['mupc']."</td>";
                            echo "<td>".$row['muppc']."</td>";
                            echo "<td>".$row['mucc']."</td>";
                            echo "<td>".$row['muccn']."</td>";
                            echo "<td>".$row['muMFP']."</td>";
                            echo "<td>".$row['ntimes']."</td>";
                            echo "<td><a href='".$_SERVER['PHP_SELF']."?view=false' class='btn btn-secondary'>Close</a></td>";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MU Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-group1 {
            display: flex;
            flex-direction: row;
            margin-right: 10px;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MU ADMIN DASHBOARD</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                    <form action="" method="post">
                        <!-- Display MFP Details -->

                        <div class="mfp-details">
                            <h2>Add Details</h2>
                            
                            <div class="form-group">
                                <label for="add_user">Username</label>
                                <input type="text" class="form-control" id="add_user" name="add_user" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="district">Enter the names of the departments in MU</label>
                                <input type="text" class="form-control" name="muxtimes" id="muxtimes" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="state">No.of Employees attached to MU</label>
                                <input type="text" class="form-control" name="emp_mu" id="emp_mu" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="land">No.of Farmers attached to MU</label>
                                <input type="text" class="form-control" name="farm_mu" id="farm_mu" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="leasable">No.of Distributors/Retailers attached to MU</label>
                                <input type="text" class="form-control" name="ret_mu" id="ret_mu" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No.of central facilities  used by MU</label>
                                <input type="text" class="form-control" name="mua" id="mua" placeholder=" y">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the Central facilities in MU</label>
                                <input type="text" class="form-control" name="mu_ytimes" id="mu_ytimes" placeholder="y times ">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No. of Processing facilities in MU</label>
                                <input type="text" class="form-control" name="mupf" id="mupf" placeholder="z">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the Processing facilities used by MU</label>
                                <input type="text" class="form-control" name="mupc" id="mupc" placeholder="z times">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the Transport facilities details</label>
                                <input type="text" class="form-control" name="muppc" id="muppc" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No.of Primary Processing Centres(PPC) associated with MU</label>
                                <input type="text" class="form-control" name="mucc" id="mucc" placeholder="m">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the Districts of the PPC associated with MU</label>
                                <input type="text" class="form-control" name="muccn" id="muccn" placeholder=" ">
                            </div>
                            <div class="form-group">
                                <label for="vacant">No.of Collection Centres (CC) associated with MU</label>
                                <input type="text" class="form-control" name="muMFP" id="muMFP" placeholder=" n">
                            </div>
                            <div class="form-group">
                                <label for="vacant">Enter the names of the CC associated with MU</label>
                                <input type="text" class="form-control" name="ntimes" id="ntimes" placeholder=" ">
                            </div>
                           
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    <!-- View button to display MU Admin data -->
                    <a href="<?php echo $_SERVER['PHP_SELF']."?view=true"; ?>" class="btn btn-primary">View</a>
                    <button class="btn btn-primary">Display the assessment link</button>
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
