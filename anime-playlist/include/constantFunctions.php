<?php

require dirname(__DIR__).'../../include/init_constantFunctions.php';


function getUserSideMenu(){
  echo '<div class="sidemenu_user_piCont">
    <div class="dropdown_wrapper">
      <div>
        <a class="avatar_anchor" href="#">
          <span class="pro_pic_avatar">
            <img src="'.pro_pic_stat_destination() . get_profile_picture(getSessionUser_id()).'">
          </span>
        </a>
      </div>
      <a class="avatar_info">
        <span class="avatar_username">'.getUser_name_ById(getSessionUser_id()).'</span>
        <span class="avatar_title">Ultra Weeb</span>
      </a>
    </div>
    <div class="line_seperator"></div>
  </div>';
}


function getLoginMenu(){
  echo ' <div class="fadeIn modal_SignInBox" id="modal_SignInBox">
      <div class="heading">
        <h2>Login</h2>
      </div>
      <form class="signIn_form">
        <div class="form_input">
          <input autocomplete="off" type="text" name="usename" id="username" placeholder="Username">
        </div>
        <div class="form_input">
          <input autocomplete="off" type="password" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="login_submit btn_dis">Login</button>
        <div class="login_help_options">
          <a href="signup.php?redict_location='.urlencode($_SERVER['REQUEST_URI']). ' " class="register_btn">Register</a>
          <a href="#" class="forget_pass_btn">Forgot password?</a>
        </div>
      </form>
      <div class="other_socialLogin">
        <span class="otherTxt">Other Methods(Coming Soon)</span>
        <a class="qq_login social_login"><i class="fab fa-qq"></i></a>
        <a class="wechat_login social_login"><i class="fab fa-weixin"></i></a>
      </div>
    </div>';
}


function getHeaderMainNav($version){

  echo '<div class="main_084nv9vnr_o_O_top_header">
    <a href="index.php" class="navbar_home">
      <img src="https://www.kukahub.com/dist/img/facilities/'.(($version==1)?"kukahub-logo.png":"kukahub-logo-white.png").'">
      <span>Ongaku</span>
    </a>
  </div>

  <div class="navbar_084nv9vnr_o_O_collapse">
    <form class="song_search_form" id="song_search_form" method="post" role="search">
      <div class="search_songs_inputContainer">
        <input type="search" class="searchbox" name="search_song" id="search_song" autocomplete="off" placeholder="Search Musics...">
        <span class="search_icon"><i class="fal fa-search"></i></span>
        <ul class="autocomplete-songs">

        </ul>
      </div>
    </form>
  </div>';

  if(!isUserLoggedIn()){
    echo'
    <ul class="navbar_084nv9vnr_o_O_rightContent">
      <li class="login_actions">
        <a href="#" class="login_link" data-target="#modal_SignInBox">Login or Register</a>
      </li>
    </ul>';
  }else{
    echo '<div class="user_menu_084nv9vnr_o_O_cont navbar_084nv9vnr_o_O_rightContent">
      <div class="dropdown_cont">
        <a href="javascript:void(0)">
          <img src="'.pro_pic_stat_destination() . get_profile_picture(getSessionUser_id()).'">
        </a>
        <div class="dropdown-menu">
          <li><a href="profile.php">Profile</a></li>
          <li><a href="#">My Playlists</a></li>
          <li><a href="#">My Tracks</a></li>
          <li class="menu_nav">
            <a href="profile_settings.php"><i class="fal fa-user"></i>Settings</a>
            <a id="logout_btn"><i class="fal fa-sign-out"></i>Logout</a>
          </li>
        </div>
      </div>
    </div>';
  }

}


function getUserAccountInfo($user_id){
  $user_id = db_escapeString($user_id);
	$query = db_query("SELECT * FROM user_accounts WHERE userID = '$user_id' LIMIT 1");
	$row = mysqli_fetch_assoc($query);
	$user_info = array();

  $user_info['osu'] = explode(",",$row['osu_username']);
	$user_info['lol'] = explode(",",$row['lol_username']);
	$user_info['discord'] = explode(",",$row['discord_username']);
	return $user_info;
}

function accountActivate($account){

  if(isset($account[1])){ //If it's not set, that that means there's no userName input in db ;)
    if($account[1] == 1){
      return '<span><i class="fas fa-shield-check success_icon labelIcon"></i></span>';
    }
    else{
      return '<span><i class="fas fa-exclamation-triangle error_icon labelIcon"></i></span>';
    }
  }else{
    return null;
  }

}





 ?>
