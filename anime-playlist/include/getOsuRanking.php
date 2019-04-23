<?php
require 'constantFunctions.php';
require 'osu.api.php';
if(isset($_GET['action']) && $_GET['action'] == 'get-top-ranking' && is_ajax()){

  $error = '';
  $status = 0;
  $data = array();

  $osu = new osu();

  $sql = db_query("SELECT * FROM user_accounts WHERE osu_username<>'' ");
  $totRes = mysqli_num_rows($sql);

  if($totRes<1){
    $error = 'No User Found!';
  }else{

    while($result = mysqli_fetch_assoc($sql)){
      $osuInfo = explode(",",$result['osu_username']);
      $picDest = pro_pic_stat_destination() . get_profile_picture($result['userID']);
      $pro_pic = array("pro_pic"=>$picDest);
      $username = $osuInfo[0];
      $activated = $osuInfo[1];
      if($activated == 1){
        if($osu->getUser($username) == 1){
          $userInfo = $osu->returnAllData();
          array_push($userInfo,$pro_pic);
          array_push($data,$userInfo);
        }
      }
    }
    $status = 1;

  }

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'userOsuInfo' => $data
      )
    );

}

?>
