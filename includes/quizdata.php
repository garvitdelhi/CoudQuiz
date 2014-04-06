<?php

class quizdata {

	private $db;
	private $url;
	private $name;
	private $quiz_code;
	private $description;
	private $ques;
	private $ans;
	private $opt1;
	private $opt2;
	private $opt3;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
		$sql = 'SELECT * FROM quiz_data WHERE quiz_code = "'.$this->url->getquizcode().'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$this->name = $result['name'];
				$this->quiz_code = $result['quiz_code'];
				$this->description = $result['description'];
			}
		}

		$sql = 'SELECT * FROM questions WHERE quiz_code = "'.$this->quiz_code.'"';
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$this->ques[] = $result['ques'];
				$this->ans[] = $result['ans'];
				$this->opt1[] = $result['option1'];
				$this->opt2[] = $result['option2'];
				$this->opt3[] = $result['option3'];
			}
		}
	}

	public function getquizdata() {
		$data = array(
							'name'=>$this->name,
							'quiz_code'=>$this->quiz_code,
							'description'=>$this->description,
							'ques'=>$this->ques,
							'ans'=>$this->ans,
							'opt1'=>$this->opt1,
							'opt2'=>$this->opt2,
							'opt3'=>$this->opt3
						);
		return $data;
	}

}
?>
