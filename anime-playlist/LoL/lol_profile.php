<?php
include('../include/constantFunctions.php');
include('leagueAPI/autoload.php');

use leagueAPI\API;
use DataDragonApi\DataDragonApi;

$api = new Api('RGAPI-a443b8e5-0274-4e46-915b-e7cca5bcba11');
$api->setRegion('eune');
$dataDragon = new DataDragonApi();
$dataDragon->initByCdn();

// Always use a [0] in the end of objects, since we are always returning arrays ...
// DTO shall be used I guess xD

$summonerObject = $api->summoner();
$summoner = $summonerObject->getInfo("FNC Kuka")[0];
$summoner_id = $summoner->id;

$leagueObject = $api->league();
$league = $leagueObject->getLeagueForSummoner($summoner_id)[0];

$summoner_rank_img = $leagueObject->getLeagueRankImage($league->tier.' '.$league->rank);
$user_info = getUserAccountInfo(getSessionUser_id());
 ?>
<html>

<head>
  <?php getHeader("League of Legends"); ?>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="../css/perfect-scrollbar.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/main.css" rel="stylesheet">
  <link href="css/league.css" rel="stylesheet">
  <link href="../css/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/lightgallery.css">
</head>

<body class="lolPage">

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
  <!-- HEADER TOP NAV -->
  <div class="music_player_084nv9vnr_o_O_top_header">
    <?php
      getHeaderMainNav(0);
     ?>
  </div>

  <div class="summoner_page_header"></div>
  <!-- MAIN BODY WRAPPER -->
  <div class="summoner_profile_084nv9vnr_o_O_content_fullWrapper" id="mainContent">
    <div class="summoner_profile_main_headerCont">
      <div class="profile_header_top">
        <div class="inner_paddingWrapp">
          <div class="profile_main_info">
            <div class="summoner_equipped_icon">
              <div class="rankBorder_img"></div>
              <img class="summoner_icon" src="<?php echo $dataDragon->getProfileIcon($summoner->profileIconId) ?>">
            </div>
            <div class="summoner_info">
              <div class="summoner_info_username_cont">
                <h3 class="summoner_name"><?php echo $summoner->name ?></h3>
              </div>
              <div class="summoner_info_rank_details">
                <img src="<?php echo $summoner_rank_img ?>" class="rank_img">
                <div>
                  <div> <span>Ranked Solo/Duo <span></div>
                  <div class="rank-text <?php echo strtolower($league->tier)?>"><p><?php echo $league->tier . ' '. $league->rank ?></p></div>
                  <div>
                    <span class="league_points"><?php echo $league->leaguePoints.' LP' ?></span>
                    <span class="back_slash">/</span>
                    <span class="wins_loses"><?php echo $league->wins.'W '.$league->losses.'L'?></span>
                    <span class="back_slash">/</span>
                    <span class="wl_ratio"><?php echo ceil(($league->wins/($league->wins+$league->losses))*100).'%'?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="profile_stats">
            <div class="profile_single_stat">
              <p class="stat_cat">Favourite role</p>
              <p class="stat_val">Top</p>
            </div>
            <div class="profile_single_stat">
              <p class="stat_cat">Most used champion</p>
              <p class="stat_val">Yasuo</p>
            </div>
            <div class="profile_single_stat">
              <p class="stat_cat">Total games played</p>
              <p class="stat_val"><?php echo $league->wins+$league->losses.' Games'?></p>
            </div>
            <div class="profile_single_stat">
              <p class="stat_cat">Tier</p>
              <p class="stat_val"><?php echo $league->leagueName?></p>
            </div>
            <div class="profile_single_stat">
              <p class="stat_cat">Veteran</p>
              <p class="stat_val"><?php echo $league->veteran==true?'Yes':'No'?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="profile_detail_update_bar">
        <div class="detail_bar_inner">
          <div class="update_profile_cont">
            <button class="btn update-profile-btn">Update</button>
          </div>
          <div class="profile_level_cont">
            <div class="level_progress">
              <div class="bar_user_level">
                <div class="bar_progress"></div>
                <span class="progress_perc">51%</span>
              </div>
            </div>
            <div class="user_level_cont">
              <div class="user_level"><?php echo $summoner->summonerLevel ?></div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- <div class="summoner_profile_page_navigations">
      <div class="page_nav_inner">
        <ul>
          <li><a href="#" class="active">Ranked</a></li>
        </ul>
      </div>

    </div> -->
    <div class="summoner_profile_main_navigations main_wrapper">
      <ul>
        <li><a href="#" class="active">Ranked</a></li>
        <li><a href="#">Match History</a></li>
        <li><a href="#">Champion Stats</a></li>
      </ul>
    </div>


    <div class="summoner_profile_main_body main_wrapper">
      <div class="summoner_div_inner_body">
        <div class="row-col">
          <div class="col-md-4">
            <div class="summoner_profile_widget top_champs">
              <div class="widget_header">
                <h5>Top Champions</h5>
              </div>
              <div class="widget_header_info">
                <div class="champion_info_o_O_championHeader">
                  <p class="sty_grey84m">Champion</p>
                </div>
                <div class="champion_info_o_O_championHeader_totGames">
                  <p class="sty_grey84m">Games</p>
                </div>
                <div class="champion_info_o_O_championHeader_winrate">
                  <p class="sty_grey84m">Win Ratio</p>
                </div>
                <div class="champion_info_o_O_championHeader_kda">
                  <p class="sty_grey84m">KDA</p>
                </div>
              </div>
              <div class="widget_champion_o_O_infoRow">
                <div class="champion_cef03_v_o_O_statInfo_con">
                  <div class="championIcon">
                    <img src="https://cdn.mobalytics.gg/stable/champion/Yasuo.png">
                  </div>
                  <div class="championInfo">
                    <p class="champ_name">Yassuo</p>
                    <p class="champ_avgcs">CS 183.4 (6.4)</p>
                  </div>
                </div>
                <p class="summoner_v_o_O_totGames">29</p>
                <p class="summoner_v_o_O_winrate">58.6%</p>
                <p class="summoner_v_o_O_totGames">1.7</p>
                <div></div>
              </div>
              <div class="widget_champion_o_O_infoRow">
                <div class="champion_cef03_v_o_O_statInfo_con">
                  <div class="championIcon">
                    <img src="https://cdn.mobalytics.gg/stable/champion/Jax.png">
                  </div>
                  <div class="championInfo">
                    <p class="champ_name">Yassuo</p>
                    <p class="champ_avgcs">CS 183.4 (6.4)</p>
                  </div>
                </div>
                <p class="summoner_v_o_O_totGames">29</p>
                <p class="summoner_v_o_O_winrate">58.6%</p>
                <p class="summoner_v_o_O_totGames">1.7</p>
                <div></div>
              </div>
              <div class="widget_champion_o_O_infoRow">
                <div class="champion_cef03_v_o_O_statInfo_con">
                  <div class="championIcon">
                    <img src="https://cdn.mobalytics.gg/stable/champion/Riven.png">
                  </div>
                  <div class="championInfo">
                    <p class="champ_name">Yassuo</p>
                    <p class="champ_avgcs">CS 183.4 (6.4)</p>
                  </div>
                </div>
                <p class="summoner_v_o_O_totGames">29</p>
                <p class="summoner_v_o_O_winrate">58.6%</p>
                <p class="summoner_v_o_O_totGames">1.7</p>
                <div></div>
              </div>

            </div>
            <div class="summoner_profile_widget top_champs">
              <div class="widget_header">
                <h5>Recently Played With</h5>
              </div>
              <table class="most_played_with_v_o_O_table">
                <thead>
                  <tr>
                    <th class="meif_3lv"><p class="sty_grey84m">Summoner</p></th>
                    <th class="lfi3_31v"><p class="sty_grey84m">W/L</p></th>
                    <th class="lfi3_31v"><p class="sty_grey84m">Win Ratio</p></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="played_with_v_o_O_row">
                    <td>
                      <a href="#">
                        <div class="summoner_played_withContainer">
                          <div class="summoner_icon">
                            <img src="https://cdn.mobalytics.gg/stable/champion/Yasuo.png">
                          </div>
                          <p class="summoner_played_with_username">FNC Kuka</p>
                        </div>
                      </a>
                    </td>
                    <td><p class="summoner_played_with_winratio">40.6%</p></td>
                    <td><p class="summoner_played_with_winratio">40.6%</p></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <div class="col-md-8">
            <div class="summoner_v_o_O_profile_matchList_cont">
              <div class="single_gameDetails_container defeat_cont">
                <div class="single_gameDetails_header">
                  <div class="gameDetails_header_left">
                    <p class="ijvmi2_v0e">Ranked Solo/Duo</p>
                    <p class="kim3v_oce sty_grey84m">an hour ago</p>
                  </div>
                  <div class="gameDetails_header_center">
                    <p class="ik3iv_res">Defeat</p>
                  </div>
                  <div class="gameDetails_header_right">
                    <p class="kim3v_oce sty_grey84m">29m 27s</p>
                    <a href="#" class="omeiv02_ce">Match Details</a>
                  </div>
                </div>
                <div class="single_gameDetails_body">

                  <div class="gameDetails_body_champInfo_row_02_ceDet col-md-2 col-sm-2">
                    <div class="gameDet_selChamp_detailPos">
                      <div class="gameDet_playPosition">
                      </div>
                      <div class="championIcon">
                        <img src="https://cdn.mobalytics.gg/stable/champion/Riven.png">
                      </div>
                      <p class="selChamp_name">Riven</p>
                    </div>
                    <div class="gameDet_spells_selRunes-detailImg">
                      <div class="gameDet_selectedRunes">
                        <div class="selectedRune_single">
                          <img src="https://u.gg/assets/lol/riot_static/9.6.1/img/small-perk-images/Styles/Precision/Conqueror/Conqueror.png?v9.6.2">
                        </div>
                        <div class="selectedRune_single">
                          <img src="https://u.gg/assets/lol/runes/8400.png">
                        </div>
                      </div>
                      <div class="gameDet_selectedSpells">
                        <div class="selectedSpell_single">
                          <img src="https://u.gg/assets/lol/riot_static/9.6.1/img/spell/SummonerFlash.png?v9.6.2">
                        </div>
                        <div class="selectedSpell_single">
                          <img src="https://u.gg/assets/lol/riot_static/9.6.1/img/spell/SummonerDot.png?v9.6.2">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="gameDetails_body_match_innerInfo_rowDets_stats col-md-4 col-sm-4">
                    <div class="played_roleIcon">
                      <img src="https://u.gg/assets/lol/roles/top.svg?v9.6.2">
                    </div>
                    <div class="match_innerInfo_stat_dou2v">
                      <p>Level <strong>14</strong></p>
                      <div class="inner_det_dou2v">
                        <p>160 <span class="grey_txt">(5.4)</span> CS</p>
                      </div>
                    </div>
                    <div class="match_innerInfo_stat_dou2v">
                      <p>3 <span class="grey_txt"> / </span>6<span class="grey_txt"> / </span>5</p>
                      <div class="inner_det_dou2v">
                        <p>1.33 <span class="grey_txt">KDA</span></p>
                      </div>
                    </div>
                  </div>

                  <div class="gameDetails_body_match_innerInfo_rowDets_stats col-md-6 col-sm-6">
                    <div class="itemsBought_container">
                      <div class="itemsBought_rowDetails">
                        <div class="items_bought_singleRow">
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                        </div>
                        <div class="items_bought_singleRow">
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                        </div>
                      </div>
                      <div>
                      </div>
                    </div>
                    <div class="gameDetails_all_summonersPick_champs">
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#" class="currSumm_champ">FNC Kuka</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Riven.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Malzahar.png">
                            </div>
                          </div>
                          <a href="#">TabulaRasaVII </a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">xhendi</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Rengar.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Sylas.png">
                            </div>
                          </div>
                          <a href="#">KvmilHere</a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">xSaldaisx</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Vladimir.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/TwistedFate.png">
                            </div>
                          </div>
                          <a href="#">slas223</a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">przemek20121</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Kaisa.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Sivir.png">
                            </div>
                          </div>
                          <a href="#">Dancing Granate</a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">Hεphaεstuη</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Leona.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Braum.png">
                            </div>
                          </div>
                          <a href="#">NRG Adonis</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="single_gameDetails_container victory_cont">
                <div class="single_gameDetails_header">
                  <div class="gameDetails_header_left">
                    <p class="ijvmi2_v0e">Ranked Solo/Duo</p>
                    <p class="kim3v_oce sty_grey84m">an hour ago</p>
                  </div>
                  <div class="gameDetails_header_center">
                    <p class="ik3iv_res vic">Victory</p>
                  </div>
                  <div class="gameDetails_header_right">
                    <p class="kim3v_oce sty_grey84m">29m 27s</p>
                    <a href="#" class="omeiv02_ce">Match Details</a>
                  </div>
                </div>
                <div class="single_gameDetails_body">

                  <div class="gameDetails_body_champInfo_row_02_ceDet col-md-2 col-sm-2">
                    <div class="gameDet_selChamp_detailPos">
                      <div class="gameDet_playPosition">
                      </div>
                      <div class="championIcon">
                        <img src="https://cdn.mobalytics.gg/stable/champion/Riven.png">
                      </div>
                      <p class="selChamp_name">Riven</p>
                    </div>
                    <div class="gameDet_spells_selRunes-detailImg">
                      <div class="gameDet_selectedRunes">
                        <div class="selectedRune_single">
                          <img src="https://u.gg/assets/lol/riot_static/9.6.1/img/small-perk-images/Styles/Precision/Conqueror/Conqueror.png?v9.6.2">
                        </div>
                        <div class="selectedRune_single">
                          <img src="https://u.gg/assets/lol/runes/8400.png">
                        </div>
                      </div>
                      <div class="gameDet_selectedSpells">
                        <div class="selectedSpell_single">
                          <img src="https://u.gg/assets/lol/riot_static/9.6.1/img/spell/SummonerFlash.png?v9.6.2">
                        </div>
                        <div class="selectedSpell_single">
                          <img src="https://u.gg/assets/lol/riot_static/9.6.1/img/spell/SummonerDot.png?v9.6.2">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="gameDetails_body_match_innerInfo_rowDets_stats col-md-4 col-sm-4">
                    <div class="played_roleIcon">
                      <img src="https://u.gg/assets/lol/roles/top.svg?v9.6.2">
                    </div>
                    <div class="match_innerInfo_stat_dou2v">
                      <p>Level <strong>14</strong></p>
                      <div class="inner_det_dou2v">
                        <p>160 <span class="grey_txt">(5.4)</span> CS</p>
                      </div>
                    </div>
                    <div class="match_innerInfo_stat_dou2v">
                      <p>3 <span class="grey_txt"> / </span>6<span class="grey_txt"> / </span>5</p>
                      <div class="inner_det_dou2v">
                        <p>1.33 <span class="grey_txt">KDA</span></p>
                      </div>
                    </div>
                  </div>

                  <div class="gameDetails_body_match_innerInfo_rowDets_stats col-md-6 col-sm-6">
                    <div class="itemsBought_container">
                      <div class="itemsBought_rowDetails">
                        <div class="items_bought_singleRow">
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                        </div>
                        <div class="items_bought_singleRow">
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                          <div class="single_item"></div>
                        </div>
                      </div>
                      <div>
                      </div>
                    </div>
                    <div class="gameDetails_all_summonersPick_champs">
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#" class="currSumm_champ">FNC Kuka</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Riven.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Malzahar.png">
                            </div>
                          </div>
                          <a href="#">TabulaRasaVII </a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">xhendi</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Rengar.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Sylas.png">
                            </div>
                          </div>
                          <a href="#">KvmilHere</a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">xSaldaisx</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Vladimir.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/TwistedFate.png">
                            </div>
                          </div>
                          <a href="#">slas223</a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">przemek20121</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Kaisa.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Sivir.png">
                            </div>
                          </div>
                          <a href="#">Dancing Granate</a>
                        </div>
                      </div>
                      <div class="all_summonerPick_singleContainer">
                        <div class="gameDet_summonerChamp_pickCont">
                          <a href="#">Hεphaεstuη</a>
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Leona.png">
                            </div>
                          </div>
                        </div>
                        <div class="gameDet_summonerChamp_pickCont">
                          <div class="single_champSelected_cont">
                            <div class="championIcon">
                              <img src="https://cdn.mobalytics.gg/stable/champion/Braum.png">
                            </div>
                          </div>
                          <a href="#">NRG Adonis</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
<script src="../js/croppie.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/app.js"></script>
<script src="../js/anime.min.js"></script>
<script src="../js/viewport.js"></script>
<script src="../js/animationEffects.js"></script>
<script src="../js/imagesloaded.pkgd.min.js"></script>
<!-- <script src="js/snowfall.js"></script> -->

<!-- A jQuery plugin that adds cross-browser mouse wheel support -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="../js/light-gallery/lightgallery.min.js"></script>
<script type="text/javascript" src="../js/light-gallery/lg-thumbnail.js"></script>
</body>

</html>
