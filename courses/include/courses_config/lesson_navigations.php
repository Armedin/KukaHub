<?php
$prev_id = $lesson->get_previous_lesson();
$next_id = $lesson->get_next_lesson();
$lessonCompleted = is_lesson_completed($userID, $lessonID);
?>

<div class="course_lessons_navigation_o_O_bott <?php echo $lessonCompleted?'completed_lesson':''?>">
  <div class="course_lessons_navigation_one_side left_side">
    <?php if($prev_id) : ?>
    <a href="<?php echo $course->getRelativeLessonLocation($prev_id) ?>">
      <span class="icon left"><i class="fal fa-chevron-left"></i></span>
      <span class="section_prev_info_text"><?php echo 'Section 1: '.$course->getRelativeLessonName($prev_id). ', Lecture 1.' . ($prev_id-1) ?></span>
    </a>
    <?php endif; ?>
  </div>
  <div class="course_lessons_navigation_completed_lecture">
    <a href="#" class="lecture_completed_btn <?php echo $lessonCompleted?'completed':''?>">
      <span class="text">Complete</span>
    </a>
  </div>
  <div class="course_lessons_navigation_one_side right_side">
    <?php if($next_id) : ?>
    <a href="<?php echo $course->getRelativeLessonLocation($next_id) ?>">
      <span class="section_prev_info_text"><?php echo 'Section 1: '. $course->getRelativeLessonName($next_id). ', Lecture 1.' . ($next_id-1) ?></span>
      <span class="icon right"><i class="fal fa-chevron-right"></i></span>
    </a>
    <?php endif; ?>
  </div>

</div>
<?php
  getJavaScriptDet();
?>
