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
      SELECT * FROM tracks WHERE jap_name LIKE '%$searched_song%'");
      if($numRow = mysqli_num_rows($check_song)>0){

        while($row = mysqli_fetch_assoc($check_song)){
          $output = $output . '<li class="menu-item track_item" id="trackId_'.$row['trackId'].'">
            <a href="javascript:void(0)">
              <span class="img">
                  <img src="'.$row['img'].'">
              </span>
              <span class="title">'.$row['jap_name'].'</span>
            </a>
          </li>';
        }
      }else{
        $output = '<span class="not_found">No Music Found !</span>';
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
