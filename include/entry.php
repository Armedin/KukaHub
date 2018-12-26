<?php

 //  PHP MAILER

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

  require __DIR__.'/init_constantFunctions.php';
  $username = getSessionUser_name();
  $user_id = getSessionUser_id();


  if(isset($_GET['action']) && $_GET['action'] == 'register' && is_ajax()){

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

              if(user_activation_required()){

                $mail = new PHPMailer(true);
                try {
                $mail->isSMTP();
                $mail->Host = EMAIL_HOST;
                $mail->SMTPAuth = true;
							  $mail->Username = EMAIL_USERNAME;
							  $mail->Password = EMAIL_PASSWORD;
						  	$mail->SMTPSecure = EMAIL_SMTP_SECURE;
						  	$mail->Port = EMAIL_PORT;

                $mail->setFrom(EMAIL_ADDRESS, EMAIL_NAME.' - Account Verification');
							  $mail->addAddress($user_email, $username);
							  $mail->isHTML(true);

                $mail->Subject = 'Account Verification';

                $url = 'https://www.kukahub.com/verify.php?action=activate&activation_key='.$activation_key.'&id='.$user_id.'&name='.$username;
                $valid_time = strtotime("+7 days", time());
                $mail->Body = '<head>
  <title></title>
  <!--[if !mso]><!-- -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
  #outlook a { padding: 0; }
  .ReadMsgBody { width: 100%; }
  .ExternalClass { width: 100%; }
  .ExternalClass * { line-height:100%; }
  body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
  table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
  p { display: block; margin: 13px 0; }
</style>
<!--[if !mso]><!-->
<style type="text/css">
  @media only screen and (max-width:480px) {
    @-ms-viewport { width:320px; }
    @viewport { width:320px; }
  }
</style>
<!--<![endif]-->
<!--[if mso]>
<xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
<!--[if lte mso 11]>
<style type="text/css">
  .outlook-group-fix {
    width:100% !important;
  }
</style>
<![endif]-->

<!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <style type="text/css">
    @media only screen and (min-width: 480px)

        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);

    </style>
  <!--<![endif]--><style type="text/css">
  @media only screen and (min-width:480px) {
    .mj-column-per-100, * [aria-labelledby="mj-column-per-100"] { width:100%!important; }
  }
</style>

</head>
<body style="background: #F9F9F9;">
  <div style="background-color:#F9F9F9;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]-->
  <style type="text/css">
    html, body, * {
      -webkit-text-size-adjust: none;
      text-size-adjust: none;
    }
    a {
      color:#1EB0F4;
      text-decoration:none;
    }
    a:hover {
      text-decoration:underline;
    }
}
  </style>
<div style="margin:0px auto;max-width:640px;background:transparent;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 0px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
      <![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;padding:0px;" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0"><tbody><tr><td style="width:138px;"><a href="https://www.kukahub.com/" target="_blank"><img alt="" title="" height="38px" style="border:none;border-radius:;display:block;outline:none;text-decoration:none;width:100%;height:38px;" width="138"></a></td></tr></tbody></table></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--><div style="max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden"><div style="margin:0px auto;max-width:640px;background:#7289DA top center / cover no-repeat;"><!--[if mso | IE]>
      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:640px;">
        <v:fill origin="0.5, 0" position="0.5,0" type="tile" src="https://cdn.discordapp.com/email_assets/f0a4cc6d7aaa7bdf2a3c15a193c6d224.png" />
        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
      <![endif]--><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#7289DA  top center / cover no-repeat;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:57px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:undefined;width:640px;">
      <![endif]--><div style="cursor:auto;color:white;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:36px;font-weight:600;line-height:36px;text-align:center;">Welcome to KukaHub!</div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table><!--[if mso | IE]>
        </v:textbox>
      </v:rect>
      <![endif]--></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--><div style="margin:0px auto;max-width:640px;background:#ffffff;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
      <![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;padding:0px 0px 20px;" align="left"><div style="cursor:auto;color:#737F8D;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:16px;line-height:24px;text-align:left;">
            <p><img src="https://cdn.discordapp.com/email_assets/127c95bbea39cd4bc1ad87d1500ae27d.png" alt="Party Wumpus" title="None" width="500" style="height: auto;"></p>

  <h2 style="font-family: Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;">Hey '.$username.',</h2>
<p>How are you doing? Thanks for registering an account with KukaHub! We have just finished setting up your KukaHub account.</p>
<p>Before we get started, we will need to verify your email.</p>

          </div></td></tr><tr><td style="word-break:break-word;font-size:0px;padding:10px 25px;" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="center" border="0"><tbody><tr><td style="border:none;border-radius:3px;color:white;cursor:auto;padding:15px 19px;" align="center" valign="middle" bgcolor="#7289DA"><a href="'.$url.'" style="text-decoration:none;line-height:100%;background:#7289DA;color:white;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;font-weight:normal;text-transform:none;margin:0px;" target="_blank">
            Verify Email
          </a></td></tr></tbody></table></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--></div><div style="margin:0px auto;max-width:640px;background:transparent;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;"><!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
      <![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;"><div style="font-size:1px;line-height:12px;">&nbsp;</div></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>
      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
        <tr>
          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
      <![endif]--><div style="margin:0 auto;max-width:640px;background:#ffffff;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden;"><table cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;font-size:0px;padding:0px;"><!--[if mso | IE]>
      <table border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
      <![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;padding:30px 70px 0px 70px;" align="center"><div style="cursor:auto;color:#43B581;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:18px;font-weight:bold;line-height:16px;text-align:center;">DID YOU KNOW</div></td></tr><tr><td style="word-break:break-word;font-size:0px;padding:14px 70px 30px 70px;" align="center"><div style="cursor:auto;color:#737F8D;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:16px;line-height:22px;text-align:center;">
      Did you know Mathematical genius Srinivasa Ramanujan failed in all subjects in school except Maths? Interesting, right?
    </div></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
      </td></tr></table>
      <![endif]-->
      <!--[if mso | IE]>

      <![endif]--><div style="margin:0px auto;max-width:640px;background:transparent;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;"><!--[if mso | IE]>
      <div aria-labelledby="mj-column-per-100" class="m_-5325150678985200306mj-column-per-100 m_-5325150678985200306outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:center;text-align:-webkit-center;width:100%">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0"><tbody>
      <tr><td style="word-break:break-word;font-size:0px;padding:0px" align="center"><div style="color:#99aab5;font-family:Whitney,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center">Send by KukaHub  •  <a href="https://www.kukahub.com" style="color:#1eb0f4;text-decoration:none" target="_blank">Check out our website</a></div></td></tr>
      <tr><td style="word-break:break-word;font-size:0px;padding:0px" align="center"><div style="color:#99aab5;font-family:Whitney,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center">Water Tower Hill, CR0 5SX, Croydon, United Kingdom</div></td></tr>

      </tbody></table>
      </div></td></tr></tbody></table>
      </div>

</body>';

               if(!$mail->send()) {
								$status = 0;
								$error = $mail->ErrorInfo;
								db_query("DELETE FROM User WHERE ID = '$user_id'");
							} else {
								$status = 0;
                $error = "Send successfully!";
							}
                } // End Try
                catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
             }else{
               $status = 1;
              }

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

    ////////////////////////////////
          //// AJAX LOGIN////
    ///////////////////////////////

elseif(isset($_GET['action']) && $_GET['action'] == "login" && is_ajax()
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


	////////////////////////////////
	 //// New Activation Key ////
	///////////////////////////////
elseif(isset($_GET['action']) && $_GET['action'] == "get-new-activation-key" && is_ajax()
    && !user_activation_required()
    && isset($_POST['user_id'])
    && isset($_POST['username'])
    && isset($_POST['token'])
    && !empty($_POST['user_id'])
    && !empty($_POST['username'])
    && !empty($_POST['token'])
    ){

  $user_id = db_escapeString($_POST['user_id']);
  $username = db_escapeString($_POST['username']);
  $token = db_escapeString($_POST['token']);

  $error = "";
  $status = 1;
  $time = time();

  if(getUser_name_ById($user_id) == $username){
    if(getToken($user_id) == $token){

      $query = db_query("SELECT ID FROM User WHERE ID = '$user_id' && activation = 0 LIMIT 1");

      if(mysqli_num_rows($query)>0){
        $valid_time = strtotime("+7 days", time());
        $activation_code = bin2hex(openssl_random_pseudo_bytes(24));

        db_query("UPDATE user_activation SET activation_key = '$activation_code', valid_time = '$valid_time' WHERE user_id = '$user_id'");

        $mail = new PHPMailer(true);
        try {
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = EMAIL_SMTP_SECURE;
        $mail->Port = EMAIL_PORT;

        $mail->setFrom(EMAIL_ADDRESS, EMAIL_NAME.' - Account Verification');
        $mail->addAddress($user_email, $username);
        $mail->isHTML(true);

        $mail->Subject = 'Account Verification';

        $url = 'https://www.kukahub.com/verify.php?action=activate&activation_key='.$activation_code.'&id='.$user_id.'&name='.$username;
        $valid_time = strtotime("+7 days", time());
        $mail->Body = '<head>
<title></title>
<!--[if !mso]><!-- -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
#outlook a { padding: 0; }
.ReadMsgBody { width: 100%; }
.ExternalClass { width: 100%; }
.ExternalClass * { line-height:100%; }
body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
p { display: block; margin: 13px 0; }
</style>
<!--[if !mso]><!-->
<style type="text/css">
@media only screen and (max-width:480px) {
@-ms-viewport { width:320px; }
@viewport { width:320px; }
}
</style>
<!--<![endif]-->
<!--[if mso]>
<xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<![endif]-->
<!--[if lte mso 11]>
<style type="text/css">
.outlook-group-fix {
width:100% !important;
}
</style>
<![endif]-->

<!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
<style type="text/css">
@media only screen and (min-width: 480px)

@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);

</style>
<!--<![endif]--><style type="text/css">
@media only screen and (min-width:480px) {
.mj-column-per-100, * [aria-labelledby="mj-column-per-100"] { width:100%!important; }
}
</style>

</head>
<body style="background: #F9F9F9;">
<div style="background-color:#F9F9F9;"><!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
<tr>
  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]-->
<style type="text/css">
html, body, * {
-webkit-text-size-adjust: none;
text-size-adjust: none;
}
a {
color:#1EB0F4;
text-decoration:none;
}
a:hover {
text-decoration:underline;
}
}
</style>
<div style="margin:0px auto;max-width:640px;background:transparent;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 0px;"><!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
<![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;padding:0px;" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px;" align="center" border="0"><tbody><tr><td style="width:138px;"><a href="https://www.kukahub.com/" target="_blank"><img alt="" title="" height="38px" style="border:none;border-radius:;display:block;outline:none;text-decoration:none;width:100%;height:38px;" width="138"></a></td></tr></tbody></table></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]-->
<!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
<tr>
  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]--><div style="max-width:640px;margin:0 auto;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden"><div style="margin:0px auto;max-width:640px;background:#7289DA top center / cover no-repeat;"><!--[if mso | IE]>
<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:640px;">
<v:fill origin="0.5, 0" position="0.5,0" type="tile" src="https://cdn.discordapp.com/email_assets/f0a4cc6d7aaa7bdf2a3c15a193c6d224.png" />
<v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">
<![endif]--><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#7289DA  top center / cover no-repeat;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:57px;"><!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:undefined;width:640px;">
<![endif]--><div style="cursor:auto;color:white;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:36px;font-weight:600;line-height:36px;text-align:center;">Welcome to KukaHub!</div><!--[if mso | IE]>
</td></tr></table>
<![endif]--></td></tr></tbody></table><!--[if mso | IE]>
</v:textbox>
</v:rect>
<![endif]--></div><!--[if mso | IE]>
</td></tr></table>
<![endif]-->
<!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
<tr>
  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]--><div style="margin:0px auto;max-width:640px;background:#ffffff;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:40px 70px;"><!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
<![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;padding:0px 0px 20px;" align="left"><div style="cursor:auto;color:#737F8D;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:16px;line-height:24px;text-align:left;">
    <p><img src="https://cdn.discordapp.com/email_assets/127c95bbea39cd4bc1ad87d1500ae27d.png" alt="Party Wumpus" title="None" width="500" style="height: auto;"></p>

<h2 style="font-family: Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-weight: 500;font-size: 20px;color: #4F545C;letter-spacing: 0.27px;">Hey '.$username.',</h2>
<p>How are you doing? Thanks for registering an account with KukaHub! We have just finished setting up your KukaHub account.</p>
<p>Before we get started, we will need to verify your email.</p>

  </div></td></tr><tr><td style="word-break:break-word;font-size:0px;padding:10px 25px;" align="center"><table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="center" border="0"><tbody><tr><td style="border:none;border-radius:3px;color:white;cursor:auto;padding:15px 19px;" align="center" valign="middle" bgcolor="#7289DA"><a href="'.$url.'" style="text-decoration:none;line-height:100%;background:#7289DA;color:white;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;font-weight:normal;text-transform:none;margin:0px;" target="_blank">
    Verify Email
  </a></td></tr></tbody></table></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]-->
<!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
<tr>
  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]--></div><div style="margin:0px auto;max-width:640px;background:transparent;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px;"><!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
<![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;"><div style="font-size:1px;line-height:12px;">&nbsp;</div></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]-->
<!--[if mso | IE]>
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="640" align="center" style="width:640px;">
<tr>
  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
<![endif]--><div style="margin:0 auto;max-width:640px;background:#ffffff;box-shadow:0px 1px 5px rgba(0,0,0,0.1);border-radius:4px;overflow:hidden;"><table cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#ffffff;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;font-size:0px;padding:0px;"><!--[if mso | IE]>
<table border="0" cellpadding="0" cellspacing="0"><tr><td style="vertical-align:top;width:640px;">
<![endif]--><div aria-labelledby="mj-column-per-100" class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;"><table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"><tbody><tr><td style="word-break:break-word;font-size:0px;padding:30px 70px 0px 70px;" align="center"><div style="cursor:auto;color:#43B581;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:18px;font-weight:bold;line-height:16px;text-align:center;">DID YOU KNOW</div></td></tr><tr><td style="word-break:break-word;font-size:0px;padding:14px 70px 30px 70px;" align="center"><div style="cursor:auto;color:#737F8D;font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;font-size:16px;line-height:22px;text-align:center;">
Did you know Mathematical genius Srinivasa Ramanujan failed in all subjects in school except Maths? Interesting, right?
</div></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]--></td></tr></tbody></table></div><!--[if mso | IE]>
</td></tr></table>
<![endif]-->
<!--[if mso | IE]>

<![endif]--><div style="margin:0px auto;max-width:640px;background:transparent;"><table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:transparent;" align="center" border="0"><tbody><tr><td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:20px 0px;"><!--[if mso | IE]>
<div aria-labelledby="mj-column-per-100" class="m_-5325150678985200306mj-column-per-100 m_-5325150678985200306outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:center;text-align:-webkit-center;width:100%">
<table role="presentation" cellpadding="0" cellspacing="0" border="0"><tbody>
<tr><td style="word-break:break-word;font-size:0px;padding:0px" align="center"><div style="color:#99aab5;font-family:Whitney,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center">Send by KukaHub  •  <a href="https://www.kukahub.com" style="color:#1eb0f4;text-decoration:none" target="_blank">Check out our website</a></div></td></tr>
<tr><td style="word-break:break-word;font-size:0px;padding:0px" align="center"><div style="color:#99aab5;font-family:Whitney,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center">Water Tower Hill, CR0 5SX, Croydon, United Kingdom</div></td></tr>

</tbody></table>
</div></td></tr></tbody></table>
</div>

</body>';

       if(!$mail->send()) {
        $status = 0;
        $error = $mail->ErrorInfo;
        db_query("DELETE FROM User WHERE ID = '$user_id'");
      } else {
        //Send successfully
        $status = 1;
      }
        } // End Try
        catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
     }else{
        $status = 0;
        $error = "This account is already activated. Refresh!";
      }

    }else{
      $status = 0;
      $error = "Invalid token! Please try again later !";
    }
  }else{
    $status = 0;
    $error = "Invalid username! Please try again later!";
  }

  echo json_encode(
      array(
        'status' => $status,
        'error' => $error,
      )
    );

}

////////////////////////////////
 //// Logout ////
///////////////////////////////
elseif(isset($_GET['action']) && $_GET['action'] == "logout" && is_ajax()
    && isset($_POST['token'])
    && isset($_POST['user_id'])
    && !empty($_POST['token'])
    && !empty($_POST['user_id'])
){
   $token = db_escapeString($_POST['token']);
   $user_id = db_escapeString($_POST['user_id']);

   if($token == getToken($user_id)){

     session_start();

     //Unset all the sessions
     $_SESSION = array();

     if (ini_get("session.use_cookies")) {
       $params = session_get_cookie_params();
       setcookie(session_name(), '', time() - 42000,
       $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
    );
  }
		 session_destroy();
   }else{
     echo "error";
   }
}

?>
