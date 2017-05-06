<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $products;
}

function delete_product() {
    global $db;
    $query = 'DELETE FROM products-id
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product ($code, $name, $version, $date) {
    global $db;
    $query = 'INSERT INTO products
                  (productCode, name, version, date)
	      VALUES
	          (:code, :name, :version, :date)';
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
?>
