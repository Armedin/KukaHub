var lyricsClass= new Lyrics($(".kuka-lyrics"));

var playBtn = $(".play_btn");
var nextBtn = $(".next_btn");
var prevBtn = $(".prev_btn");
var progress_bar_container = $(".musicPlayer_progress_cont");
var repeatBtn = $(".repeat_button");
var playlist_button = $(".playlist_button");

var music_details_container = $(".song_details");
var music_title = $(".song_title");
var music_jap_title = $(".song_japanese_title");
var music_picture = $(".song_picture>img");
var currentTime = $(".music_currTime");
var musicDuration = $(".music_totDuration");

var progressBar = $(".progress_bar:eq(0)");
var progressBar_menu = $(".progress_bar:eq(1)");
var playingBar = $(".progress_bar_playing");
var hoverBar = $(".hover_bar");
var insTime = $(".ins-time")
var progressLoc;
var progressDiff;

var music = $("#audio-main")[0];
var lyrics = $(".lyrics");

var autoPlay = false; //Autoplay not allowed anymore in Google


function togglePlay(){

  setTimeout(function()
  {

    if(music.paused){
      music.play();
      $(".audio_player_interface").addClass("music_playing");
      $(".media_musicPlayer_controller").addClass("music_playing");
      $(".curr_song_media").addClass("active");
    }else{
      music.pause();
      $(".audio_player_interface").removeClass("music_playing");
      $(".media_musicPlayer_controller").removeClass("music_playing");
      $(".curr_song_media").removeClass("active");
    }
  }, 300);

}


function isMusicLoading() {
  return music.readyState !== music.HAVE_FUTURE_DATA
    && music.readyState !== music.HAVE_ENOUGH_DATA;
}

function shuffle(array){
  var currentIndex = array.length, temporaryValue, randomIndex;
  // While there remain elements to shuffle
  while (0 !== currentIndex) {
    // Pick a remaining element
    randomIndex = Math.floor(Math.random() * currentIndex); // 0 -> length-1
    currentIndex -= 1;
    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }
  return array;
}

function displayTrackDetails(){
  music_title.text(anime_musics[0].name);
  music_jap_title.text(anime_musics[0].jap_name);
  music_picture.attr("src",anime_musics[0].img);
  getLyrics(anime_musics[0].name);
}

function getLyrics(name){
  var file = "lyrics/"+name+".lrc";
  var kanji_file = "lyrics/"+name+" Kanji.lrc";

  //Get romaji File !
  $.ajax({
    url: file,
    async: false,
    success: function(data){
      lyrics.html(data);
      lyricsClass.parseLyrics();
    },
    error: function(xhr){
      lyrics.html("Lyrics can't be allocated ...");
    }
  });

  //Get Kanji File !
  $.ajax({
    url: kanji_file,
    async: false,
    success: function(data){
      $(".kanji-lyrics").html(data);
    },
    error: function(xhr){
      $(".kanji-lyrics").html("Lyrics can't be allocated ...");
    }
  });
}


function playMusic(anime_musics){
  music.src= anime_musics[0].link;
  music.title = anime_musics[0].name;
  if(autoPlay){
    music.play();
    $(".audio_player_interface").addClass("music_playing");
    $(".media_musicPlayer_controller").addClass("music_playing");
    $(".curr_song_media").addClass("active");
  }
  displayTrackDetails();
}

var anime_musics;

//Main function called when ajax finishes loading.
function initialisePlaylist(){
  anime_musics = shuffle(current_playlist);
  playMusic(anime_musics);

  playBtn.on("click",function(){
    if(!autoPlay){
      autoPlay = true;
    }
    togglePlay();
  });

  //Progress Bars

  progressBar.mousemove(function(event){
      showHoverProgress(event, progressBar);
  });
  progressBar.mouseout(hideHoverProgress);
  progressBar.on("click",function(){
    music.currentTime = progressLoc;
    playingBar.width(progressDiff);
    hideHoverProgress();
  });
  progressBar_menu.mousemove(function(event){

      showHoverProgress(event, progressBar_menu);
  });
  progressBar_menu.mouseout(hideHoverProgress);
  progressBar_menu.on("click",function(){
    music.currentTime = progressLoc;
    playingBar.width(progressDiff);
    hideHoverProgress();
  });


  nextBtn.on("click",nextTrack);
  prevBtn.on("click",prevTrack);
  repeatBtn.on("click",repeatSong);
  music.addEventListener("loadedmetadata",function(){
    getDuration();
  });

  initializeFullPlaylist();
  playlist_button.on("click",openFullPlaylist);
  updateSelectedMusic();
  $(".openedPlaylist_innerCloseBtn").on("click",openFullPlaylist);
  $(".open_kanji").on("click",function(){
    $(".romaji-lyrics").html($(".kanji-lyrics").html());
    lyricsClass.parseLyrics();
  })
}

function convertTime(secs)
{
  var min = Math.floor(secs/60);
  var sec = secs % 60;
  min = (min < 10) ? "0" + min : min;
  sec = (sec < 10) ? "0" + sec : sec;
  return (min + ":" + sec);
}

function getDuration(){
  var d = Math.floor(music.duration);
  musicDuration.text(convertTime(d));
}

music.addEventListener('timeupdate', updateCurrTime);
function updateCurrTime(){
  var c = Math.round(music.currentTime);
  var totDur = Math.floor(music.duration);
  currentTime.text(convertTime(c));


  var secPercentage = 100/totDur;
  var totPercentage = c * secPercentage;
  playingBar.width(totPercentage+"%");

  if(totPercentage >= 100){
    totPercentage = 0;
    if(isRepeatingOn()){
      playMusic(anime_musics);
    }else{
      nextTrack();
    }
  }
}

function nextTrack(){
  anime_musics.push(anime_musics.shift());
  playMusic(anime_musics);
}

function prevTrack(){
  anime_musics.unshift(anime_musics.pop());
  playMusic(anime_musics);
}

function specTrack(index){
  let removedTrack = anime_musics.slice(0,index);
  anime_musics.splice(0, removedTrack.length);
  anime_musics = anime_musics.concat(removedTrack);
  playMusic(anime_musics);
}

function repeatSong(){
  repeatBtn.toggleClass("active");
}

function isRepeatingOn(){
  if(repeatBtn.hasClass("active")){
    return true;
  }else{
    return false;
  }
}

function openFullPlaylist(){
  $(".fully_openedPlaylist_cont").toggleClass("open");
  $(".openedPlaylist_lyrics_cont").toggleClass("open");
  $("body").toggleClass("locked_body");
  $("body").toggleClass("has_overlay");
}

//Find a better way ...
function initializeFullPlaylist(){
  var output = "";
  for(var i = 0; i<anime_musics.length; i++){
    output+= '<li class="single_music"><div class="music_main_photo_info_tit"><div class="music_image_cont"><img src="'+anime_musics[i].img+'"><div class="music_hovered">'+
    '<span class="dark_bg_play"><i class="fab fa-google-play"></i></span></div></div>'+
    '<div class="music_title_det"><span class="premusic_en_title">'+anime_musics[i].name+'</span><span class="premusic_jp_title">'+anime_musics[i].jap_name+'</span></div>'+
    '</div><div class="music_meta_info"><span class="premusic_duration">4 min</span></div></li>';
  }
  $(".fully_openedPlaylist_playlistOther_songs_scrollableY ul").html(output);
}

function updateSelectedMusic(){
  $(".single_music").on("click",function(){
    let selectedIndex;
    let selectedSongTitle = $(this).find(".premusic_en_title").html();
    let foundTitle = $.grep(anime_musics, function(track, index) {
			if(track.name === selectedSongTitle) {
				selectedIndex = index;
				return track;
      }
		});
    specTrack(selectedIndex);
  });
}

function changePlaylist(){
  anime_musics = shuffle(current_playlist);
  playMusic(anime_musics);
  initializeFullPlaylist();
  updateSelectedMusic();
}

function showHoverProgress(event, container){
  var _this = container;
  progressBarPos = _this.offset();
  progressDiff = event.clientX - progressBarPos.left;
  hoverBar.width(progressDiff);

  progressLoc = music.duration * (progressDiff/_this.outerWidth()); //Relative to width of container
  min  = Math.floor(progressLoc/60);
  sec = Math.floor(progressLoc - (min*60));

  if(min<0 || sec<0)
    return;

  min = min<10?'0'+min:min;
  sec = sec<10?'0'+sec:sec;

  if(isNaN(min) || isNaN(sec)){
    insTime.text('--:--');
  }else{
    insTime.text(min+':'+sec);
  }
  insTime.css({'left':progressDiff,'margin-left':'-21px'}).fadeIn(0);
}

function hideHoverProgress(){
  hoverBar.width(0);
  insTime.text('00:00').css({'left':'0px','margin-left':'0px'}).fadeOut(0);
}




//
