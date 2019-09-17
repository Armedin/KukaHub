<!DOCTYPE html>
<?php

  include('include/init_constantFunctions.php');
  if(isUserLoggedIn()){
header("Location: profile.php?id=" . getSessionUser_id());
  }
?>

<html>
  <head>
    <meta name="description" content="Sign Up for Kuka Academy and start learning now." />
    <?php getHeader("Register a new account | Kuka Academy"); ?>
  </head>

  <body class="register_9vo_O_ph73bw_login">
    <div class="register_9vo_O_ph73bw_login_wrapper">
      <div class="auth_register_9vo_O_ph73bw_login">
        <div class="auth_9vo_O_ph73bw_logo">
          <span>Kuka Academy</span>
        </div>
        <div class="auth_9vo_O_ph73bw_body">
          <p class="auth_9vo_O_ph73bw_premsg">Sign up to start your session</p>
          <form method="post" name="register-form" enctype="multipart/form-data">
            <div class="form_9vo_O_ph73bw_group">
              <input type="text" name="username" id="register-username" placeholder="Username" class="input_with_borderErrors">
              <span class="form_9vo_O_ph73bw_group_icon">
                <i class="fal fa-user"></i>
              </span>
            </div>
            <div class="form_9vo_O_ph73bw_group">
              <input type="email" name="email" id="register-email" placeholder="Email" class="input_with_borderErrors">
              <span class="form_9vo_O_ph73bw_group_icon">
                <i class="fal fa-envelope"></i>
              </span>
            </div>
            <div class="form_9vo_O_ph73bw_group">
              <input type="password" name="password" id="register-password" placeholder="Password" class="input_with_borderErrors">
              <span class="form_9vo_O_ph73bw_group_icon">
                <i class="fal fa-key"></i>
              </span>
            </div>
            <div class="form_9vo_O_ph73bw_group">
              <input type="password" name="repassword" id="register-password2" placeholder="Password (Confirm)" class="input_with_borderErrors">
              <span class="form_9vo_O_ph73bw_group_icon">
                <i class="fal fa-key"></i>
              </span>
            </div>
            <div class="form_9vo_O_ph73bw_checkbox">
              <input type="checkbox" name="terms_checkbox" id="terms_9vo_O_ph73bw_checkbox">
              <label class="form_9vo_O_ph73bw_checkbox_label" for="terms_9vo_O_ph73bw_checkbox">I agree to the <a href="about/terms-of-use.php" target="_blank">Terms & Conditions</a></label>
            </div>
            <button type="submit" name="submit_register" class="signup_9vo_O_ph73bw_btn" id="submit-register">Sign Up</button>
          </form>
            <p class="have_9vo_O_ph73bw_accountText">Already have an account?</br> <a href="login.php">Login Now!</a></p>
        </div>
      </div>
    </div>

    <?php
     getJs_Files();
    ?>

  </body>
</html>
