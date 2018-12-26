<?php
  include('include/init_constantFunctions.php');

  ///////////////////////////////////
     // Activate User Account //
  ///////////////////////////////////

//Json not working .___. Errors are encountering! Try another time
if(isset($_POST['ajaxcall']) && is_ajax()){
  if(isset($_GET['action']) && $_GET['action']=="activate" ){
    $user_id = db_escapeString($_GET['id']);
    $username = db_escapeString($_GET['name']);
    $activation_key = stripslashes($_GET['activation_key']);


    if($username == getUser_name_ById($user_id)){
      $time = time();
      $query = db_query("SELECT ID FROM User WHERE ID = '$user_id' AND activation = 0 LIMIT 1");
      $query2 = db_query("SELECT activation_key, valid_time FROM user_activation WHERE user_id='$user_id' LIMIT 1");


      $status = '';
      $mess = '';
      $btn = '';

      if(mysqli_num_rows($query)>0){

        if(mysqli_num_rows($query2)>0){

          $row = mysqli_fetch_array($query2);
          if($row[1]<$time){
            $status =  "<h3>Your activation code has expired.</h3>";
            $mess = "<p>Click below to get a new activation code.</p>";
            $btn = '<button type="button" id="" class="verify_full_width_o_O_button">Get key</button>';
          } elseif($row[0] == $activation_key){
            db_query("UPDATE `User` SET `activation` = 1 WHERE `ID` = '$user_id'");
            db_query("DELETE FROM `user_activation` WHERE `user_id` = '$user_id'");
            $status =  "<h3>Your account has been successfully activated.</h3>";
            $mess = "<p>Click below to return to login screen.</p>";
            $btn = '<a href="login.php" class="verify_full_width_o_O_button">Continue</a>';
          }else{
            $status =  "<h3>An error has occured. Please try again.</h3>";
            $mess = "<p>Click below to return to login screen.</p>";
            $btn = '<a href="login.php" class="verify_full_width_o_O_button">Continue</a>';
          }
        }else{
          $status =  "<h3>Your activation code has expired.</h3>";
          $mess = "<p>Please login to get a new activation code</p>";
          $btn = '<a href="login.php" class="verify_full_width_o_O_button">Continue</a>';
        }
      }else{
        $status = "<h3>This account has already been activated!</h3>";
        $mess = "<p>Click below to return to login screen</p>";
        $btn = '<a href="login.php" class="verify_full_width_o_O_button">Continue</a>';
      }
    }else{
      $status = "<h3>We couldn't verify your username</h3>";
      $mess = "<p>Click below to return to login screen</p>";
      $btn = '<a href="login.php" class="verify_full_width_o_O_button">Continue</a>';
    }
  }else{
    $status = '<h3>Your activation code has expired.</h3>';
    $mess = '<p>Please login to get a new activation code</p>';
    $btn = '<a href="login.php" class="verify_full_width_o_O_button">Continue</a>';
  }

  echo json_encode(
      array(
        'status' =>$status ,
        'mess' => $mess,
        'btn' => $btn
      )
    );
  exit;
  //Exit pretty important tho

}

?>

<html>
  <head>
    <?php getHeader("KukaHub | Verify Account"); ?>
  </head>

  <body>
    <div class="verify_1eqav4O2v_o_O_page">
      <div class="verify_1eqav4O2v_o_O_cont">
        <div class="verify_1eqav4O2v_o_O_wrapper">
          <div class="verify_1eqav4O2v_o_O_wrapper_inner">
            <div class="black_1eqav4O2v_o_O_overlay"></div>
            <div class="logo_1eqav4O2v_o_O">
              <img src="dist/img/facilities/kukahub-logo-white.png">
              KukaHub
            </div>
            <div class="wrapper_1eqav4O2v_o_O_centeredCont">
              <div class="authorizeBox_1eqav4O2v_o_O_dark_theme">
                <div class="centered_cont">
                  <img src="dist/img/facilities/email.svg">
                  <h3 class="loading_mess">Verifying your email . . .</h3>
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
      $("document").ready(function(){
        var ajaxcall = "true";
        $.ajax({
          type : "POST",
          data: {ajaxcall: ajaxcall},
          dataType : "json",
          success: function(response){
           $(".authorizeBox_1eqav4O2v_o_O_dark_theme .loading_mess").remove();
           $(".authorizeBox_1eqav4O2v_o_O_dark_theme .centered_cont").append(response.status);
           $(".authorizeBox_1eqav4O2v_o_O_dark_theme .centered_cont").append(response.mess);
           $(".authorizeBox_1eqav4O2v_o_O_dark_theme .centered_cont").append(response.btn);
          },
          error: function(xhr, ajaxOptions, thrownError){
            Snackbar.showToast({def_text:"An unknown error has occured."});
          }
        })
      });

    </script>
  </body>
</html>
