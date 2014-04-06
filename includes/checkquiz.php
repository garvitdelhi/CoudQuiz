<?php

class checkquiz {

	private $db;
	private $url;
	private $result;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
	}

	public function check() {
		$i = $_POST['number'];
		while($i--) 
		{
			$selected[$i] = $_POST['ques'.$i];
		}
		$quiz_code = $_SESSION['quiz'];
		$sql = 'SELECT * FROM questions WHERE quiz_code = "'.$quiz_code.'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$ans[] = $result['ans'];
			}
		}
		$count = 0;
		$i = 0;
		foreach($selected as $select) {
			if($select == $ans[$i]) {
				$count++;
			}
			$i++;
		}
		$this->result = $count;
	}

	public function updateresult() {
		$column = array('code','quiz_code','result');
		$value = array($_SESSION['user'],$_SESSION['quiz'],$this->result);
		$this->db->insert('user_taken',$column,$value);
	}

}

?>
