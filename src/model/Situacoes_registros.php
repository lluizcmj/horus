<?php 
			
	/**
	 * Generated by Getz Framework
	 * 
	 * @author Mario Sakamoto <mskamot@gmail.com>
	 * @see https://wtag.com.br/getz
	 */
	 
	namespace src\model; 

	class Situacoes_registros {
			
		private $id;
		private $situacao_registro;
		private $cadastrado;
		private $modificado;
		private $estilo;
			
		public function __construct() { }
			
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getId() {
			return $this->id;
		}
					
		public function setSituacao_registro($situacao_registro) {
			$this->situacao_registro = $situacao_registro;
		}
		
		public function getSituacao_registro() {
			return $this->situacao_registro;
		}
					
		public function setCadastrado($cadastrado) {
			$this->cadastrado = $cadastrado;
		}
		
		public function getCadastrado() {
			return $this->cadastrado;
		}
					
		public function setModificado($modificado) {
			$this->modificado = $modificado;
		}
		
		public function getModificado() {
			return $this->modificado;
		}
					
		public function setEstilo($estilo) {
			$this->estilo = $estilo;
		}
		
		public function getEstilo() {
			return $this->estilo;
		}
					
	}
	
?>