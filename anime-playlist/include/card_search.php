<?php
include 'cardModule.php';
include '../../include/init_constantFunctions.php';

if(isset($_GET['action']) && $_GET['action'] == "search-cards"
&& is_ajax()
&& isset($_POST['user_id'])
&& !empty($_POST['user_id']))
{
  $user_id = db_escapeString($_POST['user_id']);
  $userDB = db_query("SELECT * FROM card_game WHERE user_id = '$user_id'");
  $userDBInfo = mysqli_fetch_assoc($userDB);
  if($userDBInfo){
    $json_string = json_decode(file_get_contents('cardData.json'), true);
    $data = json_encode(array('code'=>"1",'data'=>$userDBInfo['cardsID'],'cardCount'=>$userDBInfo['cardCount'],
    'score'=>$userDBInfo['score'],'level'=>$userDBInfo['level'],'cardLength'=>count($json_string['cardData'])));
  }else{
    $data = json_encode(array('code'=>"2"));
  }
  echo $data;
}

 ?>
