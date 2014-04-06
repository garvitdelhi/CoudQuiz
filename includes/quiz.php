<?php

class quiz {

	private $db;
	private $url;
	private $quiz_code;
	private $logindata;

	public function __construct(connect $db, urlprocessing $url, logedinuser $logedinuser) {
		$this->db = $db;
		$this->url = $url;
		$this->logindata = $logedinuser->getdata();
	}

	private function generate_code($str) {
		$number = $_SESSION['quiz_data'];
		$code = $this->logindata['username'].substr(md5($_SESSION['user'].$number['name'].$str),0,5);
		if(!$this->check_code($code)) {
			$this->generate_code(rand(0,999999999999999999));
		}
		return $code;
	}

	private function check_code($code) {
		$allquizcodes = $this->logindata['quiz_codes'];
		if($allquizcodes) {
			foreach($allquizcodes as $codes) {
				if($codes == $code) {
					return false;
				}
			}
		}
		return true;
	}

	public function createquiz() {
		$this->quiz_code = $this->generate_code(rand(0,99999999999));
		$column = array('quiz_code','name','description','no_ques','code','time');
		$data = $_SESSION['quiz_data'];
		$value = array($this->quiz_code,$data['name'],$data['description'],$data['no_ques'],$_SESSION['user'],$data['time']);
		$this->db->insert('quiz_data',$column,$value);
		$ques = $_POST['ques'];
		$ans = $_POST['ans'];
		$option1 = $_POST['option1'];
		$option2 = $_POST['option2'];
		$option3 = $_POST['option3'];
		$column1 = array('quiz_code','ques','ans','option1','option2','option3','code');
		$n = $data['no_ques'];
		$n=$n-1;
		while($n--)
		{
			$value1 = array($this->quiz_code,$ques[$n],$ans[$n],$option1[$n],$option2[$n],$option3[$n],$_SESSION['user']);
			$this->db->insert('questions',$column1,$value1);
		}
		return true;
	}

	public function getquizcode() {
		return $this->quiz_code;
	}
}

?>
