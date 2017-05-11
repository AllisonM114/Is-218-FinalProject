<?php
function get_technicians () {
    global $db;
    $query = 'SELECT * FROM technicians';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    $technicians = array();
    foreach($results as $row){
    $technicians[]=new
    Technician($row['techID'], $row['firstName'], $row['lastName'], $row['email'], $row['phone'], $row['password']);
    }
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

function add_technicians ($first_name, $last_name, $email, $phone,
$password) {
    global $db;
    $query = 'INSERT INTO technicians
                   (firstName, lastName, email, phone, password)
              VALUES
	           (:first_name, :last_name, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();

}
?>
