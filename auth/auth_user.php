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
      $password = sha1($app->get_request('password'));
    if (!isset($email,$password)) {
        echo "Invalid api Call";
    } else {
        try{
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $get_category = $app->auth_users($email, $password);
                echo json_encode($get_category);
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