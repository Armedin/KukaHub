<?php

 class Course{

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

}


 ?>
