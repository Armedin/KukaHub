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
  <title>Anime Music Player</title>
</head>

<body class="music_player">

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
  <div id="layout_manager" class="layout_manager">
    <!-- SIDEMENU -->
  <div class="music_player_084nv9vnr_o_O_sidemenu_main">

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
  <div class="music_player_084nv9vnr_o_O_top_header">
    <?php getHeaderMainNav(0);?>
  </div>


  <!-- MAIN BODY WRAPPER -->
  <div class="music_player_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <div class="loading">
      <span class="colour_bar"></span>
    </div>

   <!-- Navbar Main Navigation-->
    <nav class="main_page_navigation">
      <ul>
        <li class="navigation_item active"><a class="navigation_cont_loader" data-target="#featured_content_overview" content-target="get-featured-content">Featured</a></li>
        <li class="navigation_item"><a class="navigation_cont_loader" data-target="#songs_content_overview" content-target="get-all-tracks">Songs</a></li>
        <li class="navigation_item"><a class="navigation_cont_loader" data-target="#playlists_content_overview" content-target="">Playlist</a></li>
        <li class="navigation_item"><a class="navigation_cont_loader" href="#">Recently</a></li>
      </ul>
    </nav>

    <div class="container_main_fluid">
      <div class="different_content_from_o_O_tabs">

        <!-- Featured Playlist -->
        <div class="featured_playlists inactive_tab active" id="featured_content_overview">
        </div>

        <!-- All Songs -->
        <div class="all_songs_container inactive_tab" id="songs_content_overview">

        </div>

        <!-- All Playlists -->
        <div class="all_songs_container inactive_tab" id="playlists_content_overview">

        </div>

        <!-- PreLoader AJAX -->
        <div class="ajax_navTabs_preloader no_load"></div>

      </div>
    </div>


  </div>



  <!-- Sign In -->
  <div class="fadeIn modal_SignInBox" id="modal_SignInBox">
    <div class="heading">
      <h2>Login</h2>
    </div>
    <form class="signIn_form">
      <div class="form_input">
        <input autocomplete="off" type="text" name="usename" id="username" placeholder="Username">
      </div>
      <div class="form_input">
        <input autocomplete="off" type="password" id="password" name="password" placeholder="Password">
      </div>
      <button type="submit" class="login_submit btn_dis">Login</button>
      <div class="login_help_options">
        <a href="signup.php?redict_location=<?php echo urlencode($_SERVER['REQUEST_URI']) ?>" class="register_btn">Register</a>
        <a href="#" class="forget_pass_btn">Forgot password?</a>
      </div>
    </form>

    <div class="other_socialLogin">
      <span class="otherTxt">Other Methods(Coming Soon)</span>
      <a class="qq_login social_login"><i class="fab fa-qq"></i></a>
      <a class="wechat_login social_login"><i class="fab fa-weixin"></i></a>
    </div>

  </div>



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



  <!-- FOOTER -->
  <div class="footer_main_page_wrapper">


    <div class="footer_main_page_wrapper_inner">
      <div class="footer_space_20"></div>
      <div class="footer_main_body row-col">
        <div class="footer_space_38"></div>

        <div class="col-lg-4 col-xs-6">
          <div class="footer_logo">
            <a href="index.php">
              <img src="https://www.kukahub.com/dist/img/facilities/kukahub-logo-white.png">
              <h1>Ongaku</h1>
            </a>
          </div>
          <div class="footer_social_info">
            <h2>Anime Ongaku, Online Anime Songs</h2>
            <div class="social_links">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="footer_general_navs">
            <h3 class="title">Ongaku</h3>
            <ul>
              <li><a href="#">About</a></li>
              <li><a href="#">Help & Support</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Terms & Privacy</a></li>
              <li><a href="#">Store</a></li>
              <li><a href="#">Advertise</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <div class="footer_recently_released">
            <h3 class="title">Recent Playlist</h3>
            <div class="footer_recent_playlists_cont">

              <div class="horizontal_pos_music">
                <div class="music_image">
                  <img src="https://www.dropbox.com/s/ud1v1gktfifj9qp/emotional_music.png?raw=1">
                </div>
                <div class="music_details">
                  <h5 class="title">Do you want to hear?</h5>
                  <p class="jap_name">Naruto sama</p>
                </div>
              </div>
              <div class="horizontal_pos_music">
                <div class="music_image">
                  <img src="https://www.dropbox.com/s/ud1v1gktfifj9qp/emotional_music.png?raw=1">
                </div>
                <div class="music_details">
                  <h5 class="title">Do you want to hear?</h5>
                  <p class="jap_name">Naruto sama</p>
                </div>
              </div>
              <div class="horizontal_pos_music">
                <div class="music_image">
                  <img src="https://www.dropbox.com/s/ud1v1gktfifj9qp/emotional_music.png?raw=1">
                </div>
                <div class="music_details">
                  <h5 class="title">Do you want to hear?</h5>
                  <p class="jap_name">Naruto sama</p>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-lg-12 footer_copyright">
      <p>Copyright © 2018 Kuka Academy. All Rights Reserved.</p>
    </div>
  </div>



  <!-- Audio Player in the footer -->
  <div class="music_player_084nv9vnr_o_O_main_footer">
    <div class="audio_player_interface">

      <div class="left_music_interface">
        <div class="music_interface_song_title_details">
          <div class="curr_playing_song_name">
            <span class="song_picture">
              <img src="images/default_music_image.png">
            </span>
            <span class="song_details">
              <span class="song_title">NaN</span>
              <span class="song_japanese_title">Nan</span>
            </span>
          </div>
        </div>
      </div>
      <!-- Playlist -->
      <div class="playlist_cont">
        <span class="playlist_button"><i class="fal fa-list-ul"></i></span>
      </div>

      <div class="music_mainPlaylist_centered">
        <div class="mainPlaylist_o_O_inner_wrapper">

          <div class="musicPlayer_controller">
            <button class="prev_btn">
              <i class="control_btn"></i>
            </button>
            <button class="play_btn">
              <i class="control_btn"></i>
            </button>
            <button class="next_btn">
              <i class="control_btn"></i>
            </button>
          </div>
          <div class="musicPlayer_progress_cont">
            <div class="ins-time">00:00</div>
            <div class="music_playing_time_controller">
              <span class="music_currTime">00:00</span>
              <span class="music_totDuration">00:00</span>
            </div>
            <div class="music_playing_progress">
              <div class="progress_bar">
                <div class="progress_bar_playing">
                  <div class="progress_move_point"></div>
                </div>
                <div class="hover_bar"></div>
              </div>
            </div>
          </div>
          <div class="musicPlayer_volume_controller">
            <div class="circle_wrapper">
              <div class="circle_mask">
                <div class="circle_knob">
                </div>
                <div class="circle_knob_handler">
                </div>
                <div class="circle_volume_img">
                  <img src="images/player_volume.svg">
                </div>
              </div>
            </div>
          </div>
          <div class="music_player_secondOptions_cont">
            <div class="one_options shuffle_button">
              <i class="control_btn"></i>
            </div>
            <div class="one_options repeat_button">
              <i class="control_btn"></i>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>

  <div class="fully_openedPlaylist_cont">
    <div class="fully_openedPlaylist_cont_wrapper">
      <div class="openedPlaylist_closeBtn">
        <div class="openedPlaylist_innerCloseBtn">
          <span class="close_bar"></span>
          <span class="close_bar"></span>
        </div>
      </div>
      <div class="inner_fully_openedPlaylist_cont_top">

        <div class="curr_song_media">
          <div class="song_picture playing_song_poster">
            <img src="images/default_music_image.png">
          </div>
          <div class="playing_song_details">
            <div class="song_title_container">
              <span class="song_title">NaN</span>
            </div>
            <div class="song_jap_title_container">
              <span class="song_japanese_title">NaN</span>
            </div>
            <a class="open_kanji">Kanji</a>
          </div>
        </div>

        <div class="media_musicPlayer_controller">
          <div class="media_playing_controlOptions">
            <button class="prev_btn controlOp_btn">
              <i class="control_btn"></i>
            </button>
            <button class="play_btn controlOp_btn">
              <i class="control_btn"></i>
            </button>
            <button class="next_btn controlOp_btn" >
              <i class="control_btn"></i>
            </button>
          </div>
          <div class="media_playing_durationController">
            <div class="curr_time_cont">
              <span class="music_currTime">00:00</span>
            </div>
            <div class="musicPlayer_progress_cont">
              <div class="ins-time">00:00</div>
              <div class="music_playing_progress">
                <div class="progress_bar" id="#progress_bar2">
                  <div class="progress_bar_playing">
                    <div class="progress_move_point"></div>
                  </div>
                  <div class="hover_bar"></div>
                </div>
              </div>
            </div>
            <div class="tot_time_cont">
              <span class="music_totDuration">00:00</span>
            </div>
          </div>
        </div>

      </div>

      <div class="fully_openedPlaylist_playlistOther_songs_scrollableY">
        <ul>
          <li>
            <div class="music_main_photo_info_tit">
              <div class="music_image_cont">
                <img src="https://www.dropbox.com/s/z61ni6w9af89vqx/charlotte.png?raw=1">
                <div class="music_hovered">
                  <span class="dark_bg_play">
                    <i class="fab fa-google-play"></i>
                  </span>
                </div>
              </div>
              <div class="music_title_det">
                <span class="premusic_en_title">NaN</span>
                <span class="premusic_jp_title">NaN</span>
              </div>
            </div>
            <div class="music_meta_info">
              <span class="premusic_duration">00:00</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="openedPlaylist_lyrics_cont">
    <div class="lyrics_inner">
      <audio preload="auto" id="audio-main"></audio>
      <div class="lyrics kuka-lyrics romaji-lyrics" data-media="audio-main">

      </div>
      <div class="lyrics kuka-lyrics kanji-lyrics" data-media="audio-main">

      </div>
    </div>
  </div>

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


var speed = 5000;
var slideIndex=0;

//showSlides();

function showSlides(){
  var slides = $(".slider-item");
  for(var i=0;i<slides.length;i++){
    $(slides[i]).css("display","none");
  }
  if(slideIndex>=slides.length){
    slideIndex=0;
  }
  $(slides[slideIndex]).fadeIn("fast");
  console.log(slides[slideIndex]);
  slideIndex++;
  setTimeout(showSlides,speed);
};

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



//When changing the playlist
$("body").on("click",".featured_playlist_box",function(){
  var playlistId=$(this).attr("id").replace("playlistId_","");
  $.ajax({
    type: "POST",
    url: "include/playlists.php?action=get-specific-playlist",
    data: {playlistId: playlistId},
    dataType: "json",
    success: function(response){
      if(response.status == 0){
        Snackbar.showToast({def_text:response.error});
      }else{
        Snackbar.showToast({def_text:"Playlist Successfully Changed!"});
        current_playlist = response.data;
        changePlaylist();
      }
    },
    error: function(xhr, ajaxOptions, thrownError){
      Snackbar.showToast({def_text:xhr.responseText});
    }
  });

});

//When changing the track
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

  $(".openMentor").on("click",function(){
    $(".mentorSelection_main").fadeIn("fast");
  });
  $(".select_mentorBtn").on("click",function(){
    $('#landlord').delay(200).fadeIn(200);//Show
    updateLive2D(($(".mentor-avatar.selectedAvatar").index()));
    $(".mentorSelection_main").fadeOut("fast");
  });

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

<!-- Live 2D -->
<script>
var  message_Path  =  '/KukaHub/anime-playlist/live2d/' ;
var  talkAPI  =  "" ;
var home_Path = 'http://localhost/KukaHub/anime-playlist/';
// var live2d_Type = 2;
</script>
<script type= "text/javascript"  src= "live2d/js/live2d.js" ></script>
<script type= "text/javascript"  src= "live2d/js/message.js" ></script>

</body>

</html>
