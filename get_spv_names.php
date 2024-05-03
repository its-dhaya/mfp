<?php
// Fetch SPV names based on the MFP name received from the AJAX request
// This is just a sample. You need to replace this with your actual logic to fetch SPV names from your database.
if (isset($_POST['mfp_name'])) {
    $mfpName = $_POST['mfp_name'];

    // Sample SPV names, replace with your actual logic to fetch SPV names
    $spvNames = array(
        'SPV 1',
        'SPV 2',
        'SPV 3'
    );

    $options = '<option value="">Select SPV</option>';
    foreach ($spvNames as $spv) {
        $options .= '<option value="' . $spv . '">' . $spv . '</option>';
    }
    echo $options;
}
?>
