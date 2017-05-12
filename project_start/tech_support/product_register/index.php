<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/customer_db.php');
require('../model/register_db.php');

$lifetime = 0;
session_set_cookie_params($lifetime, '/');
session_start();


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
      $action = (!isset($_SESSION['user'])) ?
      		'show_login' : 'get_customer';
      }
}
//        if (isset($_SESSION['user']))
//	      $action = 'show_register';
//	    } else {
//	      $action = 'show_login';
//	}
//  }
//switch statements for product register controller
switch ($action) {
    case 'show_login':
      include ('customer_login.php');
    break;

    case 'get_customer':
      if (!isset($_SESSION['user'])) {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
	$customer = get_customer($email, $password);
	if (!isset($customer)) {
	$error = "Missing or incorrect customer information.";
	    include('../errors/error.php');
       // if (valid_login($email, $password)) {
         // $customer = use_customer_email($email);
	  //$_SESSION['user'] = $customer;
       // }
      }
      
     }
    else {$customer = $_SESSION['user'];}
      $products = get_products();
      include('register_product.php');
      break; 

    case 'register_product':
    $customer = $_SESSION['user'];
    $code = filter_input(INPUT_POST, 'product_code');
    add_registration($customer, $code);
//    $message = "Product ($code) was registered successfully.";
    include('register_done.php');
    break;
}

?>

