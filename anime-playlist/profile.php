<?php
include('include/constantFunctions.php');
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
  <link rel="stylesheet" href="css/card.css">
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
    <?php getHeaderMainNav(1);?>
  </div>


  <!-- MAIN BODY WRAPPER -->
  <div class="user_profile_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <div class="loading">
      <span class="colour_bar"></span>
    </div>
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
        <li><a href="#" class="active">About</a></li>
        <li><a href="#">Anime</a></li>
        <li><a href="#">Playlist</a></li>
        <li><a href="cards.php">Cards</a></li>
        <li><a href="#">Badges</a></li>
      </ul>
    </div>

    <section class="profile_084nv9vnr_o_O_Container">
      <div class="container_inner large_inner">
        <h3 class="heading">Most Listened Tracks</h3>
        <div class="profile_user_084nv9vnr_o_O_playlistCont">
          <div class="row-col">
            <div class="col-xs-6 col-md-3">
              <div class="playlist_box">
                <div class="playlist_image_box">
                  <img src="https://www.dropbox.com/s/iyq3t842calk5w7/naruto_shippuden_man_of_the_world.jpg?raw=1">
                </div>
                <h4 class="title">Man of the World</h4>
              </div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="playlist_box">
                <div class="playlist_image_box">
                  <img src="https://www.dropbox.com/s/uqpfigb1q0izjcj/black_clover.png?raw=1">
                </div>
                <h4 class="title">Black Rover</h4>
              </div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="playlist_box">
                <div class="playlist_image_box">
                  <img src="https://www.dropbox.com/s/kg3eiueab1vnjgw/shigatsu_wa_kimi_no_uso_orange.png?raw=1">
                </div>
                <h4 class="title">Orange</h4>
              </div>
            </div>
            <div class="col-xs-6 col-md-3">
              <div class="playlist_box">
                <div class="playlist_image_box">
                  <img src="https://www.dropbox.com/s/2zaq8dvp0636ktb/ao_haru_ride_ending.png?raw=1">
                </div>
                <h4 class="title">ブルー</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="profile_084nv9vnr_o_O_Container grey_bg wave_model user_084nv9vnr_o_O_rarestCards_cont">
      <div class="container_inner large_inner">
        <h3 class="heading_v2">Rarest Cards Collection</h3>
        <div class="profile_user_084nv9vnr_o_O_cardCollection">
          <a class="col-xs-6 col-md-2 wm_getcard_box">
            <img class="wm_getcard_img" src="images/cards/3027.jpg">
          </a>
          <a class="col-xs-6 col-md-2 wm_getcard_box">
            <img class="wm_getcard_img" src="images/cards/3027.jpg">
          </a>
          <a class="col-xs-6 col-md-2 wm_getcard_box">
            <img class="wm_getcard_img" src="images/cards/3027.jpg">
          </a>
          <a class="col-xs-6 col-md-2 wm_getcard_box">
            <img class="wm_getcard_img" src="images/cards/3027.jpg">
          </a>
          <a class="col-xs-6 col-md-2 wm_getcard_box">
            <img class="wm_getcard_img" src="images/cards/3027.jpg">
          </a>
          <a class="col-xs-6 col-md-2 wm_getcard_box">
            <img class="wm_getcard_img" src="images/cards/3027.jpg">
          </a>
        </div>
      </div>
    </section>
    <section class="profile_084nv9vnr_o_O_Container wave_model">
      <div class="container_inner large_inner">
        <h2>Hi</h2>
      </div>
    </section>



    <div class="footer_wrapper">
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
        <!-- <div  class= "live_ico_item type_music"  id= "musicButton" ></div> -->
        <div  class= "live_ico_item type_youdu"  id= "chingChongBtn" ></div>
        <div  class= "Live_ico_item type_quit"  id= "hideButton" ></div>
        <input  name="live_statu_val"  id= "live_statu_val"  value= "0"  type= "hidden"  />
        <audio  src= ""  style= "display:none;"  id= "live2d_bgm"  data-bgm= "0"  preload= "none " ></audio>
        <!-- <input  name= "live2dBGM"  value= "https://www.dropbox.com/s/qrcxop9gg1k3qq5/Black%20Clover%20Opening%203.mp3?raw=1"  type= "hidden" > -->
        <input id= "partyType" value= "shake,rainbow" type= "hidden" >
    </div>
  </div>
  <div id="open_live2d">Summon!</div>


  <!-- Change Mentor -->
  <div class="mentorSelection_main">
    <div class="mentorSelection_backgroundImg">
      <div class="background_mentorImg">
        <!-- <img src="images/histoire.png"> -->
      </div>
    </div>
    <div class="mentorSelection_infoContainer">
      <div class="mentorSelection_onRight">
        <div class="mentorRow_selectionPics">
          <button class="mentor-avatar selectedAvatar">
            <div class="mentor_avatarBox">
              <div class="inner_box">
                <div class="avatar_img histoire_avatar"></div>
              </div>
            </div>
            <p class="mentor_name">Histoire</p>
          </button>
          <button class="mentor-avatar">
            <div class="mentor_avatarBox">
              <div class="inner_box">
                <div class="avatar_img rem_avatar"></div>
              </div>
            </div>
            <p class="mentor_name">Rem</p>
          </button>
          <button class="mentor-avatar">
            <div class="mentor_avatarBox">
              <div class="inner_box">
                <div class="avatar_img miku_avatar"></div>
              </div>
            </div>
            <p class="mentor_name">Miku</p>
          </button>
        </div>
        <div class="sub_contentWrapper">
          <div class="mentorHeader_smallDet">
            <p class="role">Mentor</p>
            <p class="nameLabel">Histoire</p>
          </div>
          <div class="select_mentorContainer">
            <button class="select_mentorBtn">Select Mentor!</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>  <!-- END LAYOUT MANAGER -->
<div class="page_overlay darker"></div>

<?php
  getLoggedIn_jsInfo();
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/cards.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script>
var current_playlist;

$(document).ready(function(){
var ps = new PerfectScrollbar('.fully_openedPlaylist_playlistOther_songs_scrollableY');
ps.update();

$(".page_overlay").on("click",function(){
  $(".fully_openedPlaylist_cont").removeClass("open");
  $(".openedPlaylist_lyrics_cont").removeClass("open");
  $("body").removeClass("locked_body").removeClass("has_overlay");
});


// When firstly opened, the normal playlist playing
var data;
$.ajax({
  type: "POST",
  url: "include/playlists.php?action=get-playlist",
  data: data,
  dataType: "json",
  success: function(response){
    if(response.status == 0){
      Snackbar.showToast({def_text:response.error});
    }else{
      current_playlist = response.data;
      initialisePlaylist();
    }
  },
  error: function(xhr, ajaxOptions, thrownError){
    Snackbar.showToast({def_text:xhr.responseText});
  }
});

  $(".openMentor").on("click",function(){
    $(".mentorSelection_main").fadeIn("fast");
  });
  $(".select_mentorBtn").on("click",function(){
    $('#landlord').delay(200).fadeIn(200);//Show
    updateLive2D(($(".mentor-avatar.selectedAvatar").index()));
    $(".mentorSelection_main").fadeOut("fast");
  });

  $("body").on("click",".track_item",function(){
    var trackId=$(this).attr("id").replace("trackId_","");
    $.ajax({
      type: "POST",
      url: "include/playlists.php?action=get-specific-track",
      data: {trackId: trackId},
      dataType: "json",
      success: function(response){
        if(response.status == 0){
          Snackbar.showToast({def_text:response.error});
        }else{
          Snackbar.showToast({def_text:"Track Successfully Changed!"});
          current_playlist = response.data;
          changePlaylist();
        }
      },
      error: function(xhr, ajaxOptions, thrownError){
        Snackbar.showToast({def_text:xhr.responseText});
      }
    });

  });
  getBestCards();


});

</script>
<script src="js/lyrics.js"></script>
<script src="js/anime_main.json"></script>
<script src="js/anime_songs.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/viewport.js"></script>
<script src="js/animationEffects.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/snowfall.js"></script>

<!-- Live 2D -->
<script>
var  message_Path  =  '/KukaHub/anime-playlist/live2d/' ;
var  talkAPI  =  "" ;
var home_Path = 'http://localhost/KukaHub/anime-playlist/';
// var live2d_Type = 2;
</script>
<script type="text/javascript" src="live2d/js/live2d.js" ></script>
<script type="text/javascript" src="live2d/js/message.js" ></script>

<!-- A jQuery plugin that adds cross-browser mouse wheel support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/light-gallery/lightgallery.min.js"></script>
<script type="text/javascript" src="js/light-gallery/lg-thumbnail.js"></script>
</body>

</html>
