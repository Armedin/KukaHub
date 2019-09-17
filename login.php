<!DOCTYPE html>
<?php

  include('include/init_constantFunctions.php');
  if(isUserLoggedIn()){
header("Location: data-collect.php");
  }
?>

<html>
  <head>
    <?php getHeader("Login | KukaHub"); ?>
  </head>

  <body class="register_9vo_O_ph73bw_login">
    <div class="register_9vo_O_ph73bw_login_wrapper">
      <div class="auth_register_9vo_O_ph73bw_login">
        <div class="auth_9vo_O_ph73bw_logo">
          <span>KukaHub</span>
        </div>
        <div class="auth_9vo_O_ph73bw_body">
          <p class="auth_9vo_O_ph73bw_premsg">Log in to start your session</p>
          <form autocomplete="off">
            <div class="form_9vo_O_ph73bw_group">
              <input type="text" name="user_username" id="login-username" class="input_with_borderErrors" placeholder="Username">
              <span class="form_9vo_O_ph73bw_group_icon">
                <i class="fal fa-user"></i>
              </span>
            </div>
            <div class="form_9vo_O_ph73bw_group">
              <input type="password" name="user_password" id="login-password" class="input_with_borderErrors" placeholder="Password">
              <span class="form_9vo_O_ph73bw_group_icon">
                <i class="fal fa-key"></i>
              </span>
            </div>
            <button type="submit" name="submit_login" id="submit-login" class="signup_9vo_O_ph73bw_btn">Log in</button>
          </form>
            <p class="have_9vo_O_ph73bw_accountText">Don't have an account?</br> <a href="register.php">Register Now!</a></p>
        </div>
      </div>
    </div>
    <?php
     getJs_Files();
     ?>
  </body>
</html>
