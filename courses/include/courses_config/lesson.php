<?php

  class Lesson{

    private $lessonID;
    private $courseID;

    public function __construct($lessonID){
      $this->lessonID = $lessonID;
      $this->courseID = get_lesson_courseID($lessonID);
    }

    public function get_previous_lesson(){
      return getPreviousLessonID($this->lessonID - 1, $this->courseID);
    }

    public function get_next_lesson(){
      return getNextLessonID($this->lessonID + 1, $this->courseID);
    }

    public function getID(){
      return $this->id;
    }

    public function getRelativeID(){
      return $this->lessonID - getFirstLessonID($this->courseID);
    }
    public function getFileLocation($lessonID){
      return get_file_location($lessonID);
    }

    public function getLessonName($lessonID){
      return get_lesson_Name($lessonID);
    }


  }





?>
