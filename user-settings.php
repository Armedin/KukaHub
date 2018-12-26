<?php
  include('include/init_constantFunctions.php');

  $curr_user = getSessionUser_id();
  $pro_pic = pro_pic_stat_destination() . get_profile_picture($curr_user);
  $user_info = get_user_info($curr_user);
  $user_email = getEmail($curr_user);

 ?>

 <html>
   <head>

   <?php getHeader("User Settings | KukaHub"); ?>
   <link rel="stylesheet" href="dist/css/croppie.css">
   </head>
 <body>

 <?php
   init_pageHeader();
 ?>

 <section class="content user-settings_0pog4vh_page">
   <div class="user-settings_0pog4vh_wrapper">
     <div class="user-settings_opog4vh_header">
       <h1>My Account Details<i class="fas fa-cogs"></i></h1>
       <small>Manage your account settings</small>
     </div>
     <div class="user-settings_opog4vh_bodyCont">
       <div class="user-settings_opog4vh_body">
         <div class="row-col">
           <div class="col-md-12 col-lg-3">
             <div class="settings_opog4vh_navCont">
               <a class="settings_opog4vh_navLink active" data="profile_tab">Profile</a>
               <a class="settings_opog4vh_navLink" data="user-settings_tab">User Settings</a>
               <a class="settings_opog4vh_navLink" data="payment-info_tab">Payment Info</a>
             </div>
           </div>
           <div class="col-md-12 col-lg-9">
             <div class="settings_opog4vh_contentCon active shown divFade" id="profile_tab">
               <h2 class="settings_opog4vh_contentTitle">Profile</h2>
               <form name="change-profile-settings" method="POST" id="change-profile-settings" autocomplete="off">
                 <div class="form_opog4vh_group forms_opog4vh_rowDis">
                   <img class="profile_picture_selection" src="<?php echo $pro_pic; ?>">
                   <div class="form_opog4vh_file-uploadCont">
                     <label for="upload" class="form_opog4vh_uploadPic_btn_o_O_not_xefopen_realModal">Upload a new profile
                       <input type="file" id="upload_image" name="upload_image" accept="image/x-png,image/jpeg">
                     </label>
                     <div class="form_opog4vh_uploadPic_btn no_display"></div>
                   </div>
                   <button class="form_opog4vh_deletePic_btn" id="remove-profile-picture">Delete</button>
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Your Firstname</label>
                   <input type="text" name="user_name" id="settings-firstname" class="form_opog4vh_input" placeholder="Enter your firstname" value="<?php echo $user_info['firstname']; ?>">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Your Lastname</label>
                   <input type="text" name="user_surname" id="settings-lastname" class="form_opog4vh_input" placeholder="Enter your surname" value="<?php echo $user_info['lastname']; ?>">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Birthday</label>
                   <input type="text" class="form_opog4vh_input" id="settings-birthday" name="user_birthday" placeholder="Enter your birthday" value="<?php echo $user_info['birthday']; ?>">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Location</label>
                   <input type="text" class="form_opog4vh_input" id="settings-location" name="user_location" placeholder="Enter your location" value="<?php echo $user_info['location']; ?>">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Bio</label>
                   <textarea type="text" class="form_opog4vh_input" id="settings-biography" name="user_bio" placeholder="Write about yourself ..." rows="4"><?php echo $user_info['biography']; ?></textarea>
                 </div>
                 <button type="submit" name="update_profileBtn" class="form_opog4vh_updateChanges_btn">Update Profile</button>
               </form>
             </div>
             <div class="settings_opog4vh_contentCon divFade" id="user-settings_tab">
               <h2 class="settings_opog4vh_contentTitle">Your Settings</h2>
               <form>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Email Address</label>
                   <input type="email" name="user_email" class="form_opog4vh_input" placeholder="Enter email">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Password</label>
                   <input type="email" name="user_password" class="form_opog4vh_input" placeholder="Enter password">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Re-Type Password</label>
                   <input type="email" name="user_retype_password" class="form_opog4vh_input" placeholder="Re-Type Password">
                 </div>
                 <button class="form_opog4vh_updateChanges_btn">Update Profile</button>
               </form>
             </div>
             <div class="settings_opog4vh_contentCon divFade" id="payment-info_tab">
               <h2 class="settings_opog4vh_contentTitle">Manage Payment</h2>
               <form>
                 <div class="form_opog4vh_group">
                   <div class="payment_opog4vh_methodGroup">
                     <input type="radio" id="payment_meth1" name="payment_method" class="payment_opog4vh_methodInput" checked>
                     <label class="payment_opog4vh_customMethodInput" for="payment_meth1">
                       <img src="dist/img/facilities/payment-methods/visa.png" class="payment_opog4vh_image">
                       <img src="dist/img/facilities/payment-methods/americanExpress.png" class="payment_opog4vh_image">
                       <img src="dist/img/facilities/payment-methods/discover.png" class="payment_opog4vh_image">
                       <img src="dist/img/facilities/payment-methods/masterCard.png" class="payment_opog4vh_image">
                     </label>
                   </div>
                   <div class="payment_opog4vh_methodGroup">
                     <input type="radio" id="payment_meth2" name="payment_method" class="payment_opog4vh_methodInput">
                     <label class="payment_opog4vh_customMethodInput" for="payment_meth2">
                       <img src="dist/img/facilities/payment-methods/paypal.png" class="push-7-top payment_opog4vh_image">
                     </label>
                   </div>
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Card Number</label>
                   <input type="email" name="user_password" class="form_opog4vh_input" placeholder="•••• •••• •••• 1234">
                 </div>
                 <div class="row-col">
                   <div class="form_opog4vh_group col-md-6">
                     <label for="nameInput">Expiration</label>
                     <input type="email" name="user_password" class="form_opog4vh_input" placeholder="MM / YY">
                   </div>
                   <div class="form_opog4vh_group col-md-6">
                     <label for="nameInput">CVV</label>
                     <input type="email" name="user_password" class="form_opog4vh_input" placeholder="123">
                   </div>
                 </div>
                 <button class="form_opog4vh_updateChanges_btn">Update Profile</button>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>


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
 init_login_page();
 init_pageSidebar();
 getJs_Files();
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="dist/jqueryUI/jquery-ui.min.js"></script>
<script src="dist/js/croppie.min.js"></script>
 <script type="text/javascript">

   var selected;

   //Amazin' *_*
   $("a.settings_opog4vh_navLink").on("click",function(e){
     var toShow = $(this).attr('data');
     var index =$(this).index();

     selected = $("#"+toShow);
     if(!selected.hasClass("active")){
       $(".settings_opog4vh_contentCon").removeClass("shown");
       $(".settings_opog4vh_contentCon").one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',   function(e) {
         if(e.target === e.currentTarget){
           $(".settings_opog4vh_contentCon").removeClass("active");
         selected.addClass("active");
         selected.addClass("shown");
         $(".settings_opog4vh_navLink.active").removeClass("active");
         $("a.settings_opog4vh_navLink").eq(index).addClass("active");
         }
         });
     }
   });

			$( function() {
				$( "#settings-birthday" ).datepicker({
					changeMonth: true,
					changeYear: true,
					yearRange: "1920 : 2010",
          dateFormat: 'dd-mm-yy',
          defaultDate: new Date(1985, 00, 01)
				});
			} );

			$(".change_opog4vh_selectImg_btn input").change(function () {
				$(".change_opog4vh_submitImg_btn").css("display","inline-block");
			});

      var profile_pic_image = ""; // Image data:

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
