<?php

  class Lesson{

    private $lessonID;
    private $courseID;
    private $relativeLessonID;

    public function __construct($lessonID, $courseID, $relativeLessonID){
      $this->lessonID = $lessonID;
      $this->relativeLessonID = $relativeLessonID;
      $this->courseID = $courseID;
    }

    public function get_previous_lesson(){
      return getPreviousLessonID($this->relativeLessonID - 1, $this->courseID);
    }

    public function get_next_lesson(){
      return getNextLessonID($this->relativeLessonID + 1, $this->courseID);
    }

    public function getID(){
      return $this->id;
    }

    public function getCourseID(){
      return $this->courseID;
    }

    public function getFileLocation(){
      return get_file_location($this->$lessonID);
    }

    public function getLessonName(){
      return get_lesson_Name($this->lessonID);
    }


  }





?>
