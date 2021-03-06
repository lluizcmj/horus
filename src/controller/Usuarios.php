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
		$where = "usuarios.usuario LIKE \"%" . $search . "%\"";	
		
	if ($code != "")
		$where = "usuarios.id = " . $code;
	
	if (isset($_GET["friendly"]))
		$where = "usuarios.usuario = \"" . removeLine($_GET["friendly"]) . "\"";	
		
	$limit = "";	
		
	if ($order != "") {
		$o = explode("<gz>", $order);

		$limit = $o[0] . " " . $o[1] . " LIMIT " . 
				(($position * $itensPerPage) - $itensPerPage) . ", " . $itensPerPage;
				
	} else {
		if ($position > 0 && $itensPerPage > 0) {
			$limit = "usuarios.id DESC LIMIT " . 
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
		$response[0]["usuarios"] = $daoFactory->getUsuariosDao()->read($where, $limit, true);
		$daoFactory->close();
		
		if (isset($_GET["friendly"]))
			$darth->setTitle($response[0]["usuarios"][0]["usuarios.usuario"]);

		echo $darth->view("", $_DOCUMENT_ROOT . $_PACKAGE . "/html/header.html");
		
		echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . 
				(isset($_GET["friendly"]) ? "/html/@_PAGE.html" : "/html/usuarios.html"));
		
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
			$usuarios = new model\Usuarios();
			$usuarios->setUsuario(logicNull($request["usuarios.usuario"]));
			$usuarios->setEmail(logicNull($request["usuarios.email"]));
			$usuarios->setSenha(logicNull($request["usuarios.senha"]));
			
			if (isset($_FILES["upload"])) {
				$upload = new getz\Upload($_FILES["upload"], 1920);
				$usuarios->setFoto($upload->getName());
			} else 
				$usuarios->setFoto("");
				
			$usuarios->setAccess_token(logicNull($request["usuarios.access_token"]));
			$usuarios->setAccess_token_expiration(logicNull(controllerDateTime($request["usuarios.access_token_expiration"])));
			$usuarios->setPassword_token(logicNull($request["usuarios.password_token"]));
			$usuarios->setPassword_token_expiration(logicNull(controllerDateTime($request["usuarios.password_token_expiration"])));
			$usuarios->setActivation_token(logicNull($request["usuarios.activation_token"]));
			$usuarios->setActivation_token_expiration(logicNull(controllerDateTime($request["usuarios.activation_token_expiration"])));
			$usuarios->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$usuarios->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$usuarios->setPerfil($request["usuarios.perfil"]);
			$usuarios->setSituacao_registro($request["usuarios.situacao_registro"]);
			
			$resultDao = $daoFactory->getUsuariosDao()->create($usuarios);

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
			
			$limit = "usuarios.id DESC LIMIT " . 
					(($request[0]["page"] * $request[0]["pageSize"]) - 
					$request[0]["pageSize"]) . ", " . $request[0]["pageSize"];	
		}
		
		$daoFactory->beginTransaction();
		$usuarios = $daoFactory->getUsuariosDao()->read("", $limit, false);
		$daoFactory->close();
		
		echo $darth->json($usuarios);
	}
	
	/*
	 * Update
	 */
	else if ($method == "api-update") {	
		enableCORS();
		if (isset($_POST["request"])) {
			$request = json_decode($_POST["request"], true);
			// $request[0]["@_PARAM"] = $daoFactory->prepare($request[0]["@_PARAM"]); // Prepare with sql injection.
			
			$usuarios = new model\Usuarios();
			$usuarios->setId($request["usuarios.id"]);
			$usuarios->setUsuario(logicNull($request["usuarios.usuario"]));
			$usuarios->setEmail(logicNull($request["usuarios.email"]));
			$usuarios->setSenha(logicNull($request["usuarios.senha"]));
			
			$where = "usuarios.id = " . $request["usuarios.id"];
			
			$daoFactory->beginTransaction();
			$usuariosDao = $daoFactory->getUsuariosDao()->read($where, "", false);
			$daoFactory->close();
				
			if (isset($_FILES["upload"])) {
				if ($usuariosDao[0]["usuarios.foto"] != "" && $usuariosDao[0]["usuarios.foto"] != "../female-user.svg" && $usuariosDao[0]["usuarios.foto"] != "../male-user.svg") {	
					unlink($_DOCUMENT_ROOT . "/res/img/ldpi/" . $usuariosDao[0]["usuarios.foto"]);
					unlink($_DOCUMENT_ROOT . "/res/img/mdpi/" . $usuariosDao[0]["usuarios.foto"]);
					unlink($_DOCUMENT_ROOT . "/res/img/hdpi/" . $usuariosDao[0]["usuarios.foto"]);
				}
				
				$upload = new getz\Upload($_FILES["upload"], 1920);
				$usuarios->setFoto($upload->getName());
			} else 
				$usuarios->setFoto($usuariosDao[0]["usuarios.foto"]);
				
			$usuarios->setAccess_token(logicNull($request["usuarios.access_token"]));
			$usuarios->setAccess_token_expiration(logicNull(controllerDateTime($request["usuarios.access_token_expiration"])));
			$usuarios->setPassword_token(logicNull($request["usuarios.password_token"]));
			$usuarios->setPassword_token_expiration(logicNull(controllerDateTime($request["usuarios.password_token_expiration"])));
			$usuarios->setActivation_token(logicNull($request["usuarios.activation_token"]));
			$usuarios->setActivation_token_expiration(logicNull(controllerDateTime($request["usuarios.activation_token_expiration"])));
			$usuarios->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$usuarios->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
			$usuarios->setPerfil($request["usuarios.perfil"]);
			$usuarios->setSituacao_registro($request["usuarios.situacao_registro"]);
			
			$daoFactory->beginTransaction();
			$resultDao = $daoFactory->getUsuariosDao()->update($usuarios);

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
			$request["usuarios.id"] = $daoFactory->prepare($request["usuarios.id"]); // Prepare with sql injection.
				
			$result = true;
			$lines = explode("<gz>", $request["usuarios.id"]);

			$daoFactory->beginTransaction();

			for ($i = 0; $i < sizeof($lines); $i++) {
				$where = "usuarios.id = " . $lines[$i];
				
				$usuariosDao = $daoFactory->getUsuariosDao()->read($where, "", false);
				
				if ($usuariosDao[0]["usuarios.foto"] != "" && $usuariosDao[0]["usuarios.foto"] != "../female-user.svg" && $usuariosDao[0]["usuarios.foto"] != "../male-user.svg") {	
					unlink($_DOCUMENT_ROOT . "/res/img/ldpi/" . $usuariosDao[0]["usuarios.foto"]);
					unlink($_DOCUMENT_ROOT . "/res/img/mdpi/" . $usuariosDao[0]["usuarios.foto"]);
					unlink($_DOCUMENT_ROOT . "/res/img/hdpi/" . $usuariosDao[0]["usuarios.foto"]);
				}
				
				$resultDao = $daoFactory->getUsuariosDao()->delete($where);
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
					$response[0]["perfis"] = $daoFactory->getPerfisDao()->read("", "perfis.id ASC", false);
					$response[0]["situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read("", "situacoes_registros.id ASC", false);
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/usuarios/usuariosCRT.html");
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
					$response[0]["usuarios"] = $daoFactory->getUsuariosDao()->read($where, $limit, true);
					if (!is_array($response[0]["usuarios"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>N??o possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/usuarios/usuariosRD.html");
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
					$response[0]["usuarios"] = $daoFactory->getUsuariosDao()->read($where, "", true);
					$response[0]["usuarios"][0]["usuarios.perfis"] = $daoFactory->getPerfisDao()->read("", "perfis.id ASC", false);
					for ($x = 0; $x < sizeof($response[0]["usuarios"][0]["usuarios.perfis"]); $x++) {
						if ($response[0]["usuarios"][0]["usuarios.perfis"][$x]["perfis.id"] == 
								$response[0]["usuarios"][0]["usuarios.perfil"]) {
							$response[0]["usuarios"][0]["usuarios.perfis"][$x]["perfis.selected"] = "selected";
						}
					}
					$response[0]["usuarios"][0]["usuarios.situacoes_registros"] = $daoFactory->getSituacoes_registrosDao()->read("", "situacoes_registros.id ASC", false);
					for ($x = 0; $x < sizeof($response[0]["usuarios"][0]["usuarios.situacoes_registros"]); $x++) {
						if ($response[0]["usuarios"][0]["usuarios.situacoes_registros"][$x]["situacoes_registros.id"] == 
								$response[0]["usuarios"][0]["usuarios.situacao_registro"]) {
							$response[0]["usuarios"][0]["usuarios.situacoes_registros"][$x]["situacoes_registros.selected"] = "selected";
						}
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/usuarios/usuariosUPD.html");
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
						$where .= " AND usuarios.@_FOREIGN_KEY = " . $base;
					else 
						$where = "usuarios.@_FOREIGN_KEY = " . $base;
						
					$daoFactory->beginTransaction();
					$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
					$response[0]["usuarios"] = $daoFactory->getUsuariosDao()->read($where, $limit, true);
					if (!is_array($response[0]["usuarios"])) {
						$response[0]["data_not_found"][0]["value"] = "<p>N??o possui registro.</p>";
					}
					$daoFactory->close();

					echo $darth->view(getMenu($daoFactory, $_USER, $screen), $_DOCUMENT_ROOT . $_PACKAGE . "/html/menus/menusCST.html");
					echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/usuarios/usuariosCLL.html");
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
							$where .= " AND usuarios.@_FOREIGN_KEY = " . $arrBase[1];
						else
							$where = "usuarios.@_FOREIGN_KEY = " . $arrBase[1];
					}
				}
				
				$limit = "usuarios.id DESC LIMIT " . (($position * 5) - 5) . ", 5";

				$daoFactory->beginTransaction();
				$response[0]["titles"] = $daoFactory->getTelasDao()->read("telas.identificador = \"" . $screen . "\"", "", true);
				$response[0]["usuarios"] = $daoFactory->getUsuariosDao()->read($where, $limit, true);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/usuarios/usuariosSCR.html") . 
						"<size>" . (is_array($response[0]["usuarios"]) ? $response[0]["usuarios"][0]["usuarios.size"] : 0) . "<theme>455a64";
			}

			/*
			 * Screen handler
			 */
			else if ($method == "screenHandler") {	
				$where = "";

				// Get value from combo
				$cmb = explode("<gz>", $search);

				if ($cmb[1] != "")
					$where = "usuarios.id = " . $cmb[1];

				$daoFactory->beginTransaction();
				$response[0]["usuarios"] = $daoFactory->getUsuariosDao()->comboScr($where);
				$daoFactory->close();

				echo $darth->view($response, $_DOCUMENT_ROOT . $_PACKAGE . "/html/usuarios/usuariosCMB.html");
			}

			/*
			 * Create
			 */
			else if ($method == "create") {
				if (!getPermission($_ROOT . $_MODULE, $daoFactory, $screen, $method)) {
					$response[0]["message"] = "permission";
					
					echo $darth->json($response);
				} else {
					$usuarios = new model\Usuarios();
					$usuarios->setUsuario(logicNull($form[0]));
					$usuarios->setEmail(logicNull($form[1]));
					$usuarios->setSenha(logicNull($form[2]));
					
					/*
					 * Upload File
					 */
					if (isset($_FILES["upload"])) {
						$upload = new getz\Upload($_FILES["upload"], 1920);
						$usuarios->setFoto($upload->getName());
					} else 
						$usuarios->setFoto("");
						
					$usuarios->setAccess_token(logicNull($form[3]));
					$usuarios->setAccess_token_expiration(logicNull(controllerDateTime($form[4])));
					$usuarios->setPassword_token(logicNull($form[5]));
					$usuarios->setPassword_token_expiration(logicNull(controllerDateTime($form[6])));
					$usuarios->setActivation_token(logicNull($form[7]));
					$usuarios->setActivation_token_expiration(logicNull(controllerDateTime($form[8])));
					$usuarios->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$usuarios->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$usuarios->setPerfil($form[9]);
					$usuarios->setSituacao_registro($form[10]);
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getUsuariosDao()->create($usuarios);

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
					$usuarios = new model\Usuarios();
					$usuarios->setId($code);
					$usuarios->setUsuario(logicNull($form[0]));
					$usuarios->setEmail(logicNull($form[1]));
					$usuarios->setSenha(logicNull($form[2]));
					
					/*
					 * Get object
					 */
					$where = "usuarios.id = " . $code;
					
					$daoFactory->beginTransaction();
					$usuariosDao = $daoFactory->getUsuariosDao()->read($where, "", false);
					$daoFactory->close();
						
					/*
					 * Upload File
					 */
					if (isset($_FILES["upload"])) {
						if ($usuariosDao[0]["usuarios.foto"] != "" && $usuariosDao[0]["usuarios.foto"] != "../female-user.svg" && $usuariosDao[0]["usuarios.foto"] != "../male-user.svg") {	
							/*
							 * Unlink
							 */
							unlink($_DOCUMENT_ROOT . "/res/img/ldpi/" . $usuariosDao[0]["usuarios.foto"]); 
							unlink($_DOCUMENT_ROOT . "/res/img/mdpi/" . $usuariosDao[0]["usuarios.foto"]);
							unlink($_DOCUMENT_ROOT . "/res/img/hdpi/" . $usuariosDao[0]["usuarios.foto"]);
						}
						
						$upload = new getz\Upload($_FILES["upload"], 1920);
						$usuarios->setFoto($upload->getName());
					} else 
						$usuarios->setFoto($usuariosDao[0]["usuarios.foto"]);
						
					$usuarios->setAccess_token(logicNull($form[3]));
					$usuarios->setAccess_token_expiration(logicNull(controllerDateTime($form[4])));
					$usuarios->setPassword_token(logicNull($form[5]));
					$usuarios->setPassword_token_expiration(logicNull(controllerDateTime($form[6])));
					$usuarios->setActivation_token(logicNull($form[7]));
					$usuarios->setActivation_token_expiration(logicNull(controllerDateTime($form[8])));
					$usuarios->setCadastrado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$usuarios->setModificado(date("Y-m-d H:i:s", (time() - 3600 * 3)));
					$usuarios->setPerfil($form[9]);
					$usuarios->setSituacao_registro($form[10]);
					
					$daoFactory->beginTransaction();
					$resultDao = $daoFactory->getUsuariosDao()->update($usuarios);

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
						$where = "usuarios.id = " . $lines[$i];
						
						/*
						 * Unlink
						 */
						$usuariosDao = $daoFactory->getUsuariosDao()->read($where, "", false);
						
						if ($usuariosDao[0]["usuarios.foto"] != "" && $usuariosDao[0]["usuarios.foto"] != "../female-user.svg" && $usuariosDao[0]["usuarios.foto"] != "../male-user.svg") {	
							unlink($_DOCUMENT_ROOT . "/res/img/ldpi/" . $usuariosDao[0]["usuarios.foto"]);
							unlink($_DOCUMENT_ROOT . "/res/img/mdpi/" . $usuariosDao[0]["usuarios.foto"]);
							unlink($_DOCUMENT_ROOT . "/res/img/hdpi/" . $usuariosDao[0]["usuarios.foto"]);
						}
						
						$resultDao = $daoFactory->getUsuariosDao()->delete($where);
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