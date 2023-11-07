<?php
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
header('Access-Control-Allow-Origin: *');
//db config
include_once('../config/cores.php');
include_once('../config/db-config.php');
include_once('../config/controller.php');

// Handle the request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //Process a GET request
    $app = new controller;
    $host_key = $app->get_request('host_key');
    $secure_login = $app->get_request('secure_e');
    if (!isset($host_key)) {
        echo "Invalid api Call";
    } else {
        try {
            //validate key
            $check_e = $app->validateUserHostkey_ad($host_key,$secure_login);
            if ($check_e == "success") {
                $get_category = $app->get_company_list($host_key);
                echo json_encode($get_category);

            } else {
                echo "Invalid Key";
            }
        } catch (Exception $e) {

        }
    }
} else {
    // Unsupported HTTP method
    http_response_code(405); // Method Not Allowed
    $response = array('message' => 'Unsupported HTTP method');
    echo json_encode($response);
}