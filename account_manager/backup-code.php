<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Include necessary files
include_once('../config/cores.php');
include_once('../config/db-config.php');
include_once('../config/controller.php');

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $rawData = file_get_contents("php://input");

    // Decode the JSON data
    $receivedData = json_decode($rawData);

    $app = new controller;

    // Validate each property before using it
    $secure_login = property_exists($receivedData, 'secure_key') ? $app->clean_input($receivedData->secure_key) : null;
    $host_key = property_exists($receivedData, 'host_key') ? $app->clean_input($receivedData->host_key) : null;
    $legalname = property_exists($receivedData, 'legalname') ? $app->clean_input($receivedData->legalname) : null;
    $email_addr = property_exists($receivedData, 'email_addr') ? $app->clean_input($receivedData->email_addr) : null;
    $bis_number = property_exists($receivedData, 'bis_number') ? $app->clean_input($receivedData->bis_number) : null;
    $companyname = property_exists($receivedData, 'companyname') ? $app->clean_input($receivedData->companyname) : null;
    $tin = property_exists($receivedData, 'tin') ? $app->clean_input($receivedData->tin) : null;
    $tax_form = property_exists($receivedData, 'tax_form') ? $app->clean_input($receivedData->tax_form) : null;
    $industry = property_exists($receivedData, 'industry') ? $app->clean_input($receivedData->industry) : null;
    $currency = property_exists($receivedData, 'currency') ? $app->clean_input($receivedData->currency) : null;
    $website = property_exists($receivedData, 'website') ? $app->clean_input($receivedData->website) : null;
    $com_addr = property_exists($receivedData, 'com_addr') ? $app->clean_input($receivedData->com_addr) : null;
    $business_id_store = property_exists($receivedData, 'business_id_store') ? $app->clean_input($receivedData->business_id_store) : null;
    $cellphone = property_exists($receivedData, 'cellphone') ? $app->clean_input($receivedData->cellphone) : null;

      // Check the user input pattern
      $pattern = "/[\/<>?-]/";
    if (preg_match($pattern, $secure_login)) {
        echo json_encode(['error' => "String contains forbidden characters."]);
    } else {
        try {
            // Check if any required property is missing
            if (in_array(null, [$secure_login, $host_key, $legalname, $cellphone],true)) {
                echo json_encode(['error' => "One or more required fields are missing."]);
            } else {

                // Validate key
                $check_e = $app->validateUserHostkey_ad($host_key, $secure_login);

                if ($check_e == "success") {
                    // Retrieve and output data
                    $get_category = $app->UpdateStore($host_key, $legalname, $email_addr, $bis_number, $companyname, $tin, $tax_form, $industry, $currency, $website, $com_addr, $business_id_store, $cellphone);

                    // Respond with the result (success or error)
                    echo json_encode($get_category);
                } else {
                    echo json_encode(['error' => "Invalid Keys"]);
                }
            }
        } catch (Exception $e) {
            // Handle exceptions
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>