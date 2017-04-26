<?php
function get_product ($product_code) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productCODE = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_code", $product_code);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $products;
}

function delete_product ($product_code) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productCODE = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product ($product_code, $name, $version, $date) {
    global $db;
    $query = 'INSERT INTO products
                  (product_code, name, version, date)
	      VALUES
	          (:product_code, :name, :version, :date)';
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
?>
