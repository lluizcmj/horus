<?php 
			
	/**
	 * Generated by Getz Framework
	 * 
	 * @author Mario Sakamoto <mskamot@gmail.com>
	 * @see https://wtag.com.br/getz
	 */
	 
	namespace src\model; 

	class Usuarios {
			
		private $id;
		private $usuario;
		private $email;
		private $senha;
		private $foto;
		private $access_token;
		private $access_token_expiration;
		private $password_token;
		private $password_token_expiration;
		private $activation_token;
		private $activation_token_expiration;
		private $cadastrado;
		private $modificado;
		private $perfil;
		private $situacao_registro;
			
		public function __construct() { }
			
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getId() {
			return $this->id;
		}
					
		public function setUsuario($usuario) {
			$this->usuario = $usuario;
		}
		
		public function getUsuario() {
			return $this->usuario;
		}
					
		public function setEmail($email) {
			$this->email = $email;
		}
		
		public function getEmail() {
			return $this->email;
		}
					
		public function setSenha($senha) {
			$this->senha = $senha;
		}
		
		public function getSenha() {
			return $this->senha;
		}
					
		public function setFoto($foto) {
			$this->foto = $foto;
		}
		
		public function getFoto() {
			return $this->foto;
		}
					
		public function setAccess_token($access_token) {
			$this->access_token = $access_token;
		}
		
		public function getAccess_token() {
			return $this->access_token;
		}
					
		public function setAccess_token_expiration($access_token_expiration) {
			$this->access_token_expiration = $access_token_expiration;
		}
		
		public function getAccess_token_expiration() {
			return $this->access_token_expiration;
		}
					
		public function setPassword_token($password_token) {
			$this->password_token = $password_token;
		}
		
		public function getPassword_token() {
			return $this->password_token;
		}
					
		public function setPassword_token_expiration($password_token_expiration) {
			$this->password_token_expiration = $password_token_expiration;
		}
		
		public function getPassword_token_expiration() {
			return $this->password_token_expiration;
		}
					
		public function setActivation_token($activation_token) {
			$this->activation_token = $activation_token;
		}
		
		public function getActivation_token() {
			return $this->activation_token;
		}
					
		public function setActivation_token_expiration($activation_token_expiration) {
			$this->activation_token_expiration = $activation_token_expiration;
		}
		
		public function getActivation_token_expiration() {
			return $this->activation_token_expiration;
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
					
		public function setPerfil($perfil) {
			$this->perfil = $perfil;
		}
		
		public function getPerfil() {
			return $this->perfil;
		}
					
		public function setSituacao_registro($situacao_registro) {
			$this->situacao_registro = $situacao_registro;
		}
		
		public function getSituacao_registro() {
			return $this->situacao_registro;
		}
					
	}
	
?>