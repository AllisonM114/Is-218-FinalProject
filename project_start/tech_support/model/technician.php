<?php

class Technician {
    public $firstName, $lastName;

    public function __construct($firstN, $lastN) {
        $this->firstName = $firstN;
	$this->lastName = $lastN;
    }

    public function getFullName() {
        $firstlastName = $this->firstName . " " . $this->lastName;
	    return $firstlastName;
    }
}
?>
