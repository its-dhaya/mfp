<?php
require 'config.php';

if(isset($_GET['mfp_name']) && isset($_GET['category'])) {
    $mfp_name = mysqli_real_escape_string($conn, $_GET['mfp_name']);
    $category = mysqli_real_escape_string($conn, $_GET['category']);

    $query = "SELECT form_link FROM mofpi_admin_dash WHERE mfp_name='$mfp_name' AND category='$category'";
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $form_link = $row['form_link'];
        echo $form_link;
    } else {
        echo "Form link not found";
    }
} else {
    echo "Invalid request";
}
?>
