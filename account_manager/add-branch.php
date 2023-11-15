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
    $companyname = base64_decode($app->get_request('companyname'));
    $address = $app->get_request('address');
    $btype = $app->get_request('btype');
    $host_key = $app->get_request('host_key');
    $secure_login = $app->get_request('secure_e');
    $pid_id = $app->get_request('pid_id');
    $company_id = uniqid();
    
    if (isset($companyname,$btype,$host_key,$pid_id)) {
        $check_e = $app->validateUserHostkey_ad($host_key,$secure_login);
        if ($check_e == "success") {
            $get_category = $app->add_branch($companyname, $address, $btype,$company_id,$host_key,$secure_login,$pid_id);
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