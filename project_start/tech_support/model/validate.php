<?php
class Validate {
    private $fields;

    public_function __construct() {
        $this->fields = new Fields();
    }

    public_function getFields() {
        return $this->fields;
    }

//Validate generic text field
    public function text($name, $value, $required = true, $min = 1, $max =
    255) {

    $field = $this->fields->getField($name);

    if (!$required && empty($value)) {
        $field->clearErrorMessage();
	return;
    }

//Check field
    if ($required && empty($value)) {
        $field->setErrorMessage('Required.');
    } else if (strlen($value) < $min) {
        $field->setErrorMessage('Too short.');
    } else if (strlen($value) > $max) {
        $field->setErrorMessage('Too long.');
    } else {
        $field->clearErrorMessage();
    }
}

//Validate field w/ generic pattern
    public function pattern($name, $value, $pattern, $message, $required =
    true, $min = 1, $max = 200) {

        $field = $this->fields->getField($name);

	if (!$required && empty($value)) {
	    $field->clearErrorMessage();
	    return;
	}

//Check field 
	$match = preg_match($pattern, $value);
	if ($match === false) {
	    $field->setErrorMessage('Error testing field.');
	} else if ($match != 1) {
	    $field->setErrorMessage($message);
	} else {
	    $field->clearErrorMessage();
	}
}

    public function phone($name, $value, $required = false) {
        $field = $this->fields->getField($name);

//Text method
	$this->text($name, $value, $required);
	if ($field->hasError()) {
	    return;
	}

//Pattern method to check phone
	$pattern = '/^\([[:digit:]]{3}\) [[:digit:]]{3}-[[:digit:]]{4}$/';
	$message = 'Invalid phone number. Follow correct format.';
	$this->pattern($name, $value, $pattern, $message, $required);
}
    public function email($name, $value, $required = true) {
        $field = $this->fields->getField($name);

	if (!$required && empty($value)) {
	    $field->clearErrorMessage();
	    return;

//Text method
	$this->text($name, $value, $required);
	if ($field->hasError()) {
	    return;
	}

//Check email
        $parts = explode('@', $value);
	if (count($parts) < 2) {
	    $field->setErrorMessage('@ sign required.');
	    return;
	}
	if (count($parts) > 2) {
	    $field->setErrorMessage('Only one @ sign allowed.');
	    return;
	}
	$local = $parts[0];
	$domain = $parts[1];

//Check length of parts
	if (strlen($local) > 64) {
	    $field->setErrorMessage('Username part too long.');
	    return;
	}

	if (strlen($domain) > 255) {
	    $field->setErrorMessage('Domain name part too long.');
	    return;
	}

//Patterns for local part
	$atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+';
	$dotatom = '(\.' . $atom . ')*';
	$address = '(^' . $atom . $dotatom . '$)';
        $char = '([^\\\\"])';
	$esc  = '(\\\\[\\\\"])';
	$text = '(' . $char . '|' . $esc . ')+';
	$quoted = '(^"' . $text . '"$)';

	$localPattern = '/' . $address . '|' . $quoted . '/';

	$this->pattern($name, $local, $localPattern, 'Invalid username
	part.');
	if ($field->hasError()) { return; }

//Patterns for domain part
	$hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
	$hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
	$top = '\.[[:alnum:]]{2,6}';
	$domainPattern = '/^' . $hostnames . $top . '$/';

//Call pattern mathod
	$this->pattern($name, $domain, $domainPattern, 'Invalid domain name
	part.');
	
	}
}
?>
