<?php

include('include/playlist_constantFunctions.php');

 ?>
<html>

<head>
  <?php getHeader("Sign Up | KukaHub"); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/perfect-scrollbar.css" rel="stylesheet">
</head>


<body>

  <div class="register_Cont_with_bgimage">
    <div class="register_9vo_O_ph73bw_login_wrapper">
      <div class="auth_register_9vo_O_ph73bw_login">
        <div class="auth_9vo_O_ph73bw_logo">
          <span>KukaHub</span>
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
              <label class="form_9vo_O_ph73bw_checkbox_label" for="terms_9vo_O_ph73bw_checkbox">I agree to the <a href="https://www.kukahub.com/about/terms-of-use.php" target="_blank">Terms &amp; Conditions</a></label>
            </div>
            <button type="submit" name="submit_register" class="signup_9vo_O_ph73bw_btn" id="register_playlist_submit">Sign Up</button>

            <?php
              echo '<input type="hidden" name="redict_location" id="redict_location" value="';
              if(isset($_GET['redict_location'])) {
                echo htmlspecialchars($_GET['redict_location']);
              }
              echo '" />';
            ?>

          </form>
          <!-- <p class="have_9vo_O_ph73bw_accountText">Already have an account?<br> <a href="login.php">Login Now!</a></p> -->
        </div>
      </div>
    </div>
  </div>


  <?php
    getJs_Files();
   ?>
<script src="js/perfect-scrollbar.min.js"></script>
<script src="js/app.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script>

$(document).ready(function(){
var ps = new PerfectScrollbar('.auth_register_9vo_O_ph73bw_login');
ps.update();

});

</script>
</body>



</html>
