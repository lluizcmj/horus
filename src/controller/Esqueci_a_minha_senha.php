<?php

	/**
	 * Generated by Getz Framework
	 * 
	 * @author Mario Sakamoto <mskamot@gmail.com>
	 * @see https://wtag.com.br/getz
	 */

	use lib\getz;
	use src\model;	 
	 
	require_once($_DOCUMENT_ROOT . "/lib/getz/Activator.php");

	if ($method == "page") {
		$darth->setTitle(ucfirst($screen));
		$darth->setDescription("");
		$darth->setKeywords("");
		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/head.html");
		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/esqueci_a_minha_senha.html");
		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/foot.html");
	}

?>