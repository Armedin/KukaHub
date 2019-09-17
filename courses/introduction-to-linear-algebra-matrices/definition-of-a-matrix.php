<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("Definition of a matrix | KukaHub");
?>
   </head>
 <body class="course_learning_page">
   <?php include_noscript_tag(); ?>
   <?php include ('../include/courses_config/course_lesson_header.php')  ?>
   <?php include ('../include/courses_config/course_curriculum.php')  ?>


  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: Introduction to matrices, Lecture 1.1</h3>
              <h2>Definition of a matrix </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">A matrix is a collection of numbers arranged in rows and columns.
                You can use a matrix to store efficiently information about a mathematical solution.</p>
              <p class="lesson_paragraph_20_margin">For example: You can describe the translation which maps
              the graph with the equation $ y= x^2 $ onto the graph with equation $y = x^2 + 3 $ either in words as
            'move 0 units along the x-axis and +3 units along the y-axis', or, more effeciently, as the matrix $\begin{bmatrix}0\\3\end{bmatrix}$</p>
              <p class="lesson_paragraph_20_margin">This matrix has <span class="light-green">two rows</span>
                and <span class="light-yellow">one column</span></p>
              <div class="lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                <span>A matrix with $ r$ rows and $c$ columns has order <strong class="model0ex93_yellow-txt">$ r \times c $</strong></span>
              </div>
              <p class="lesson_paragraph_20_margin"> Example: The $2\times2$ matrix, $\begin{bmatrix}4 & -5 & 6\\\dfrac{1}{2} & \pi & -3 \end{bmatrix}$
                , has 2 rows and 3 columns, so it's a $2\times3$ matrix.
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Matrix Elements</h1>
              <p class="lesson_paragraph_20_margin">The quantities inside a matrix are called its elements.You can
              refer to the elements of a matrix using its rows and columns. We can use a bold capital letter to represent
              a matrix. The elements of the matrix are then referred to using the corresponding lower-case letter.
              Let's consider matrix $A$:</p>
              <p class="lesson_paragraph_20_margin">$A = \begin{bmatrix}-1 & -3 & \pi\\ 0 & 4 & 2 \end{bmatrix} $ <p>
              <p class="lesson_paragraph_20_margin">The element $a_{1,2}$ is the entry in the
                <span class="light-blue">first row</span> and the <span class="light-green">second column</span>, so in this example,
              $a_{1,2} = -3$. </p>
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
    displayAlign: "left",
    tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
   });

 </script>

</body>
</html>
