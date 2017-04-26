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

if ($action == 'list_products') {
    $products = get_products();
    include('product_list.php');

} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_code');
    if ($code == NULL || $code == FALSE) {
        $error = "Missing or incorrect product code.";
	include('../errors/error.php');
    } else {
        delete_product($code);
	header("Location: ."); }

} else if ($action == 'show_add_form') {
    include('product_add.php');

} else if ($action == 'add_product') {
    $product_code = filter_input(INPUT_POST, 'product_code');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version');
    $date = filter_input(INPUT_POST, 'date');
    if ($product_code == NULL || $product_code == FALSE || $name == NULL || $name == FALSE || $version == NULL || $version == FALSE || $date == NULL || $date == FALSE) {
	$error = "Invalid product data. Check all fields and try again.";
	include('../errors/error.php');
    
    } else {
        add_product($product_code, $name, $version, $date);
	header("Location: .");
    }
}

?>
