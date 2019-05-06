<?php


	require("quizManager.php");

	$quizManager = new quizManager();
	$user_answer = null;
	$output = null;
	$user_choice_answer=null;
	$rightAnswer = null;

	if(isset($_GET['action']) && $_GET['action'] == "get-next-question" && is_ajax()
	&& isset($_POST['topic'])
	&& !empty($_POST['topic'])
	&& isset($_POST['questionNumber'])
	&& !empty($_POST['questionNumber'])
	){

	$topic = db_escapeString($_POST['topic']);
	$questionNumber = db_escapeString($_POST['questionNumber']);
	$totalQuestions = $quizManager->getTotalQuestions($topic);
	$question = $quizManager->getQuestion($questionNumber,$topic);
	$choices = $quizManager->getQuestionChoices($questionNumber,$topic);

	if($questionNumber > 1){
		$user_answer = db_escapeString($_POST['user_choice']);
		$rightAnswer = $quizManager->getRightAnswer($questionNumber-1,$topic);
		//We need choice_id cause we are using random order for them
		$user_choice_answer = $quizManager->getUserChoice($questionNumber-1,$topic,$user_answer);
		if($user_choice_answer == $rightAnswer){
			$_SESSION['score']++;
		}
	}


	if($questionNumber>$totalQuestions){
		$correct_answers = $_SESSION['score'];
		$points = $correct_answers * 100 ;
		$firstTime_points = 150;
		$totalPoints = $points + $firstTime_points;
		include('quizCompleted.php');
		$_SESSION['score'] = 0;
		//$quizManager->endQuiz($topic);
	}
	else{
  $output  = $output .
	'<div class="paragraph_022">'.$question['question'].'</div>
		<div class="quesInstruc">
			Choose 1 answer :
		</div>
		<ul class="respRadioContainer">';

		$quizChoicesCheck = mysqli_num_rows($choices);
		if($quizChoicesCheck>0){
			while($choicesData = mysqli_fetch_assoc($choices)){
				$output = $output .
				'<li class="radio-option-item1">
					<div class="responsiveInnerRadio">
						<span class="radioButt">
							<input class="answer_radiobox" type="radio" name="user_choice" value="'.$choicesData['choice_id'].'"><span class="customRadio"></span>
						</span>
						<div class="choice-paragraph">
							'.$choicesData['choice'].'
						</div>
					</div>
				</li>';
			}
			$output = $output . '</ul>';
			echo $output;
    }else{
    echo -1;
  }
	}

}
elseif(isset($_GET['action']) && $_GET['action'] == "get-quiz-stats" && is_ajax()
	&& isset($_POST['topic'])
	&& !empty($_POST['topic'])
){
	$topic = db_escapeString($_POST['topic']);
	$totalQuestions = $quizManager->getTotalQuestions($topic);

	$status = 1;
	$error = "";

	echo json_encode(
			array(
				'status' =>$status ,
				'error' => $error,
				'totalQuestions' => $totalQuestions
			)
		);

}


?>
