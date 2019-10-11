<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("The Von Neumman Architecture | Kuka Academy");
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
              <h3>Section 1: Computer Systems Architecture, Lecture 1.1</h3>
              <h2>The Von Neumann Architecture</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">A programmer and language designers need to know in essence how the computer will execute their program.
                They need to understand the architecture of the device they are working for at the right <span class="light-blue">level of abstraction</span>.
                Many of the details of the execution are less important.<br><br>
                When creating a program, we want to use the same code on a variety of different machines as much as possible. In order to make the program portable,i.e to execute
                on different machines, a generic model needs to be followed. The model that we use until today is called "The Von Neumann Architecture".
             </p>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The Von Neumann Architecture</h1>
              <p class="lesson_paragraph_20_margin">The vast majority of single processor machines follow the Von Neumann architecture. The first computer to ever run with von Neumann
                architecture was "The Manchester Baby". The image below shows the basic von Neumann architecture. The Arithmetic Logic Unit together with the Control Unit form the
                CPU.
              </p>
              <div class="image_container_centered">
                <img src="img/von-neumann-architecture.png">
              </div>
              <p class="lesson_paragraph_20_margin">Von Neumann Architecture is based on the <strong>stored-program concept</strong>, where program and data are stored in the same memory.
                Let's break now the image above by explaining two of the components.
              </p>
              <ul class="lesson_paragraph_list">
                <li><strong>Control Unit - </strong> It determines the operation to be perfomed and it supplies the correct operands to the ALU so that the operation is executed.</li>
                <li><strong>ALU - </strong> The ALU handles all the calculations that the CPU may need, such as bit shifting operations, logical operations or arithmetetic operations.</li>
              </ul>
              <p class="lesson_paragraph_20_margin">Before von Neumann architecture, data and instructions were seperated from each other. We will look at this at the next lecture when we
                start talking about <span class="light-green">Harvard Architecture</span>.
              </p>







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
