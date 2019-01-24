<?php

require '../../include/init_constantFunctions.php';

//Normal Loaded playlist
if(isset($_GET['action']) && $_GET['action'] == 'get-playlist' && is_ajax()){

  $playing = 1;
  $error = '';
  $status = 0;
  $data = array();

  $query = db_query("SELECT * FROM tracks INNER JOIN playlist_track ON playlist_track.trackId = tracks.trackId INNER JOIN playlists
     ON playlists.playlistId = playlist_track.playlistId WHERE playlists.playlistId = '$playing' ORDER BY RAND()");

if($numRow = mysqli_num_rows($query) >0){
  $status = 1;
  while($row = mysqli_fetch_assoc($query)){

    $data[]=array(
      'link' =>$row['music_link'],
      'name' => $row['music_name'],
      'jap_name' =>$row['jap_name'],
      'img' => $row['img']
    );

  }
  $json_data = json_encode($data);
  file_put_contents('../js/anime_main.json', $json_data);
}else{
  $error = 'An unknown error has occured! Please try again';
}

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'data' => $data
      )
    );
}
//All Tracks
elseif(isset($_GET['action']) && $_GET['action'] == 'get-all-tracks' && is_ajax()){

  $error = '';
  $status = 0;
  $data = '';

  $query = db_query("SELECT * FROM tracks ORDER BY RAND()");
  if($numRow = mysqli_num_rows($query) >0){
    $status = 1;

    $data = '<div class="all_songs_heading">
      <h1>All Anime Songs</h1>
    </div>
    <div class="all_songs_body row-col">
    ';
    while($row = mysqli_fetch_assoc($query)){
      $data.='<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <div class="single_song_box">
          <div class="single_image_box">
            <img src="'.$row['img'].'">
          </div>
          <h4 class="single_song_title">'.$row['music_name'].'</h4>
        </div>
      </div>';
    }
    $data.="</div>";

  }else{
       $error = 'An unknown error has occured! Please try again';
  }

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'data' => $data
      )
    );


}

/***********************************
*********FEATURED CONTENT**********
***********************************/
elseif(isset($_GET['action']) && $_GET['action'] == 'get-featured-content' && is_ajax()){

  $error = '';
  $status = 0;
  $data = '';

  $query = db_query("SELECT * FROM playlists");
  $query1 = db_query("SELECT * FROM tracks ORDER BY RAND()");

  $counter = 0;

  if($numRow = mysqli_num_rows($query) >0){
    $status = 1;



    //Hot songs
$data=$data . '
    <div class="row-col hot_songs_cont">
      <div class="col-lg-12">
        <div class="hot_songs_cont_title">
          <h6>Hot Track</h6>
          <h2>Hot Songs</h2>
        </div>

        <div class="anime-owl-main viewport-animate" animate-item=".item" animation-effect="slideUp" responsive-width="0:100%|600:50%|900:33.33%|1200:25%" >
          <div class="owl-carousel hot_songs_cont_body">';

          $data.='<div class="item">';
          while($row1 = mysqli_fetch_assoc($query1)){

            $data.='
            <div class="horizontal_box_song">
              <div class="image_box_song">
                <img src="'.$row1['img'].'">
              </div>
              <div class="desc_box_song">
                <h6>'.$row1['music_name'].'</h6>
                <p>'.$row1['jap_name'].'</p>
              </div>
            </div>';
            $counter ++;
            if($counter%5==0){
              $data.='</div><div class="item">';
            }
          }
          $data.='</div>';

          $data= $data . '
          </div>
        </div>
      </div>
    </div>';


    // The Featured Playlist
    $data.= '<div class="featured_playlists_heading">
      <h1>Featured Playlists</h1>
    </div>
    <div class="featured_playlists_body row-col">
    ';
    while($row = mysqli_fetch_assoc($query)){

      $data.='<div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
        <div class="featured_playlist_box" id="playlistId_'.$row['playlistId'].'">
          <div class="playlist_image_box">
            <img src="'.$row['playlist_img'].'">
          </div>
          <h4 class="playlist_title">'.$row['name'].'</h4>
        </div>
      </div>';
    }
    $data.='</div>';
  }else{
       $error = 'An unknown error has occured! Please try again';
  }



  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'data' => $data
      )
    );

}



/************************************************
*********GET CLICKED PLAYLIST TO LISTEN**********
*************************************************/
elseif(isset($_GET['action']) && $_GET['action'] == 'get-specific-playlist' && is_ajax()){

  $playing = db_escapeString($_POST['playlistId']);
  $error = '';
  $status = 0;
  $data = array();

  $query = db_query("SELECT * FROM tracks INNER JOIN playlist_track ON playlist_track.trackId = tracks.trackId INNER JOIN playlists
     ON playlists.playlistId = playlist_track.playlistId WHERE playlists.playlistId = '$playing' ORDER BY RAND()");

if($numRow = mysqli_num_rows($query) >0){
  $status = 1;
  while($row = mysqli_fetch_assoc($query)){

    $data[]=array(
      'link' =>$row['music_link'],
      'name' => $row['music_name'],
      'jap_name' =>$row['jap_name'],
      'img' => $row['img']
    );

  }
  $json_data = json_encode($data);
  file_put_contents('../js/anime_main.json', $json_data);
}else{
  $error = $playing;
}

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'data' => $data
      )
    );
}

/************************************************
*********GET CLICKED TRACK TO LISTEN**********
*************************************************/
elseif(isset($_GET['action']) && $_GET['action'] == 'get-specific-track' && is_ajax()){

  $playing = db_escapeString($_POST['trackId']);
  $error = '';
  $status = 0;
  $data = array();

  $query = db_query("SELECT * FROM tracks WHERE trackId = '$playing'");

if($numRow = mysqli_num_rows($query) >0){
  $status = 1;
  while($row = mysqli_fetch_assoc($query)){

    $data[]=array(
      'link' =>$row['music_link'],
      'name' => $row['music_name'],
      'jap_name' =>$row['jap_name'],
      'img' => $row['img']
    );

  }
  $json_data = json_encode($data);
  file_put_contents('../js/anime_main.json', $json_data);
}else{
  $error = $playing;
}

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'data' => $data
      )
    );
}



elseif(isset($_GET['action']) && $_GET['action'] == 'get-hot-songs' && is_ajax()){

  $error = '';
  $status = 0;
  $data = '';
  $itemCounter = 5;
  $counter = 0;

  $query = db_query("SELECT * FROM tracks ORDER BY RAND()");
  if($numRow = mysqli_num_rows($query) >0){
    $status = 1;

    $data.='<div class="item">';
    while($row = mysqli_fetch_assoc($query)){

      $data.='
      <div class="horizontal_box_song">
        <div class="image_box_song">
          <img src="'.$row['img'].'">
        </div>
        <div class="desc_box_song">
          <h6>'.$row['music_name'].'</h6>
          <p>'.$row['jap_name'].'</p>
        </div>
      </div>';
      $counter ++;
      if($counter%5==0){
        $data.='</div><div class="item">';
      }
    }
    $data.="</div>";

  }else{
       $error = 'An unknown error has occured! Please try again';
  }

  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error,
        'data' => $data
      )
    );


}
 ?>
