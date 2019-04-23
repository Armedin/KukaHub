<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
   <?php getHeader("Binary Operation | Kuka Academy"); ?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>

 <body class="course_learning_page">


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
              <h3>Section 1: The axioms of a group, Lecture 1.0</h3>
              <h2>Binary Operation </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">Now that you have a bit of understanding of what a group and a binary operation is,
               we shall look at some examples.
             </p>
             <!-- Example 1 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 1</div>
              <p class="lesson_paragraph_20_margin">
                $ S = \{x+y\sqrt{5}:x,y\in\mathbb{Z}\} $<br>
                Show that addition is a binary operation on $S$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin"> Let $s_1 = a+b\sqrt{5}$, $s_2 = c+d\sqrt{5}$ where $a$, $b$, $c$, $d \in \mathbb{Z}$.<br>
                    $s_1 +s_2 = a+b\sqrt{5}+c+d\sqrt{5}$ $= (a+c) + (b+d)\sqrt{5}$
                    <br>
                    As $a$, $b$, $c$, $d\in\mathbb{Z}$, $a+c\in\mathbb{Z}$ and $b+d\in\mathbb{Z}$.
                    <br>
                    So $s_1+s_2\in\mathbb{Z}$, and therefore addition is a binary operation on $S$.
                  </p>
                </div>
              </div>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_green">
                You can say that the set $S$ is <strong>closed</strong> under addition.
              </div>

              <!-- Example 2 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 2</div>
              <p class="lesson_paragraph_20_margin">
                Show that the set of natural numbers, $\mathbb{N} = \{1,2,3,4,\dots\},$
                is not closed under subtraction.
              </p>
              <p class="lesson_paragraph_20_margin">
               In order to show that the set $\mathbb{N}$ is not closed under subtraction, you
                only need to find one counter-example.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Let's take two numbers : $9$, $12 \in \mathbb{N}$.
                    $9 - 12 = -3$, but $-3 \notin \mathbb{N}$, therefore
                    $  \mathbb{N} $ is not closed under subtraction!
                  </p>
                </div>
              </div>

              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                Binary operations do not always have to correspond to operations such as
                $+$, $-$, $\div$, $\times$. Most of the time, the binary operations are
                expressed with symbols such as $*$ or $	\circ$.
              </div>

              <!-- Example 3 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 3</div>
              <p class="lesson_paragraph_20_margin">
                Determine whether the set of real numbers, $ x * y = \sqrt{x+y}$,
                is closed under the operation $*$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Let $x=0$ and $y=-1$, then $x*y = i \notin \mathbb{R}$, hence the set
                    of real numbers is not closed under the operation $*$.
                  </p>
                </div>
              </div>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The identity element</h1>
              <p class="lesson_paragraph_20_margin">
                In the previous lecture, we mentioned the 4 axioms of the group. The identity
                propery was one of them. In $\mathbb{Z}$, the number $0$ has the property such that
                for any integer $a \in \mathbb{Z}$, $a+0=a$. We can say that $0$ is the
                <strong>identity element</strong> of $\mathbb{Z}$ under addition.
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_blue">
                  An identity element of a set $S$ under a binary operation $*$ is an element
                  $e \in S$ such that, for any element $a \in S$, $a*e=e*a=a$.
              </div>
              <p class="lesson_paragraph_20_margin">
                An identity element depends on both the set and the binary operation, and does
                not necessarily exist. For example, the set of natural numbers $\mathbb{N}$ does
                not have an identity element under addition because $0\notin\mathbb{N}$. However,
                if we look at multiplication in the set $\mathbb{N}$, the number $1\in\mathbb{N}$
                satisfies $a\times1=1\times a=a$, so we can say that the set $\mathbb{N}$ has an
                identity element under <strong>multiplication</strong>.
              </p>

              <!-- Example 4 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 4</div>
              <p class="lesson_paragraph_20_margin">
                Prove than an identity element of a set $S$ under a binary operation must
                be unique.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Let $*$ be the binary operation on $S$.<br>
                    Let $e$ and $f$ be two identity element, with $e$, $f\in S$.<br>
                    $e*f=e$<br>
                    $e*f=f$<br>
                    So $e=f$.<br>
                    Therefore any two identity elements in the set $S$ must be equal,
                    in other words the identity element must be unique.
                  </p>
                </div>
              </div>

              <!-- Example 5 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 5</div>
              <p class="lesson_paragraph_20_margin">
              State the identity element for the set of matrices of the form
              $\begin{bmatrix}a & 0\\ 0 & 1 \end{bmatrix}$
              , where $a\in\mathbb{R}$,$a\neq0$, under the matrix multiplication.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    If we consider the matrix $I = \begin{bmatrix}1 & 0\\ 0 & 1 \end{bmatrix}$, we know that
                    for any matrix $A$, $AI = IA = A$, so $I$ is the identity matrix.
                  </p>
                </div>
              </div>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The Inverse Axiom</h1>
              <p class="lesson_paragraph_20_margin">
                The inverse identity is used to define the inverse elements of a group. Let's look at the set of
                integers $\mathbb{Z}$ under the binary operation $+$. The identity element is $0$. If we pick any two
                elements from this set, say $a$ and $b$ such that $a$, $b\in\mathbb{Z}$, and perform the binary operation
                on them and get the identity element $e$, then we say that $a$ and $b$ are <strong>inverse</strong> elements
                of each other. For example, the integers $2$ and $-2$ are such that $2+(-2)=0$
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                Let $G$ be a set under the binary operation $*$. If an identity element $e$ exists, then for all $a$ in $G$,
                there exists $b$ in $G$, such that $a*b=b*a=e$. We say that $a$ is the inverse of $b$ and vice versa. We can denote
                it as $b=a^{-1}$ and $a=b^{-1}$.
              </div>

              <!-- Example 6 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 6</div>
              <p class="lesson_paragraph_20_margin">
              Find the inverse of the matrix
              $\begin{bmatrix}4 & 0\\ 0 & 1 \end{bmatrix}$ under matrix multiplication.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Let $ A =\begin{bmatrix}4 & 0\\ 0 & 1 \end{bmatrix}$. We know that $AA^{-1}=I$. <br>
                    det $A=4$, $A^{-1} = \dfrac{1}{4} \begin{bmatrix}1 & 0\\ 0 & 4 \end{bmatrix} = \begin{bmatrix}\dfrac{1}{4} & 0\\ 0 & 1 \end{bmatrix}$
                  </p>
                </div>
              </div>


              <!-- Example 7 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 7</div>
              <p class="lesson_paragraph_20_margin">
              For the set $\mathbb{C}$ of complex numbers under the binary operation of multiplication, <br>
              a) state the identity element<br>
              b) find the inverse of $1+i$
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    For any complex number $z$, $z\times1=1\times z=z$, so $1$ is the identity element.<br>
                    The inverse of $1+i$ : $\dfrac{1}{1+i} =\dfrac{1-i}{(1+i)\times(1-i)} = \dfrac{1}{2} - \dfrac{i}{2}$
                  </p>
                </div>
              </div>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Associativity and Closure Axioms</h1>
              <p class="lesson_paragraph_20_margin">
              These are the last two axioms that a group holds. You have probably come across associative properties
              back in basic primary school algebra. Associativity applies in sets as well and it has the same attributes.
              For example, consider 3 integers $1$, $5$, $7$. $3+(5+7)=3+12=15$ and $(3+5)+7 =8+5=15$.<br>
              Hence we conclude that $(3+5)+7 = 3+(5+7).$
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_green">
                For any $a$, $b$, $c$ in the set $G$ under the binary operation $*$,<br>
                $(a*b)*c=a*(b*c)$
              </div>
              <p class="lesson_paragraph_20_margin">
                The closure axiom states that a set holds the closure axiom if it's closed under the operation $*$.
                For instance, in <i>Example 1</i> we showed that set $S$ was closed under addition. In a more generalised way,
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_blue">
                A set G is said to be closed under operation $*$ if for all elements $a$, $b\in G$, $a*b\in G$.
              </div>

              <!-- Example 8 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Example 8</div>
              <p class="lesson_paragraph_20_margin">
              The operation $*$ on the set of positive integers $\mathbb{Z}^{+}$ is defined by $a*b=a+b-4$.<br>
              a) Determine where or not $*$ is closed closed and associative.<br>
              b) Find the identity element for $*$.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Let's take $a=1$ and $b=2$. Then we have $1*2=1+2-4=-1$, which is not a positive integer. So the set is not closed under $*$.<br>
                    Let $a$, $b$, $c$ be three positive integers. Then <br>$a*(b*c) = a*(b+c-4) = a+b+c-4-4$<br>
                    $(a*b)*c = (a+b-4)*c = a+b+c-4-4$. So the operation $*$ is associative.<br>
                    To find the inverse, let $b=4$, then $a*4 = a+4-4 = a$, so $4$ is the identity for the operation $*$.
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
