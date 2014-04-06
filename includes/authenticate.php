<?php

class auth {

	private $db;
	private $url;
	private $login = false;
	private $result;
	private $quizlogin = false;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
	}

	public function login($username, $password) {
		$password = md5($password.$username);
		$sql = 'SELECT * FROM user';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				if($username==$result['username'] && $password==$result['password']) {
					$_SESSION['user']=$result['code'];
					$this->login = true;
					return true;
				}
			}
		}
		$this->login = false;
		return false;
	}

	public function logout() {
		if(!isset($_SESSION['start'])) {
			session_destroy();
			session_start();
			header("location:index.php");
		}
		return false;
	}

	public function checkquiz() {
		if(isset($_POST['quiz_code'])) {
			$quiz_code = $_POST['quiz_code'];
			$sql = 'SELECT * FROM quiz_data';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				if($quiz_code==$result['quiz_code'] ) {
					$_SESSION['quiz']=$result['quiz_code'];
					$this->quizlogin = true;
					return true;
				}
			}
		}
		$this->quizlogin = false;
		return false;
		}
	}

	public function logoutquiz() {
		unset($_SESSION['quiz']);
		unset($_SESSION['start']);
		header('location:/app/');
	}

	public function checklogin() {
		echo $this->login.'<br>';
		return $this->login;
	}
	
}

?>
