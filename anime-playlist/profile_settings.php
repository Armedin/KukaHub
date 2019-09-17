<?php
include('include/constantFunctions.php');
$user_info = getUserAccountInfo(getSessionUser_id());
 ?>
<html>

<head>
  <?php getHeader("Anime Ongaku"); ?>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="css/perfect-scrollbar.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link  rel= "stylesheet"  href= "live2d/css/live2d.css">
  <link rel="stylesheet" href="css/lightgallery.css">
  <link rel="stylesheet" href="css/croppie.css">
  <title>Anime Music Player</title>
</head>

<body class="profilePage">

<!-- Loader---->

  <div class="anime_music_loader">
			<div class="music_all_bars">
				<div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
        <div class="music_single_bar"></div>
			</div>
	  </div>

    <!-- Layout Manager -->
  <div id="layout_manager" class="layout_manager sidemenu_compressed no_sidemenu">
    <!-- SIDEMENU -->
  <div class="music_player_084nv9vnr_o_O_sidemenu_main fixed_position">

    <?php

    if(isUserLoggedIn()){
      getUserSideMenu();
    }
     ?>

    <nav class="sidebar_navigations">
      <ul class="navigations">
        <li class="navigation_header">
          <span>Music Navigation</span>
        </li>
        <li>
          <a class="active"> <i class="fal fa-home"></i><span>Home</span></a>
        </li>
        <li>
          <a> <i class="fab fa-servicestack"></i><span>Playlists</span></a>
        </li>
        <li>
          <a> <i class="fal fa-music"></i><span>Single Songs</span></a>
        </li>
        <li>
          <a class="openMentor"> <i class="fal fa-user change_mentor"></i><span>Change Mentor</span></a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- HEADER TOP NAV -->
  <div class="music_player_084nv9vnr_o_O_top_header white_bg">
    <?php
      getHeaderMainNav(1);
     ?>
  </div>


  <!-- MAIN BODY WRAPPER -->
  <div class="user_profile_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <section class="user_profile_084nv9vnr_o_O_Container">
      <div class="dot_bg"></div>
      <div class="character_boxContainer">
        <div class="headerCont">
          <h3>User Profile</h3>
        </div>
        <div class="personal_profile_box">
          <div class="profile_avatar">
            <img src="<?php echo pro_pic_stat_destination() . get_profile_picture(getSessionUser_id()) ?>">
          </div>
          <div class="profile_info">
            <p class="profile_info_name">Armedin Kuka</p>
            <p class="profile_info_about">Web developer. Game developer. Currently working on Kuka Academy.
             Favourite programming language is Java. Attending Cambridge Tutors College. Love playing basketball and piano.</p>
          </div>
        </div>
      </div>
      <div class="user_profileFollow_infoBox">
        <ul>
          <li><a><i class="fal fa-user-plus"></i>Follow</a></li>
          <li><a>0 Followers</a></li>
          <li><a>1 Following</a></li>
        </ul>
      </div>
    </section>

    <div class="profile_084nv9vnr_o_O_navigations">
      <ul>
        <li><a href="#">About</a></li>
        <li><a href="#">Anime</a></li>
        <li><a href="#">Playlist</a></li>
        <li><a href="cards.php">Cards</a></li>
        <li><a href="#">Badges</a></li>
      </ul>
    </div>

    <section class="content user-settings_0pog4vh_page" style="margin-left: 0px;">
   <div class="user-settings_0pog4vh_wrapper">
     <div class="user-settings_opog4vh_header">
       <h1>My Account Details<i class="fas fa-cogs"></i></h1>
       <small>Manage your account settings</small>
     </div>
     <div class="user-settings_opog4vh_bodyCont">
       <div class="loading">
         <span class="colour_bar"></span>
       </div>
       <div class="user-settings_opog4vh_body">
         <div class="row-col">
           <div class="col-md-12 col-lg-3">
             <div class="settings_opog4vh_navCont">
               <a class="settings_opog4vh_navLink active" data="profile_tab"><i class="fal fa-user"></i>Profile</a>
               <a class="settings_opog4vh_navLink" data="user-settings_tab"><i class="fal fa-lock"></i>Account Settings</a>
               <a class="settings_opog4vh_navLink" data="accounts_tab"><i class="fa fa-cubes"></i>Accounts</a>
             </div>
           </div>
           <div class="col-md-12 col-lg-9">
             <div class="settings_opog4vh_contentCon active shown divFade" id="profile_tab">
               <h2 class="settings_opog4vh_contentTitle">Profile</h2>
               <form name="change-profile-settings" method="POST" id="change-profile-settings" autocomplete="off">
                 <div class="form_opog4vh_group forms_opog4vh_rowDis">
                   <img class="profile_picture_selection" src="/KukaHub/include/img/pro_pic/5d331b50c3561.png">
                   <div class="form_opog4vh_file-uploadCont">
                     <label for="upload" class="form_opog4vh_uploadPic_btn_o_O_not_xefopen_realModal">Upload a new profile
                       <input type="file" id="upload_image" name="upload_image" accept="image/x-png,image/jpeg">
                     </label>
                   </div>
                   <button class="form_opog4vh_deletePic_btn" id="remove-profile-picture">Delete</button>
                 </div>
                 <div class="col-lg-6 col-md-6">
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Your Firstname</label>
                     <input type="text" name="user_name" id="settings-firstname" class="form_opog4vh_input" placeholder="Enter your firstname" value="Kuka">
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Your Lastname</label>
                     <input type="text" name="user_surname" id="settings-lastname" class="form_opog4vh_input" placeholder="Enter your surname" value="Armedin">
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Birthday</label>
                     <input type="text" class="form_opog4vh_input hasDatepicker" id="settings-birthday" name="user_birthday" placeholder="Enter your birthday" value="1st of January, 1970">
                   </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Location</label>
                     <input type="text" class="form_opog4vh_input" id="settings-location" name="user_location" placeholder="Enter your location" value="UK">
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Bio</label>
                     <textarea type="text" class="form_opog4vh_input" id="settings-biography" name="user_bio" placeholder="Tell us a bit about yourself" rows="4">I love programming and maths more than you do xd</textarea>
                   </div>
                 </div>
                 <div class="updateProfileBtn_container col-md-12">
                   <button type="submit" name="update_profileBtn" class="form_opog4vh_updateChanges_btn">Update Profile</button>
                 </div>
               </form>
             </div>
             <div class="settings_opog4vh_contentCon divFade" id="user-settings_tab">
               <h2 class="settings_opog4vh_contentTitle">Your Settings</h2>
               <form>
                <div class="col-lg-6 col-md-6">
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Current Password</label>
                     <input type="email" name="user_password" class="form_opog4vh_input">
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">New Password</label>
                     <input type="password" name="user_new_password" class="form_opog4vh_input">
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Confirm Password</label>
                     <input type="password" name="user_password" class="form_opog4vh_input">
                   </div>
                   <div class="updateProfileBtn_container">
                     <button class="form_opog4vh_updateChanges_btn">Update Password</button>
                   </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Current Email</label>
                     <p class="curr_emailTxt">nban***@gmail.com</p>
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">Enter Password</label>
                     <input type="password" name="user_password" class="form_opog4vh_input">
                   </div>
                   <div class="form_opog4vh_group">
                     <label for="nameInput">New Email</label>
                     <input type="email" name="user_new_email" class="form_opog4vh_input">
                   </div>
                   <div class="updateProfileBtn_container">
                     <button class="form_opog4vh_updateChanges_btn">Update Email</button>
                   </div>
                 </div>
               </form>
             </div>
             <div class="settings_opog4vh_contentCon divFade" id="accounts_tab">
               <div class="col-lg-6 col-md-6">
                 <h3 class="widget_title"><i class="fa fa-gamepad"></i>Games</h3>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Osu:<?php echo accountActivate($user_info['osu'])?></label>
                   <input type="text" id="osu_acc" name="osu!_acc" class="form_opog4vh_input" value="<?php echo $user_info['osu'][0]?>" placeholder="Your username on osu.ppy.sh">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">League of Legends:<?php echo accountActivate($user_info['lol']) ?> </label>
                   <input type="email" id="lol_acc" name="myanimelist_acc" class="form_opog4vh_input" value="<?php echo $user_info['lol'][0]?>" placeholder="Your username on LOL">
                 </div>
               </div>
               <div class="col-lg-6 col-md-6">
                 <h3 class="widget_title"><i class="fa fa-cubes"></i>Accounts</h3>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">Discord: <?php echo accountActivate($user_info['discord']) ?> </label>
                   <input type="text" id="discord_acc" name="discord_acc" class="form_opog4vh_input" value="<?php echo $user_info['discord'][0]?>" placeholder="Your username on Discord">
                 </div>
                 <div class="form_opog4vh_group">
                   <label for="nameInput">MyAnimeList:  <span></span></label>
                   <input type="email" id="myanimelist_acc" name="myanimelist_acc" class="form_opog4vh_input" placeholder="Your username on myanimelist.net">
                 </div>
               </div>
               <div class="updateProfileBtn_container col-md-12">
                 <button type="submit" id="account_updateBtn" name="update_profileBtn" class="form_opog4vh_updateChanges_btn">Save Changes</button>
               </div>
             </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

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

  <!-- Sign In -->
  <?php
    getLoginMenu();
  ?>
  <!-- Live 2D Model -->
  <div  id= "landlord"  style= "left:5px;bottom:0px;" >
    <div  class= "message"  style= "opacity:0" ></div>
    <canvas id= "live2d" width= "450" height= "640" class= "live2d" ></canvas>
    <div  class= "live_talk_input_body" >
      <div  class= "live_talk_input_name_body" >
          <input  name= "name"  type= "text"  class= "Live_talk_name white_input"  id= "AIuserName"  autocomplete= "off" Placeholder= "Your Name"  />
        </div>
        <div  class= "live_talk_input_text_body" >
          <input  name= "talk"  type= "text"  class= "live_talk_talk white_input"  id= "AIuserText"  autocomplete= "off"  placeholder = "What do you want to talk about" />
            <button  type= "button"  class= "live_talk_send_btn"  id= "talk_send" > Send </button>
        </div>
    </div>
    <Input  name= "live_talk"  id= "live_talk"  value= "1" Type= "hidden"  />
    <div  class= "live_ico_box" >
      <div  class= "live_ico_item type_info"  id= "showInfoBtn" ></div>
      <div  class= "live_ico_item type_talk"  id= "showTalkBtn" ></div >
        <div  class= "live_ico_item type_youdu"  id= "chingChongBtn" ></div>
        <div  class= "Live_ico_item type_quit"  id= "hideButton" ></div>
        <input  name="live_statu_val"  id= "live_statu_val"  value= "0"  type= "hidden"  />
        <audio  src= ""  style= "display:none;"  id= "live2d_bgm"  data-bgm= "0"  preload= "none " ></audio>
        <input id= "partyType" value= "shake,rainbow" type= "hidden" >
    </div>
  </div>
  <div id="open_live2d">Summon!</div>


</div>  <!-- END LAYOUT MANAGER -->
<div class="page_overlay darker"></div>

<?php
  getLoggedIn_jsInfo();
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/cards.js"></script>
<script src="js/croppie.min.js"></script>
<script>

$(document).ready(function(){
  getBestCards();

  var selected;

  function openModal(){
    $(".change_opog4vh_pickModal").css("display","block");
    window.setTimeout( function() {
      $(".change_opog4vh_pickModal").addClass("open");
    }, 100);
    $("body").addClass("locked_body");
    $("body").css("padding-right","15px");
  }

  $(".canel_cropCont_image, .change_opog4vh_closeModal, .close_opog4vh_modal").on("click",function(e){
    e.preventDefault();
    $(".change_opog4vh_pickModal").removeClass("open");
    $(".change_opog4vh_pickModal").one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
    function(e){
      $(".change_opog4vh_pickModal").css("display","none");
      $("body").removeClass("locked_body");
      $("body").css("padding-right","");
      $(this).off('webkitTransitionEnd moztransitionend transitionend oTransitionEnd');
    });
  });

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
      console.log('jQuery bind complete');

    });
  }
  // Check if cancel is clicked
  if(!($("#upload_image").get(0).files.length == 0)){
    reader.readAsDataURL(this.files[0]);
    openModal();
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

$("#account_updateBtn").on("click",function(){
  var form_data = new FormData();
  var osuUsername = $("#osu_acc").val();
  var lolUsername = $("#lol_acc").val();
  var discordUsername = $("#discord_acc").val();
  var myanimelistUserame = $("#myanimelist_acc").val();

  form_data.append("user_id", user_id);
  form_data.append("token", token);
  form_data.append("osuUsername", osuUsername);
  form_data.append("lolUsername", lolUsername);
  form_data.append("discordUsername", discordUsername);
  form_data.append("myanimelistUserame", myanimelistUserame);

  $(".loading").fadeIn("fast");
  $.ajax({
    url : "include/update_profile.php?action=accounts-update",
    data: form_data,
    processData: false,
    contentType: false,
    type : "POST",
    dataType : "json",
    success : function(response){
      if(response.status == 0){
        Snackbar.showToast({def_text : response.error});
      }else if(response.status == 1){
        Snackbar.showToast({def_text : "Profile Updated Successfully!"});
        if(response.data[0] == 1){
        }
      }else{
        Snackbar.showToast({def_text : "An unknown error has occured !"});
      }
      $(".loading").fadeOut("fast");
    },
    error : function(xhr, ajaxOptions, thrownError){
      Snackbar.showToast({def_text : xhr.responseText});
      $(".loading").fadeOut("fast");
    }
  })
});


});

</script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/viewport.js"></script>
<script src="js/animationEffects.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- <script src="js/snowfall.js"></script> -->

<script>
var  message_Path  =  '/KukaHub/anime-playlist/live2d/' ;
var  talkAPI  =  "" ;
var home_Path = 'http://localhost/KukaHub/anime-playlist/';
</script>
<script type="text/javascript" src="live2d/js/live2d.js" ></script>
<script type="text/javascript" src="live2d/js/message.js" ></script>

<!-- A jQuery plugin that adds cross-browser mouse wheel support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/light-gallery/lightgallery.min.js"></script>
<script type="text/javascript" src="js/light-gallery/lg-thumbnail.js"></script>
</body>

</html>
