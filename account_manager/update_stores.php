<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Include necessary files
include_once '../config/cores.php';
include_once '../config/db-config.php';
include_once '../config/controller.php';

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $rawData = file_get_contents('php://input');

    // Decode the JSON data
    $receivedData = json_decode($rawData);

    $app = new Controller(); // Use proper capitalization for class names

    // Validate each property before using it
    $properties = ['secure_key','img', 'host_key', 'legalname', 'email_addr', 'business_id', 'companyname', 'tin', 'tax_form', 'industry', 'currency', 'website', 'com_addr', 'business_id_store', 'cellphone'];
    $validatedData = [];

    foreach ($properties as $property) {
        $value = property_exists($receivedData, $property) ? $app->clean_input($receivedData->$property) : null;
        $validatedData[$property] = $value;
    }

    // Check the user input pattern
    $pattern = "/[\/<>?-]/";
    if (preg_match($pattern, $validatedData['secure_key'])) {
        echo json_encode(['error' => "String contains forbidden characters."]);
    } else {
        try {
            // Validate key
            $check_e = $app->validateUserHostkey_ad($validatedData['host_key'], $validatedData['secure_key']);

            if ($check_e == "success") {
                // Retrieve and output data
                $get_category = $app->UpdateStore($validatedData);

                // upload logo
                $uploadLogo = $app->upload_brand_logo($validatedData);

                // Respond with the result (success or error)
                echo json_encode($get_category);
            } else {
                echo json_encode(['error' => "Invalid Keys"]);
            }
        } catch (Exception $e) {
            // Handle exceptions
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>