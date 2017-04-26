<?php
    $dsn = 'mysql:host=sql1.njit.edu;dbname=adm52';
    $username = 'adm52';
    $password = '55G0oL4D';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
