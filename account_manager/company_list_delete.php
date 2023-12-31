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
    $secure_login = $app->get_request('host_key');
    $host_key = $app->get_request('secure_e');
    $id = $app->get_request('account_id');
    if (!isset($host_key, $secure_login, $id)) {
        echo "Invalid api Call";
    } else {
        try {
            //validate key
            $check_e = $app->validateUserHostkey_ad($host_key, $secure_login);
            if ($check_e == "success") {
                $get_category = $app->delete_company_list($host_key, $id);
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