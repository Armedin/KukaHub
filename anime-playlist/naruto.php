<?php

include('../include/init_constantFunctions.php');

 ?>
<html>

<head>
  <?php getHeader("Anime Music Player | KukaHub"); ?>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="css/perfect-scrollbar.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <title>NarutoSan</title>
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
    <div class="sidemenu_user_piCont">
      <div class="dropdown_wrapper">
        <div>
          <a class="avatar_anchor" href="#">
            <span class="pro_pic_avatar">
              <img src="https://lolico.moe/usr/img/avatar1.png">
            </span>
          </a>
        </div>
        <a class="avatar_info">
          <span class="avatar_username">Armedin Kuka</span>
          <span class="avatar_title">Ultra Weeb</span>
        </a>
      </div>
      <div class="line_seperator"></div>
    </div>

    <nav class="sidebar_navigations">
      <ul class="navigations">
        <li class="navigation_header">
          <span>Music Navigation</span>
        </li>
        <li>
          <a href="#" class="active"> <i class="fal fa-home"></i><span>Home</span></a>
        </li>
        <li>
          <a href="#"> <i class="fab fa-servicestack"></i><span>Playlists</span></a>
        </li>
        <li>
          <a href="#"> <i class="fal fa-music"></i><span>Single Songs</span></a>
        </li>
      </ul>
    </nav>
    <a>
      <img src="images/umaru.png" class="hide" id="umaru_to_top">
    </a>
  </div>

  <!-- HEADER TOP NAV -->
  <div class="music_player_084nv9vnr_o_O_top_header">
    <div class="main_084nv9vnr_o_O_top_header">
      <a href="index.php" class="navbar_home">
        <img src="https://www.kukahub.com/dist/img/facilities/kukahub-logo-white.png">
        <span>KukaHub</span>
      </a>
    </div>

    <div class="navbar_084nv9vnr_o_O_collapse">
      <div class="navbar_sidemenu_btn_manConts">
        <a class="sidemenu_toggler navbar_floating_btn"><i class="fal fa-bars"></i></a>
      </div>
      <form class="song_search_form" method="post" role="search">
        <div class="search_songs_inputContainer">
          <input type="text" id="search_song" placeholder="Search Musics...">
          <span class="search_icon"><i class="fal fa-search"></i></span>
        </div>
      </form>
    </div>
    <!--<div class="content_fullWrapper_inner">
      <div class="left_side">
        <div class="music_trend_main">
          <span class="trending_song">Trending Songs : </span>
          <span class="trending_song_title">Code Geass Opening 1 (+8 More)</span>
        </div>
      </div>
      <div class="right_side">
      </div>
    </div>-->
  </div>


  <!-- MAIN BODY WRAPPER -->
  <div class="music_player_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <div class="loading">
      <span class="colour_bar"></span>
    </div>

    <div class="content_music_player_084nv9vnr_o_O_banner">
      <div class="wrapper_inner">
        <div class="row-col">
          <div class="col-lg-12 col-md-12 main_banner_controller">
            <div class="banner_left_image">

            </div>
            <div class="banner_info">
              <h1>This Month's</h1>
              <h1 class="blue_colored">Most Listened Openings</h1>

            </div>
          </div>
        </div>
      </div>
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
          <!-- <div class="row-col hot_songs_cont">
            <div class="col-lg-8">
              <div class="hot_songs_cont_title">
                <h6>Hot Track</h6>
                <h2>Hot Songs</h2>
              </div>

              <div class="anime-owl-main" responsive-width="0:100%|600:50%|900:33.33%|1200:25%" >
                <div class="owl-carousel hot_songs_cont_body">

                   <div class="item">
                    <div class="horizontal_box_song">
                      <div class="image_box_song">
                        <img src="https://www.dropbox.com/s/vc8hjn1u6g4dld9/overlord_season3.png?raw=1">
                      </div>
                      <div class="desc_box_song">
                        <h6>The Separation</h6>
                        <p>Rachel Platten</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div> -->
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

  <div class="page_overlay"></div>

  <!-- FOOTER -->

  <div class="footer_main_page_wrapper">
    <div class="footer_main_page_wrapper_inner">
      <div class="footer_space_20"></div>
      <hr>
      <div class="footer_main_body row-col">
        <div class="footer_space_38"></div>

        <div class="col-lg-4 col-xs-6">
          <div class="footer_logo">
            <a href="index.php">
              <img src="https://www.kukahub.com/dist/img/facilities/kukahub-logo.png">
              <h1>KukaHub</h1>
            </a>
          </div>
          <div class="footer_social_info">
            <h2>KukaHub Music, Online Anime Songs</h2>
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
            <h3 class="title">KukaHub Music</h3>
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
      <p>Copyright © 2018 KukaHub. All Rights Reserved.</p>
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
            <div class="music_playing_time_controller">
              <span class="music_currTime">00:00</span>
              <span class="music_totDuration">00:00</span>
            </div>
            <div class="music_playing_progress">
              <div class="progress_bar">
                <div class="progress_bar_playing">
                  <div class="progress_move_point"></div>
                </div>
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
              <div class="music_playing_progress">
                <div class="progress_bar">
                  <div class="progress_bar_playing">
                    <div class="progress_move_point"></div>
                  </div>
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
                <span class="premusic_en_title">Naruto OP</span>
                <span class="premusic_jp_title">Naruto OP</span>
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

</div>  <!-- END LAYOUT MANAGER -->

<?php
  getJs_Files();
 ?>


<script src="js/pjax.min.js" type="text/javascript"></script>

<script>

$(document).pjax('a[href^="/"]:not(a[target="_blank"], a[no-pjax])', {
            container: '.music_player_084nv9vnr_o_O_content_fullWrapper',
            fragment: '.music_player_084nv9vnr_o_O_content_fullWrapper',
            timeout: 8000
        }).on('pjax:send',function () {
            $('.loading').addClass('show');
        }).on('pjax:click', function() {
          window['Page'].doPJAXClickAction();
          $('body,html').animate({scrollTop:0},100);

        }).on('pjax:complete', function() {
            window['Page'].doPJAXCompleteAction();
            $('.loading').removeClass('show');
            alert("hi");
        });
</script>

<script src="js/perfect-scrollbar.min.js"></script>
<script>
var current_playlist;

// $(window).on('load', function() {
//         setTimeout(function() {
//             $('body').addClass('loaded');
//         }, 500);
// })

$(document).ready(function(){

var ps = new PerfectScrollbar('.fully_openedPlaylist_playlistOther_songs_scrollableY');
ps.update();

$(".page_overlay").on("click",function(){
  $(".fully_openedPlaylist_cont").removeClass("open");
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


// $.ajax({
//   type: "POST",
//   url: "include/playlists.php?action=get-featured-content",
//   data: data,
//   dataType: "json",
//   success: function(response){
//     if(response.status == 0){
//       Snackbar.showToast({def_text:response.error});
//     }else{
//       $(".featured_playlists").append(response.data);
//     }
//   },
//   error: function(xhr, ajaxOptions, thrownError){
//     Snackbar.showToast({def_text:xhr.responseText});
//   }
// });

// $.ajax({
//   type: "POST",
//   url: "include/playlists.php?action=get-hot-songs",
//   data: data,
//   dataType: "json",
//   success: function(response){
//     if(response.status == 0){
//       Snackbar.showToast({def_text:response.error});
//     }else{
//       $(".hot_songs_cont_body").append(response.data);
//     }
//   },
//   error: function(xhr, ajaxOptions, thrownError){
//     Snackbar.showToast({def_text:xhr.responseText});
//   }
// });


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

$("#umaru_to_top").click(function() {
    $("body,html").animate({
        scrollTop: 0
    }, 600)
});

});

function checkScroll(){
if ($(document).scrollTop() < 300) {
    $("#umaru_to_top").addClass("hide");
} else {
    $("#umaru_to_top").removeClass("hide");
}
}

window.setInterval(checkScroll, 300);

</script>

<script src="js/anime_main.json"></script>
<script src="js/anime_songs.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/viewport.js"></script>
<script src="js/animationEffects.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>

</body>

</html>
