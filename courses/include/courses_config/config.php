<?php

   function getFirstLessonID($courseID){
     $sql = db_query("SELECT * FROM Lesson WHERE course_id = '$courseID' LIMIT 1");
     $result = mysqli_fetch_assoc($sql);
     if($result){
       return $result['lessonID'];
     }else{
       return false;
     }
   }


   function getPreviousLessonID($prevLessonID, $courseID){
      $sql = db_query("SELECT * FROM Lesson WHERE lessonID = '$prevLessonID' AND course_id = '$courseID' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['lessonID'];
      }else{
        return false;
      }
    }

    function getNextLessonID($nextLessonID, $courseID){
      $sql = db_query("SELECT * FROM Lesson WHERE lessonID = '$nextLessonID' AND course_id = '$courseID' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['lessonID'];
      }else{
        return false;
      }
    }

    function get_lesson_courseID($currLessonID){
      $sql = db_query("SELECT * FROM Lesson WHERE lessonID = '$currLessonID' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['course_id'];
      }else{
        return false;
      }
    }

    function get_lesson_Name($currLessonID){
      $sql = db_query("SELECT * FROM Lesson WHERE lessonID = '$currLessonID' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['lesson_name'];
      }else{
        return false;
      }
    }

    function get_file_location($lessonID){
      $sql = db_query("SELECT * FROM Lesson WHERE lessonID = '$lessonID' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        $lesson_name = $result['lesson_name'];
        $link = implode("-",explode(" ",$lesson_name)) . ".php";
        return strtolower($link);
      }else{
        return 'File not found ...';
      }
    }

    function get_course_id(){
      $curr_location = explode('/',$_SERVER['REQUEST_URI']);
      $curr_location = array_slice($curr_location, count($curr_location)-2);
      $course_name =  addslashes(ucwords(implode(" ", explode('-', $curr_location[0])))); // in case it's like with - and addslashes for '
      $sql = db_query("SELECT * FROM Course WHERE course_name = '$course_name' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['courseID'];
      }else{
        return 'Course not found!';
      }
    }

    function get_lesson_id(){
      $curr_location = explode('/',$_SERVER['REQUEST_URI']);
      $curr_location = array_slice($curr_location, count($curr_location)-2);
      $lesson_name = implode(" ", explode('-',str_replace(".php","",$curr_location[1])));

      $sql = db_query("SELECT * FROM Lesson WHERE lesson_name = '$lesson_name' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['lessonID'];
      }else{
        return 'Lesson not found!';
      }
    }

    function get_relative_lesson_id(){ // In case names are duplicated, check for course names
      // echo strval(intval(get_course_id()) . "   \n " . );
      if ( (strval(get_course_id()) !== strval(intval(get_course_id()))) || (strval(get_lesson_id()) !== strval(intval(get_lesson_id()))) ) {
        return 'Unknown Error!';
      }else{
        $lessonID = get_lesson_id();
        $courseID = get_course_id();
        $sql = db_query("SELECT * FROM Lesson WHERE lessonID = '$lessonID' AND course_id = '$courseID' LIMIT 1");
        $result = mysqli_fetch_assoc($sql);
        if($result){
          return $result['lessonID'];
        }else{
          return 'Lesson not found!';
        }
      }
    }

    function get_course_title($courseID){
      $sql = db_query("SELECT * FROM Course WHERE courseID = '$courseID' LIMIT 1");
      $result = mysqli_fetch_assoc($sql);
      if($result){
        return $result['course_name'];
      }else{
        return 'Error!';
      }
    }

    function get_course_lessons($courseID){
      $sql = db_query("SELECT * FROM Lesson WHERE course_id = '$courseID'");
      if(mysqli_num_rows($sql)>0){
        $lessonsID = array();
        while($result = mysqli_fetch_assoc($sql)){
          array_push($lessonsID, $result['lessonID']);
        }
        return $lessonsID;
      }else{
        return 'Error';
      }
    }








?>
