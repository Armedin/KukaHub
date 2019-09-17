<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
?>

 <html>
   <head>

<?php
   include_adsense();
   include_script_tag();
   getHeader("Cayley Tables | Kuka Academy");
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
              <h3>Section 1: The axioms of a group, Lecture 1.4</h3>
              <h2>Cayley Tables</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">


              <p class="lesson_paragraph_20_margin">
                You can represent a fine group using a Cayley table. A Cayley table is used to display all the different products
                of a group’s elements and thus it can describe the structure of the group. This is a very useful way to spot patterns
                in a group and the axioms of the group can also be checked very easily.
              </p>

              <p class="lesson_paragraph_20_margin">
                Consider the set $\mathbb{S}=\{a, b, c, d, ...\}$ under the operation $*$. In order to write out a
                Cayle table for this set, there are a few things that need to be considered.
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                All the elements of the set have to be written as row and column headings in the same order.
              </div>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_green">
                If we take two elements from the set, $a$ and $b$, then $b*a$ is the intersection of the row
                containing the element $b$ with the column containing element $a$.
              </div>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_blue">
                The first element in the operation represents the row heading, and the second element represents the column heading.
              </div>

              <p class="lesson_paragraph_20_margin">
                Let's take a look at the following example.
              </p>
              <!-- Example 1-->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 1</div>
              <p class="lesson_paragraph_20_margin">
              Consider the set $\mathbb{G}=\{1, 2, 4, 8\}$. By constructing a Cayle table, show that $\mathbb{G}$ forms a
              group under multiplication modulo $15$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    $$ \begin{array}{c | c c c}
                    \times_{15} &1  &2  &4  &8 \\
                    \hline
                    1   &1   &2   &4   &8 \\
                    2   &2   &4   &8   &1  \\
                    4   &4   &8   &1   &2   \\
                    8   &8   &1   &2   &4    \\
                    \end{array} $$

                    <strong>Closure:</strong> Every element that appears on the Cayley table is a member of the set $G$, hence
                    it is closed.<br>
                    <strong>Associativity:</strong> Multiplication modulo $15$ is associative.<br>
                    <strong>Identity:</strong> The identity element is $1$. <br>
                    <strong>Inverse:</strong> Since the identity element ($1$) appears on every row and every column, then
                    every element has an inverse.<br>
                    Since the 4 axioms hold, then $(G, \times_{15})$ is a group.
                  </p>
                </div>
              </div>

              <!-- Example 2-->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 2</div>
              <p class="lesson_paragraph_20_margin">
              The set $\mathbb{M} =\{1, -1, i, -i\}$ forms a group under multiplication.<br>
              By writing out a Cayley table for this group, identify the inverse of $i$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    $$ \begin{array}{c | c c c}
                    \times &1  &-1  &i & -i \\
                    \hline
                    1   &1   &-1   &i   &-i \\
                    -1   &-1   &1   &-i   &i  \\
                    i   &i   &-i   &-1   &1   \\
                    -i   &-i   &i   &1   &-1    \\
                    \end{array} $$

                    As seen from the Cayley table, $i\times(-i)=1$, so the inverse of $i$ is $-i$.
                  </p>
                </div>
              </div>


              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Properties of Cayley Table</h1>
              <p class="lesson_paragraph_20_margin">
                By considering the properties of groups, we can conclude the following properties for Cayley tables:
              </p>
              <ul class="lesson_paragraph_list">
                <li>all the entries in the Cayley table must be members of the group</li>
                <li>every element must appear exactly once in each row and column</li>
                <li>the identity element must appear in every row and column</li>
                <li>As $a*a^{-1}=a^{-1}*a$ for every element $a$ in the group, then the identity elements
                are symmetric accross the leading diagonal.</li>
              </ul>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Groups of permutations</h1>



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
