
var playBtn = $(".play_btn");
var nextBtn = $(".next_btn");
var prevBtn = $(".prev_btn");
var progress_bar_container = $(".musicPlayer_progress_cont");
var action_progress_bar = $(".progress_bar");
var repeatBtn = $(".repeat_button");
var playlist_button = $(".playlist_button");

var music_details_container = $(".song_details");
var music_title = $(".song_title");
var music_jap_title = $(".song_japanese_title");
var music_picture = $(".song_picture>img");
var currentTime = $(".music_currTime");
var musicDuration = $(".music_totDuration");
var progressBar = $(".progress_bar_playing");
var music = new Audio();

var autoPlay = false; //Autoplay not allowed anymore in Google


function togglePlay(){
  if(music.paused){
    music.play();
    $(".audio_player_interface").addClass("music_playing");
    $(".media_musicPlayer_controller").addClass("music_playing");
  }else{
    music.pause();
    $(".audio_player_interface").removeClass("music_playing");
    $(".media_musicPlayer_controller").removeClass("music_playing");
  }
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
  //animateSongTitle();
}

function playMusic(anime_musics){
  music.src= anime_musics[0].link;
  music.title = anime_musics[0].name;
  if(autoPlay){
    music.play();
    $(".audio_player_interface").addClass("music_playing");
    $(".media_musicPlayer_controller").addClass("music_playing");
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

  nextBtn.on("click",nextTrack);
  prevBtn.on("click",prevTrack);
  repeatBtn.on("click",repeatSong);
  music.addEventListener("loadedmetadata",function(){
    getDuration();
  });
  initializeFullPlaylist();
  action_progress_bar.on("click", (e) => updateProgressBar(e));
  playlist_button.on("click",openFullPlaylist);
  updateSelectedMusic();
  $(".openedPlaylist_innerCloseBtn").on("click",openFullPlaylist);

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
  progressBar.width(totPercentage+"%");

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

function updateProgressBar(e){
  if(autoPlay){
    const time = (e.offsetX / action_progress_bar.width()) * music.duration;
    music.currentTime = time;
  }
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

function animateSongTitle(){

  var containerWidth = music_details_container.width();
  var textWidth = music_title.width();
  if(textWidth>containerWidth){

    var animationSpeed = 4000;
    music_details_container.animate({
      scrollLeft: (textWidth - containerWidth)
    },animationSpeed,function(){
      music_details_container.animate({
	     scrollLeft: 0
     },animationSpeed,function(){
       setTimeout(10000,animateSongTitle());
      });
    });
  }

}

function openFullPlaylist(){
  $(".fully_openedPlaylist_cont").toggleClass("open");
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



//
