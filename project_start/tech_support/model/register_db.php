<?php

function add_registration ($customer, $product_code) {
    global $db;
    $query = 'INSERT INTO registrations
                 (customerID, productCode)
              VALUES
	         (:customer, :product_code)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer', $customer);
    $statement->bindValue(':product_code', $product_code);
    $statement->execute();
    $statement->closeCursor();
}
?>
