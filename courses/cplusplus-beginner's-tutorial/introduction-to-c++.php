<?php
include('../../include/init_constantFunctions.php');
require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
<?php
    include_adsense();
    include_script_tag();
    getHeader("Introduction To C++ | KukaHub");
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
              <h3>Section 1: What is C++, Lecture 1.0</h3>
              <h2>Introduction to C++</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
                C++ is an <strong>object-oriented</strong> programming language.This means that it
                includes the four pillars of object-oriented development : data
                hiding , encapsulation , inheritance and polymorphism.
                It is a middle-level language
                ,since it combines both high and low-level language features.
                Codes you write in Mac will also compile without any errors in
                Microsoft's compiler or other software compilers.This means
                C++ is portable and supports the ANSI standard.
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Why learn C++</h1>
                <p class="lesson_paragraph_20_margin">
                  C++ is used everywhere around the world. C++ is a language focused
                  on <strong>concepts</strong>.It helps programmers to become more effective
                  at designing and implementing new systems.It is mostly used for teaching
                  and research.C++ supports a lot of programming styles, which maintain
                  the runtime and space efficiency.
                </p>
                <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Opening a C++ compiler</h1>
                <p class="lesson_paragraph_20_margin">
                  The first moment you open a compiler for C++ you will be
                  shown a simple program which will look like this :</p>
<pre class="code-pre"><code class="language-c++">  #include &ltiostream&gt
    using namespace std;
    int main()
    {
      cout<<"Hello World!";

      return 0;
    }
</code> </pre>
                  <p class="lesson_paragraph_20_margin">
                    After you execute these codes you will be given a sentence
                    showing : "Hello world!".This is the most basic program there
                    is.Sometimes you will be given other examples which you can execute
                    and then test your theories on them.
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
