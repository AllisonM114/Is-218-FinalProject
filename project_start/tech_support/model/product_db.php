<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM tech_products';
    $statement = $db->prepare($query);
    $statement->execute();
    $product = $statement->fetchAll();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_code) {
    global $db;
    $query = 'DELETE FROM tech_products
              WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->execute();
    $statement->closeCursor();
}

function add_product ($product_code, $name, $version, $release_date) {
    global $db;
    $query = 'INSERT INTO tech_products
                  (productCode, name, version, releaseDate)
	      VALUES
	          (:product_code, :name, :version, :release_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':release_date', $release_date);
    $statement->execute();
    $statement->closeCursor();
}
?>
