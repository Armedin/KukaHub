<?php
  include('../../include/init_constantFunctions.php');
 ?>

 <html>
   <head>

   <?php getHeader("Introduction To JavaFX | KukaHub"); ?>
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
                    <h5><a href="#">Introduction to JavaFX</a></h5>
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
              <h3>Section 1: Recursive Functions</h3>
            </div>
          </div>
          <div class="curriculum_section_subs_items">
            <a class="curriculum_sub_single_item completed" href="recursive-functions.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.0</div>
              <div class="curriculum_single_item_title">Introduction to Recursive Functions</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed is_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="recursive-functions-in-programming.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.1</div>
              <div class="curriculum_single_item_title">Recusive Functions in Programming</div>
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
              <h3>Section 1: What is JavaFX, Lecture 1.0</h3>
              <h2>Introduction to JavaFX</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
                JavaFX is a Java library which is used to create "Rich Applications". The applications created using JavaFX can
                run across multiple platforms, and this is also one of the main reasons why Java is so prefered.  JavaFX is known as a Java GUI
                package that can create GUI programs in various designs. Before JavaFX, the Swing library was used to create GUIs. The Oracle Corporation
                has been concentrating on new features for JavaFX, and according to them, JavaFX will eventually replace Swing.
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Features of JavaFX</h1>
              <p>Below are some of the most important features of JavaFX :</p>
              <ul class="lesson_paragraph_list">
                <li><strong>Java APIs.</strong> JavaFX is a Java library that consists of classes and interfaces which are written in native
                  Java code that can be executed on a Java Virtual Machine (JVM).
                </li>
                <li><strong>Built-in UI controls and CSS.</strong> JavaFX provides all the major UI controls required to develop a full-featured
                  application. JavaFX uses CSS styling to easily customize many aspects of the appearance of UI controls.
                </li>
                <li><strong>FXML and Scene Builder.</strong> FXML is an XML-based declarative markup language for constructing a JavaFX application
                  user interface. Either FXML or JavaFX Scene Builder can be used to design the GUI. Scene Builder allows the user to easily customize
                  designs by using the drag and drop feature. Scene Builder generates FXML markup that can be used later on.
                </li>
                <li><strong>Canvas API.</strong> The Canvas API enables drawing directly within an area of the JavaFX scene that consists of
                  one graphical element (node).
                </li>
                <li><strong>Visual Effects.</strong> JavaFX can support a variety of visual effects such as shadows, lightinng, blurs and
                  reflections.
                </li>
                <li><strong>3-D Objects.</strong> JavaFX uses Integrated Graphic Libraries for drawing 3D objects such as cylinders, cubes or spheres.
                </li>
                <li><strong>Multitouch Support.</strong> JavaFX provides support for multitouch operations. It can handle touchscreen devices such as tablets
                  or smart-phones.
                </li>
              </ul>

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
    <a href="#" class="lecture_completed_div">
      <span class="tick_icon"><i class="fas fa-check"></i></span>
      <span class="text">Completed</span>
    </a>
  </div>
  <div class="course_lessons_navigation_one_side right_side">
    <a href="recursive-functions-in-programming.php">
      <span class="section_prev_info_text">Section 1: Recursive Functions in Programming, Lecture 1.1</span>
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
