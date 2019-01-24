<?php
  include('../../include/init_constantFunctions.php');
 ?>

 <html>
   <head>

   <?php getHeader("Binary Operation Examples | Kuka Academy"); ?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>
 <body class="course_learning_page">

  <div class="course_lesson_header">
    <div class="inner_container">
      <div class="row-col">
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4">
          <div class="course_lesson_header_left">
            <div class="course_lesson_curriculum_trigger">
              <i class="fas fa-list-ul"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-6 col-xs-8">
          <div class="row-col">
            <div class="container_inner">
              <div class="row-col">
                <div class="col-md-8 col-md-push-2">
                  <div class="lesson_header">
                    <h5><a href="#">Binary Operation Examples</a></h5>
                    <a href="#" class="back_to"><i class="fal fa-long-arrow-left left_arrow"></i>Go Back</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="course_lesson_header_right">
            <div class="account_dropdown">
              <div class="dropdown_cont">
                <button type="button" class="course_acc_btn">
                  <i class="fal fa-user user_icon"></i>
                  <span class="user_name">Hey, Armedin...</span>
                  <span class="down_arrow"></span>
                </button>
              </div>
            </div>
            <div class="account_wishlist_btn">
              <a href="#"><i class="fal fa-bookmark"></i></a>
            </div>
            <div class="settings_btn">
              <a href="#"><i class="fal fa-cog"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="course_lesson_overlay"></div>

  <div class="course_lesson_main_body">
    <div class="course_lessons_curriculum">
      <div class="course_lessons_curriculum_inner_div">
        <h1 class="course_lessons_curriculum_title">Course Sections</h1>

        <div class="course_curriculum_section opened">
          <div class="curriculum_section_item opened">
            <div class="curriculum_section_item_info">
              <span> Section 1</span>
              <h3>Section 1: The axioms of a group</h3>
            </div>
          </div>
          <div class="curriculum_section_subs_items">
            <a class="curriculum_sub_single_item completed" href="what-are-groups.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.0</div>
              <div class="curriculum_single_item_title">What are Groups</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed is_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="binary-operation.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.1</div>
              <div class="curriculum_single_item_title">Binary Operation Examples</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            </div>
          </div>


        </div>
      </div>

      <div class="course_lesson_questions_toggler">
        <i class="fas fa-question"></i>
      </div>


    </div>
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: The axioms of a group, Lecture 1.0</h3>
              <h2>Binary Operation Examples</h2>
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
                for any integer $a \in \mathbb{Z}$, $a+0=a$. We can that $0$ is the
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



            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<div class="course_lessons_navigation_o_O_bott completed_lesson">
  <div class="course_lessons_navigation_one_side left_side">

  </div>
  <div class="course_lessons_navigation_completed_lecture">
    <a class="lecture_completed_btn completed">
      <span class="text">Completed</span>
    </a>
  </div>
  <div class="course_lessons_navigation_one_side right_side">
    <a href="#">
      <span class="section_prev_info_text">Section 1: The Axioms of a group, Lecture 1.1</span>
      <span class="icon right"><i class="fal fa-chevron-right"></i></span>
    </a>
  </div>
</div>


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
