<?php

require __DIR__.'/init_constantFunctions.php';


if(isset($_POST['user_id'])
&& isset($_POST['username'])
&& isset($_POST['token'])
&& !empty($_POST['username'])
&& !empty($_POST['user_id'])
&& !empty($_POST['token'])
&& isset($_FILES['file']['type'])
){

  $user_id = db_escapeString($_POST['user_id']);
  $token = db_escapeString($_POST['token']);
  $username = db_escapeString($_POST['username']);
  $post_text = db_escapeString($_POST['post_comment']);


  if($token == getToken($user_id)){
    if(getUser_name_ById($user_id) == $username){

        $image_name = uniqid() . ".png";
        $image_dest = post_img_destination() . $image_name;
        $temp_file = $_FILES['file']['tmp_name'];

        move_uploaded_file($temp_file, $image_dest);
        db_query("INSERT INTO user_post (user_id, post_text, post_photo) VALUES ('$user_id', '$post_text', '$image_name')");
    }else{
      $error =  "Invalid username! Please try again later.";
    }
  }else{
    $error = "Invalid token! Please try again later";
  }

}


elseif(isset($_GET['action']) && $_GET['action'] == "get-user-posts" && is_ajax()
&& isset($_GET['user_id'])
&& !empty($_GET['user_id'])
){

  $status = 0;
  $error = '';
  $output = '';


  $user_id = db_escapeString($_GET['user_id']);

      $query = db_query("SELECT * FROM user_post WHERE user_id = '$user_id' ORDER BY post_time DESC");
      while($row = mysqli_fetch_assoc($query)){
          if(empty($row['post_photo'])){

          }else{
            $postImage = $row['post_photo'];
          }
        $post_text = $row['post_text'];
        //Calculate the post Time
        $displayedTime="";
        $postTime = $row['post_time'];
        $timeStamp =strtotime($postTime);
        $timeNow = time();
        $timePassed = $timeNow - $timeStamp;

        $seconds = $timePassed;
        $minutes = round($seconds/60);
        $hours = round($seconds/3600);
        $days = round($seconds/86400);
        $weeks = round($seconds/604800);
        $months = round($seconds/2629400);
        $years = round($seconds/31553280);

        if($seconds<=60)
        {
          $displayedTime = "Just Now";
        }
        else if ($minutes<=60)
        {
          if($minutes==1)
          {
            $displayedTime = "1 minute ago";
          }else{
            $displayedTime = $minutes." minutes ago";
          }
        }
        else if($hours<=24)
        {
          if($hours==1)
          {
            $displayedTime = "1 hour ago";
          }else{
            $displayedTime = $hours. " hours ago";
          }
        }
        else if($days<=7)
        {
          if($days==1)
          {
            $displayedTime = "1 day ago";
          }else{
            $displayedTime = $days . " days ago";
          }
        }
        else if($weeks<=4.3)
        {
          if($weeks == 1)
          {
            $displayedTime = "1 week ago";
          }else{
            $displayedTime = $weeks." weeks ago";
          }
        }
        else if($months<=12)
        {
          if($months == 1)
          {
            $displayedTime = "1 month ago";
          }else{
            $displayTime = $months." months ago";
          }
        }
        else
        {
          if($years ==1)
          {
            $displayedTime="1 year ago";
          }
          else{
            $displayedTime = $years." years ago";
          }
        }

        $post_image_dest = post_img_stat_destination() . $postImage;

        $output = $output . '<div class="user_fi93v_o_O_exf02f_postCont">
          <div class="user_fi93v_o_O_exf02f_postHeader">
            <div class="user_fi93v_o_O_exf02f_postHeader_inner">
              <img src="'.pro_pic_stat_destination() . get_profile_picture($user_id).'">
              <div class="post_info">
                <h5>Armedin Kuka</h5>
                <small><i class="fal fa-globe"></i>'.$displayedTime.'</small>
              </div>
            </div>
          </div>
          <div class="user_fi93v_o_O_exf02f_postBody">
           <div class="user_fi93v_o_O_exf02f_postBody_postComment">
             <p>'.$post_text.'</p>
           </div>
           <div class="user_fi93v_o_O_exf02f_postBody_postPhoto">
             <img src="'.$post_image_dest.'">
           </div>
          </div>
          <div class="user_fi93v_o_O_exf02f_postFooter">
            <div>
              <a class="user_fi93v_o_O_exf02f_likeBtn liked footer_btn"><i class="fal fa-heart"></i>Like</a>
              <a class="user_fi93v_o_O_exf02f_shareBtn shared footer_btn"><i class="fal fa-share"></i>Share</a>
           </div>
           <a class="user_fi93v_o_O_exf02f_commentBtn footer_btn"><i class="fal fa-comments"></i>Comments</a>
          </div>
        </div>';

      }
      $status = 1;

      echo json_encode(
          array(
            'status' =>$status ,
            'error' => $error,
            'output' => $output
          )
        );
}



?>
