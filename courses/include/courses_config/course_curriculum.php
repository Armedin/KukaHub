<?php
$counter = 0;
 ?>
<div class="course_lesson_overlay"></div>
<div class="course_lessons_curriculum">
  <div class="course_lessons_curriculum_inner_div">
    <h1 class="course_lessons_curriculum_title">Course Sections</h1>
    <div class="course_curriculum_section opened">
      <div class="curriculum_section_item opened">
        <div class="curriculum_section_item_info">
          <span> Section 1 </span>
          <h3><?php echo 'Section 1: '.$course->getCourseTitle() ?></h3>
        </div>
      </div>
      <div class="curriculum_section_subs_items">
        <?php foreach (get_course_lessons($courseID) as $lesson_id) :?>
        <a class="curriculum_sub_single_item completed" href="<?php echo $course->getLessonLocation($lesson_id)?>">
          <div class="left_icon">
            <i class="fal fa-file"></i>
          </div>
          <div class="curriculum_item_number"><?php echo 'Lecture 1.' .$counter ?></div>
          <div class="curriculum_single_item_title"><?php echo $course->getLessonName($lesson_id) ?></div>
          <div class="curriculum_single_item_percentage"></div>
          <?php if(!empty($userID)){
              if(is_lesson_completed($userID, $lesson_id)){
                echo '<div class="curriculum_single_item_completed is_completed">
                        <i class="fas fa-check"></i>
                      </div>';
              }
              else{
                echo '<div class="curriculum_single_item_completed">
                        <i class="fas fa-check"></i>
                      </div>';
              }
          } ?>

        </a>
      <?php $counter ++; endforeach ?>
      </div>
    </div>

  </div>
</div>
