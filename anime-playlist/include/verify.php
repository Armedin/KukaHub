<?php


////////////////////////////////
      //// AJAX LOGIN FOR ANIME PLAYLIST////
///////////////////////////////

require '../../include/init_constantFunctions.php';

if(isset($_GET['action']) && $_GET['action'] == "login" && is_ajax()
    && isset($_POST['username'])
		&& isset($_POST['password'])
		&& !empty($_POST['username'])
		&& !empty($_POST['password'])){

      $status = 1;
		  $error = '';
      // change character set to utf8 and check it
		if (!mysqli_set_charset(db_connect(), 'utf8')) {
			$error = mysqli_error(db_connect());
			$status = 0;
		}

    if (!mysqli_connect_errno(db_connect())) {

      $username = db_escapeString($_POST['username']);
      $check_username = db_query("SELECT ID, username, password, email FROM User WHERE username = '$username' || email = '$username'");

      if(mysqli_num_rows($check_username) == 1){

        $row = mysqli_fetch_assoc($check_username);
        $user_id = $row['ID'];

        if (password_verify($_POST['password'], $row['password'])) {

          $token = bin2hex(openssl_random_pseudo_bytes(32));
          db_query("UPDATE User SET token = '$token' WHERE ID = '$user_id'");
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_token'] = $token;
        }else{
          $error = "Wrong password. Please try again";
          $status = 0;
        }
      }else{
        $error = 'We could not find any user.';
				$status = 0;
      }

    }else{
      $error = 'Database connection problem.';
			$status = 0;
    }

    echo json_encode(
				array(
					'status' => $status,
					'error' => $error,
				)
			);

}

elseif(isset($_GET['action']) && $_GET['action'] == 'register' && is_ajax()){

  $error = '';
  $status = 1;

  if(empty($_POST['email'])){
    $error = 'Please enter your email address.';
    $status = 0;
  } elseif (empty($_POST['password']) || empty($_POST['repassword'])){
    $error = 'Please enter your password.';
    $status = 0;
  } elseif (strlen($_POST['password']) < min_pass_length()){
    $error = 'Your password must be at least' .min_pass_length().' characters.';
    $status =0;
  } elseif (strlen($_POST['username']) < min_username_length()){
    $error = 'Your username must be at least '. min_username_length().'characters';
    $status =0;
  } else if(strlen($_POST['password'])> max_pass_length()){
    $error = 'Your password can not be longer than '.max_pass_length().' characters.';
    $status = 0;
  } else if(strlen($_POST['username'])> max_username_length()){
    $error = 'Your username can not be longer than '.max_username_length().' characters.';
    $status = 0;
  } elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['username'])) {
    $error = 'Username can not include special characters.';
    $status = 0;
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid Email address.';
    $status = 0;
  } elseif (!empty($_POST['email'])
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    && !empty($_POST['password'])
    && !empty($_POST['repassword'])
    && strlen($_POST['password']) <= max_pass_length()
    && strlen($_POST['password']) >= min_pass_length()
    && ($_POST['password'] === $_POST['repassword'])
    && !empty($_POST['username'])
    && strlen($_POST['username']) <= max_username_length()
    && strlen($_POST['username']) >= min_username_length()
  ) {

      // change character set to utf8 and check for errors
      if (!mysqli_set_charset(db_connect(), 'utf8')) {
          $error = mysqli_error(db_connect());
          $status = 0;
      }

      if(!mysqli_errno(db_connect())){
        $username = db_escapeString($_POST['username']);
        $user_email = db_escapeString($_POST['email']);

        // Hashing password!
        $user_password = db_escapeString($_POST['password']);
        $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
        $escaped_hash = db_escapeString($user_password_hash);

        //Check for duplicate
        $check_email_query = db_query("SELECT * FROM User WHERE email = '$user_email'");
        $check_username_query = db_query("SELECT * FROM User WHERE username = '$username'");


        if(mysqli_num_rows($check_email_query) == 1){
          $error = 'This email is already in use.';
          $status = 0;
        } elseif(mysqli_num_rows($check_username_query) == 1){
          $error = 'This username is already is use';
          $status = 0;
        }else{
          // We are good to go !
          $time = time();

          $register_user = db_query("INSERT INTO User (username, password, email, registration_date)
          VALUES ('$username', '$escaped_hash', '$user_email', '$time')");

          if($register_user){
            $token = bin2hex(openssl_random_pseudo_bytes(32));    // Create a new Token
            $user_id = mysqli_insert_id(db_connect());    // Get the User ID
            $activation_key = bin2hex(openssl_random_pseudo_bytes(24)); // Activation Code
            $valid_time = strtotime("+7 days", time()); // Activation code valid time
            //check if Email Activation is required!
            if(user_activation_required()){
              db_query("INSERT INTO `user_activation` (`user_id`, `activation_code`, `valid_time`)
              VALUES('$user_id', '$activation_code', '$valid_time')");
              db_query("UPDATE User SET token = '$token', activation = 0 WHERE ID = '$user_id'");
            }else{
                db_query("UPDATE User SET token = '$token', activation = 1 WHERE ID = '$user_id'");
            }

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_token'] = $token;
            $status = 1;

            // if(isset($_POST['redict_location'])) {
            //   $redirect = $_POST['redict_location'];
            // }else{
            //   $redirect = 'https://www.kukahub.com';
            // }
            //header("Location: ".$redirect);
            //exit();
            
            $status = 1;
          }else{
            $error = 'We could not register. Please try again.';
            $status = 0;
          }
         }
       }
     }



 echo json_encode(
     array(
       'status' =>$status ,
       'error' => $error
     )
   );
}
?>
