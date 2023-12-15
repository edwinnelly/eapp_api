<?php
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
header('Access-Control-Allow-Origin: *');
//db config
include_once('../config/cores.php');
include_once('../config/db-config.php');
include_once('../config/controller.php');

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $app = new controller;

    // Check the user input pattern
    $pattern = "/[\/<>?-]/";
    $receivedData = json_decode($_POST['data'], true);

    // Extract and clean input data
    $secure_login = $app->clean_input($receivedData['secure_key']);
    $host_key = $app->clean_input($receivedData['host_key']);
    $company_id = $app->clean_input($receivedData['company_id']);


    //Check the user input pattern
    if (preg_match($pattern, $secure_key)) {
        echo json_encode("String contains forbidden characters.");
    } else {

        try {
            //validate key
            $check_e = $app->validateUserHostkey_ad($host_key, $secure_login);
            if ($check_e == "success") {
                // Retrieve and output data
                echo $get_category = $app->edit_company_list($host_key, $company_id);
                json_encode($get_category);
            } else {
                echo json_encode(['error' => "Invalid Key"]);
            }
        } catch (Exception $e) {
            // Handle exceptions
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

}
?>