<?php
///////////////////////////////////
// Update User Profile //
///////////////////////////////////
require '../../include/init_constantFunctions.php';
require 'osu.api.php';

if (isset($_GET['action']) && $_GET['action'] == "accounts-update" && is_ajax()
&& isset($_POST['user_id'])
&& isset($_POST['token'])
&& !empty($_POST['user_id'])
&& !empty($_POST['token'])
){


$status = 1;
$error = '';
$data = array();

// change character set to utf8 and check for errors
if (!mysqli_set_charset(db_connect(), 'utf8')) {
    $error = mysqli_error(db_connect());
    $status = 0;
}

if(!mysqli_errno(db_connect())){

  $user_id = db_escapeString($_POST['user_id']);
  $token = db_escapeString($_POST['token']);

  if(getToken($user_id) == $token){

    $osuUsername = db_escapeString($_POST['osuUsername']);
    $lolUsername = db_escapeString($_POST['lolUsername']);
    $discordUsername = db_escapeString($_POST['discordUsername']);
    $myanimelistUserame = db_escapeString($_POST['myanimelistUserame']);


    if(!empty($osuUsername)){
      $osu = new osu();
      $osuResponse = $osu->getUser($osuUsername);
      if($osuResponse!=1){ // 0 -> Not found!
        $osuResponse = 0;
      }
      $osuUsername = $osuUsername.",".$osuResponse;
    }

    if(!empty($lolUsername)){
      $lolResponse = 0;
      $lolUsername = $lolUsername.",".$lolResponse;
    }

    if(!empty($discordUsername)){
      $discordResponse = 0;
      $discordUsername = $discordUsername.",".$discordResponse;
    }


    $sql = db_query("SELECT * FROM user_accounts WHERE userID = '$user_id'");
    $result = mysqli_fetch_assoc($sql);
    if(!$result){
      $sql=db_query("INSERT INTO user_accounts (userID,osu_username,lol_username,discord_username)
      VALUES('$user_id','$osuUsername','$lolUsername','$discordUsername')");
    }else{
      $query = db_query("UPDATE user_accounts SET osu_username='$osuUsername', lol_username = '$lolUsername', discord_username = '$discordUsername'
        WHERE userID = '$user_id' ");
    }

  }else{
    $status = 0;
    $error = "An unknown error has occured!";
  }

}else{
  $error = 'Database connection problem.';
  $status = 0;
}
echo json_encode(
    array(
      'status' =>$status ,
      'error' => $error,
      'data'=> $data
    )
);

}
?>
