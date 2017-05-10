<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

//switch statements for technician controller
switch ($action) {
    case 'list_technicians':
    $products = get_technicians();
    include('technician_list.php');
    break;

    case 'delete_technicians':
    $technician_id = filter_input(INPUT_POST, 'technician_id');
    if ($technician_id == NULL || $technician_id == FALSE) {
        $error = "Missing or incorrect product code.";
	include('../errors/error.php');
    } else {
        delete_technician($technician_id);
	header("Location: ."); }
    break;

    case 'show_add_form':
    include('technician_add.php');
    break;

    case 'add_technician':
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if ($first_name == NULL || $first_name == FALSE || $last_name == NULL ||
    $last_name == FALSE || $phone == NULL || $phone == FALSE || $email ==
    NULL || $email == FALSE || $password == NULL || $password == FALSE) {
        $error = "Invalid technician data. Check all fields and try again.";
        include('../errors/error.php');
    }

else {
    add_technician($first_name, $last_name, $email, $phone, $password);
    header("Location: .");
}
    break;
}

?>

