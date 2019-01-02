<?php
  include('../../include/init_constantFunctions.php');
 ?>

 <html>
   <head>

   <?php getHeader("Beginning with C++| KukaHub"); ?>
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
                    <h5><a href="#">Beginning with C++</a></h5>
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
              <h3>Section 1: Beginning with C++</h3>
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
              <div class="curriculum_single_item_title">Beginning with C++</div>
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
              <h3>Section 1: How to use C++ , Lecture 1.1</h3>
              <h2>Beginning with C++</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
              Last lecture you learned about the first program that every compiler
              shows us.Now we will start to crack it down :
              <ul class="lesson_paragraph_list">
              <li><strong>include  &ltiostream &gt : </strong>this code is used to import
                a library in our program ,in this case the iostream library,which lets us use
              input and output streams.There are different types of libraries that we'll learn
              later on. </li>
              <li><strong>using namespace std : </strong>normally we should write codes which look
                like this: std::cout<<"Hello World!";, but this code allows us to write codes without
                needing the std part in front , because it tells the computer that we are using it everywhere.</li>
                <li><strong>int main() : </strong>most Operating Systems report back to the user, or the calling process, if an application was successful or not.
                  All the codes are written inside this function.This code requires the return of an integer.</li>
                  <li><strong>cout<<"Hello world!" : </strong>this code is called a statement.Cout is a code
                    used to show something to the user, in this case Hello world!We use quotes and write something in between
                    them and that something is shown to the user.</li>
                    <li><strong>return 0  : </strong>this is the code that returns the integer to main().
                      It tells the computer that there are no errors.</li>
            </ul>
            We always open and close curly brackets {} in the int main , just as shown below :
<pre class="code-pre"><code class="language-c++">int main()<strong>{</strong>
  //statement
  return 0 ;
<strong>}</strong>

</code> </pre>
Usually every code requires a  <strong> ; </strong>  in the end.The importment libraries, functions and loops(we will learn later on) don't need them.
              </p>
           <!-- <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Cin code</h1>
  <p class="lesson_paragraph_20_margin">
    We learen that the cout code shows/gives something to the user ,but how do we get something from the user?
    We use the cin code.This code allows the user to input something into our program.In Cout
    we use double &lt&lt , while in cin we use the opposite &gt&gt . We use cin when we have a variable that we
    don't know it value and we want the user to give it to us.
  </p> -->
  <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Varaibles</h1>
    <p class="lesson_paragraph_20_margin">
    A variable provides us with named storage that our programs can manipulate.There are a lot
    of variables ,but the most important for the moment are only these :
    <ul class="lesson_paragraph_list">
      <li><strong>int : </strong>this is used to create a variable which will only be an integer
        number</li>
        <li><strong>double : </strong>this is used to create a variable which will be integer
          + decimal numbers.</li>
          <li><strong>float : </strong>this is just like double ,but it is weaker than double because double
            can storage twice as much as float can.
            <li><strong>string : </strong>it is used for letters ,which can make words or even sentances with it.</li>
              <li><strong>char : </strong>it is used for letters only and it only contains <strong>1</strong> letter.</li>
        <li><strong>bool : </strong>this is used to return to the computer either <strong>true</strong> or <strong>false</strong>

    </ul>


    </p>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<div class="course_lessons_navigation_o_O_bott">
  <div class="course_lessons_navigation_one_side left_side">
  </div>
  <div class="course_lessons_navigation_completed_lecture">
    <a class="lecture_completed_btn">
      <span class="text">Complete</span>
    </a>
  </div>
  <div class="course_lessons_navigation_one_side right_side">
    <a href="introduction-to-javafx.php">
      <span class="section_prev_info_text">Section 1: The Application Class, Lecture 1.1</span>
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
