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
	
	/*
	 * Filters
	 */
	$where = "";
	
	if ($search != "")
		$where = "menus.menu LIKE \"%" . $search . "%\"";	
		
	if ($code != "")
		$where = "menus.id = " . $code;
	
	if (isset($_GET["friendly"]))
		$where = "menus.menu = \"" . removeLine($_GET["friendly"]) . "\"";	
		
	$limit = "";	
		
	if ($order != "") {
		$o = explode("<gz>", $order);

		$limit = $o[0] . " " . $o[1] . " LIMIT " . 
				(($position * $itensPerPage) - $itensPerPage) . ", " . $itensPerPage;
				
	} else {
		if ($position > 0 && $itensPerPage > 0) {
			$limit = "menus.id DESC LIMIT " . 
					(($position * $itensPerPage) - $itensPerPage) . ", " . $itensPerPage;	
		}
	}
	
	/**************************************************
	 * Webpage
	 **************************************************/		
	
	/*
	 * Page
	 */
	if ($method == "page") {
		/*
		 * SEO
		 */
		$darth->setTitle(ucfirst($screen));
		$darth->setDescription("");
		$darth->setKeywords("");
		
		$daoFactory->beginTransaction();
		$response[0]["menus"] = $daoFactory->getMenusDao()->read($where, $limit, true);
		$daoFactory->close();
		
		if (isset($_GET["friendly"]))
			$darth->setTitle($response[0]["menus"][0]["menus.menu"]);

		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/header.html");
		
		echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . 
				(isset($_GET["friendly"]) ? "/html/@_PAGE.html" : "/html/menus.html"));
		
		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/footer.html");
	}
	
	/**************************************************
	 * Webservice
	 **************************************************/	

	/*
	 * Create
	 */
	else if ($method == "api-create") {
		enableCORS();
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			// $request[0]["@_PARAM"] = $daoFactory->prepare($request[0]["@_PARAM"]); // Prepare with sql injection.

			$daoFactory->beginTransaction();
			$menus = new model\Menus();
			$menus->setMenu(logicNull($request["menus.menu"]));
			$menus->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$menus->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			
			$resultDao = $daoFactory->getMenusDao()->create($menus);

			if ($resultDao) {
				$daoFactory->commit();
				$response[0]["message"] = "success";
			} else {							
				$daoFactory->rollback();
				$response[0]["message"] = "error";
			}

			$daoFactory->close();
		} else {
			$response[0]["message"] = "error";
		}
		
		echo $darth->json($response);
	}
	
	/*
	 * Read
	 */
	else if ($method == "api-read") {
		enableCORS();
		
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			
			$limit = "menus.id DESC LIMIT " . 
					(($request[0]["page"] * $request[0]["pageSize"]) - 
					$request[0]["pageSize"]) . ", " . $request[0]["pageSize"];	
		}
		
		$daoFactory->beginTransaction();
		$menus = $daoFactory->getMenusDao()->read("", $limit, false);
		$daoFactory->close();
		
		echo $darth->json($menus);
	}
	
	/*
	 * Update
	 */
	else if ($method == "api-update") {	
		enableCORS();
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			// $request[0]["@_PARAM"] = $daoFactory->prepare($request[0]["@_PARAM"]); // Prepare with sql injection.
			
			$menus = new model\Menus();
			$menus->setId($request["menus.id"]);
			$menus->setMenu(logicNull($request["menus.menu"]));
			$menus->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$menus->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			
			$daoFactory->beginTransaction();
			$resultDao = $daoFactory->getMenusDao()->update($menus);

			if ($resultDao) {
				$daoFactory->commit();
				$response[0]["message"] = "success";
			} else {							
				$daoFactory->rollback();
				$response[0]["message"] = "error";
			}

			$daoFactory->close();
		} else {
			$response[0]["message"] = "error";
		}
		
		echo $darth->json($response);
	}
	
	/* 
	 * Delete
	 */
	else if ($method == "api-delete") {
		enableCORS();
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			$request["menus.id"] = $daoFactory->prepare($request["menus.id"]); // Prepare with sql injection.
				
			$result = true;
			$lines = explode("<gz>", $request["menus.id"]);

			$daoFactory->beginTransaction();

			for ($i = 0; $i < sizeof($lines); $i++) {
				$where = "menus.id = " . $lines[$i];
				
				$resultDao = $daoFactory->getMenusDao()->delete($where);
				$result = !$result ? false : (!$resultDao ? false : true);
			}

			if ($result) {
				$daoFactory->commit();
				$response[0]["message"] = "success";
			} else {							
				$daoFactory->rollback();
				$response[0]["message"] = "error";
			}

			$daoFactory->close();
		} else {
			$response[0]["message"] = "error";
		} 

		echo $darth->json($response);
	}
	
	/**************************************************
	 * System
	 **************************************************/	
	
	else {
		if (!getActiveSession($_ROOT . $_MODULE)) 
			echo "<script>goTo(\"/login/1\");</script>";
		else {
			/*
			 * Create
			 */
			if ($method == "stateCreate") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method))
					echo "<script>goTo(\"/login/1\");</script>";	
				else {
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCRT.html");
				}
			}

			/*
			 * Read
			 */
			else if ($method == "stateRead") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method))
					echo "<script>goTo(\"/login/1\");</script>";	
				else {
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$response[0]["menus"] = $daoFactory->getMenusDao()->read($where, $limit, true);
					if (!is_array($response[0]["menus"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>Não possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusRD.html");
				}
			}

			/*
			 * Update
			 */
			else if ($method == "stateUpdate") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method))
					echo "<script>goTo(\"/login/1\");</script>";	
				else {
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$response[0]["menus"] = $daoFactory->getMenusDao()->read($where, "", true);
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusUPD.html");
				}
			}

			/*
			 * Called
			 */
			else if ($method == "stateCalled") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method))
					echo "<script>goTo(\"/login/1\");</script>";	
				else {
					/*
					 * Insert your foreign key here
					 */
					if ($where != "")
						$where .= " AND menus.@_FOREIGN_KEY = " . $base;
					else 
						$where = "menus.@_FOREIGN_KEY = " . $base;
						
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$response[0]["menus"] = $daoFactory->getMenusDao()->read($where, $limit, true);
					if (!is_array($response[0]["menus"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>Não possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCLL.html");
				}
			}

			/*
			 * Screen
			 */
			else if ($method == "screen") {
				if ($base != "") {
					$arrBase = explode("<gz>", $base);
					
					if (sizeof($arrBase) > 1) {
						if ($where != "")
							$where .= " AND menus.@_FOREIGN_KEY = " . $arrBase[1];
						else
							$where = "menus.@_FOREIGN_KEY = " . $arrBase[1];
					}
				}
				
				$limit = "menus.id DESC LIMIT " . (($position * 5) - 5) . ", 5";

				$daoFactory->beginTransaction();
				$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
				$response[0]["menus"] = $daoFactory->getMenusDao()->read($where, $limit, true);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusSCR.html") . 
						"<size>" . (is_array($response[0]["menus"]) ? $response[0]["menus"][0]["menus.size"] : 0) . "<theme>455a64";
			}

			/*
			 * Screen handler
			 */
			else if ($method == "screenHandler") {	
				$where = "";

				// Get value from combo
				$cmb = explode("<gz>", $search);

				if ($cmb[1] != "")
					$where = "menus.id = " . $cmb[1];

				$daoFactory->beginTransaction();
				$response[0]["menus"] = $daoFactory->getMenusDao()->comboScr($where);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCMB.html");
			}

			/*
			 * Create
			 */
			else if ($method == "create") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method)) {
					$response[0]["message"] = "permission";
					
					echo $darth->json($response);
				} else {
					$menus = new model\Menus();
					$menus->setMenu(logicNull($form[0]));
					$menus->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$menus->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getMenusDao()->create($menus);

					if ($resultDao) {
						$daoFactory->commit();
						$response[0]["message"] = "success";				
					} else {							
						$daoFactory->rollback();
						$response[0]["message"] = "error";
					}

					$daoFactory->close();

					echo $darth->json($response);
				}
			}

			/*
			 * Action update
			 */
			else if ($method == "update") {	
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method)) {
					$response[0]["message"] = "permission";
					
					echo $darth->json($response);
				} else {
					$menus = new model\Menus();
					$menus->setId($code);
					$menus->setMenu(logicNull($form[0]));
					$menus->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$menus->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getMenusDao()->update($menus);

					if ($resultDao) {
						$daoFactory->commit();
						$response[0]["message"] = "success";
					} else {							
						$daoFactory->rollback();
						$response[0]["message"] = "error";
					}

					$daoFactory->close();

					echo $darth->json($response);
				}
			}
			
			/* 
			 * Action delete
			 */
			else if ($method == "delete") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method)) {
					$response[0]["message"] = "permission";
					
					echo $darth->json($response);
				} else {
					$result = true;
					$lines = explode("<gz>", $code);

					$daoFactory->beginTransaction();

					for ($i = 1; $i < sizeof($lines); $i++) {
						$where = "menus.id = " . $lines[$i];
						
						$resultDao = $daoFactory->getMenusDao()->delete($where);
						$result = !$result ? false : (!$resultDao ? false : true);
					}

					if ($result) {
						$daoFactory->commit();
						$response[0]["message"] = "success";
					} else {							
						$daoFactory->rollback();
						$response[0]["message"] = "error";
					}

					$daoFactory->close();

					echo $darth->json($response);	
				}
			}
		}
	}

?>