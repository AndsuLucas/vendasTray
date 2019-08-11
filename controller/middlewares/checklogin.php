<?php

function checkLogin() {

	if (isset($_SESSION)and($_SESSION["authenticate"])) {
		return true;
	}

	return false;

}