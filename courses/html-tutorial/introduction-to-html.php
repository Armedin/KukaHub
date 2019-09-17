<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("Introduction To HTML | Kuka Academy");
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
          CHANGE ONLY THIS ONE !
      /////////////////////////////
  -->

  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: HTML Tutorial, Lecture 1.0</h3>
              <h2>Introduction to HTML</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">


              <p class="lesson_paragraph_20_margin">
                HTML stands for <strong>HyperText Markup Language</strong>, and is the standart language that is used to write Web Pages.
                As the name suggests, the term HyperText refers to the way in which the HTML pages are linked together and the Markup Language
                annotates plain text documents, telling the browser how to structure them in order to display to the user.
              </p>
              <p class="lesson_paragraph_20_margin">
                HTML is just a text document much like a word processor document you would make in Microsoft Word. Just like Microsoft Word is used
                to view word processor documents since it knows how to parse and display them, a web browser is the application that knows how to read
                and display documents written in HTML.
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">How to write a HTML document?</h1>
              <p class="lesson_paragraph_20_margin">
                Unlike some documents that can be created and read by one single application, a HTML document needs different programs
                for creating and reading. It's not possible to create a HTML document with a web browser. In order to create a HTML document,
                a program known as editor has to be used. There are many options you can choose for your editor. You can use something as simple
                as a Notepad program. Below we will explain briefly what a code editor is and why you should use one.
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Code Editor</h1>
              <div class="image_container_centered has_border_shadow">
                <img src="img/atom.png">
              </div>
              <p class="lesson_paragraph_20_margin">
                A code editor is a program designed specifically for writting and editting source code of programs. In contrast with a text editor
                like Notepad, a code editor has more functionalities that assists in creating programs quicker and faster. A code editor can be
                used to edit different programming language codes.
              </p>
              <p class="lesson_paragraph_20_margin">
                For our tutorials, we will be using <a class="link_to" href="https://atom.io/" target="_blank">Atom</a>.
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
