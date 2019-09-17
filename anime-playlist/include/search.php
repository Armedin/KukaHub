<?php

require '../../include/init_constantFunctions.php';

if(isset($_GET['action']) && $_GET['action'] == "search-song" && is_ajax()
    && isset($_POST['value'])
		&& !empty($_POST['value'])){

      $status = 1;
		  $error = '';
      $output = '';
      // change character set to utf8 and check it
		if (!mysqli_set_charset(db_connect(), 'utf8')) {
			$error = mysqli_error(db_connect());
			$status = 0;
		}

    if (!mysqli_connect_errno(db_connect())) {
      $searched_song = trim(strtolower(db_escapeString($_POST['value'])));

      $check_song = db_query("SELECT * FROM tracks WHERE music_name LIKE '%$searched_song%' UNION
      SELECT * FROM tracks WHERE jap_name LIKE '%$searched_song%' LIMIT 6");
      if($numRow = mysqli_num_rows($check_song)>0){
        while($row = mysqli_fetch_assoc($check_song)){
          if( stripos( $row['music_name'], $searched_song ) !== false) {
            $res = $row['music_name'];
          }else{
            $res = $row['jap_name'];
          }
          $output = $output . '<div class="search_song_suggestion track_item" id="trackId_'.$row['trackId'].'">
            <span class="title">'
            .preg_replace('#'. preg_quote($searched_song) .'#i', '<span style="color:#fff">\\0</span>', $res) .'
            </span></div>';
        }
      }else{

      }


    }else{
      $error = 'Database connection problem.';
			$status = 0;
    }

    echo json_encode(
				array(
					'status' => $status,
					'error' => $error,
          'data' => $output
				)
			);

}

?>
