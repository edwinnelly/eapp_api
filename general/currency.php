<?php
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
header('Access-Control-Allow-Origin: *');
//db config
include_once('../config/cores.php');
include_once('../config/db-config.php');
include_once('../config/controller.php');

  //Process a GET request
  $app = new controller;
  try{
    $get_category = $app->get_currency($email);
    echo json_encode($get_category);
} catch (Exception $e) {
    
}