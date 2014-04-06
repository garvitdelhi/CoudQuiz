<?php
class urlprocessing {

	private $urlbits;
	private $url;
	private $db;
	private $result;
	
	public function __construct(connect $db) {
		$this->db = $db;
	}
	public function url() {
		$this->url = $_SERVER['REQUEST_URI'];
		$this->url = $this->db->sanitizeData($this->url);
		$this->urlbits = explode('/',$this->url);
	}
	public function getUser() {
		if(count($this->urlbits)>2) {
			$this->db->executeQuery('SELECT * FROM user');
			$this->result = $this->db->getRows();
			if($this->result) {
				foreach($this->result as $result)
				{
					if($this->urlbits[2]==$result['username']) {
						return $this->urlbits[2];
					}
				}
			}
		}
		return false;
	}

	public function	getquizcode() {
		if(count($this->urlbits)>2) {
			$this->db->executeQuery('SELECT * FROM quiz_data');
			$this->result = $this->db->getRows();
			if($this->result) {
				foreach($this->result as $result)
				{
					if($this->urlbits[2]==$result['quiz_code']) {
						if($_SESSION['user']==$result['code']) {
							return $this->urlbits[2];
						}
					}
				}
			}
		}
		return 'none';
	}

	public function getUrl() {
		if(count($this->urlbits)>2) {
			return $this->urlbits[2];
		}
	}

}

?>
