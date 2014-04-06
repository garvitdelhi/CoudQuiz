
<!doctype html>
<html lang="en">
<head>
<title>Bartera Shiplock</title>
<meta charset="utf-8"/>
<style type="text/css">

#holder {
min-height: 100%;
position:relative;
 }
 ul.footer1{
            margin-top:10px;
            text-align:center;
          }

         ul.footer1 li{
          color:#333;
          display:inline-block;
          }


       #footer1{

        margin-top: 197px;
        height: 50px;
        left: 0;
        position: absolute;
        right: 0;
       }
       html,body{
    height: 100%
}



#img{
/*margin-left: 450px;*/
text-align:center;
margin-top: 120px;
}

}
#m
{
	font-family: 'Tauri', sans-serif;
}
.search-bar {
     /* centers inline and inline-block children */
}
.search-bar .search-query,
.search-bar .btn-primary {
    display: inline-block; /* allows for heights to be set */
}
.search-bar .search-query {
    height: 30px;
}
.search-bar .btn-primary {
    height: 30px;
}

.marketing .span4 {
      text-align: center;
    }
 
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }
/* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 30px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 400px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 400px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }
 /* Featurettes
    ------------------------- */

    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    

    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }

    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }
  
</style>
</head>
<body>


</body>
</html>
         
<?php
/**
 * project started.
 */
session_start();
ob_start();
 include_once "include.inc.php";

DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) ."/includes/" );
include FRAMEWORK_PATH.'urlprocessing.php';
include FRAMEWORK_PATH.'connect.php';
include FRAMEWORK_PATH.'template.php';
include FRAMEWORK_PATH.'authenticate.php';
include FRAMEWORK_PATH.'user.php';
include FRAMEWORK_PATH.'logedinuser.php';
include FRAMEWORK_PATH.'quiz.php';
include FRAMEWORK_PATH.'quizdata.php';
include FRAMEWORK_PATH.'ques.php';
include FRAMEWORK_PATH.'checkquiz.php';

$db = new connect('localhost','app','app','app');
$url = new urlprocessing($db);
$template = new template($db, $url);
$auth = new auth($db, $url);
$url->url();
if(isset($_SESSION['user']) && !isset($_SESSION['quiz'])) {
	$logedinuser = new logedinuser($db, $url);
	$presentUrl = $url->getUrl();

	switch($presentUrl) {
		case 'logout':
			$auth->logout();
			break;
		case 'newQuiz':
			$template->newquiz();
			break;
		case 'quiz':
			if($_POST['name']!=""&&$_POST['description']!=""&&$_POST['number']!="") {
				$template->quiz();
			}
			else {
				$template->newquiz();
			}
			break;
		case 'quizcancel':
			unset($_SESSION['quiz_data']);
			$template->newquiz();
			break;
		case 'newquiz' :
			$template->quizques();
			break;
		case 'quizsubmit':
			$quiz = new quiz($db,$url,$logedinuser);
			$quiz->createquiz();
			if($quiz->getquizcode()) {
				$template->quizcode($quiz->getquizcode());
			}
			break;
		case $url->getquizcode() : 
			$template->displaySelfQuiz($db,$url);
			break;
		case 'takequiz':
			$template->takequiz();
			break;
		case 'checkquiz':
			if(isset($_POST['quiz_code'])) {
				if($auth->checkquiz()) {
					$u = $_POST['quiz_code'];
					header("location:/app/$u");
				}
				else {
					header('location:/app/takequiz');
				}
			}
			else {
				header('location:/app/');
			}
			break;
		default : 
			$template->displayUser($logedinuser->getdata());	
	}

}
elseif( isset($_SESSION['user']) && isset($_SESSION['quiz']) ) {
	$db->executeQuery('SELECT * FROM user_taken WHERE code ="'.$_SESSION['user'].'" AND quiz_code ="'.$_SESSION['quiz'].'"');
	
	if($url->getURL()=="submit" && isset($_POST)) {
		$check = new checkquiz($db,$url);
		$check->check();
		$check->updateresult();
		$auth->logoutquiz();
	}
	elseif(!$db->numRows()) {
		$template->displayQuiz();
	}	
	else {
		$auth->logoutquiz();
	}
}
else {
	$presentUrl = $url->getUrl();
	if($presentUrl == 'newUser') {
		$template->signup();
	}
	else {
		$template->login();
	}
}

if(isset($_POST['username1'])&&isset($_POST['password1'])&&$url->getUrl()=='logingin') {
		$auth->login($_POST['username1'],$_POST['password1']);
		if($auth->checklogin()) {
			$u = $_POST['username1'];
			header("location:/app/$u");
		}
		else {
			echo 'sorry wrong email or password';
		}
}

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['email']) && $url->getUrl()=='newUser') {
	$user = new user($db, $url);
	$user->putdata();
	if($user->checkdata()) {
		$user->createuser();
		$auth->login($user->getusername(),$user->getpassword());
		if($auth->checklogin()) {
			$u = $user->getusername();
			header("location:/app/$u");
		}
	}
}

?>

