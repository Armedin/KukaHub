<?php

include('../../include/init_constantFunctions.php');
include('courses_config/config_methods.php');

if(is_ajax()
  && isset($_POST['user_id'])
  && isset($_POST['username'])
  && isset($_POST['token'])
  && isset($_POST['lesson_id'])
  && isset($_POST['course_id'])
  && !empty($_POST['user_id'])
  && !empty($_POST['username'])
  && !empty($_POST['token'])
  && !empty($_POST['lesson_id'])
  && !empty($_POST['course_id'])
){

  $status = 0;
  $error = '';
  $token = db_escapeString($_POST['token']);
  $username = db_escapeString($_POST['username']);
  $user_id = db_escapeString($_POST['user_id']);
  $lesson_id = db_escapeString($_POST['lesson_id']);

  if(getToken($user_id) == $token){
    if(getUser_name_ById($user_id) == $username){
       if(!is_lesson_completed($user_id, $lesson_id)){
         $sql = db_query("INSERT INTO lessons_completed (userID, lessonID) VALUES ('$user_id', '$lesson_id')");
       }
       $status = 1;
    }else{
      $error = 'Invalid username! Please try again later.';
    }
  }else{
    $error = 'Invalid username! Please try again later.';
  }
  echo json_encode(
    array(
      'status' =>$status ,
      'error' => $error
    )
  );
}





 ?>
