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
    $companyname = $app->get_request('companyname');
    $currency = $app->get_request('currency');
    $country = $app->get_request('country');
    $host_key = $app->get_request('host_key');
    $public_key = uniqid();
    $company_key = sha1(uniqid());
    $secure_login = $app->get_request('secure_e');

    if (isset($companyname,$country,$host_key,$country)) {
        $check_e = $app->validateUserHostkey_ad($host_key,$secure_login);
        if ($check_e == "success") {
            $get_category = $app->add_company($companyname, $currency, $country, $public_key, $host_key,$company_key);
            echo json_encode($get_category);
        } else {
            echo "Invalid Key";
        }
    }else{
        echo "Missing Parameters";
    }
} else {
    // Unsupported HTTP method
    http_response_code(405); // Method Not Allowed
    $response = array('message' => 'Unsupported HTTP method');
    echo json_encode($response);
}