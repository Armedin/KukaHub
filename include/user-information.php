<?php

  require __DIR__.'/init_constantFunctions.php';

  ///////////////////////////////////
  // Insert User Information to DB //
  ///////////////////////////////////

if(isset($_GET['action']) && $_GET['action'] == "insert-info" && is_ajax()
    && isset($_POST['user_id'])
    && isset($_POST['token'])
    && isset($_POST['firstname'])
		&& isset($_POST['lastname'])
    && isset($_POST['gender'])
    && isset($_POST['age'])
    && isset($_POST['phone_number'])
    && isset($_POST['birthday'])
    && isset($_POST['location'])
    && isset($_POST['study_place'])
    && isset($_POST['biography'])
    && isset($_POST['user_id'])
    && !empty($_POST['token'])
    && !empty($_POST['firstname'])
		&& !empty($_POST['lastname'])
    && !empty($_POST['gender'])
		&& !empty($_POST['age'])
    && !empty($_POST['phone_number'])
		&& !empty($_POST['birthday'])
    && !empty($_POST['location'])
		&& !empty($_POST['study_place'])
    && !empty($_POST['biography'])){


      $status = 0;
      $error = '';

      // change character set to utf8 and check for errors
      if (!mysqli_set_charset(db_connect(), 'utf8')) {
          $error = mysqli_error(db_connect());
          $status = 0;
      }

      if(!mysqli_errno(db_connect())){

        $user_id = db_escapeString($_POST['user_id']);
        $token = db_escapeString($_POST['token']);

        if(getToken($user_id) == $token){

          $firstname = db_escapeString($_POST['firstname']);
          $lastname = db_escapeString($_POST['lastname']);
          $gender = db_escapeString($_POST['gender']);
          $age = db_escapeString($_POST['age']);
          $phone_number = db_escapeString($_POST['phone_number']);
          $birthday = db_escapeString($_POST['birthday']);
          $location = db_escapeString($_POST['location']);
          $study_place = db_escapeString($_POST['study_place']);
          $biography = db_escapeString($_POST['biography']);

          $image = $_POST['file'];


          //Note: Be aware of dates in the m/d/y or d-m-y formats; if the separator is a slash (/),
          //then the American m/d/y is assumed. If the separator is a dash (-) or a dot (.), then the European d-m-y format is assumed.
          // We use (int) to remove leading 0s xD

          $year = date('Y', strtotime($birthday));
          $dayNum = date('d', strtotime($birthday));
          $dayNum = (int) $dayNum;
          $monthNum = date('m', strtotime($birthday));
          $month   = DateTime::createFromFormat('!m', $monthNum);
          $month = $month->format('F');

          if($dayNum == 1)
            $day = $dayNum . "st";
          elseif($dayNum == 2)
            $day = $dayNum . "nd";
          else if($dayNum == 3)
            $day = $dayNum . "rd";
          else
            $day = $dayNum . "th";

          $birthday = $day . " of " . $month . ", " . $year;



          //Check if there was a image file uploaded by the user!
          if ($image == null || $image == "undefined" || $image == "") {

            $image_name = def_pro_pic();
            db_query("INSERT INTO user_information (user_id, firstname, lastname, gender, age, phone_number, birthday, location,
            study_place, biography, profile_pic) VALUES ('$user_id', '$firstname', '$lastname', '$gender', '$age', '$phone_number',
              '$birthday', '$location', '$study_place', '$biography', '$image_name')");
              $status = 1;
          }
          //User uploaded image
          else{

            // Decode the image and put it !
            $image_arr_1 = explode(";", $image);
            $image_arr_2 = explode(",",$image_arr_1[1]);
            $data = base64_decode($image_arr_2[1]);
            $image_name = uniqid() . ".png";
            $image_name_dest = pro_pic_destination() . $image_name;

            file_put_contents($image_name_dest, $data);

            db_query("INSERT INTO user_information (user_id, firstname, lastname, gender, age, phone_number, birthday, location,
                    study_place, biography, profile_pic) VALUES ('$user_id', '$firstname', '$lastname', '$gender', '$age', '$phone_number',
                    '$birthday', '$location', '$study_place', '$biography', '$image_name')");
            $status = 1;
          }
        }else{
          $status = 0;
          $error = 'An unknown error has occured! Try again later.';
        }


      }else{
        $error = 'Database connection problem.';
  			$status = 0;
      }



      echo json_encode(
          array(
            'status' =>$status ,
            'error' => $error
          )
      );

}


///////////////////////////////////
// Remove Profile Photo //
///////////////////////////////////
elseif (isset($_GET['action']) && $_GET['action'] == "remove-pro-pic" && is_ajax()
    && isset($_POST['token'])
    && !empty($_POST['token'])
    && isset($_POST['user_id'])
    && !empty($_POST['user_id'])
  ){
      $token = db_escapeString($_POST['token']);
      $user_id = db_escapeString($_POST['user_id']);

      $def_img = def_pro_pic();
      if(getToken($user_id) == $token){

          $query = db_query("SELECT profile_pic FROM user_information WHERE user_id = '$user_id' LIMIT 1");
          $result = mysqli_fetch_assoc($query);
          $img = $result['profile_pic'];

          if($img != $def_img){
            unlink(pro_pic_destination().$img);
          }
          db_query("UPDATE user_information SET profile_pic = '$def_img' WHERE user_id = '$user_id' LIMIT 1");
          echo pro_pic_stat_destination() . $def_img;
      }else{
        echo "error";
      }
  }


  ///////////////////////////////////
  // Update User Profile //
  ///////////////////////////////////
elseif (isset($_GET['action']) && $_GET['action'] == "update-user-profile" && is_ajax()
&& isset($_POST['user_id'])
&& isset($_POST['token'])
&& isset($_POST['firstname'])
&& isset($_POST['lastname'])
&& isset($_POST['birthday'])
&& isset($_POST['location'])
&& !empty($_POST['user_id'])
&& !empty($_POST['token'])
&& !empty($_POST['firstname'])
&& !empty($_POST['lastname'])
&& !empty($_POST['birthday'])
&& !empty($_POST['location'])
&& !empty($_POST['biography'])
){


  $status = 1;
  $error = '';
  // change character set to utf8 and check for errors
  if (!mysqli_set_charset(db_connect(), 'utf8')) {
      $error = mysqli_error(db_connect());
      $status = 0;
  }

  if(!mysqli_errno(db_connect())){

    $user_id = db_escapeString($_POST['user_id']);
    $token = db_escapeString($_POST['token']);

    if(getToken($user_id) == $token){

      $firstname = db_escapeString($_POST['firstname']);
      $lastname = db_escapeString($_POST['lastname']);
      $birthday = db_escapeString($_POST['birthday']);
      $location = db_escapeString($_POST['location']);
      $biography = db_escapeString($_POST['biography']);
      $image = $_POST['file'];

      //Get Birthday format
      $year = date('Y', strtotime($birthday));
      $dayNum = date('d', strtotime($birthday));
      $dayNum = (int) $dayNum;
      $monthNum = date('m', strtotime($birthday));
      $month   = DateTime::createFromFormat('!m', $monthNum);
      $month = $month->format('F');

      if($dayNum == 1)
        $day = $dayNum . "st";
      elseif($dayNum == 2)
        $day = $dayNum . "nd";
      else if($dayNum == 3)
        $day = $dayNum . "rd";
      else
        $day = $dayNum . "th";

      $birthday = $day . " of " . $month . ", " . $year;


      //Check if there was a image file uploaded by the user!
      if ($image == null || $image == "undefined" || $image == "") {

        db_query("UPDATE user_information SET firstname = '$firstname', lastname = '$lastname', birthday = '$birthday',
          location = '$location',  biography = '$biography' WHERE user_id = '$user_id'");
        $status = 1;
      }
      //User uploaded image
      else{

        // Decode the image and put it !
        $image_arr_1 = explode(";", $image);
        $image_arr_2 = explode(",",$image_arr_1[1]);
        $data = base64_decode($image_arr_2[1]);

        $curr_pp = get_profile_picture($user_id);

        $image_name = uniqid() . ".png";
        $image_name_dest = pro_pic_destination() . $image_name;

        if($curr_pp != def_pro_pic()){
            unlink(pro_pic_destination().$curr_pp);
        }
        file_put_contents($image_name_dest, $data);

        db_query("UPDATE user_information SET firstname = '$firstname', lastname = '$lastname', birthday = '$birthday',
          location = '$location',  biography = '$biography', profile_pic = '$image_name' WHERE user_id = '$user_id'");
        $status = 1;
      }


    }else{
      $status = 0;
      $error = "An unknown error has occured!";
    }

  }else{
    $error = 'Database connection problem.';
    $status = 0;
  }
  echo json_encode(
      array(
        'status' =>$status ,
        'error' => $error
      )
  );

}



//// FOR UPLOADING IMAGE IN SYSTEM NICELY !

  // $temporary = explode('.', $_FILES['file']['name']);
  // $file_extension = end($temporary);
  // $image_name = uniqid(). '.'.$file_extension;
  // $error = $image_name;
  //
  // if(in_array($_FILES['file']['type'], img_types_accepted())){
  //   if ($_FILES['file']['error'] > 0) {
  //           $error = 'Return Code: '.$_FILES['file']['error'];
  //    }else{
  //      if (file_exists(pro_pic_destination().$image_name)) {
  // 	      $error = $image_name.' already exists.';
  //
  //      } else {
  //         $target_path = pro_pic_destination() . $image_name;
  //         move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
  //         db_query("INSERT INTO user_information (user_id, firstname, lastname, gender, age, phone_number, birthday, location,
  //         study_place, biography, profile_pic) VALUES ('$user_id', '$firstname', '$lastname', '$gender', '$age', '$phone_number',
  //           '$birthday', '$location', '$study_place', '$biography', '$image_name')");
  //         $status = 1;
  //       }
  //    }
  // }else{
  //   $error = "Invalid file type! Only .jpg and .png files are allowed.";
  // }

  ?>
