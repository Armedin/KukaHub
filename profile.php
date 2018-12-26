<?php
  include('include/init_constantFunctions.php');

  $curr_user = $_GET['id'];
  $pro_pic = pro_pic_stat_destination() . get_profile_picture($curr_user);
  $user_info = get_user_info($curr_user);
  $user_email = getEmail($curr_user);

 ?>

 <html>
   <head>

   <?php getHeader($user_info['firstname'] . " ". $user_info['lastname'] ."'s Profile | KukaHub"); ?>
   <link rel="stylesheet" href="dist/css/dropzone.min.css">
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
             <p class="user_email"><?php echo $user_email; ?></p>
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
       <div class="col-sm-8 user_fi93v_o_O_exf02f_posts_container">
         <div class="user_fi93v_o_O_exf02f_navOptions_cont">
           <ul>
             <li><a href="profile.php?id=<?php echo $curr_user; ?>" class="active">Activity</a></li>
             <li><a href="about.php?id=<?php echo $curr_user; ?>">About</a></li>
             <li><a href="friends.php?id=<?php echo $curr_user; ?>">Friends</a></li>
             <li><a href="#">Gallery</a></li>
           </ul>
         </div>

         <?php

             // Output the Post fields
            if(isUserLoggedIn() && $curr_user == getSessionUser_id()){
              echo '
              <div class="user_fi93v_o_O_exf02f_postFeed">
                  <div class="user_fi93v_o_O_exf02f_postFeed_header">
                    <img src="'.$pro_pic.'">
                    <div class="textarea_post_preview_holder">
                      <textarea id="post-textarea" placeholder="Write something about yourself ... "></textarea>
                      <form class="dropzone-preview dropzone" action="include/user-posts.php?add-new-posts" enctype="multipart/form-data"
                      method="post" id="my-awesome-dropzone">
                      <div id="dropzonePreview" class="dz-default dz-message">
                        <span>Select or Drop Image to upload</span>
                      </div>
                    </form>
                    </div>
                  </div>
                  <div class="user_fi93v_o_O_exf02f_postFeed_footer">
                    <div>
                     <!--  <button class="footer_option post-image-upload show-dropzone-form" id="select-post-image">
                        <i class="far fa-images"></i>
                      </button> -->
                   </div>
                      <button class="post_footer_fi93v_o_O_exf02f_button" id="new-post"><i class="fal fa-pencil"></i>Post</button>
                  </div>
              </div>
              ';
            }

          ?>

        <!-- <div class="user_fi93v_o_O_exf02f_postCont">
           <div class="user_fi93v_o_O_exf02f_postHeader">
             <div class="user_fi93v_o_O_exf02f_postHeader_inner">
               <img src="dist/img/landingPage/armedin_kuka.jpg">
               <div class="post_info">
                 <h5>Armedin Kuka</h5>
                 <small><i class="fal fa-globe"></i>2 weeks ago</small>
               </div>
             </div>
           </div>
           <div class="user_fi93v_o_O_exf02f_postBody">
            <div class="user_fi93v_o_O_exf02f_postBody_postComment">
              <p>/Applications/XAMPP/xamppfiles/htdocs/phpKukaTemplate/includes/loadUsersPosts.php on line 23</p>
            </div>
            <div class="user_fi93v_o_O_exf02f_postBody_postPhoto">
              <img src="dist/img/facilities/login_bg.jpg">
            </div>
           </div>
           <div class="user_fi93v_o_O_exf02f_postFooter">
             <div>
               <a class="user_fi93v_o_O_exf02f_likeBtn liked footer_btn"><i class="fal fa-heart"></i>Like</a>
               <a class="user_fi93v_o_O_exf02f_shareBtn shared footer_btn"><i class="fal fa-share"></i>Share</a>
            </div>
            <a class="user_fi93v_o_O_exf02f_commentBtn footer_btn"><i class="fal fa-comments"></i>Comments</a>
           </div>
         </div> -->

       </div>
     </div>
   </div>
 </section>


 <?php
 init_login_page();
 init_pageSidebar();
 getJs_Files();
 ?>
  <script src="dist/js/dropzone.min.js"></script>

 <script>

  var post_uploaded_image;

  Dropzone.options.myAwesomeDropzone = {
  maxFiles: 1,
  autoProcessQueue: false,
  acceptedFiles: "image/png, image/jpg, image/jpeg",
  accept: function(file, done) {
    done();
  },

  init: function() {
    var prevFile;
    var post_comment;
    var myDropzone = this;

    this.on("addedfile", function(file){
      if (typeof prevFile !== "undefined") {
            this.removeFile(prevFile);
      }
      prevFile = file; // Normally needed for autoProcessQueue!=false
    });

    this.on('success', function(file, responseText) {
        prevFile = file;
        post_uploaded_image = myDropzone.files[0];
    });
    this.on("complete", function (file) {
        //window.location.href="profile.php";
    });

    $("#new-post").on("click",function(e){
      e.preventDefault();

      post_comment = $("#post-textarea").val();
      if(post_comment.replace(/^\s+|\s+$/g, "").length != 0){
        myDropzone.processQueue();
      }else{
        Snackbar.showToast({def_text: "Please Enter everything!"});
      }

    });

    this.on("sending", function(file, xhr, formData){

      formData.append("file",post_uploaded_image);
      formData.append("post_comment",post_comment);
      formData.append("user_id", user_id);
      formData.append("token",token);
      formData.append("username",username);

    });
    this.on('error', function(file, response) {
      //console.log("Error");
    });
  }
};


  $(document).ready(function(){

    function load_posts(){

      // GET the user_id variable from title!
      var $_GET = {};
			if(document.location.toString().indexOf('?') !== -1) {
			var query = document.location
                   .toString()
                   // get the query string
                   .replace(/^.*?\?/, '')
                   // and remove any existing hash string (thanks, @vrijdenker)
                   .replace(/#.*$/, '')
                   .split('&');
			   for(var i=0, l=query.length; i<l; i++) {
				 var aux = decodeURIComponent(query[i]).split('=');
				 $_GET[aux[0]] = aux[1];
    		 }
	  	}

      var user_id = ($_GET['id']);

      $.ajax({
        type: "POST",
        url: "include/user-posts.php?action=get-user-posts&user_id="+user_id,
        dataType: "json",
        success: function(response){
          if(response.status == 0){
            Snackbar.showToast({def_text:response.error});
          }else if(response.status == 1){
            $(".user_fi93v_o_O_exf02f_posts_container").append(response.output);
          }else{
            Snackbar.showToast({def_text:'Unable to load user\'s posts. Please try again!'});
          }
        },
        error: function(xhr){
          Snackbar.showToast({def_text:xhr.responseText});
        }

      });
    }

    load_posts();

  });


 </script>
</body>
</html>
