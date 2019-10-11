<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("The Harvard Architecture | Kuka Academy");
?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>

 <body class="course_learning_page">
  <?php include_noscript_tag(); ?>
  <?php include ('../include/courses_config/course_lesson_header.php')  ?>
  <?php include ('../include/courses_config/course_curriculum.php')  ?>


  <!-- /////////////////////////////
          CHANGE ONLY THIS ONE!
      /////////////////////////////
  -->
  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: Computer Systems Architecture, Lecture 1.2</h3>
              <h2>The Harvard Architecture</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
                The Harvard architecture is a computer system architecture with <strong>seperated</strong> stores for data and instructions.
                It contrasts with the von Neumann architecture, where program instructions and data share the same memory. Computers designed with the Harvard architecture are able
                to access instructions and data simultaneously.
              </p>
              <div class="image_container_centered">
                <img src="img/harvard-architecture.png">
              </div>


              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Microcontrollers (Arduino Uno)</h1>
              <p class="lesson_paragraph_20_margin">
                Harvard architecture is used primary for small embedded computers such as <strong>special-purpose</strong> devices like microcontrollers or signal processors.<br>
                A microcontroller is a small computer with ALU, control unit, memory unit and I/O.
                The Arduino Uno is an open-source microcontroller board based on the Microchip ATmega328P microcontroller. <br><br>Microcontrollers such as Arduino Uno are designed
                for embedded applications. An embedded application is a software that is placed pernamently in some kind of device to perform a very specific set of tasks.
                In Arduino Uno microcontroller, the instructions are stored in a flash memory (32Kb). The image below is used as a reference.
              </p>
              <div class="image_container_centered">
                <img src="img/arduino-uno-board.jpg">
              </div>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Software bugs</h1>
              <p class="lesson_paragraph_20_margin">
                Nowaday, programmers use the word "bug" a lot when their program doesn't behave as intended. What is a bug?<br>
                A software bug is an error or failure in a computer system that causes it to produce an incorrect or unexpected result. Thus the word
                <span class="light-blue"> debugging</span> was originated, meaning to find and fix bugs. <br><br>
                Why is it called bug and not errors? To answer this question we have to look back in history. In 1947, the operators of the "Harvard Mark II" computer
                tracked an error. The reyal had stopped moving because a moth was trapped inside it. That was the first actual case of bug being found.
              </p>
              <div class="image_container_centered">
                <img src="img/first-computer-bug.jpg">
              </div>







            </div>

          </div>
        </div>
      </div>
    </div>

  </div>


<?php  include ('../include/courses_config/lesson_navigations.php')?>


 <?php
 getJs_Files();
 ?>
 <script type="text/javascript" src="../js/courses.js"></script>

 <script type="text/x-mathjax-config">

   MathJax.Hub.Config({
    showMathMenu : false,
    messageStyle: "none",
    tex2jax: {preview: "none"},
    displayAlign: "center",
    tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
   });

 </script>
</body>
</html>
