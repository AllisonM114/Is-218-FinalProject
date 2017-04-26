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
              WHERE productCode = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_product ($productCode, $name, $version, $date) {
    global $db;
    $query = 'INSERT INTO products
                  (productCode, name, version, date)
	      VALUES
	          (:productCode, :name, :version, :date)';
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
?>
