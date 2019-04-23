<?php
include('include/constantFunctions.php');
$user_info = getUserAccountInfo(getSessionUser_id());
 ?>
<html>

<head>
  <?php getHeader("Osu Ranking"); ?>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="css/perfect-scrollbar.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="css/lightgallery.css">
</head>

<body class="osuRanking">

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
  <div class="osu_ranking_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <table class="ranking_list">
      <thead>
        <tr>
          <th>#</th>
          <th>Player</th>
          <th class="ranking-score">Performance</th>
          <th class="ranking-accuracy">Accuracy</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div>

  <!-- Sign In -->
  <?php
    getLoginMenu();
  ?>

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
  $.ajax({
    url : "include/getOsuRanking.php?action=get-top-ranking",
    type : "POST",
    dataType : "json",
    success : function(response){
      if(response.status == 0){
        Snackbar.showToast({def_text : response.error});
      }else if(response.status == 1){
        var _html="";
        var osuData = response.userOsuInfo;
        osuData = osuData.sort(function(a,b){ return parseInt(a.pp_rank) - parseInt(b.pp_rank)});
        for(var i=0;i<osuData.length;i++){
          _html+='<tr class="ranking"><td>'+(i+1)+'.</td><td class="ranking-user"><a href="#"><img class="user_pp" src="'+osuData[i][1]['pro_pic']+'"></img></a><a class="user" href="#">'+osuData[i][0]['username']+'</a></td><td class="ranking-score">'+parseInt(osuData[i][0]['pp_rank']+0.5)+' pp</td><td class="ranking-accuracy">'+parseFloat(osuData[i][0]['accuracy']).toFixed(2)+' %</td></tr>';
        }
        $(".ranking_list tbody").append(_html);

      }else{
        Snackbar.showToast({def_text : "An unknown error has occured !"});
      }
    },
    error : function(xhr, ajaxOptions, thrownError){
      Snackbar.showToast({def_text : xhr.responseText});
    }
  })
});

</script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/viewport.js"></script>
<script src="js/animationEffects.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- <script src="js/snowfall.js"></script> -->

<!-- A jQuery plugin that adds cross-browser mouse wheel support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/light-gallery/lightgallery.min.js"></script>
<script type="text/javascript" src="js/light-gallery/lg-thumbnail.js"></script>
</body>

</html>
