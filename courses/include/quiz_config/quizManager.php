<?php

include('../../../include/init_constantFunctions.php');

class quizManager{

	public function getTotalQuestions($topic){
    $query = db_query("SELECT * FROM quiz_question WHERE quiz_question.is_active='1' AND quiz_question.topic='$topic'");
    $totResult = mysqli_num_rows($query);
    return $totResult;
	}

	public function getQuestion($questionNumber,$topic){
		$sql = db_query("SELECT * FROM quiz_question WHERE quiz_question.is_active='1'
    AND quiz_question.topic='$topic' AND quiz_question.question_id='$questionNumber'");
		$question = mysqli_fetch_assoc($sql);
		return $question;
	}

	public function getQuestionChoices($questionNumber,$topic){
		$sql = db_query("SELECT * FROM quiz_question_choices INNER JOIN quiz_question ON quiz_question_choices.question_id =
    quiz_question.question_id WHERE (quiz_question.question_id='$questionNumber' AND quiz_question.topic = '$topic') ORDER BY RAND()");
		return $sql;
	}


	public function getRightAnswer($questionNumber,$topic){
		$sql = db_query("SELECT * FROM quiz_question_choices INNER JOIN quiz_question ON
    (quiz_question_choices.question_id = quiz_question.question_id AND quiz_question_choices.is_right_choice='1')
    WHERE (quiz_question.question_id='$questionNumber' AND quiz_question.topic = '$topic')");
		$resultCheck = mysqli_num_rows($sql);
		$rightChoice = "";
		if($resultCheck >0){
			while($row = mysqli_fetch_assoc($sql)){
				$rightChoice = $row['choice_id'];
			}
		}
		return $rightChoice;
	}

	public function getUserChoice($questionNumber,$topic,$user_answer){
		$sql = db_query("SELECT * FROM quiz_question_choices INNER JOIN quiz_question ON (
      quiz_question_choices.question_id = quiz_question.question_id AND quiz_question_choices.choice_id = '$user_answer')
      WHERE (quiz_question.question_id='$questionNumber' AND quiz_question.topic = '$topic')");
		$resultCheck = mysqli_num_rows($sql);
		$selectedChoice = "";
		if($resultCheck >0){
			while($row = mysqli_fetch_assoc($sql)){
				$selectedChoice = $row['choice_id'];
			}
		}
		return $selectedChoice;
	}

	public function endQuiz($topic){
		$sql = db_query("UPDATE quiz_question SET quiz_question.is_active='0' WHERE quiz_question.is_active='1' AND
      quiz_question.topic='$topic'");
	}
}
?>
