<?php
  include('../../include/init_constantFunctions.php');
 ?>

 <html>
   <head>

   <?php getHeader("What are Groups | Kuka Academy"); ?>
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
                    <h5><a href="#">What are Groups</a></h5>
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
    <a href="binary-operation.php">
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
