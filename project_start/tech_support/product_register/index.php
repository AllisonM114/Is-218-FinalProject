<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/customer_db.php');
require('../model/registration_db.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['user']))
	    $action = 'show_register';
	} else {
	    $action = 'show_login';
	}
    }

//switch statements for product register controller
switch ($action) {
    case 'show_login':
    include ('customer_login.php');
    break;

    case 'show_register':
    if (!isset($_SESSION['customer'])) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (valid_login($email, $password)) {
        $customer = use_customer_email($email);
	$_SESSION['user'] = $customer;
    }
}

    $customer = $_SESSION['user'];
    $products = get_products();
    include('product_register.php')
    break;

    case 'register_product':
    $customer = $_SESSION['user'];
    $code = filter_input(INPUT_POST, 'code');
    add_registration($customer, $code);
    $message = "Product ($code) was registered successfully.";
    include('product_register.php');
    break;
}

?>

