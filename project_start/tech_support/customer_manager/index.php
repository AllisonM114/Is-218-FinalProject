<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_customerss';
    }
}

if ($action == 'list_customers') {
    $products = get_customers();
    include('customer_list.php');

} else if ($action == 'search_customer') {
    $last_name = filter_input(INPUT_POST, 'last_name');
    if ($last_name == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect last name.";
	include('../errors/error.php');
    } else {
        $customers = search_customer($last_name);
	include('customer_list.php'); }

} else if ($action == 'show_add_form') {
    include('customer_update_add.php');

} else if ($action == 'add_customer') {
   $first_name = filter_input(INPUT_POST, 'first_name');
   $last_name = filter_input(INPUT_POST, 'last_name');
   $address = filter_input(INPUT_POST, 'address');
   $city = filter_input(INPUT_POST, 'city');
   $state = filter_input(INPUT_POST, 'state');
   $postal_code = filter_input(INPUT_POST, 'postal_code');
   $country_code = filter_input(INPUT_POST, 'country_code');
   $phone = filter_input(INPUT_POST, 'phone');
   $email = filter_input(INPUT_POST, 'email');
   $password = filter_input(INPUT_POST, 'password');
   if ($first_name == NULL || $first_name == FALSE || $last_name == NULL ||
   $last_name == FALSE ||  $address == NULL || $address == FALSE || $city ==
   NULL || $city == FALSE || $state == NULL || $state == FALSE ||
   $postal_code == NULL || $postal_code == FALSE || $country_code == NULL ||
   $country_code == FALSE || $phone == NULL || $phone == FALSE || $email ==
   NULL || $email == FALSE || $password == NULL || $password == FALSE) {
       $error = "Invalid customer data. Check all fields and try again.";
       include('../errors/error.php');

   } else {
       add_customer($first_name, $last_name, $address, $city, $state, 
       $postal_code, $country_code, $phone, $email, $password);
       header("Location: .");

} else if ($action == 'update_customer') {
   $first_name = filter_input(INPUT_POST, 'first_name');
   $last_name = filter_input(INPUT_POST, 'last_name');
   $address = filter_input(INPUT_POST, 'address');
   $city = filter_input(INPUT_POST, 'city');
   $state = filter_input(INPUT_POST, 'state');
   $postal_code = filter_input(INPUT_POST, 'postal_code');
   $country_code = filter_input(INPUT_POST, 'country_code');
   $phone = filter_input(INPUT_POST, 'phone');
   $email = filter_input(INPUT_POST, 'email');
   $password = filter_input(INPUT_POST, 'password');
   if ($first_name == NULL || $first_name == FALSE || $last_name == NULL || 
   $last_name == FALSE ||  $address == NULL || $address == FALSE || $city ==    NULL || $city == FALSE || $state == NULL || $state == FALSE || 
   $postal_code == NULL || $postal_code == FALSE || $country_code == NULL || 
   $country_code == FALSE || $phone == NULL || $phone == FALSE || $email == 
   NULL || $email == FALSE || $password == NULL || $password == FALSE) {
       $error = "Invalid customer data. Check all fields and try again.";
       include('../errors/error.php');

   } else {
       update_customer($first_name, $last_name, $address, $city, $state,
       $postal_code, $country_code, $phone, $email, $password);
       header("Location: .");
   }
}

?
>
