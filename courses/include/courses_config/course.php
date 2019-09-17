<?php

 class Course{

   // Relative ones refer to the lesson navigations!

   private $courseID;

   public function __construct($courseID){
     $this->courseID = $courseID;
   }

   public function getCourseTitle(){
    return get_course_title($this->courseID);
   }

   public function getCourseLessons(){
     return get_course_lessons($this->courseID);
   }

   public function getLessonName($lessonID){
     return get_lesson_Name($lessonID);
   }

   public function getRelativeLessonName($lessonID){
     return get_relative_lesson_Name($lessonID, $this->courseID);
   }

   public function getLessonLocation($lessonID){
     return get_file_location($lessonID);
   }

   public function getRelativeLessonLocation($lessonID){
     return get_relative_file_location($lessonID, $this->courseID);
   }

}


 ?>
