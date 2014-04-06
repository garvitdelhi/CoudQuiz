<?php

class user {

	private $username;
	private $name;
	private $email;
	private $password;
	private $db;
	private $url;
	private $result;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
	}

	public function putdata() {
		$this->username = $this->db->sanitizeData($_POST['username']);
		$this->password = $this->db->sanitizeData($_POST['password']);
		$this->name = $this->db->sanitizeData($_POST['name']);
		$this->email = $this->db->sanitizeData($_POST['email']);
	}

	public function checkdata() {
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$this->email)) {
			echo 'wrong email!!<br>';
			return false;
		}
		$sql = 'SELECT * FROM user';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$s = true;
				if($this->username==$result['username']) {
					echo 'username Exist<br>';
					$s = false;
				}
				if($this->email==$result['email']) {
					echo 'Email Exist<br>';
					$s = false;
				}
				if(!$s) {
					return false;
				}
			}
		}
		return true;
	}

	public function createuser() {
		echo 'creating user<br>';
		$password = md5($this->password.$this->username);
		$code = md5('username-'.$this->username.'password-'.$this->password.'name-'.$this->name);
		$column = array('username','password','code','email');
		$value = array($this->username,$password,$code,$this->email);
		$this->db->insert('user',$column,$value);
		$column1 = array('name','email','code');
		$value1 = array($this->name,$this->email,$code);
		$this->db->insert('user_data',$column1,$value1);
		return true;
	}

	public function getusername() {
		return $this->username;
	}

	public function getpassword() {
		return $this->password;
	}
}

?>
