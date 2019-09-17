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
  <link rel="stylesheet" href="css/card.css">
  <link rel="stylesheet" href="css/lightgallery.css">
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

  <div class="cardGame_b930bwc_mainBody">
    <div class="cardGame_containerInner">
      <div class="drawing_cards_b930bwc_container" id="getCard">
        <div class="single_b930bwc_card" data-id="0"><div class="inner"><div class="face"><img src="images/cards/back.jpg" class="card_img"></div><div class="back"></div></div></div>
        <div class="single_b930bwc_card" data-id="1"><div class="inner"><div class="face"><img src="images/cards/back.jpg" class="card_img"></div><div class="back"></div></div></div>
        <div class="single_b930bwc_card" data-id="2"><div class="inner"><div class="face"><img src="images/cards/back.jpg" class="card_img"></div><div class="back"></div></div></div>
      </div>
      <div class="drawing_cards_b930bwc_achievement_cont">
        <div class="drawing_cards_b930bwc_achievement">
          <div class="achievement_header">Achievement Obtained</div>
          <div class="achievement_title">Achievement Title</div>
          <div class="achievement_description">Achievement Description</div>
        </div>
        <div class="achievement_btnContainer">
          <button class="achievement_btn">OK</button>
        </div>
      </div>
    </div>
  </div>



<?php
  getLoggedIn_jsInfo();
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/perfect-scrollbar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/viewport.js"></script>
<script src="js/animationEffects.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/snowfall.js"></script>
<script src="js/anime.min.js"></script>
<script src="js/cards.js"></script>
</body>

</html>
