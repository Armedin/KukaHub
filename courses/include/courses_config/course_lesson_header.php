<div class="course_lesson_header">
  <div class="inner_container">
    <div class="row-col">
      <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4">
        <div class="course_lesson_header_left">
          <div class="course_lesson_curriculum_trigger">
            <i class="fas fa-list-ul"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-8">
        <div class="row-col">
          <div class="container_inner">
            <div class="row-col">
              <div class="col-md-8 col-md-push-2">
                <div class="lesson_header">
                  <h5><a href="#"><?php echo $lesson->getLessonName($lessonID) ?></a></h5>
                  <a href="/KukaHub/all-courses.php" class="back_to"><i class="fal fa-long-arrow-left left_arrow"></i>Go Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
        <div class="course_lesson_header_right">
          <?php if(!empty($userID)): ?>
          <div class="account_dropdown">
            <div class="dropdown_cont">
              <button type="button" class="course_acc_btn">
                <i class="fal fa-user user_icon"></i>
                <span class="user_name">Hey, <?php echo getSessionUser_name() ?>...</span>
                <span class="down_arrow"></span>
              </button>
            </div>
          </div>
         <?php endif ?>


          <div class="account_wishlist_btn">
            <a href="#"><i class="fal fa-bookmark"></i></a>
          </div>
          <div class="settings_btn">
            <a href="#"><i class="fal fa-cog"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
