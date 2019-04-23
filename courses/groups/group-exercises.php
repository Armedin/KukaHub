<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
?>

 <html>
   <head>

   <?php getHeader("Group Exercises 1 | Kuka Academy"); ?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>
 <body class="course_learning_page">

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
                Now that we have discussed about the four axioms, we can make a definition about what a group really is.<br>
                <strong>If $G$ is a set with a binary operation $*$, then $(G,*)$ is a group only if the four axioms hold:
                Closure, Identity, Inverses and Associativity.</strong>
              </p>

              <!-- Exercise 1 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Exercise 1</div>
              <p class="lesson_paragraph_20_margin">
              The operation $*$ is defined by $a*b=a+b-2$, where $a$ and $b$ are real numbers. Determine whether the set of real
              numbers form a group under the operation $*$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    <strong>Closure:</strong> The real numbers are closed under addition and subtraction, so $a+b-2$ is a real number.<br>
                    <strong>Associativity:</strong> $(a*b)*c = (a+b-2)*c = a+b+c-4$<br>
                    $a*(b*c) = a*(b+c-2) = a+b+c-4$. Therefore $*$ is associative.<br>
                    <strong>Identity:</strong> $a*2 = a+2-2 = a$ and $2*a = 2+a-2 = a$, therefore $2$ is the identity element.<br>
                    <strong>Inverses:</strong> $a*(4-a) = a+4-a-2 = 2$ and $(4-a)*a = 4-a-2+a = 2$, therefore the inverse of
                    each element $a$ is $2-a$.<br>
                    As the 4 axioms hold, we can conclude that the set of reals numbers form a group under $*$.
                  </p>
                </div>
              </div>

              <!-- Exercise 2 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Exercise 2</div>
              <p class="lesson_paragraph_20_margin">
                The operation $*$ is defined by $a*b=ab+a$, where $a$ and $b$ are real numbers. Show that $\mathbb{R}$ does
                not form a group under $*$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Let $e$ be the identity element for $*$. Then $a*e = ae+a =a \implies e=0$<br>
                    However, $e*a = ae + e = 0 \neq a$. Therefore, $e$ cannot be an identity element,
                    so the identity axiom does not hold!<br>
                    Alternatively, we can look at the associativity axiom.<br>
                    $a*(b*c) = a*(bc+b) = abc+ab+a$<br>
                    $(a*b)*c = (ab+a)*c = abc+ac+ab+a$<br>
                    Since they are not equal, then the associativity axiom fails.<br>
                    Therefore, $\mathbb{R}$ does not form a group under $*$.
                  </p>
                </div>
              </div>

              <!-- Exercise 3 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Exercise 3</div>
              <p class="lesson_paragraph_20_margin">
                Let $A$ be the set of matrices of the form $\begin{bmatrix}a & b\\ 0 & c \end{bmatrix}$,
                where $a$, $b$, $c\in \mathbb{R}$ and $a\neq0$ and $c\neq0$. Prove that $A$ is a group under
                matrix multiplication.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    <strong>Closure:</strong> Let $d$, $e$, $f$ also be real numbers, where $d\neq0$ and $f\neq0$, then
                    $\begin{bmatrix}a & b\\ 0 & c \end{bmatrix} \begin{bmatrix}d & e\\ 0 & f \end{bmatrix}
                     =\begin{bmatrix}ad & ae+bf\\0 & cf \end{bmatrix}$<br>
                     Since we are dealing with real numbers, then $ad$, $ae+bf$, $cf\in\mathbb{R}$<br>
                    <strong>Associativity:</strong> Matrix multiplication is always associative.<br>
                    <strong>Identity:</strong> The identity element is $I = \begin{bmatrix}1 & 0\\ 0 & 1\end{bmatrix}$<br>
                    <strong>Inverse:</strong> $A^{-1} =\dfrac{1}{ac} \begin{bmatrix}c & -b\\ 0 & a\end{bmatrix}$
                    and $A^{-1}A = AA^{-1} = I$<br>
                    As the 4 axioms hold, A does form a group under matrix multiplication.
                  </p>
                </div>
              </div>


              <!-- Exercise 4 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Exercise 4</div>
              <p class="lesson_paragraph_20_margin">
                Show that the set of functions of the form $f(x)=ax+b$, where $a$, $b\in\mathbb{R}$ and $a\neq0$ form a group
                under function composition.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    <strong>Closure:</strong> Let $g(x)=cx+d$ where $c\neq0$, then $g(f(x)) = c(ax+b) +d
                    =(ca)x + (cb+d)$ with $ca$, $cd +d\in\mathbb{R}$ and $ca\neq0$. So it is closed.<br>
                    <strong>Associativity:</strong> Function composition is always associative, i.e for
                    all function $f(x)$, $g(x)$ and $h(x)$,  $fg(h(x)) = f(gh(x))$.<br>
                    <strong>Identity:</strong> Let $g(x) = x$, then $f(g(x))=g(f(x))= f(x)$, hence $g(x)=x$ is the identity element. <br>
                    <strong>Inverse:</strong> Let $g(x)=ax+b$, then $g^{-1}(x) = \dfrac{x}{a}-\dfrac{b}{a}$. $f(g^{-1}(x)) = a(\dfrac{x}{a}
                    -\dfrac{b}{a})+b$ $=x-b+b=x$. So $g^{-1}(x) = f(x)$, so each element in the set has an inverse.<br>
                    As the 4 axioms hold, the set forms a group under function composition.
                  </p>
                </div>
              </div>

              <!-- Exercise 5 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Exercise 5</div>
              <p class="lesson_paragraph_20_margin">
                A set $S$ forms a group under the operation of multiplication. For $a$, $b\in G$, prove that
                $a^2b^2=(ab)^2\implies ab=ba$
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    $(ab)^2 = abab$, then $a^2b^2 = abab$<br>
                    $\\[3pt]$ $\implies a^{-1}a^2b^2b^{-1} = a^{-1}ababb^{-1}$<br>
                    $\\[3pt]$ $\implies eabe = ebae$<br>
                    $\\[3pt]$ $\implies ab = ba$
                  </p>
                </div>
              </div>

              <!-- Exercise 6 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Exercise 6</div>
              <p class="lesson_paragraph_20_margin">
                A group $(S,*)$ contains elements $a$ and $b$ such that $a$ and $b$ are self-inverses. Given that
                $a*b=b*a$, prove that $a*b$ is also self-inverse.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Self-inverse means that $x=x^{-1}$, so $a*a*b*b = a*b*a*b$. So as $b$ and $a$ are self-inverses,
                    then we have $e*e = (a*b)*(a*b)$<br>
                    $\implies a*b$ is self-inverse.
                  </p>
                </div>
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
 <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-AMS_CHTML-full"></script>
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
