<?php

include('../../include/init_constantFunctions.php');
if(is_ajax()
  && isset($_POST['user_id'])
  && isset($_POST['username'])
  && isset($_POST['token'])
  && !empty($_POST['user_id'])
  && !empty($_POST['username'])
  && !empty($_POST['token'])
){

  $status = 0;
  $error = '';
  $token = db_escapeString($_POST['token']);
  $username = db_escapeString($_POST['username']);
  $user_id = db_escapeString($_POST['user_id']);


  if(getToken($user_id) == $token){
    if(getUser_name_ById($user_id) == $username){
      $status = 1;
      $error = 'WORKS !!!';
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
