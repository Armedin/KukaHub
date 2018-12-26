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
		echo '
		<div class="taskEnded_n3dzx">
			<img class="taskCompletion-avatar_n3dzx" src="'.pro_pic_stat_destination(). get_profile_picture(getSessionUser_id()).'">
			<div class="banner-pe23x27">Congratulations!</div>
			<div class="taskEnded_desciptn3dzx">
				<div class="points0yk_sum8p">
					You got <span class="text-darkgreen"><span class="tot_points">'.$totalPoints.'</span> points</span>
				</div>
				<div class="all-questionsptn_8ehjex">
					<div class="questionptn_8ehjex">
						<div class="questionptnText_8ehjex">
							<div class="questionptnTitle_d93hdn">
								<span class="questionptnTitleDesc_d93hdn">Points for questions</span>
								<span class="dots_notgy9e">..............................................................................................................................................................................</span>
							</div>
							<div class="questionDescription_65iht">
							'.$correct_answers.' problems answered correctly
							</div>
						</div>
						<div class="questionptn-right_8ehjex">
							<div class="points_achi09pg">+'.$points.'</div>
						</div>
					</div>
					<div class="questionptn_8ehjex">
						<div class="questionptnText_8ehjex">
							<div class="questionptnTitle_d93hdn">
								<span class="questionptnTitleDesc_d93hdn">Points for completion</span>
								<span class="dots_notgy9e">..............................................................................................................................................................................</span>
							</div>
							<div class="questionDescription_65iht">
							First time completing this quiz
							</div>
						</div>
						<div class="questionptn-right_8ehjex">
							<div class="points_achi09pg">+150</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
		$(".tot_points").each(function(){
      $(this).prop("Counter", 0).animate({
        Counter: $(this).text()
      },{
        duration: 1000,
        easing: "swing",
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });
    });
		</script>';
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
