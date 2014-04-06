<?php

class logedinuser {

	private $db;
	private $url;
	private $email;
	private $name;
	private $quiz_codes;
	private $username;
	private $quiz_names;
	private $quiz_taken;
	private $quiz_result;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
		$sql = 'SELECT * FROM user_data WHERE code = "'.$_SESSION['user'].'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$this->email = $result['email'];
				$this->name = $result['name'];
			}
		}

		$sql = 'SELECT * FROM user WHERE code = "'.$_SESSION['user'].'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$this->username = $result['username'];
			}
		}

		$sql = 'SELECT * FROM quiz_data WHERE code = "'.$_SESSION['user'].'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$this->quiz_codes[] = $result['quiz_code'];
				$this->quiz_names[] = $result['name'];
			}
		}

		$sql = 'SELECT * FROM user_taken WHERE code = "'.$_SESSION['user'].'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$this->quiz_taken[] = $result['quiz_code'];
				$this->quiz_result[] = $result['result'];
			}
		}

	}

	public function getdata() {
		$data = array(
							'username'=>$this->username,
							'email'=>$this->email,
							'name'=>$this->name,	
							'quiz_codes'=>$this->quiz_codes,
							'quiz_names'=>$this->quiz_names,
							'quiz_taken'=>$this->quiz_taken,
							'quiz_result'=>$this->quiz_result);
		return $data;
	}	

}

?>
