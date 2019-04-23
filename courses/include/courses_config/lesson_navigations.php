<?php
// All initialized at course_curriculum.php
?>


<div class="course_lessons_navigation_o_O_bott ">
  <div class="course_lessons_navigation_one_side left_side">
    <?php if($prev_id) : ?>
    <a href="<?php echo $lesson->getFileLocation($prev_id) ?>">
      <span class="icon left"><i class="fal fa-chevron-left"></i></span>
      <span class="section_prev_info_text"><?php echo 'Section 1: '.$lesson->getLessonName($prev_id). ', Lecture 1.' . ($relative_id-1) ?></span>
    </a>
    <?php endif; ?>
  </div>
  <div class="course_lessons_navigation_completed_lecture">
    <a href="#" class="lecture_completed_btn">
      <span class="text">Completed</span>
    </a>
  </div>
  <div class="course_lessons_navigation_one_side right_side">
    <?php if($next_id) : ?>
    <a href="<?php echo $lesson->getFileLocation($next_id) ?>">
      <span class="section_prev_info_text"><?php echo 'Section 1: '.$lesson->getLessonName($next_id). ', Lecture 1.' . ($relative_id+1) ?></span>
      <span class="icon right"><i class="fal fa-chevron-right"></i></span>
    </a>
    <?php endif; ?>
  </div>

</div>
