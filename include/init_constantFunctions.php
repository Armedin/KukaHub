<?php

session_start();
// $_SERVER['DOCUMENT_ROOT'] not working !!!
define("ROOT_DIR", "/KukaHub");

//PHP Mailer
include 'PHPMailer/PHPMailer.php';
include 'PHPMailer/SMTP.php';
include 'PHPMailer/Exception.php';

define('EMAIL_HOST', 'kukahub.com'); 	// Email host address
define('EMAIL_USERNAME', 'armedin.kuka@kukahub.com');	// Email user name
define('EMAIL_PASSWORD', 'naruto10');	// Email password
define('EMAIL_SMTP_SECURE', 'TLS');	// TLS or SSL
define('EMAIL_PORT', '587');	// Email port
define('EMAIL_ADDRESS', 'armedin.kuka@kukahub.com');	// Email address
define('EMAIL_NAME', 'KukaHub');	// Email name


//Check if php version is lower than 5.5.0 and dispaly error!
if (version_compare(PHP_VERSION, '5.5.0', '<')) {
	die("<div style='position:absolute;top:0;left:0;background-color:white;width:100%;height:100%;z-index:999;'><b>Error:</b> Your PHP Version cannot be lower than 5.5.0!</div>");
}



//////////////////////////////////
/////////// DATABASE /////////////
//////////////////////////////////

function db_connect()
{
    static $connection;
    if (!isset($connection)) {
	  $serverName = "127.0.0.1";
		$serverUsername = "root";
		$serverPassword = "";
		$serverDatabase="kukahub";
		$connection=mysqli_connect($serverName, $serverUsername, $serverPassword, $serverDatabase);
    }

    if ($connection === false) {
        return mysqli_connect_error();
    }

    return $connection;
}

function db_query($query)
{
    $connection = db_connect();
    mysqli_query($connection, "set names 'utf8'");
    $result = mysqli_query($connection, $query);
    return $result;
}

function db_escapeString($value)
{
    return mysqli_real_escape_string(db_connect(), $value);
}



////////////////////////////////////////////////////////
/////////// INCLUDING CONSTANT THEME STUFF /////////////
////////////////////////////////////////////////////////
function getHeader($title){

  echo '<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="og:url" content="http://www.kukahub.com"/>
	<meta property="og:type" content="non_profit"/>
	<meta property="og:title" content="KukaHub"/>
	<meta property="og:description" content="Learn or improve your mathematics and programming skills. KukaHub provides free courses for
	every level from beginner to intermediate.">

	<meta name="twitter:site" content="@kukahub">
	<meta name="twitter:title" content="KukaHub">
	<meta name="twitter:description" content="Learn or improve your mathematics and programming skills. KukaHub provides free courses for
	every level from beginner to intermediate..">

	<meta itemprop="name" content="KukaHub">
	<meta itemprop="description" content="The newest platform to study maths and programming for every level. Supports social networking for
	people to communicate and take on challenges together.">


  <link rel="stylesheet" href="'.ROOT_DIR.'/dist/css/main.css">
  <link rel="icon" href="'.ROOT_DIR.'/dist/img/facilities/kukahub-logo.png" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Roboto" rel="stylesheet">
	<link rel="stylesheet" id="redux-google-fonts-stm_option-css"
		href="http://fonts.googleapis.com/css?family=Montserrat%3A200%2C500%2C600%2C400%2C700%7COpen+Sans%3A300%2C400%2C600%2C700%2C800%2C300italic%2C400italic%2C600italic%2C700italic%2C800italic&#038;subset=latin&#038;ver=1536658178"
		 type="text/css" media="all" />
	<link rel="stylesheet" id="redux-google-fonts-stm_option-css"
		href="http://fonts.googleapis.com/css?family=Montserrat%3A200%2C500%2C600%2C400%2C700%7COpen+Sans%3A300%2C400%2C600%2C700%2C800%2C300italic%2C400italic%2C600italic%2C700italic%2C800italic&#038;subset=latin&#038;ver=1536658178"
		 type="text/css" media="all" />
  <link href="'.ROOT_DIR.'/dist/fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="'.ROOT_DIR.'/dist/jQueryUI/jquery-ui.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>'.$title.'</title>';
}

function getJs_Files(){
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
  <script src="'.ROOT_DIR.'/dist/js/main.js"></script>
	<script src="'.ROOT_DIR.'/dist/jqueryUI/jquery-ui.min.js"></script>
	';


	if(isUserLoggedIn()){

		$user_name = getSessionUser_name();
		$user_id =getSessionUser_id();
		$token = getToken($user_id);
		$email = getEmail($user_id);
		echo '<script type="text/javascript">
					var username="'.$user_name.'",
						user_id="'.$user_id.'",
						email="'.$email.'",
						token="'.$token.'";
					</script>';

	}
}

function init_pageSidebar(){

  echo '  <div class="page-sidebar">
      <div class="header-logo">
				<a href="../index.php" class="logo-image">
          <img src="'.ROOT_DIR.'/dist/img/facilities/kukahub-logo.png">
          <span>KukaHub</span>
        </a>
				<a href="#" class="sidebar-toggler sidebar-mainToggler"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</div>
			<div class="sidebar-content">
			 	<div class="sidebar-userContainer">
			 		<div class="sidebar-userInfo">

			 		</div>
			 	</div>
        <div class="main-menu">
          <div class="slim-scroller">
				     <ul>
					     <li class="list-header"><span>Applications</li>
					     <li><a href="#" id="dashboard"><i class="fab fa-dashcube"></i>Dashboard</a></li>
					     <li><a href="#" id="calendar"><i class="fa fa-calendar-alt"></i>Calendar</a></li>
					     <li><a href="#" id="timetable"><i class="far fa-clock"></i>Timetable</a></li>
				    	 <li><a href="#" id="contacts"><i class="fa fa-phone-volume"></i>Contacts</a></li>
					     <li><a href="fileManager.php" id="fileManager"><i class="fa fa-folder"></i>File Manager</a></li>
					    <li><a href="all-courses.php" id="learn" ><i class="fa fa-book"></i>Learn</a></li>
			     	</ul>
          </div>
      </div>
		</div>
  </div>';
}

//Navbar friend request btn
function include_friendReq_btn(){
	if(isUserLoggedIn()){
		return '
		<div id="friendRequest-btn" class=" friendRequest-btn dropdown">
			<button type="button" class="btn">
				<i class="fas fa-users" aria-hidden="true"></i>
				'.check_unread_friend_request(getSessionUser_id()).'
			</button>
			<div class="dropdown-menu friendRequestMenu">
				<div class="notificationsHeader">Friend Requests</div>
				<ul class="friendReqMenu">
					'.check_friend_requests(getSessionUser_id()).'
				</ul>
			</div>
		</div>
		';
	}

}

//Navbar notification btn
function include_notification_btn(){
	if(isUserLoggedIn()){
		return '
		<div class="dropdown notifications-btn" id="#notifications-btn">
			<button type="button" class="btn">
				<i class="fa fa-fw fa-bell"></i>
				<span class="badge unreadNot">4</span>
			</button>
			<div class="dropdown-menu notificationMenu">
				<div class="notificationsHeader">Notifications</div>
				<ul>
					<li>
						<a>
							<div class="notIcon"><i class="fa fa-fw fa-user-plus friendReqIcon"></i></div>
							<div class="notInfo">
								<div class="notCont">Kuka send you a friend request</div>
								<div class="notTime">6 min ago</div>
							</div>
						</a>
					</li>
					<li>
						<a>
							<div class="notIcon"><i class="fa fa-fw fa-user-plus friendReqIcon"></i></div>
							<div class="notInfo">
								<div class="notCont">Kuka send you a friend request</div>
								<div class="notTime">6 min ago</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="view_vip23b_All">
					<a class="btn"><i class="fa fa-fw fa-eye"></i>View All</a>
				</div>
			</div>
		</div> ';
	}
}

//Navbar user menu btn
function include_userMenu_btn(){

	if(isUserLoggedIn()){

		$user_id = getSessionUser_id();
		$user_info = get_user_info($user_id);
		$user_email = getEmail($user_id);

		return '<div class="user_menu_ophf39v4_Cont">
			<div class="dropdown" id="user-btn">
				<a class="user_ophf39v4_menu">
					<img src="'.pro_pic_stat_destination() . get_profile_picture($user_id).'">
					<span class="user_ophf39v4_name">'.$user_info['firstname'].'</span>
					<i class="fa fa-fw fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu user_profileInfo_cont">
					<li class="user_ophf39v4_profileInfo">
						<img src="'.pro_pic_stat_destination() . get_profile_picture($user_id).'">
						<h3>'.$user_info['firstname'] . ' ' .$user_info['lastname'].'</h3>
						<span class="user_ophf39v4_address">'.$user_email.'</span>
						<a href="'.ROOT_DIR.'/profile.php?id='.$user_id.'" class="viewProfile_ophf39v4_btn successfull">View Profile</a>
					</li>
					<ul class="user_ophf39v4_optionsList">
						<li><a href="'.ROOT_DIR.'/profile.php?id='.$user_id.'"><i class="fa fa-user"></i>My Profile</a></li>
						<li><a href="#"><i class="fa fa-inbox"></i>My Inbox</a></li>
						<li><a href="#"><i class="fa fa-trophy"></i>My Achievements</a></li>
					</ul>
					<li class="account_settings_ophf39v4_btn"><a href="user-settings.php"><i class="fa fa-cogs"></i>Account Settings</a></li>
					<li class="account_logout_ophf39v4_btn"><a href="javascript:void(0)"><i class="fa fa-power-off"></i>Log Out</a></li>
				</ul>
			</div>
		</div>

		';
	}
}

//Navbar items for not logged in user (Right Side)
function include_notLogged_items(){
	if(!isUserLoggedIn()){
		return '
			<div class="header_section_ophf39v4_logoHeader">
				<a class="header_section_ophf39v4_logoItem_nav">
					<img src="'.ROOT_DIR.'/dist/img/facilities/kukahub-logo.png">
					<h1>KukaHub</h1>
				</a>
			</div>
			<div class="header_section_ophf39v4_optionsCont">
				<a class="header_section_ophf39v4_fullHeightNavItem open_ophf39v4_loginModel">Login</a>
				<a class="header_section_ophf39v4_fullHeightNavItem" href="register.php">Sign Up</a>
			</div>
		';
	}
}

// Logout interface

function include_logout_interface(){
	return '
	<div class="logout_0ngkev_o_O_cont">
		<div class="logout_0ngkev_o_O_body">
			<div class="logout_0ngkev_o_O_card">
				<div class="mes-header">
					<i class="fa fa-sign-out"></i>Log <strong>Out</strong>
				</div>
				<div class="mes-body">
					<p>Are you sure you want to log out? </p>
					<p>Press Yes if you want to logout and No if you want to continue your work.</p>
				</div>
				<div class="mes-footer">
					<form>
						<button name="submit" id="logout" class="logout_0ngkev_yes_btn">Yes</button>
						<button class="logout_0ngkev_no_btn">No</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	';
}

// Main Page Header Function !!!
function init_pageHeader(){

  echo '
  <div class="page-header">
    <div class="page-headerWrapper">
      <div class="page-navigation">
        <div>
          <div class="sidebar-mainToggler">
            <i class="fa fa-fw fa-bars"></i>
          </div>
          <div class="searchResults">
            <i class="fa fa-fw fa-search"></i>
          </div>
          '.include_friendReq_btn().
						include_notification_btn().'
        </div>
        '.include_userMenu_btn().
					include_notLogged_items().'
      </div>
    </div>
  </div>

  <form class="search_oexf98v3a_topBar">
    <input class="search_oexf98v3a_input" type="text" placeholder="Search ...">
    <button class="input_seach_oexf98v3a">
      <i class="fal fa-search"></i>
    </button>
    <button class="reset_oexf98v3a_search">
      <i class="fal fa-times"></i>
    </button>
  </form>
	'.loading_animation().'
  <div class="page_overlay"></div>
	'.include_logout_interface().'
  ';
}

function init_pageHeader_noSidebar(){
	echo '
  <div class="page-header">
    <div class="page-headerWrapper no_sidebar">
      <div class="page-navigation">
        <div>
          <div class="sidebar-mainToggler">
            <i class="fa fa-fw fa-bars"></i>
          </div>
          <div class="searchResults">
            <i class="fa fa-fw fa-search"></i>
          </div>
          '.include_friendReq_btn().
						include_notification_btn().'
        </div>
        '.include_userMenu_btn().
					include_notLogged_items().'
      </div>
    </div>
  </div>

  <form class="search_oexf98v3a_topBar">
    <input class="search_oexf98v3a_input" type="text" placeholder="Search ...">
    <button class="input_seach_oexf98v3a">
      <i class="fal fa-search"></i>
    </button>
    <button class="reset_oexf98v3a_search">
      <i class="fal fa-times"></i>
    </button>
  </form>
	'.loading_animation().'
  <div class="page_overlay"></div>
	'.include_logout_interface().'
  ';
}

function loading_animation(){
	echo '
			<div class="page_ff0exef_o_O_loader">
				<div class="loader">
					<div class="loader_atom loader_atom_1sub"></div>
					<div class="loader_atom loader_atom_2sub"></div>
					<div class="loader_atom loader_atom_3sub"></div>
				</div>
			</div>
	';
}

function init_login_page(){
	echo '

	<div class="login_oexf98v3a_container closed">
	  <div class="login_oexf98v3a_containerInner">
	    <a class="login_oexf98v3a_close"><i class="fal fa-times"></i></a>
	    <div class="login_oexf98v3a_title">
	      <span>Sign In</span>
	    </div>
	    <form class="login_oexf98v3a_form">
	      <div class="login_oexf98v3a_form_input">
	        <span class="label-input">Username</span>
	        <input type="text" name="username" placeholder="Enter username">
	        <span class="focus_input"></span>
	      </div>
	      <div class="login_oexf98v3a_form_input">
	        <span class="label-input">Password</span>
	        <input type="password" name="password" placeholder="Enter password">
	        <span class="focus_input"></span>
	      </div>
	      <div class="login_oexf98v3a_twoActions_cont">
	        <a href="#" class="forgot_oexf98v3a_password">Forgot Password?</a>
	      </div>
	      <div class="login_oexf98v3a_form_btn">
	        <button>Login</button>
	      </div>
	    </form>
	  </div>
	</div>
	';
}


//////////////////////////////////////////////
/////////// REGISTRATION & LOGIN /////////////
//////////////////////////////////////////////

//Check if user is logged in
function isUserLoggedIn(){
	if(isset($_SESSION['user_id'])){
		return true;
	}
	else{
		return false;
	}
}

// Get user's name by id
function getUser_name_ById($user_id){
		$query = db_query("SELECT `username` FROM `User` WHERE `ID` = '$user_id' LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    return $row['username'];
}
// get Curernt User ID
function getSessionUser_id()
{
	if(isUserLoggedIn()){
	return $_SESSION['user_id'];
	}
}

//Username
function getSessionUser_name()
{
    if (isUserLoggedIn()) {
        $user_id = getSessionUser_id();
        $result = db_query("SELECT `username` FROM `User` WHERE `ID` = '$user_id'");
        $row = mysqli_fetch_assoc($result);

        return $row['username'];
    }
}

// User's Email Address
function getEmail($user_id)
{
        $user_id = db_escapeString($user_id);
        $result = db_query("SELECT `email` FROM `User` WHERE `ID` = '$user_id'");
        $row = mysqli_fetch_assoc($result);
        return $row['email'];
}

// Get User's Status
function getUser_status($user_id){
	if(isUserLoggedIn()){
		$result = db_query("SELECT `user_status` FROM `users` WHERE `user_id` = '$user_id'");
		$row = mysqli_fetch_assoc($result);

		return $row['user_status'];
	}
}

// Token
function getToken($user_id)
{
		$user_id = db_escapeString($user_id);
    $query = db_query("SELECT `token` FROM `User` WHERE `ID` = '$user_id' LIMIT 1");
    $row = mysqli_fetch_assoc($query);

    return $row['token'];
}

//Check if user's account is user_activation_required
function is_account_activated($user_id)
{
	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT `activation` FROM `User` WHERE `ID` = '$user_id' LIMIT 1");
	$row = mysqli_fetch_assoc($query);

	if($row['activation'] == 0){
		return false;
	}else{
		return true;
	}
}

function is_session_acccount_activated(){
	if(isUserLoggedIn()){
		$user_id = $_SESSION['user_id'];
		$query = db_query("SELECT `activation` FROM `User` WHERE `ID` = '$user_id' LIMIT 1");
		$row = mysqli_fetch_assoc($query);

		if($row['activation'] == 0){
			return false;
		}else{
			return true;
		}
	}
}

// Check if user has put his user_information

function is_user_information_registered(){
	if(isUserLoggedIn()){

		$user_id = $_SESSION['user_id'];
		$query = db_query("SELECT * FROM user_information WHERE user_id = '$user_id' LIMIT 1");
		$result = mysqli_num_rows($query);

		if($result > 0){
			return true;
		}else{
			return false;
		}
	}
}


//////////////////////////////////////////////
/////////// SOCIAL PROFILE FUNCTIONS /////////////
//////////////////////////////////////////////

function get_profile_picture($user_id){
	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT profile_pic FROM user_information WHERE user_id = '$user_id' LIMIT 1");
	$row = mysqli_fetch_assoc($query);
	return $row['profile_pic'];

}

function get_user_friends_number($user_id){
	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT * FROM user_friend WHERE (user1 = '$user_id' OR user2 = '$user_id') AND accepted = 1");
	$results = mysqli_num_rows($query);
	if($results>0){
		return $results;
	}else{
		return "000";
	}
}

function get_user_posts_number($user_id){
	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT * FROM user_post WHERE user_id = '$user_id'");
	$results = mysqli_num_rows($query);
	if($results>0){
		return $results;
	}else{
		return "000";
	}
}

function get_user_info($user_id){
	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT * FROM user_information WHERE user_id = '$user_id' LIMIT 1");
	$row = mysqli_fetch_assoc($query);
	$user_info = array();

	$user_info['firstname'] = $row['firstname'];
	$user_info['lastname'] = $row['lastname'];
	$user_info['gender'] = $row['gender'];
	$user_info['age'] = $row['age'];
	$user_info['phone_number'] = $row['phone_number'];
	$user_info['birthday'] = $row['birthday'];
	$user_info['location'] = $row['location'];
	$user_info['study_place'] = $row['study_place'];
	$user_info['biography'] = $row['biography'];

	return $user_info;
}

function add_friend_btn($target_id){
	$user_id = getSessionUser_id();
	$target_id = db_escapeString($target_id);

	$add_btn = "";
	$query = db_query("SELECT ID FROM user_friend WHERE (user1 = '$user_id' AND user2 = '$target_id')
		UNION SELECT ID FROM user_friend WHERE (user1 = '$target_id' AND user2= '$user_id')");
	if(mysqli_num_rows($query) == 0){
		$add_btn = '<a href="javascript:void(0)" id="add-friend" attr-id="'.$target_id.'" class="add_friend_btn">Add Friend</a>';
	}else{

		$query2 = db_query("SELECT accepted FROM user_friend WHERE (user1 = '$user_id' AND user2 = '$target_id')
			UNION SELECT accepted FROM user_friend WHERE (user1 = '$target_id' AND user2= '$user_id')");
		$result = mysqli_fetch_assoc($query2);
		$accepted = $result['accepted'];

		if($accepted == 1){
			$add_btn = '<a href="javascript:void(0)" id="pending-request" class="add_friend_btn">Remove Friend</a>';
		}else{
			$add_btn = '<a href="javascript:void(0)" id="pending-request" class="add_friend_btn">Pending Request</a>';
		}
	}

	return $add_btn;
}

function check_unread_friend_request($user_id){
		$user_id = db_escapeString($user_id);

		$query = db_query("SELECT * FROM user_friend WHERE user2 = '$user_id' AND request_status = '0'");
		$rows = mysqli_num_rows($query);
		$output = '';
		if($rows == 0){
			$output = '<span class="badge badge_no_display unreadFriendReq">'.$rows.'</span>';
		}else{
			$output = '<span class="badge unreadFriendReq">'.$rows.'</span>';
		}
		return $output;

}

function check_friend_requests($user_id){
	$user_id = db_escapeString($user_id);

	$output = '';
	$query = db_query("SELECT * FROM user_friend WHERE user2 = '$user_id' AND request_status = '0'");
	$rows = mysqli_num_rows($query);
	if($rows == 0){
		$output = '<li class="messages-header">
									 <h4>No New Friend Requests</h4>
							 </li>';
	}else{
		$output = '<li class="messages-header">
									  <h4>'.$rows.' New Friend Requests.</h4>
							</li>';
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
	return $output;
}

// Get User's Friend on the About User page (Left side)
function get_user_friends_about_profile($user_id){
	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT user_id FROM user_information INNER JOIN user_friend ON user_friend.user1 = user_information.user_id
		WHERE (user_friend.user2 = '$user_id' AND user_friend.accepted = 1) UNION SELECT user_id FROM user_information INNER JOIN user_friend ON
		user_friend.user2 = user_information.user_id WHERE (user_friend.user1 = '$user_id' AND user_friend.accepted = 1)
		ORDER BY RAND() LIMIT 5");

	$output = "";
	$res = mysqli_num_rows($query);
	if($res>0){
		$hr_counter = 0;
		while($row = mysqli_fetch_assoc($query)){

			$target_id = $row['user_id'];
			$user_info = get_user_info($target_id);

			$output = $output.
			'<div class="user_fi93v_o_O_exf02f_friend_card">
			    <div class="user_fi93v_o_O_exf02f_friend_card_inner">
						<a href="profile.php?id='.$target_id.'">
							<img src="'.pro_pic_stat_destination() . get_profile_picture($target_id).'">
						</a>
						<div class="friend_card_info">
							<h5>'.$user_info['firstname'].' ' .$user_info['lastname'].'</h5>
							<small>'.$user_info['biography'].'</small>
						</div>
					</div>
			</div>';

			$hr_counter ++;
			if($res != $hr_counter){
				$output = $output . "<hr>";
			}

		}
	}else{
		$output = '
		<div class="user_card_header_not_found_friends">
			<p>No friends found!</p>
			<img src="'.ROOT_DIR.'/dist/img/facilities/sad_face.svg">
		</div>';
	}
	return $output;
}

// Get User's Friend on the Friend Page
function get_user_friends_on_friend_page($user_id){

	$user_id = db_escapeString($user_id);
	$query = db_query("SELECT user_id FROM user_information INNER JOIN user_friend ON user_friend.user1 = user_information.user_id
		WHERE (user_friend.user2 = '$user_id' AND user_friend.accepted = 1) UNION SELECT user_id FROM user_information INNER JOIN user_friend ON
		user_friend.user2 = user_information.user_id WHERE (user_friend.user1 = '$user_id' AND user_friend.accepted = 1)
		ORDER BY RAND() LIMIT 5");

	$output = "";
	$res = mysqli_num_rows($query);
	if($res>0){
		while($row = mysqli_fetch_assoc($query)){
			$target_id = $row['user_id'];
			$user_info = get_user_info($target_id);

			$output = $output . '
				<div class="col-md-4 col-xs-6">
					<div class="user_fi93v_o_O_exf02f_friendsBox">
						<div class="friendBox_image">
							<img src="'.pro_pic_stat_destination() . get_profile_picture($target_id).'">
						</div>
						<div class="friendBox_info">
							<h3>'.$user_info['firstname'].' ' .$user_info['lastname'].'</h3>
							<span>'.getEmail($target_id).'</span>
						</div>
						<div class="friendBox_options">
							<a href="javascript:void(0)">
								<span><i class="fal fa-envelope>"></i>Message</span>
							</a>
							<a href="profile.php?id='.$target_id.'">
								<span><i class="fal fa-user-alt>"></i>Profile</span>
							</a>
						</div>
					</div>
				</div>
				';
		}
	}else{
		$output = '<h1>No Friend Found</h1>';
	}
	return $output;
}

//////////////////////////////////////////////
/////////// CONFIGURATE FUNCTIONS /////////////
//////////////////////////////////////////////



// Checks the connection if it is ajax
function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

//Whether the user has to activate his/her account_logout_ophf39v4_btn
function user_activation_required(){
		return false;
}

function min_pass_length(){
	return 6;
}

function max_pass_length(){
	return 99;
}

function min_username_length(){
	return 6;
}

function max_username_length(){
	return 55;
}

function img_types_accepted(){

	$types = "png|jpg|jpeg|PNG|JPG|JPEG";
	$extensions = explode('|', $types);
	$tot_ext = count($extensions);
	$array = array();

	for($i=0; $i<$tot_ext; $i++){
		$var = 'image/'.$extensions[$i];
		array_push($array, $var);
	}

	return $array;
}

function pro_pic_destination(){
	return getcwd().'/img/pro_pic/';
}

function pro_pic_stat_destination(){
	return ROOT_DIR . "/include/img/pro_pic/";
}

function def_pro_pic(){
	return "defaultProfilePicture.jpg";
}

function post_img_destination(){
	return './img/post_image/';
}
function post_img_stat_destination(){
	return ROOT_DIR . "/include/img/post_image/";
}





?>
