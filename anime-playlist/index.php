<?php
include('include/song_struc.php');

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
</head>

<body class="ongaku-app-player">

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
  <div id="layout_manager" class="layout_manager no_sidemenu">

    <!-- SIDEMENU -->
    <?php
    if(isUserLoggedIn()){
      getUserSideMenu();
    }
     ?>


  <!-- HEADER TOP NAV -->
  <div class="music_player_084nv9vnr_o_O_top_header ongaku_header">
    <?php getHeaderMainNav(0);?>
  </div>
  <div class="music_player_084nv9vnr_o_O_contentBackground">
    <div class="content_background"></div>
  </div>

  <!-- MAIN BODY WRAPPER -->
  <div class="music_player_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <div class="loading">
      <span class="colour_bar"></span>
    </div>

    <div class="music_player_084nv9vnr_o_O_pageMedia_info">

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
    <!-- Footer Wrapper-->
    <div class="music_player_footerWrapper">
      <div class="col-lg-12 footer_copyright">
        <p>Copyright © 2018 Kuka Academy. All Rights Reserved.</p>
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




  <div class="music_player-fullPlaylist_layout">
    <div class="layout_innerWrapper">
      <div class="main_panel lyrics_cont">
        <audio preload="auto" id="audio-main"></audio>
        <div class="lyrics kuka-lyrics romaji-lyrics" data-media="audio-main">
        </div>
      </div>
      <div class="side_rightPanel playlist_cont">
        <div class="queueList_text">
          <h4>Queue</h4>
        </div>
        <div class="playlist_otherSongs_scrollable">
          <div class="playlist_scrollLayout_content">
            <ul>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Audio Player in the footer -->
  <div class="music_player_main-ongaku_app">
    <div class="main-player player-paused">
      <div class="ongaku_app-player-container">
        <div class="player-main-content">
          <img class="player-song-image song_image" src="https://www.dropbox.com/s/iyq3t842calk5w7/naruto_shippuden_man_of_the_world.jpg?raw=1">
          <div class="player-song-info">
            <span class="song_title song_title">NaN</span>
            <span class="song_jap_title song_jap_title">NaN</span>
          </div>
          <div class="player-song-controllers">
            <button class="player-btn-controller" id="randomBtn">
              <i class="fas fa-random"></i>
            </button>
            <button class="player-btn-controller" id="prevBtn">
              <i class="fas fa-step-backward"></i>
            </button>
            <button class="player-btn-controller" id="playBtn">
              <i class="fas fa-play play-icon"></i>
              <i class="fas fa-pause pause-icon"></i>
            </button>
            <button class="player-btn-controller" id="nextBtn">
              <i class="fas fa-step-forward"></i>
            </button>
            <button class="player-btn-controller" id="repeatBtn">
              <i class="fas fa-repeat"></i>
            </button>
          </div>
          <div class="player-content-space"></div>
          <div class="player-song-time">00:00</div>
          <div class="player-song-duration">0:00</div>
          <button class="player-btn-controller" id="muteBtn">
            <i class="fas fa-volume-down volume-icon"></i>
            <i class="fas fa-volume-off volume-off-icon"></i>
          </button>
          <div class="player-volume">
            <input type="range" min="0" max="1" step="0.05" value="0.5" id="volumeSlider" autocomplete="off" style="--vol-value:50%">
          </div>
          <button class="player-btn-controller" id="openPlaylist">
            <i class="fas fa-chevron-up"></i>
          </button>
        </div>
        <div class="player-progress_bar">
          <div class="slider_container">
            <div class="slideBar_cont">
              <div class="player-progress" id="player-progress">
                <div class="primary-progress"></div>
              </div>
            </div>
          </div>
          <div class="hover-time-info">0:00</div>
        </div>
      </div>
    </div>
  </div>


  <!-- Live 2D Model -->
  <div id="live2dModule" style= "left:5px;bottom:0px;">
    <div class="message" style= "opacity:0"></div>
    <canvas id="live2d" width="450" height="620" class="live2d"></canvas>
    <input name="live_talk" id="live_talk" value="1" type="hidden"/>
    <div class="live2d_toolContainer">
      <div class="live2d-tool-icon type_talk" id="showTalkBtn"><i class="fas fa-reply"></i></div>
      <div class="live2d-tool-icon type_dress" id="changeDressBtn"><i class="fas fa-user-secret"></i></div>
      <div class="live2d-tool-icon type_toxic" id="chingChongBtn"><i class="fas fa-bolt"></i></div>
      <div class="live2d-tool-icon type_quit" id="hideButton"><i class="fas fa-power-off"></i></div>
      <input id="partyType" value="shake,rainbow" type="hidden">
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


<script src="js/perfect-scrollbar.min.js"></script>
<script>
var current_playlist;

$(document).ready(function(){
var ps = new PerfectScrollbar('.playlist_otherSongs_scrollable');
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
      $(".seach_songs_dropdown").css("display","none");
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
    $('#live2dModule').delay(200).fadeIn(200);//Show
    updateLive2D(($(".mentor-avatar.selectedAvatar").index()));
    $(".mentorSelection_main").fadeOut("fast");
  });

});

$(document).on("scroll",function(){
    updateHeader();
});
updateHeader();
$header = $(".ongaku_header");
function updateHeader(){
  $(".ongaku_header").toggleClass('page-scrolled', $(this).scrollTop() > 4);
}


</script>
<script src="js/main_lyrics.js"></script>
<script src="js/anime_main.json"></script>
<script src="js/songs.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/viewport.js"></script>
<script src="js/animationEffects.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>

<!-- Live 2D -->
<script type= "text/javascript"  src= "live2d/js/live2d.js" ></script>
<script type= "text/javascript"  src= "live2d/js/message.js" ></script>

</body>

</html>
