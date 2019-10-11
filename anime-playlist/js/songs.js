var lyricsClass= new Lyrics($(".kuka-lyrics"));
var lyrics_ps = new PerfectScrollbar('.lyrics_cont');

var playBtn = $("#playBtn");
var nextBtn = $("#nextBtn");
var prevBtn = $("#prevBtn");
var repeatBtn = $("#repeatBtn");
var randomBtn = $("#randomBtn");
var muteBtn = $("#muteBtn");

var playlist_button = $("#openPlaylist");


var music_title = $(".song_title");
var music_jap_title = $(".song_jap_title");
var music_picture = $(".song_image");
var currentTime = $(".player-song-time");
var musicDuration = $(".player-song-duration");

var progressBar = $(".player-progress_bar");
var playingBar = $(".primary-progress");
var volumeSlider = $("#volumeSlider");

var insTime = $(".hover-time-info")
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
      $(".main-player").removeClass("player-paused");
      $(".main-player").addClass("player-playing");
    }else{
      music.pause();
      $(".main-player").removeClass("player-playing");
      $(".main-player").addClass("player-paused");
    }
  }, 100);

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
  lyrics_ps.update();
}


function displayTrackDetails(){
  music_title.text(anime_musics[0].name);
  music_jap_title.text(anime_musics[0].jap_name);
  music_picture.attr("src",anime_musics[0].img);
  getLyrics(anime_musics[0].name);
}


function playMusic(anime_musics){
  music.src= anime_musics[0].link;
  music.title = anime_musics[0].name;
  if(autoPlay){
    togglePlay();
  }
  playingBar.width(0);
  displayTrackDetails();
  $(".single_song").removeClass("playing");
  $(".single_song").each(function(i, obj){
    if($(this).find(".song-en-title").html() == music.title){
      $(this).addClass("playing");
      return false;
    }
  });
}


var anime_musics;

//Main function called when ajax finishes loading.
function initialisePlaylist(){
  music.volume = volumeSlider.val();
  anime_musics = shuffle(current_playlist);
  initFullPlaylist();
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


  nextBtn.on("click",nextTrack);
  prevBtn.on("click",prevTrack);
  repeatBtn.on("click",repeatSong);
  music.addEventListener("loadedmetadata",function(){
    getDuration();
  });


  playlist_button.on("click",openFullPlaylist);

  $(".openedPlaylist_innerCloseBtn").on("click",openFullPlaylist);
  $(".open_kanji").on("click",function(){
    $(".romaji-lyrics").html($(".kanji-lyrics").html());
    lyricsClass.parseLyrics();
  });

  $("body").on("click",".single_song",function(){
    let selectedIndex;
    let selectedSongTitle = $(this).find(".song-en-title").html();

    let foundTitle = $.grep(anime_musics, function(track, index) {
			if(track.name === selectedSongTitle) {
				selectedIndex = index;
				return track;
      }
		});
    specTrack(selectedIndex);
  });

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
  $(".music_player-fullPlaylist_layout").toggleClass("playlist-layoutOpen");
  $(".music_player_084nv9vnr_o_O_top_header").toggleClass("playlist-layoutOpen");
  $("body").toggleClass("locked_body");
}

function changePlaylist(){
  anime_musics = shuffle(current_playlist);
  initFullPlaylist();
  playMusic(anime_musics);
}

function showHoverProgress(event, container){
  var _this = container;
  progressBarPos = _this.offset();
  progressDiff = event.clientX - progressBarPos.left;

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
  insTime.css('left',progressDiff).fadeIn(0);
}

function hideHoverProgress(){
  insTime.text('00:00').css('left','0px').fadeOut(0);
}

//Volume Slider
volumeSlider.on("input", function(){
  updateVolume();
});

function updateVolume(){
  volumeSlider.css("--vol-value",volumeSlider.val()*100+"%");
  music.volume = $(volumeSlider).val();
  if(volumeSlider.val() == 0){
    muteBtn.addClass("volumeOff");
  }else{
    if(muteBtn.hasClass("volumeOff")){
      muteBtn.removeClass("volumeOff");
    }
  }
}

function onKeyDown(e){
  if (e.keyCode == 37){ //left arrow
    volumeSlider.val(Math.max(0, Math.round((music.volume - 0.1) * 10) / 10));
    updateVolume();
  }
  else if(e.keyCode == 39){ // right arrow
    volumeSlider.val(Math.min(1, Math.round((music.volume + 0.1) * 10) / 10));
    updateVolume();
  }
}

function onKeyUp(e){
  e.preventDefault();
  if(e.keyCode == 32){ //spacebar
    togglePlay();
  }
}


muteBtn.on("click",function(){
  if(muteBtn.hasClass("volumeOff")){
    muteBtn.removeClass("volumeOff");
    volumeSlider.css("--vol-value","50%");
    volumeSlider.val(0.5);
  }else{
    muteBtn.addClass("volumeOff");
    volumeSlider.css("--vol-value","0%");
    volumeSlider.val(0);
  }
  music.volume = volumeSlider.val();

});

function initFullPlaylist(){
  var output = "";
  for(var i = 0; i<anime_musics.length; i++){
    output+= '<li class="single_song"><div class="queue_item-image-thumbnail"><img src="'+anime_musics[i].img+'">'+
    '<div class="thumbnail_overlay"><div class="overlay"><i class="fas fa-play"></i></div></div>'+
    '</div><div class="queue_item-song-info"><span class="song-en-title">'+anime_musics[i].name+'</span><span class="song-jap-title">'+
    anime_musics[i].jap_name+'</span></div></li>';
  }
  $(".playlist_scrollLayout_content ul").html(output);

}

//window.addEventListener("keyup", onKeyUp, true);// Error Music won't start next time ! TODO
window.addEventListener("keydown", onKeyDown, true);



//
