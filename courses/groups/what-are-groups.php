<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("What are Groups | Kuka Academy");
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
              <h3>Section 1: The axioms of a group, Lecture 1.0</h3>
              <h2>What are groups</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
                In mathematics, a <strong>group</strong> is a finite or infinite set of elements
                equipped with a binary operation which combines any two elements of the group
                to form an element which is still on the same group in such a way that four
                fundamental conditions known as <i>group axioms</i> are met. These axioms are known as :
                  closure, associativity, the identity and the inverse property.
                 At first it might sound a bit confusing, but later on
                everything will start to make sense. Let us first break it down!
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Binary Operations</h1>
              <p class="lesson_paragraph_20_margin">
                Before learning what a binary operation is, you need to know what an operation is
                in the first place. Let's look at the set of the positive even numbers :
                <div>$A:\{0, 2, 4, 6, 8\dots\}$</div><br>
                Now that we have the set $A$, we want to combine the elements in some way. In order to
                combine them, we use operations. An <strong>operation</strong> combines elements of a set
                to produce another element. For example in set $A$, we can do $ 2 + 4 = 6$.
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                A <strong>binary operation</strong> on a set is a calculation that combines two elements of the set
                to form another element of the set.
              </div>
              <p class="lesson_paragraph_20_margin">
                Some binary operations occur naturally in mathematics. You already know a few binary operations, even
                though you might be unaware of that. For example, the operations of addition $(+)$ on the set of integers,
                $\mathbb{Z}$, is a binary operation, as it combines two integers to produce a third integer. Let's look at
                four examples below in the set of the positive integers, $\mathbb{Z_+}$ :
              </p>
              <ul class="lesson_paragraph_list">
                <li>$ 10 + 5 = 15 $</li>
                <li>$ 99 - 5 = 94 $</li>
                <li>$ 5 \times 3 = 15 $</li>
                <li>$ \dfrac{15}{3} = 5 $</li>
              </ul>
              <p class="lesson_paragraph_20_margin">
                Even though at first instance it might seem that all the examples above are using binary operations,
                they are actually not. <strong>Only</strong> addition $(+)$ and multiplication $(\times)$ are binary operations.
                Division and subtraction are not binary operations!
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_blue">
                The <strong>order</strong> in which the elements of the set are combined in a binary operation is
                important. For example, subtraction $(-)$ is a binary operation on the set of real numbers,
                but in general $a-b≠b-a$.
              </div>
              <p class="lesson_paragraph_20_margin">
                On the next lecture we will look into some examples that involve binary operations.
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
