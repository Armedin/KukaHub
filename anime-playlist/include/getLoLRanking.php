<?php
require 'constantFunctions.php';
require 'lol.api.php';
if(isset($_GET['action']) && $_GET['action'] == 'get-top-ranking' && is_ajax()){

  $error = '';
  $status = 0;
  $data = array();

  $lol = new lol();
  $u = $lol->getUser("FNC Kuka");
  $userInfo = $lol->returnAllData();
  $error = $u;

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'userInfo'=>$userInfo
      )
    );

}

?>
