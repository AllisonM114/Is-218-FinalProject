<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/customer_db.php');
require('../model/incident_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'get_customer_form';
    }
}

if ($action == 'get_customer_form') {
    include 'customer_search.php';
    break;

else if ($action == 'search_customer_form') {
    $email = filter_input(INPUT_POST, 'email');
    if ($email == NULL || $email == FALSE) {
        $error = "Missing or incorrect email.";
	include('../errors/error.php');

else ($action == 'create_incident') {
    $customer = filter_input(INPUT_POST, 'customer');
    $product = filter_input(INPUT_POST, 'product');
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    add_incident($customer, $product, $title, $description);
    $message = "This incident was added to our database."
    include('incident_create.php');
    break;

}
?>
