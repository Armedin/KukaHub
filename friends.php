<?php
  include('include/init_constantFunctions.php');

  $curr_user = $_GET['id'];
  $pro_pic = pro_pic_stat_destination() . get_profile_picture($curr_user);
  $user_info = get_user_info($curr_user);
  $user_email = getEmail($curr_user);

 ?>

 <html>
   <head>
     
   <?php getHeader($user_info['firstname'] . " ". $user_info['lastname'] ."'s Friends | KukaHub"); ?>

   </head>
 <body>

 <?php
   init_pageHeader();
 ?>

 <section class="content">
   <div class="user_fi93v_o_O_exf02f_page_container">
     <div class="row-col">
       <div class="col-sm-4">
         <div class="user_fi93v_o_O_exf02f_card">
           <div class="user_fi93v_o_O_exf02f_card_bg">
             <img src="dist/img/facilities/maintenance_bg.png">
           </div>
           <div class="user_fi93v_o_O_exf02f_card_avatar">
             <div class="user_fi93v_o_O_exf02f_card_avatar_cont">
               <img src="<?php echo $pro_pic ?>">
             </div>
             <h5 class="user_name"><?php echo $user_info['firstname'] . " " . $user_info['lastname'] ?></h5>
             <p class="user_email"><?php echo $user_email; ?><p>
               <?php
                  if(getSessionUser_id() != $curr_user && isUserLoggedIn()){
                    echo add_friend_btn($curr_user);
                  }
              ?>
           </div>
           <div class="user_fi93v_o_O_exf02f_card_initStats_cont">
             <ul>
               <li><?php echo get_user_friends_number($curr_user); ?> <span>Friends</span></li>
               <li><?php echo get_user_posts_number($curr_user); ?> <span>Posts</span></li>
               <li>000 <span>Projects</span></li>
             </ul>
           </div>
         </div>
         <div class="user_fi93v_o_O_exf02f_card">
           <div class="user_fi93v_o_O_exf02f_card_header">
             <h5>About Me</h5>
           </div>
           <div class="user_fi93v_o_O_exf02f_card_body">
             <span class="card_body_ident"><i class="fal fa-map-marker-alt"></i>Location</span>
             <p><?php echo $user_info['location']; ?></p>
             <hr>
             <span class="card_body_ident"><i class="fal fa-graduation-cap"></i>Education</span>
             <p><?php echo $user_info['study_place']; ?></p>
             <hr>
             <span class="card_body_ident"><i class="fal fa-pen-square"></i>Bio</span>
             <p><?php echo $user_info['biography']; ?></p>
           </div>
         </div>
       </div>
       <div class="col-sm-8">
         <div class="user_fi93v_o_O_exf02f_navOptions_cont">
           <ul>
             <li><a href="profile.php?id=<?php echo $curr_user; ?>">Activity</a></li>
             <li><a href="about.php?id=<?php echo $curr_user; ?>">About</a></li>
             <li><a href="friends.php?id=<?php echo $curr_user; ?>" class="active">Friends</a></li>
             <li><a href="#">Gallery</a></li>
           </ul>
         </div>

         <div class="row-col user_fi93v_o_O_exf02f_friends_page_cont">
           <?php
            echo get_user_friends_on_friend_page($curr_user);
            ?>
         </div>


       </div>
     </div>
   </div>
 </section>


 <?php
 init_login_page();
 init_pageSidebar();
 getJs_Files();
 ?>

</body>
</html>
