<?php

function add_incident($customer, $product, $title, $description) {
    global $db;
    $query = 'INSERT INTO incidents
                 (customer, product, title, description)
	      VALUES
	         (:customer, :product, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer', $customer);
    $statement->bindValue(':product', $product);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

?>
