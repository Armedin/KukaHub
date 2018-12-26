<?php
  include('../../include/init_constantFunctions.php');
 ?>

 <html>
   <head>

   <?php getHeader("Definition of a matrix | KukaHub"); ?>
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
                    <h5><a href="#">Definition of a matrix</a></h5>
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
              <h3>Section 1: Introduction to Matrices</h3>
            </div>
          </div>
          <div class="curriculum_section_subs_items">
            <a class="curriculum_sub_single_item completed" href="pre-start-matrices.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.0</div>
              <div class="curriculum_single_item_title">Before you start</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed is_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="definition-of-a-matrix.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.1</div>
              <div class="curriculum_single_item_title">Definition of a matrix</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="#">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.2</div>
              <div class="curriculum_single_item_title">Matrix algebra</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            </div>
          </div>

          <div class="course_curriculum_section">
            <div class="curriculum_section_item">
              <div class="curriculum_section_item_info">
                <span> Section 1</span>
                <h3>Section 2: Determinant and Inverse</h3>
              </div>
            </div>
            <div class="curriculum_section_subs_items">
              <a class="curriculum_sub_single_item completed" href="#">
                <div class="left_icon">
                  <i class="fal fa-file"></i>
                </div>
                <div class="curriculum_item_number">1</div>
                <div class="curriculum_single_item_title">Realistic Graphics</div>
                <div class="curriculum_single_item_percentage"></div>
                <div class="curriculum_single_item_completed is_completed">
                  <i class="fas fa-check"></i>
                </div>
              </a>
              <a class="curriculum_sub_single_item completed" href="#">
                <div class="left_icon">
                  <i class="fal fa-file"></i>
                </div>
                <div class="curriculum_item_number">1</div>
                <div class="curriculum_single_item_title">Realistic Graphics</div>
                <div class="curriculum_single_item_percentage"></div>
                <div class="curriculum_single_item_completed">
                  <i class="fas fa-check"></i>
                </div>
              </a>
              <a class="curriculum_sub_single_item completed" href="#">
                <div class="left_icon">
                  <i class="fal fa-file"></i>
                </div>
                <div class="curriculum_item_number">1</div>
                <div class="curriculum_single_item_title">Realistic Graphics</div>
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
</div>


  <div class="course_lessons_navigation_o_O_bott completed_lesson">
    <div class="course_lessons_navigation_one_side left_side">
      <a href="pre-start-matrices.php">
        <span class="icon left"><i class="fal fa-chevron-left"></i></span>
        <span class="section_prev_info_text">Section 1: Introduction to matrices , Lecture 1.0</span>
      </a>
    </div>
    <div class="course_lessons_navigation_completed_lecture">
      <a href="#" class="lecture_completed_div">
        <span class="tick_icon"><i class="fas fa-check"></i></span>
        <span class="text">Completed</span>
      </a>
    </div>
    <div class="course_lessons_navigation_one_side right_side">
      <a href="#">
        <span class="section_prev_info_text">Section 1: Matrix Algebra, Lecture 1.2</span>
        <span class="icon right"><i class="fal fa-chevron-right"></i></span>
      </a>
    </div>
  </div>


 <?php
 getJs_Files();
 ?>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/latest.js?config=TeX-AMS_CHTML-full"></script>

 <script type="text/x-mathjax-config">

   MathJax.Hub.Config({
    showMathMenu : false,
    messageStyle: "none",
    tex2jax: {preview: "none"},
    displayAlign: "left",
    tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
   });

 </script>

<script type="text/javascript">

 $(".slim-scroller").each(function(){
		$(this).slimScroll({
			height:"100%",
			color:$(this).attr("data-color")||"#71808f",
			railOpacity:"0.9",
			size:"4px"
			})
	});


</script>
</body>
</html>
