<?php
require 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Links</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Dashboard Links</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MFP Name</th>
                        <th>Form Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_GET['mfp_name']; ?></td>
                        <td><?php
                        $NAME = $_GET['mfp_name'];
                        $query = "SELECT form_link FROM mofpi_admin_dash WHERE mfp_name = '".$NAME."'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        
                        $link =$row['form_link'];
                        
                        ?>
                        <a href="<?php echo $link ?>">click here</a>
                        </td>
                        
                    </tr>
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
