<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/fields.php');
require('../model/validate.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('postal_code');
$fields->addField('country_code');
$fields->addField('phone');
$fields->addField('email');
$fields->addField('password');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_customers';
    }
}
//switch statements for customer controller
switch($action) {

    case 'list_customers':
    include('customer_list.php');
    break;

    case 'search_customers':
    $last_name = filter_input(INPUT_POST, 'last_name');
    if ($last_name == NULL || $last_name == FALSE) {
        $error = "Missing or incorrect last name.";
	include('../errors/error.php');
    } else {
        $customers = search_customer($last_name);
	include('customer_list.php'); }
    break;

    case 'display_customer_results':
    include('add_update_customer.php');
    break;

    case 'add_customer':
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
    
    //Validate form
    $validate->text('first_name', $first_name);
    $validate->text('last_name', $last_name);
    $validate->text('address', $address);
    $validate->text('city', $city);
    $validate->text('state', $state);
    $validate->text('postal_code', $postal_code);
    $validate->text('country_code', $country_code);
    $validate->text('phone', $phone);
    $validate->text('email', $email);
    $validate->text('password', $password);
    
    }
    break;

    case 'update_customer':
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
   break;
}

?>
