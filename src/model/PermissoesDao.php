<?php
			
	/**
	 * Generated by Getz Framework
	 * 
	 * @author Mario Sakamoto <mskamot@gmail.com>
	 * @see https://wtag.com.br/getz 
	 */
	 
	namespace src\model; 
	
	use src\model;
	
	class PermissoesDao {
	
		private $connection;
		
		/*
		 * Constant variables
		 */
		private $create = "INSERT INTO permissoes (
				permissao
				, cadastrado
				, modificado
				, estilo
				) VALUES";
				
		public $read = 
				"permissoes.id AS \"permissoes.id\"
				, permissoes.permissao AS \"permissoes.permissao\"
				, permissoes.cadastrado AS \"permissoes.cadastrado\"
				, permissoes.modificado AS \"permissoes.modificado\"
				, permissoes.estilo AS \"permissoes.estilo\"
				";
				
		private $update = "UPDATE permissoes SET";
		private $delete = "DELETE FROM permissoes";
		
		public $from = "permissoes permissoes";
		
		/*
		 * Parameters
		 */
		private $where;
		private $order;
		
		// Dynamic query
		private $sql;
		
		// Controller response
		private $response;	
		
		/**
		 * @param {Object} connection
		 */
		public function __construct($connection) {
			$this->connection = $connection;
		}

		/**
		 * @param {Permissoes}permissoes
		 */
		public function setCreate($permissoes) {		
			$this->sql = $this->create . " (\"" . 
					$permissoes->getPermissao() .
					"\", \"" . $permissoes->getCadastrado() .
					"\", \"" . $permissoes->getModificado() .
					"\", \"" . $permissoes->getEstilo() .
					"\")";
		}
		
		/**
		 * @return {String}
		 */
		public function getCreate() {
			return $this->sql;
		}	
		
		/**
		 * @param {String} where
		 * @param {String} order
		 */
		public function setRead($where, $order) {
			$estilosDao = new model\EstilosDao($this->connection);
			
			$this->setWhere($where);
			$this->setOrder($order);
			
			$this->sql = "SELECT " . $this->read . ", " . $estilosDao->read . 
					" FROM " . $this->getFrom() .", " . $estilosDao->from . 
					($this->getWhere() == "" ? " WHERE permissoes.estilo = estilos.id" : $this->getWhere()) . 
					" AND permissoes.estilo = estilos.id" . $this->getOrder();
		}
		
		/**
		 * @return {String}
		 */
		public function getRead() {
			return $this->sql;
		}
		
		/**
		 * @param {Permissoes}permissoes  
		 * @param {String} where
		 */
		public function setUpdate($permissoes, $where) {
			$this->setWhere($where);
			
			$this->sql = $this->update . 
					" id = \"" . $permissoes->getId() . 
					"\", permissao = \"" . $permissoes->getPermissao() . 
					"\", modificado = \"" . $permissoes->getModificado() . 
					"\", estilo = \"" . $permissoes->getEstilo() . 
					"\"" . $this->getWhere();
		}
		
		/**
		 * @return {String}
		 */
		public function getUpdate() {
			return $this->sql;
		}
		
		/**
		 * @param {String} where
		 */
		public function setDelete($where) {	
			$this->setWhere($where);
			
			$this->sql = $this->delete . $this->getWhere();
		}
		
		/**
		 * @return {String}
		 */
		public function getDelete() {
			return $this->sql;
		}
		
		/**
		 * @return {String}
		 */
		public function getFrom() {
			return $this->from;
		}
		
		/**
		 * @param {String} where
		 */
		public function setWhere($where) {
			if ($where != "")
				$this->where = " WHERE " . $where;
			else
				$this->where = "";
		}
		
		/**
		 * @return {String}
		 */
		public function getWhere() {
			return $this->where;
		}
		
		/**
		 * @param {String} order
		 */
		public function setOrder($order) {
			if ($order != "")
				$this->order = " ORDER BY " . $order;
			else
				$this->order = "";
		}
		
		/**
		 * @return {String}
		 */
		public function getOrder() {
			return $this->order;
		}
		
		/**
		 * @param {Integer} line
		 * @param column String
		 * @param value String
		 */
		private function setResponse($line, $column, $value) {
			$this->response[$line][$column] = $value;
		}

		/**
		 * @return {Array}
		 */
		private function getResponse() {
			return $this->response;
		}

		/**
		 * @param {String} where
		 */
		private function setSize($where) {
			$this->setWhere($where);
			
			$result = $this->connection->execute(
					"SELECT count(1) AS \"permissoes.size\" from permissoes" . $this->getWhere());

			while ($row = $result->fetch_assoc()) {		
				$this->setResponse(0, "permissoes.size", $row["permissoes.size"]);
				
				$pages = ceil($row["permissoes.size"] / $this->connection->getItensPerPage());
				
				$this->setResponse(0, "permissoes.page", $this->connection->getPosition());
				$this->setResponse(0, "permissoes.pages", $pages);
				
				$pagination = "<select id='gz-select-pagination' onchange='goPage();'>";
				
				for ($i = 1; $i <= $pages; $i++) {
					if ($i == $this->connection->getPosition())
						$pagination .= "<option value='" . $i . "' selected>" . $i . "</option>";
					else
						$pagination .= "<option value='" . $i . "'>" . $i . "</option>";
				}	

				$pagination .= "</select>";
						
				$this->setResponse(0, "permissoes.pagination", $pagination);
			}

			$this->connection->free($result);
		}
		
		/**
		 * @param {Integer} line
		 */
		public function setDivLine($line) {
			$this->setResponse($line - 1, "@_START_LINE_TWO", modelStartLine($line, 2));
			$this->setResponse($line - 1, "@_END_LINE_TWO", modelEndLine($line, 2));

			$this->setResponse($line - 1, "@_START_LINE_THREE", modelStartLine($line, 3));
			$this->setResponse($line - 1, "@_END_LINE_THREE", modelEndLine($line, 3));
			
			$this->setResponse($line - 1, "@_START_LINE_FOUR", modelStartLine($line, 4));
			$this->setResponse($line - 1, "@_END_LINE_FOUR", modelEndLine($line, 4));
		}
		
		/**
		 * @param {Integer} line
		 */
		public function checkDivLine($line) {
			if (modelCheckEndLine($line, 2) != "")
				$this->setResponse($line - 1, "@_END_LINE_TWO", modelCheckEndLine($line, 2));
			
			if (modelCheckEndLine($line, 3) != "")
				$this->setResponse($line - 1, "@_END_LINE_THREE", modelCheckEndLine($line, 3));		

			if (modelCheckEndLine($line, 4) != "")
				$this->setResponse($line - 1, "@_END_LINE_FOUR", modelCheckEndLine($line, 4));			
		}	

		/**
		 * @param {String} log
		 */
		private function setLog($log) {
			$this->setResponse(0, "log", $log);
		}
		
		/**
		 * @param {Permissoes} permissoes 
		 * @return {Boolean}
		 */
		public function create($permissoes) {
			$result = "";

			$this->setCreate($permissoes);
			$result = $this->connection->execute($this->getCreate());
			
			return $result;
		}

		/**
		 * @param {String} where
		 * @param {String} order
		 * @param {Boolean} wp
		 * @param {Array}
		 */
		public function read($where, $order, $wp) {
			$line = 0;

			$this->setRead($where, $order);
			$result = $this->connection->execute($this->getRead());

			while ($row = $result->fetch_assoc()) {
				$this->setResponse($line, "permissoes.id", $row["permissoes.id"]);
				$this->setResponse($line, "permissoes.permissao", $row["permissoes.permissao"]);
				$this->setResponse($line, "permissoes.permissao.format", modelDoubleQuotes($row["permissoes.permissao"]));
				$this->setResponse($line, "permissoes.permissao.view", addLine($row["permissoes.permissao"]));
				$this->setResponse($line, "permissoes.cadastrado", modelDateTime($row["permissoes.cadastrado"]));
				$this->setResponse($line, "permissoes.modificado", modelDateTime($row["permissoes.modificado"]));
				$this->setResponse($line, "permissoes.estilo", $row["permissoes.estilo"]);
				$this->setResponse($line, "estilos.estilo", $row["estilos.estilo"]);
			
				$this->setResponse($line, "permissoes.line", $line);
			
				$line++;
				
				if ($wp)
					$this->setDivLine($line);
			}

			$this->connection->free($result);
			
			if ($wp && $line > 0) {
				$this->checkDivLine($line);
				
				$this->setSize($where);
			}

			return $this->getResponse();
		}

		/**
		 * @param {Permissoes} permissoes 
		 * @return {Boolean}
		 */
		public function update($permissoes) {
			$result = "";
			
			$this->setUpdate($permissoes, "permissoes.id = " . $permissoes->getId());
			$result = $this->connection->execute($this->getUpdate());

			return $result;
		}

		/**
		 * @param {String} where
		 * @return {Boolean}
		 */
		public function delete($where) {
			$result = "";
			
			$this->setDelete($where);
			$result = $this->connection->execute($this->getDelete());

			return $result;
		}
		
		/**
		 * @param {Integer} selected
		 * @param {String} order
		 * @return {Array}
		 */
		public function combo($selected, $order) {
			$size = 0;

			$this->setRead("", $order);
			$result = $this->connection->execute($this->getRead());

			while ($row = $result->fetch_assoc()) {
				$this->setResponse($size, "permissoes.id", $row["permissoes.id"]);
				$this->setResponse($size, "permissoes.permissao", $row["permissoes.permissao"]);
			
				if ($row["permissoes.id"] == $selected)
					$this->setResponse($size, "permissoes.selected", "selected");
				else
					$this->setResponse($size, "permissoes.selected", "");
					
				$size++;
			}
			
			$this->connection->free($result);
			
			$this->setResponse(0, "size", $size);

			return $this->getResponse();
		}
		
		/**
		 * @param {String} where
		 * @return {Array}
		 */
		public function comboScr($where) {
			$size = 0;

			$this->setRead($where, "");
			$result = $this->connection->execute($this->getRead());

			while ($row = $result->fetch_assoc()) {
				$this->setResponse($size, "permissoes.id", $row["permissoes.id"]);
				$this->setResponse($size, "permissoes.permissao", $row["permissoes.permissao"]);
				$this->setResponse($size, "permissoes.selected", "selected");
					
				$size++;
			}
			
			$this->connection->free($result);
			
			$this->setResponse(0, "size", $size);

			return $this->getResponse();
		}

	}

?>