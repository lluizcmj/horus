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
		$where = "situacoes_registros.situacao_registro LIKE \"%" . $search . "%\"";	
		
	if ($code != "")
		$where = "situacoes_registros.id = " . $code;
	
	if (isset($_GET["friendly"]))
		$where = "situacoes_registros.situacao_registro = \"" . removeLine($_GET["friendly"]) . "\"";	
		
	$limit = "";	
		
	if ($order != "") {
		$o = explode("<gz>", $order);

		$limit = $o[0] . " " . $o[1] . " LIMIT " . 
				(($position * $itensPerPage) - $itensPerPage) . ", " . $itensPerPage;
				
	} else {
		if ($position > 0 && $itensPerPage > 0) {
			$limit = "situacoes_registros.id DESC LIMIT " . 
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
		$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read($where, $limit, true);
		$daoFactory->close();
		
		if (isset($_GET["friendly"]))
			$darth->setTitle($response[0]["situacoes_registros"][0]["situacoes_registros.situacao_registro"]);

		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/header.html");
		
		echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . 
				(isset($_GET["friendly"]) ? "/html/@_PAGE.html" : "/html/situacoes_registros.html"));
		
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
			$situacoes_registros = new model\Situacoes_registros();
			$situacoes_registros->setSituacao_registro(logicNull($request["situacoes_registros.situacao_registro"]));
			$situacoes_registros->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$situacoes_registros->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$situacoes_registros->setEstilo($request["situacoes_registros.estilo"]);
			
			$resultDao = $daoFactory->getSituacoes_registrosDao()->create($situacoes_registros);

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
			
			$limit = "situacoes_registros.id DESC LIMIT " . 
					(($request[0]["page"] * $request[0]["pageSize"]) - 
					$request[0]["pageSize"]) . ", " . $request[0]["pageSize"];	
		}
		
		$daoFactory->beginTransaction();
		$situacoes_registros = $daoFactory->getSituacoes_registrosDao()->read("", $limit, false);
		$daoFactory->close();
		
		echo $darth->json($situacoes_registros);
	}
	
	/*
	 * Update
	 */
	else if ($method == "api-update") {	
		enableCORS();
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			// $request[0]["@_PARAM"] = $daoFactory->prepare($request[0]["@_PARAM"]); // Prepare with sql injection.
			
			$situacoes_registros = new model\Situacoes_registros();
			$situacoes_registros->setId($request["situacoes_registros.id"]);
			$situacoes_registros->setSituacao_registro(logicNull($request["situacoes_registros.situacao_registro"]));
			$situacoes_registros->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$situacoes_registros->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$situacoes_registros->setEstilo($request["situacoes_registros.estilo"]);
			
			$daoFactory->beginTransaction();
			$resultDao = $daoFactory->getSituacoes_registrosDao()->update($situacoes_registros);

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
			$request["situacoes_registros.id"] = $daoFactory->prepare($request["situacoes_registros.id"]); // Prepare with sql injection.
				
			$result = true;
			$lines = explode("<gz>", $request["situacoes_registros.id"]);

			$daoFactory->beginTransaction();

			for ($i = 0; $i < sizeof($lines); $i++) {
				$where = "situacoes_registros.id = " . $lines[$i];
				
				$resultDao = $daoFactory->getSituacoes_registrosDao()->delete($where);
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
					$response[0]["estilos"] = $daoFactory->getEstilosDao()->read("", "estilos.id ASC", false);
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/situacoes_registros/situacoes_registrosCRT.html");
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
					$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read($where, $limit, true);
					if (!is_array($response[0]["situacoes_registros"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>N??o possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/situacoes_registros/situacoes_registrosRD.html");
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
					$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read($where, "", true);
					$response[0]["situacoes_registros"][0]["situacoes_registros.estilos"] = $daoFactory->getEstilosDao()->read("", "estilos.id ASC", false);
					for ($x = 0; $x < sizeof($response[0]["situacoes_registros"][0]["situacoes_registros.estilos"]); $x++) {
						if ($response[0]["situacoes_registros"][0]["situacoes_registros.estilos"][$x]["estilos.id"] == 
								$response[0]["situacoes_registros"][0]["situacoes_registros.estilo"]) {
							$response[0]["situacoes_registros"][0]["situacoes_registros.estilos"][$x]["estilos.selected"] = "selected";
						}
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/situacoes_registros/situacoes_registrosUPD.html");
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
						$where .= " AND situacoes_registros.@_FOREIGN_KEY = " . $base;
					else 
						$where = "situacoes_registros.@_FOREIGN_KEY = " . $base;
						
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read($where, $limit, true);
					if (!is_array($response[0]["situacoes_registros"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>N??o possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/situacoes_registros/situacoes_registrosCLL.html");
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
							$where .= " AND situacoes_registros.@_FOREIGN_KEY = " . $arrBase[1];
						else
							$where = "situacoes_registros.@_FOREIGN_KEY = " . $arrBase[1];
					}
				}
				
				$limit = "situacoes_registros.id DESC LIMIT " . (($position * 5) - 5) . ", 5";

				$daoFactory->beginTransaction();
				$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
				$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read($where, $limit, true);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/situacoes_registros/situacoes_registrosSCR.html") . 
						"<size>" . (is_array($response[0]["situacoes_registros"]) ? $response[0]["situacoes_registros"][0]["situacoes_registros.size"] : 0) . "<theme>455a64";
			}

			/*
			 * Screen handler
			 */
			else if ($method == "screenHandler") {	
				$where = "";

				// Get value from combo
				$cmb = explode("<gz>", $search);

				if ($cmb[1] != "")
					$where = "situacoes_registros.id = " . $cmb[1];

				$daoFactory->beginTransaction();
				$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->comboScr($where);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/situacoes_registros/situacoes_registrosCMB.html");
			}

			/*
			 * Create
			 */
			else if ($method == "create") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method)) {
					$response[0]["message"] = "permission";
					
					echo $darth->json($response);
				} else {
					$situacoes_registros = new model\Situacoes_registros();
					$situacoes_registros->setSituacao_registro(logicNull($form[0]));
					$situacoes_registros->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$situacoes_registros->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$situacoes_registros->setEstilo($form[1]);
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getSituacoes_registrosDao()->create($situacoes_registros);

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
					$situacoes_registros = new model\Situacoes_registros();
					$situacoes_registros->setId($code);
					$situacoes_registros->setSituacao_registro(logicNull($form[0]));
					$situacoes_registros->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$situacoes_registros->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$situacoes_registros->setEstilo($form[1]);
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getSituacoes_registrosDao()->update($situacoes_registros);

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
						$where = "situacoes_registros.id = " . $lines[$i];
						
						$resultDao = $daoFactory->getSituacoes_registrosDao()->delete($where);
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