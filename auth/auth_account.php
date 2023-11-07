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
     $email = $app->get_request('email');
     $password1 = base64_decode($app->get_request('password'));
     $password = sha1($password1);
     $username = $app->get_request('username');
     $public_key = uniqid();
    if (!isset($email,$username,$password)) {
        echo "Invalid api Call";
    } else {
        $check_e = $app->validateUserEmail($email);
        if ($check_e == "success") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $get_category = $app->add_new_member($public_key, $email, $password,$username);
                echo json_encode($get_category);
            }
        }else{
             echo json_encode($check_e);
        }
    }
} else {
    // Unsupported HTTP method
    http_response_code(405); // Method Not Allowed
    $response = array('message' => 'Unsupported HTTP method');
    echo json_encode($response);
}