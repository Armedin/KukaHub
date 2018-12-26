<?php

  require __DIR__.'/init_constantFunctions.php';


if(isset($_GET['action']) && $_GET['action'] == "add-friend" && is_ajax()
  && isset($_POST['user_id'])
  && isset($_POST['username'])
  && isset($_POST['token'])
  && isset($_POST['target_id'])
  && !empty($_POST['username'])
  && !empty($_POST['user_id'])
  && !empty($_POST['token'])
  && !empty($_POST['target_id'])
){
  $user_id = db_escapeString($_POST['user_id']);
  $token = db_escapeString($_POST['token']);
  $target_id = db_escapeString($_POST['target_id']);
  $username = db_escapeString($_POST['username']);

  if($token == getToken($user_id)){
    if(getUser_name_ById($user_id) == $username){

      $check_exist = db_query("SELECT ID FROM User WHERE ID = '$target_id'");
      if(mysqli_num_rows($check_exist) == 0){
        echo "error4";
      }else{
        $query = db_query("SELECT ID FROM user_friend WHERE (user1 = '$user_id' AND user2 = '$target_id')
          UNION SELECT ID FROM user_friend WHERE (user1 = '$target_id' AND user2= '$user_id')");
        if(mysqli_num_rows($query) == 0){
            db_query("INSERT INTO user_friend (user1, user2, accepted, request_status) VALUES ('$user_id', '$target_id', 0, 0)");
            echo "done";
        }else{
          echo "error1";
        }
      }
    }else{
      echo "error2";
    }
  }else{
    echo "error3";
  }
}

//////////////////////////////////////////////
/////////// ACCEPT FRIEND REQ /////////////
//////////////////////////////////////////////

elseif (isset($_GET['action']) && $_GET['action'] == "accept-request" && is_ajax()
    && isset($_POST['user_id'])
    && isset($_POST['username'])
    && isset($_POST['token'])
    && isset($_POST['target_id'])
    && !empty($_POST['username'])
    && !empty($_POST['user_id'])
    && !empty($_POST['token'])
    && !empty($_POST['target_id'])
){
  $user_id = db_escapeString($_POST['user_id']);
  $username = db_escapeString($_POST['username']);
  $token = db_escapeString($_POST['token']);
  $target_id = db_escapeString($_POST['target_id']);

  if($token == getToken($user_id)){
    if(getUser_name_ById($user_id) == $username){

      $check_exist = db_query("SELECT ID FROM User WHERE ID = '$target_id'");
      if(mysqli_num_rows($check_exist) == 0){
        echo "User not found! Please try again later.";
      }else{
        $query = db_query("SELECT ID FROM user_friend WHERE (user1 = '$user_id' AND user2 = '$target_id' AND accepted='0') UNION
                          SELECT ID FROM user_friend WHERE (user1 = '$target_id' AND user2= '$user_id' AND accepted='0') LIMIT 1");

        if(mysqli_num_rows($query) >0){
          db_query("UPDATE user_friend SET accepted = '1' WHERE (user1 = '$target_id' AND user2 = '$user_id')");
          echo "done";
        }else{
          echo "Unknown error has occured!";
        }
      }
    }else{
      echo "Invalid username! Please try again later.";
    }
  }else{
    echo "Invalid token! Please try again later";
  }
}

//////////////////////////////////////////////
/////////// REJECT FRIEND REQ /////////////
//////////////////////////////////////////////

elseif (isset($_GET['action']) && $_GET['action'] == "reject-request" && is_ajax()
    && isset($_POST['user_id'])
    && isset($_POST['username'])
    && isset($_POST['token'])
    && isset($_POST['target_id'])
    && !empty($_POST['username'])
    && !empty($_POST['user_id'])
    && !empty($_POST['token'])
    && !empty($_POST['target_id'])
){
  $user_id = db_escapeString($_POST['user_id']);
  $username = db_escapeString($_POST['username']);
  $token = db_escapeString($_POST['token']);
  $target_id = db_escapeString($_POST['target_id']);

  if($token == getToken($user_id)){
    if(getUser_name_ById($user_id) == $username){

      $check_exist = db_query("SELECT ID FROM User WHERE ID = '$target_id'");
      if(mysqli_num_rows($check_exist) == 0){
        echo "User not found! Please try again later.";
      }else{
        $query = db_query("SELECT ID FROM user_friend WHERE (user1 = '$user_id' AND user2 = '$target_id' AND accepted='0') UNION
                          SELECT ID FROM user_friend WHERE (user1 = '$target_id' AND user2= '$user_id' AND accepted='0') LIMIT 1");

        if(mysqli_num_rows($query) > 0){
          db_query("DELETE FROM user_friend WHERE user1 = '$target_id' AND user2 = '$user_id' AND accepted = '0'");
          echo "done";
        }else{
          echo "Unknown error has occured!";
        }
      }
    }else{
      echo "Invalid username! Please try again later.";
    }
  }else{
    echo "Invalid token! Please try again later";
  }
}

//////////////////////////////////////////////
/////////// CHECK FRIEND REQS /////////////
//////////////////////////////////////////////

elseif (isset($_GET['action']) && $_GET['action'] == "get-friend-requests" && is_ajax()
    && isset($_POST['user_id'])
    && isset($_POST['username'])
    && isset($_POST['token'])
    && !empty($_POST['username'])
    && !empty($_POST['user_id'])
    && !empty($_POST['token'])
){


  $user_id = db_escapeString($_POST['user_id']);
  $username = db_escapeString($_POST['username']);
  $token = db_escapeString($_POST['token']);

  $status = 0;
  $error = ' ';
  $output = '';

  if($token == getToken($user_id)){
    if(getUser_name_ById($user_id) == $username){

      $query = db_query("SELECT ID FROM user_friend WHERE user2='$user_id' AND request_status='0'");
      $rows = mysqli_num_rows($query);
      //Check request_status for nr of friend requests and set it back to 1
    	if($rows == 0){
    		$output = '<li class="messages-header">
    									 <h4>No New Friend Requests</h4>
    							 </li>';
    	}else{
    		$output = '<li class="messages-header">
    									  <h4>'.$rows.' New Friend Requests.</h4>
    							</li>';
        db_query("UPDATE user_friend SET request_status='1' WHERE user2='$user_id' AND request_status='0'");
    	}

      $query2 = db_query("SELECT user1 FROM user_friend WHERE user2 = '$user_id' AND accepted = '0'");
    	while($row = mysqli_fetch_assoc($query2)){

    	$friend_id = $row['user1'];

    	$friend_pro_pic = pro_pic_stat_destination() . get_profile_picture($friend_id);
    	$friend_username = getUser_name_ById($friend_id);
      $output.='<li class="messages-body">
    								<div class="friend_request_card_int">
    										<div class="friend_req_inner_wrapper">
    								  		<a href="profile.php?id='.$friend_id.'"><img src="'.$friend_pro_pic.'"></a>
    											<div class="friend_req_context">
    												<h6>'.$friend_username.'</h6>
    												<span>'.$friend_username.' has required to be friend with you</span>
    												</div>
    										</div>
    										<div class="friendrequest friend_req_btn_cont">
    											<button class="btn acceptFriend" id="accept-request" attr-id="'.$friend_id.'">Accept</button>
    											<button class="btn rejectFriend" id="reject-request" attr-id="'.$friend_id.'">Reject</button>
    										</div>
    								 </div>
    					  </li>';
    }
    $status = 1;
    }else{
      $error = 'Invalid username! Please try again later.';
    }
  }else{
    $error = 'Invalid token! Please try again later.';
  }

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'output' => $output
      )
    );
}

////////////////////////////////////////////////////////
/////////// GET UNSEEN FRIEND REQUESTS /////////////
///////////////////////////////////////////////////////

elseif (isset($_GET['action']) && $_GET['action'] == "get-unseen-friend-requests" && is_ajax()
    && isset($_POST['user_id'])
    && isset($_POST['username'])
    && isset($_POST['token'])
    && !empty($_POST['username'])
    && !empty($_POST['user_id'])
    && !empty($_POST['token'])
){

  $user_id = db_escapeString($_POST['user_id']);
  $username = db_escapeString($_POST['username']);
  $token = db_escapeString($_POST['token']);

  if($token == getToken($user_id)){

    if(getUser_name_ById($user_id) == $username){

      $query = db_query("SELECT * FROM user_friend WHERE user2 = '$user_id' AND request_status = '0'");

      $rows = mysqli_num_rows($query);
      $output = '';
      if($rows == 0){
        echo "null";
      }else{
        echo $rows;
      }

    }else{
      echo "null";
    }
  }else{
    echo "null";
  }

}



?>
