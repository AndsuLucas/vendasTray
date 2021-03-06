<?php

function isEmpty(array $array){
    $empty = false;
    foreach ($array as  $key => $value) {
        if (strlen(trim($value)) === 0) {
            $empty = true;
        } 
    }

    return $empty;
}

function sanitize(array $field_data_types) {
	
	foreach ($field_data_types as $key => $value) {
		switch ($value) {
			case 's':
				$_POST[$key] = preg_replace("/[^a-zA-Z ]/", trim(' '), (string) $_POST[$key]);
				break;
			case 'i':
				$_POST[$key] = preg_replace("/[^0-9]/", trim(' '), (int) $_POST[$key]);
				break;
			case 'e':
				$_POST[$key] = addslashes(filter_input(INPUT_POST, $key, FILTER_SANITIZE_EMAIL));
				break;
			case "f":
				$_POST[$key] = preg_replace("/[^0-9 \.]/", trim(' '), (float) $_POST[$key]);
				break;
			default:
				$_POST[$key] = $_POST[$key];
				break;
 		}

	}
	return $_POST;
}