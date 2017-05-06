<?php
function get_technicians ($id) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE techID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $technicians;
}

function delete_technicians($id) {
    global $db;
    $query = 'DELETE FROM technicians
              WHERE techID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function add_technicians ($id, $first_name, $last_name, $email, $phone,
$password) {
    global $db;
    $query = 'INSERT INTO technicians
                   (techID, firstName, lastName, email, phone, password)
              VALUES
	           (:id, :first_name, :last_name, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();

}
?>
