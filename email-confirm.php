<?php
  include('include/init_constantFunctions.php');

  if(!isUserLoggedIn()){
    header("Location: login.php");
  }elseif(isUserLoggedIn() && is_session_acccount_activated()){
    $id = getSessionUser_id();
    header("Location: profile.php?id=" . $id);
  }
?>

<html>
  <head>
    <?php getHeader("Email Confirmation | KukaHub"); ?>
  </head>

  <body>
    <div class="verify_1eqav4O2v_o_O_page">
      <div class="verify_1eqav4O2v_o_O_cont">
        <div class="verify_1eqav4O2v_o_O_wrapper">
          <div class="verify_1eqav4O2v_o_O_wrapper_inner login_page">
            <div class="black_1eqav4O2v_o_O_overlay"></div>
            <div class="logo_1eqav4O2v_o_O">
              <img src="dist/img/facilities/kukahub-logo-white.png">
              KukaHub
            </div>
            <div class="wrapper_1eqav4O2v_o_O_centeredCont">
              <div class="authorizeBox_1eqav4O2v_o_O_dark_theme">
                <div class="centered_cont">
                  <img src="dist/img/facilities/email_logo.png">
                  <h3>Verifying through email</h3>
                  <span>A confirmation email has been sent to <strong class="user-email">kukahub@gmail.com</strong></span>
                  <span>Click the "Verify Email" to verify your account. If you did not receive an email or if it expired,
                    you can send a new one.</span>
                  <button type="button" id="get_new_activation_key" class="verify_full_width_o_O_button model_2_white">
                  Resend a new verification email!</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
  getJs_Files();
?>

  <script>
  $(".user-email").text(email);

  </script>
  </body>
</html>
