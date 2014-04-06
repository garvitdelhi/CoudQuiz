<?php
if(isset($_SESSION['quiz'])) {

	class ques {
	
		private $db;
		private $url;
		private $name;
		private $quiz_code;
		private $description;
		private $ques;
		private $opt1;
		private $opt2;
		private $opt3;
		private $opt4;
	
		public function __construct(connect $db, urlprocessing $url) {
			$this->db = $db;
			$this->url = $url;
			$sql = 'SELECT * FROM quiz_data WHERE quiz_code = "'.$_SESSION['quiz'].'"';
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
					$this->opt1[] = $result['ans'];
					$this->opt2[] = $result['option1'];
					$this->opt3[] = $result['option2'];
					$this->opt4[] = $result['option3'];
				}
			}
		}
	
		public function getresults() {
			return $this->opt1;
		}
	
		public function getquizdata() {
			$i =0;
			foreach($this->ques as $ques) {	
				$data[$i] = array($this->opt1[$i], $this->opt2[$i], $this->opt3[$i], $this->opt4[$i]);
				shuffle($data[$i]);
				$i++;
			}
			$allques = array(
							'name'=>$this->name,
							'quiz_code'=>$this->quiz_code,
							'description'=>$this->description,
							'ques'=>$this->ques,
							'options'=>$data);
			return $allques;
		}
	
	}
}
?>
