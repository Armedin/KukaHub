<?php

require '../include/init_constantFunctions.php';

function getUserSideMenu(){
  echo '<div class="sidemenu_user_piCont">
    <div class="dropdown_wrapper">
      <div>
        <a class="avatar_anchor" href="#">
          <span class="pro_pic_avatar">
            <img src="'.pro_pic_stat_destination() . get_profile_picture(getSessionUser_id()).'">
          </span>
        </a>
      </div>
      <a class="avatar_info">
        <span class="avatar_username">'.getUser_name_ById(getSessionUser_id()).'</span>
        <span class="avatar_title">Ultra Weeb</span>
      </a>
    </div>
    <div class="line_seperator"></div>
  </div>';
}




 ?>
