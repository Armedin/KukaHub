<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>

   <?php getHeader("The Application Class | KukaHub"); ?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>
 <body class="course_learning_page">

   <?php include ('../include/courses_config/course_lesson_header.php')  ?>
   <?php include ('../include/courses_config/course_curriculum.php')  ?>


  <div class="course_lesson_main_body">
    <div class="course_lessons_curriculum">
      <div class="course_lessons_curriculum_inner_div">
        <h1 class="course_lessons_curriculum_title">Course Sections</h1>

        <div class="course_curriculum_section opened">
          <div class="curriculum_section_item opened">
            <div class="curriculum_section_item_info">
              <span> Section 1</span>
              <h3>Section 1: What is JavaFX</h3>
            </div>
          </div>
          <div class="curriculum_section_subs_items">
            <a class="curriculum_sub_single_item completed" href="introduction-to-javafx.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.0</div>
              <div class="curriculum_single_item_title">Introduction to JavaFX</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed is_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="the-application-class.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.1</div>
              <div class="curriculum_single_item_title">The Application Class</div>
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
              <h3>Section 1: What is JavaFX, Lecture 1.1</h3>
              <h2>The Application Class</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
                A JavaFX application is a Java class that extends the <i class="light">javafx.application.Application</i> class.
                Below is the declaration for the example we did in the previous lecture :
              </p>
<pre class="code-pre"><code class="language-java">public class firstJavaFXProgram extends Application</code> </pre>
              <p class="lesson_paragraph_20_margin">The cycle of a JavaFX application consist of several steps : </br>
                Firstly, in order to create a JavaFX application, an instance of the Application class should
                be done. When this class is inherited, the abstract method <strong>start()</strong> should be
                implemented. The <strong>start()</strong> method is responsible for building and showing the
                user interface. In this method, you need to write the entire code for the JavaFX graphics.<br>
                It's also important to point out two other methods: <strong> init()</strong> and <strong>stop()</strong>
              </p>
              <p class="lesson_paragraph_20_margin">
                By default, these methods don't do anything, however they can be overriden to perform anything
                you want. The <strong> init()</strong> method can be used to do any processing before the application's
                UI displays. The <strong> stop()</strong> method is called when the application is about to close,
                hence you can override this method to perform tasks such as closing database resources.
              </p>
<pre class="code-pre"><code class="language-java">public class firstJavaFXProgram extends Application{
  @Override
  public void start(Stage primaryStage){
    /*
      The main codes go here
      (Scene, Stage, Canvas, etc)
    */
  }
  public static void main(String args[]){
    launch(args);
  }
}</code> </pre>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">
                Launching the Application
              </h1>
              <p class="lesson_paragraph_20_margin">
                Evey Java program starts from the <i class="light">main()</i> method. In JavaFX, the main method
                consists of only one single statement which refers to the <i class="light">launch()</i> method.
                The <i class="light">launch()</i> method is responsible for starting a JavaFX application.
                This method creates an instance of the Application class and internally calls the <strong>start()</strong>
                method. When the application is finished, this method also calles the <strong>stop()</strong>
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                The <i class="light">launch()</i> method does not return until the JavaFX application ends.
              </div>
              <p class="lesson_paragraph_20_margin">
                To support the above statement, let us look at the following example:
              </p>
<pre class="code-pre"><code class="language-java">public static void main(String[]args){
   System.out.println("Launching JavaFX Application!");
   launch(args);
   System.out.println("Done!");
}</code> </pre>
              <p class="lesson_paragraph_20_margin">
                If you execute the above code, the console window will show "Launching JavaFX Application", however
                the "Done!" statement will not show until the JavaFX application is closed!
              </p>
              <h1 class="lecture_sub_heading">
                Lifecycle of JavaFX Application
              </h1>
              <p>
                The JavaFX Application class has three life cycle methods, which are :
              </p>
              <ul class="lesson_paragraph_list">
                <li>
                  <strong> start() </strong> -  The entry point method where the JavaFX graphics code is to be written.
                </li>
                <li>
                  <strong> init() </strong> -  The method before the application starts, this method is called.
                </li>
                <li>
                  <strong> stop() </strong> -  When the application is closed, this method is called.
                </li>
              </ul>


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
