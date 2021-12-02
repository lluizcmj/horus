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
		$where = "telas.tela LIKE \"%" . $search . "%\"";	
		
	if ($code != "")
		$where = "telas.id = " . $code;
	
	if (isset($_GET["friendly"]))
		$where = "telas.tela = \"" . removeLine($_GET["friendly"]) . "\"";	
		
	$limit = "";	
		
	if ($order != "") {
		$o = explode("<gz>", $order);

		$limit = $o[0] . " " . $o[1] . " LIMIT " . 
				(($position * $itensPerPage) - $itensPerPage) . ", " . $itensPerPage;
				
	} else {
		if ($position > 0 && $itensPerPage > 0) {
			$limit = "telas.id DESC LIMIT " . 
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
		$response[0]["telas"] = $daoFactory->getTelasDao()->read($where, $limit, true);
		$daoFactory->close();
		
		if (isset($_GET["friendly"]))
			$darth->setTitle($response[0]["telas"][0]["telas.tela"]);

		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/header.html");
		
		echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . 
				(isset($_GET["friendly"]) ? "/html/@_PAGE.html" : "/html/telas.html"));
		
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
			$telas = new model\Telas();
			$telas->setTela(logicNull($request["telas.tela"]));
			$telas->setIdentificador(logicNull($request["telas.identificador"]));
			$telas->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$telas->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$telas->setMenu($request["telas.menu"]);
			
			$resultDao = $daoFactory->getTelasDao()->create($telas);

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
			
			$limit = "telas.id DESC LIMIT " . 
					(($request[0]["page"] * $request[0]["pageSize"]) - 
					$request[0]["pageSize"]) . ", " . $request[0]["pageSize"];	
		}
		
		$daoFactory->beginTransaction();
		$telas = $daoFactory->getTelasDao()->read("", $limit, false);
		$daoFactory->close();
		
		echo $darth->json($telas);
	}
	
	/*
	 * Update
	 */
	else if ($method == "api-update") {	
		enableCORS();
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			// $request[0]["@_PARAM"] = $daoFactory->prepare($request[0]["@_PARAM"]); // Prepare with sql injection.
			
			$telas = new model\Telas();
			$telas->setId($request["telas.id"]);
			$telas->setTela(logicNull($request["telas.tela"]));
			$telas->setIdentificador(logicNull($request["telas.identificador"]));
			$telas->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$telas->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$telas->setMenu($request["telas.menu"]);
			
			$daoFactory->beginTransaction();
			$resultDao = $daoFactory->getTelasDao()->update($telas);

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
			$request["telas.id"] = $daoFactory->prepare($request["telas.id"]); // Prepare with sql injection.
				
			$result = true;
			$lines = explode("<gz>", $request["telas.id"]);

			$daoFactory->beginTransaction();

			for ($i = 0; $i < sizeof($lines); $i++) {
				$where = "telas.id = " . $lines[$i];
				
				$resultDao = $daoFactory->getTelasDao()->delete($where);
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
					$response[0]["menus"] = $daoFactory->getMenusDao()->read("", "menus.id ASC", false);
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/telas/telasCRT.html");
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
					$response[0]["telas"] = $daoFactory->getTelasDao()->read($where, $limit, true);
					if (!is_array($response[0]["telas"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>Não possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/telas/telasRD.html");
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
					$response[0]["telas"] = $daoFactory->getTelasDao()->read($where, "", true);
					$response[0]["telas"][0]["telas.menus"] = $daoFactory->getMenusDao()->read("", "menus.id ASC", false);
					for ($x = 0; $x < sizeof($response[0]["telas"][0]["telas.menus"]); $x++) {
						if ($response[0]["telas"][0]["telas.menus"][$x]["menus.id"] == 
								$response[0]["telas"][0]["telas.menu"]) {
							$response[0]["telas"][0]["telas.menus"][$x]["menus.selected"] = "selected";
						}
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/telas/telasUPD.html");
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
						$where .= " AND telas.@_FOREIGN_KEY = " . $base;
					else 
						$where = "telas.@_FOREIGN_KEY = " . $base;
						
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$response[0]["telas"] = $daoFactory->getTelasDao()->read($where, $limit, true);
					if (!is_array($response[0]["telas"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>Não possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/telas/telasCLL.html");
				}
			}

			/*
			 * Screen
			 */
			else if ($method == "screen") {
				$where = "telas.id NOT IN(" . 
						"SELECT " . 
							"perfil_tela.tela AS \"perfil_tela.tela\" " . 
						"FROM " . 
							"perfil_tela perfil_tela " .
						"WHERE " .
							"perfil_tela.perfil = " . $base . 
						")";				
				
				if ($base != "") {
					$arrBase = explode("<gz>", $base);
					
					if (sizeof($arrBase) > 1) {
						if ($where != "")
							$where .= " AND telas.@_FOREIGN_KEY = " . $arrBase[1];
						else
							$where = "telas.@_FOREIGN_KEY = " . $arrBase[1];
					}
				}
				
				if ($search != "")
					if ($where != "")
						$where .= " AND telas.tela LIKE \"%" . $search . "%\"";	
					else
						$where = "telas.tela LIKE \"%" . $search . "%\"";	
				
				
				$limit = "telas.id DESC LIMIT " . (($position * 5) - 5) . ", 5";

				$daoFactory->beginTransaction();
				$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
				$response[0]["telas"] = $daoFactory->getTelasDao()->read($where, $limit, true);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/telas/telasSCR.html") . 
						"<size>" . (is_array($response[0]["telas"]) ? $response[0]["telas"][0]["telas.size"] : 0) . "<theme>455a64";
			}

			/*
			 * Screen handler
			 */
			else if ($method == "screenHandler") {	
				$where = "";

				// Get value from combo
				$cmb = explode("<gz>", $search);

				if ($cmb[1] != "")
					$where = "telas.id = " . $cmb[1];

				$daoFactory->beginTransaction();
				$response[0]["telas"] = $daoFactory->getTelasDao()->comboScr($where);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/telas/telasCMB.html");
			}

			/*
			 * Create
			 */
			else if ($method == "create") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method)) {
					$response[0]["message"] = "permission";
					
					echo $darth->json($response);
				} else {
					$telas = new model\Telas();
					$telas->setTela(logicNull($form[0]));
					$telas->setIdentificador(logicNull($form[1]));
					$telas->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$telas->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$telas->setMenu($form[2]);
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getTelasDao()->create($telas);

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
					$telas = new model\Telas();
					$telas->setId($code);
					$telas->setTela(logicNull($form[0]));
					$telas->setIdentificador(logicNull($form[1]));
					$telas->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$telas->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$telas->setMenu($form[2]);
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getTelasDao()->update($telas);

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
						$where = "telas.id = " . $lines[$i];
						
						$resultDao = $daoFactory->getTelasDao()->delete($where);
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