<?php

class Technician {
    public $techID, $firstName, $lastName, $email, $phone, $password;

    public function __construct($techID, $firstN, $lastN, $email, $phone, $password) {
        $this->techID = $techID;
	$this->firstName = $firstN;
	$this->lastName = $lastN;
	$this->email = $email;
	$this->phone = $phone;
	$this->password = $password;
    }

    public function getFullName() {
        $firstlastName = $this->firstName . " " . $this->lastName;
	    return $firstlastName;
    }
}
?>
