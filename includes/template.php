<?php

class template {

	private $db;
	private $url;

	public function __construct(connect $db, urlprocessing $url) {
		$this->db = $db;
		$this->url = $url;
	}

	public function login() {
	
	echo '		<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>

  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/newUser">New User!</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div><form action="/app/logingin" method="post">
          Enter username:<input type="text" name="username1" placeholder="name" required/><br><br>
          Enter password:<input type="password" name="password1" placeholder="password" required/><br>
					<button class="btn btn-large btn-primary" type="submit" >Submit</button>
      </form>
			 ';	
	}

	public function signup() {
		echo '		<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>

  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div><form action="/app/newUser" method="post">
  	        Enter name:<input type="text" name="name" ';
		if(isset($_POST['name'])) {
			echo ' value="'.$_POST['name'].'"';
		}
		echo ' placeholder="name" required/><br>
						Enter email:<input type="text" name="email"';
		if(isset($_POST['email'])) {
			echo ' value="'.$_POST['email'].'" ';
		}
		echo 'placeholder="email" required/><br>
						Enter username:<input type="text" name="username" ';
		if(isset($_POST['username'])) {
			echo ' value="'.$_POST['username'].'"';
		}
		echo ' placeholder="username" required/><br>
	          Enter password:<input type="password" name="password" placeholder="password" required/><br>
						<button class="btn btn-large btn-primary" type="submit" >Submit</button>
	      </form>
				';
	}

	public function displayUser($data) {
	
		echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';
		
		echo '<br>';		
		echo 'hello '.$data['name'].'<br>';
		echo '<br>';
		echo '<br><br>';
		if($data['quiz_codes']) {
			echo 'List of quiz organised : <br>';
			$i = 0;
			foreach($data['quiz_codes'] as $quiz_code) {
				echo ($i+1).'. quiz name : <a href="/app/'.$quiz_code.'">'.$data['quiz_names'][$i].'</a> , quiz code : '.$quiz_code;
				$i++;
				echo '<br>';
			}
			echo '<br><br>';
		}
		else {
			echo 'no quiz organized till now !!<br><br>';
		}
		if($data['quiz_taken']) {
			echo 'List of quiz taken : <br>';
			$i = 0;
			foreach($data['quiz_taken'] as $quiz_code) {
				echo ($i+1).'. quiz code : '.$quiz_code.' score : '.$data['quiz_result'][$i];
				$i++;
				echo '<br>';
			}
			echo '<br><br>';
		}
		else {
			echo 'no quiz taken<br>';
		}
	}

	public function newquiz() {
		echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';
			
			echo '<form action="/app/quiz" method="post">
		Quiz Name : <input type="text" name="name" placeholder="Quiz Name" required><br>
		No of questions(1-20) : <input type="number" name="number" placeholder="1" min="1" max="20" required><br>
		Time limit(max 200) : <input type="number" name="time" placeholder="In Minuts" min="1" max="200" required><br>
		Description : <br><textarea type="text" name="description" placeholder="max in 300 words" maxlength="300" rows="5" cols="30" required>
				</textarea><br>
		<button class="btn btn-large btn-primary" type="submit" >Submit</button>';

	}	

	public function quiz() {
echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';
		$_SESSION['quiz_data'] = array('name'=>$_POST['name'],'description'=>$_POST['description'],'no_ques'=>$_POST['number'],'time'=>$_POST['time']);
		echo '<a href="/app/quizcancel">Cancel Quiz</a><br><br>';
		echo 'quiz created<br>';
		echo '<a href="/app/newquiz">add questions to it</a>';
	}

	public function quizcode($code) {
	echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';

		echo 'your Quiz code is : '.$code;
	}

	public function quizques() {
	echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';
		echo '<a href="/app/quizcancel">Cancel Quiz</a><br><br>';
		echo '<form action="/app/quizsubmit" method="post">';
		$number = $_SESSION['quiz_data']['no_ques'];
		$num = $number;
		while($number--) {
			echo 'Ques '.($num-$number).' : <textarea name="ques[]"></textarea><br>
						Ans : <input type="text" name="ans[]">
						Option 2 : <input type="text" name="option1[]">
						Option 3 : <input type="text" name="option2[]">
						Option 4 : <input type="text" name="option3[]"><br><br><br>';
		}
		echo '<button class="btn btn-large btn-primary" type="submit" >Submit</button>
					</form>';
	}

	public function displaySelfQuiz(connect $db,urlprocessing $url) {
	echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';
		$quizdata = new quizdata($db,$url);
		$data = $quizdata->getquizdata();
		echo 'quiz_name : '.$data['name'].'<br><br>';
		echo 'quiz_questions : <br><br>';
		$i = 0;
		foreach($data['ques'] as $ques) {
			echo ($i+1).'. '.$ques.'<br>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;optoins : <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. ans => '.$data['ans'][$i].'
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. '.$data['opt1'][$i];
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. '.$data['opt2'][$i].'
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. '.$data['opt3'][$i];
			$i++;
		}
		echo '<br><br>submited users : <br>';
		$sql = 'SELECT * FROM user_taken WHERE quiz_code = "'.$data['quiz_code'].'"';
		$student = array();
		$this->db->executeQuery($sql);
		$this->result = $this->db->getRows();
		if($this->result) {
			foreach($this->result as $result)
			{
				$student[] = $result['code'];
				$student_result[] = $result['result'];
			}
		}
		foreach($student as $stu_code) {
			$sql = 'SELECT * FROM user_data WHERE code = "'.$stu_code.'"';
			$this->db->executeQuery($sql);
			$this->result = $this->db->getRows();
			if($this->result) {
				foreach($this->result as $result)
				{
					$name[] = $result['name'];
					$email[] = $result['email'];
				}
			}
		}
		$i=0;
		foreach($name as $n) {
			echo ($i+1).'.&nbsp;&nbsp;';
			echo 'name : '.$n[$i].'&nbsp;&nbsp;&nbsp;&nbsp;';
			echo 'email : '.$email[$i].'&nbsp;&nbsp;&nbsp;&nbsp;';
			echo 'score : '.$student_result[$i];
			echo '<br><br>';
			$i++;
		}
	}

	public function takequiz() {
	echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div>';
		echo 'Enter quiz Code<form action="/app/checkquiz" method="post">';
		echo '<input type="text" placeholder="quiz code" name="quiz_code"><button class="btn btn-large btn-primary" type="submit" >Submit</button></form>';
	}

	public function displayQuiz() {
	echo '<div class="navbar navbar-inverse">
  <div class="navbar-inner">
  <div class="container">

  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      	<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		<span class="icon-bar"></span>
  		</a>
	
  		<!-- Be sure to leave the brand out there if you want it shown -->

<a id="m" class="brand" href="#">CloudQuiz</a>
<a id="m" class="brand" href="/app/">Home</a>
<a id="m" class="brand" href="/app/logout">logout!</a>
<a id="m" class="brand" href="/app/newQuiz">Create a Quiz</a>
<a id="m" class="brand" href="/app/takequiz">Take a Quiz</a>

  		<!-- Everything you <a href="/app/">Home</a>want hidden at 940px or less, place within here -->
  		<div class="nav-collapse collapse">
  		<!-- .nav, .navbar-search, .navbar-form, etc -->
  				<div class="nav">

  				
  	

      </ul>
      </div>
</div>
      </div>

      </div>
      </div><script>
var day = new Date();
var ti= day.getTime();
var tim =ti + 10;

 
// variables for time units
 
// get tag element

 
// update the tag with id "countdown" every 1 second
setInterval(function () {
 
    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    
    var seconds_left = (current_date - tim) / 1000;
 
    // do some time calculation
     
    minutes = parseInt(seconds_left / 60);
    if(minutes==20)
    {
    document.getElementById("frm").submit();
    }
    seconds = parseInt(seconds_left % 60);
     var countdown = document.getElementById("countdown");
     countdown.innerHTML=minutes+" : "+seconds;
     
 
}, 1000);
function cancel() {
	alert("hey");
	document.getElementById.("quiz").submit();
}
</script> <div id="countdown"></div><body onload="cancel()">';
		if(isset($_SESSION['start']) && $_SESSION['start']==true) {
			echo '<script>document.getElementById("quiz").submit()</script>';
		}
		echo 'Test starts !<br>';
		$ques = new ques($this->db,$this->url);
		$quesdata = $ques->getquizdata();
		echo 'quiz_name : '.$quesdata['name'].'<br><br>';
		echo 'quiz_questions : <br><br>';
		$i = 0;
		echo '<form id="quiz" action="/app/submit" method="post">';
		foreach($quesdata['ques'] as $ques) {
			echo ($i+1).'.<strong> '.$ques.'<br>'.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '1. <input type="radio" name="ques'.$i.'" value="'.$quesdata['options'][$i][0].'" >'.$quesdata['options'][$i][0].'
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '2. <input type="radio" name="ques'.$i.'" value="'.$quesdata['options'][$i][1].'" >'.$quesdata['options'][$i][1];
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '3. <input type="radio" name="ques'.$i.'" value="'.$quesdata['options'][$i][2].'" >'.$quesdata['options'][$i][2].'
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '4. <input type="radio" name="ques'.$i.'" value="'.$quesdata['options'][$i][3].'" >'.$quesdata['options'][$i][3];
			$i++;
			echo '<br><br>';
		}
		echo '<input type="hidden" name="number" value="'.$i.'">';
		echo '<br><br><button class="btn btn-large btn-primary" type="submit" >Submit</button></submit>';
	}

}
	
?>
