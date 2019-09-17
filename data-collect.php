<!DOCTYPE html>
 <?php

  include('include/init_constantFunctions.php');

  if(isUserLoggedIn() && is_user_information_registered()){
    header("Location: profile.php?id=".getSessionUser_id());
    exit();
  }elseif(!isUserLoggedIn()){
    header("Location: login.php");
    exit();
  }
?>

<html>
  <head>
    <?php getHeader("Get Started | KukaHub"); ?>
    <link rel="stylesheet" href="dist/css/croppie.css">
  </head>

  <body>
    <div class="form_wizard_03jg4f_o_O_fullWidth_padding">
      <div class="form_wizard_03jg4f_o_O_card">
        <div class="form_wizard_03jg4f_o_O_card_inner">
          <div class="form_wizard_03jg4f_o_O_steps_cont">
            <div class="form_wizard_step first-wizard">
              <a href="#step-1" class="form_wizard_step_btn active_step"><i class="fal fa-unlock-alt"></i></a>
              <span>General Info</span>
            </div>
            <div class="form_wizard_step">
              <a href="#step-2" class="form_wizard_step_btn"><i class="fal fa-user"></i></a>
              <span>Personal Details</span>
            </div>
            <div class="form_wizard_step">
              <a href="#step-3" class="form_wizard_step_btn"><i class="fal fa-camera-retro"></i></a>
              <span>Profile Picture</span>
            </div>
            <div class="form_wizard_step">
              <a href="#step-4" class="form_wizard_step_btn"><i class="fal fa-shield-check"></i></a>
              <span>Finished</span>
            </div>
          </div>
          <form>
            <!-- Step 1 -->
            <div class="row-col form_wizard_03jg4f_o_O_form_cont show" id="step-1">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Firstname</label>
                  <input type="text" id="get-started-firstname" name="firstname" class="wizard_input" placeholder="Enter your firstname"></input>
                </div>
                <div class="form-group">
                  <label class="form-label">Lastname</label>
                  <input type="text" id="get-started-lastname" name="lastname" class="wizard_input" placeholder="Enter your lastname"></input>
                </div>
                <div class="form-group">
                  <label class="form-label">Gender</label>
                  <input type="text" id="get-started-gender" name="gender" class="wizard_input" placeholder="Male or Female"></input>
                </div>
                <div class="form-group">
                  <label class="form-label">Age</label>
                  <input type="text" id="get-started-age" name="age" class="wizard_input" placeholder="Enter your age"></input>
                </div>
                <div class="form_wizard_03jg4f_o_O_btns_wrapper">
                  <button type="button" class="back_btn wizard_btn disabled" id="wizard-form-back-btn">Back</button>
                  <button type="button" class="next_btn wizard_btn" id="wizard-form-next-btn">Next</button>
                </div>
              </div>
            </div>

            <!-- Step 2 -->
            <div class="row-col form_wizard_03jg4f_o_O_form_cont" id="step-2">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Phone Number</label>
                  <input type="text" name="phone-number" id="phone-number" class="wizard_input" placeholder="Enter your phone number">
                </div>
                <div class="form-group">
                  <label class="form-label">Birthday</label>
                  <input type="text" name="birthday" class="wizard_input" id="get-started-birthday" placeholder="Enter your birthday">
                </div>
                <div class="form-group">
                  <label class="form-label">Location</label>
                  <input type="text" id="get-started-location" name="location" class="wizard_input" placeholder="Where do you live">
                </div>
                <div class="form-group">
                  <label class="form-label">Studying/Studied at </label>
                  <input type="text" id="get-started-study_place" name="studied_at" class="wizard_input" placeholder="Education place">
                </div>
                <div class="form-group">
                  <label class="form-label">Biography</label>
                  <textarea type="text" id="get-started-biography" name="biography" class="wizard_input" placeholder="Say something about yourself"></textarea>
                </div>
                <div class="form_wizard_03jg4f_o_O_btns_wrapper">
                  <button type="button" class="back_btn wizard_btn disabled" id="wizard-form-back-btn">Back</button>
                  <button type="button" class="next_btn wizard_btn" id="wizard-form-next-btn">Next</button>
                </div>
              </div>
            </div>

            <!-- Step 3 -->
            <div class="row-col form_wizard_03jg4f_o_O_form_cont" id="step-3">
              <div class="col-md-12">
                <div class="upload_profile_title">
                  <h3>Upload Profile Picture (Optional) </h3>
                </div>
                <div class="upload_profile_picture">
                  <img class="profile_picture_selection" src="dist/img/facilities/defaultProfilePicture.jpg">
                </div>
                <div class="uploadPic_btn_o_O_oen2_fullCont">
                  <div class="form_opog4vh_uploadPic_btn_o_O_not_xefopen_realModal">Upload picture
                    <input type="file" id="upload_image" name="upload_image" accept="image/x-png,image/jpeg">
                  </div>
                </div>
                <div class="form_opog4vh_uploadPic_btn no_display"></div>
                <div class="form_wizard_03jg4f_o_O_btns_wrapper">
                  <button type="button" class="back_btn wizard_btn disabled" id="wizard-form-back-btn">Back</button>
                  <button type="button" class="next_btn wizard_btn" id="wizard-form-next-btn">Next</button>
                </div>
              </div>
            </div>

            <!-- Step 4 -->
            <div class="row-col form_wizard_03jg4f_o_O_form_cont" id="step-4">
              <div class="col-md-12">
                <div class="success_set_go_03jg4f_o_O_cont">
                  <span class="succes_03jg4f_o_O_icon"><i class="fas fa-check-circle"></i></span>
                  <h5 class="success_head_text">Fantastic!</h5>
                  <span class="success_sub_head_text">You are all set and ready to go !</span>
                  <span class="success_sub_head_text">PS : " The information you provided can be changed anytime from the 'My Settings' menu ! " </span>
                  <button class="succes_finish_btn" id="get-started-finish-btn">Finish Up</button>
                </div>
              </div>
            </div> <!-- end of steps -->
          </form>
        </div>
      </div>
    </div>

    <!-- Change profile image modal -->
		<div class="change_opog4vh_pickModal">
			<div class="change_opog4vh_pickModal_con">
				<div class="change_opog4vh_content">
					<div class="change_opog4vh_contentHeader">
						<h4>Change Profile Picture</h4>
						<button type="button" aria-label="Close" class="change_opog4vh_closeModal">
							<span class="icon_bar"></span>
							<span class="icon_bar"></span>
						</button>
					</div>
					<div class="change_opog4vh_contentBody">
						<p>Crop your profile picture according to your preferences.</p>
						<div class="change_opog4vh_selectImg_cont">
							<form>
                <div id="image_demo" style="width:440px;height:auto;margin-top:30px"></div>
                <div class="btn_cont">
							     <button class="submit_cropCont_image crop_image">Crop Image</button>
								   <button class="canel_cropCont_image">Cancel</button>
                </div>
							</form>
						</div>
					</div>
					<div class="change_opog4vh_footer">
						<button class="close_opog4vh_modal">Close</button>
					</div>
				</div>
			</div>
		</div>


  <?php
  getJs_Files();
  ?>
  <script src="dist/js/croppie.min.js"></script>
  <script>

  var profile_pic_image = ""; // Image data:
  $( function() {
    $( "#get-started-birthday" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: "1920 : 2010",
      dateFormat: 'dd-mm-yy',
      defaultDate: new Date(1985, 00, 01)
    });
    $("#get-started-birthday").attr( 'readOnly' , 'true' ); // user can't type in
  } );

  $(document).ready(function(){

    $(".canel_cropCont_image").on("click",function(e){
      e.preventDefault();
      $(".close_opog4vh_modal").trigger('click');
    });

    $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //square
    },
    boundary:{
      width:300,
      height:300
    }
    });

    $('#upload_image').on('change', function(){


    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        //console.log('jQuery bind complete');

      });
    }

    // Check if cancel is clicked
    if(!($("#upload_image").get(0).files.length == 0)){
      reader.readAsDataURL(this.files[0]);
      $('.form_opog4vh_uploadPic_btn').trigger('click');
    }

  });

  $(".submit_cropCont_image.crop_image").on("click",function(event){
    event.preventDefault();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'original',
      format: 'png',
      quality: 1
    }).then(function(response){
      profile_pic_image = response; // Used in main.js for image crop upload!
      $(".profile_picture_selection").attr("src",response);
      $(".close_opog4vh_modal").trigger('click');
    });
  });

  });
  </script>
  </body>
</html>
