<?php
include('../../include/init_constantFunctions.php');
require '../include/courses_config/config.php';
 ?>

 <html>
   <head>

<?php
   include_adsense();
   include_script_tag();
   getHeader("Introduction To JavaFX | Kuka Academy");
?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>
 <body class="course_learning_page">
   <?php include_noscript_tag(); ?>
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
            <a class="curriculum_sub_single_item completed" href="recursive-functions.php">
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

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">JavaFX Application Structure</h1>
              <p class="lesson_paragraph_20_margin">In general, a JavaFX application will have consist of three main components; <strong>Stage, Scene and Nodes</strong>.
              A typical JavaFX application will look like this :</p>
              <div class="image_container_centered">
                <img src="img/javafx_structure.png">
              </div>
              <p class="lesson_paragraph_20_margin">Before looking at each of these components individually, let us first look at the very basic
              application. The code below produces a very basic JavaFX application which shows only a white window with dimensions 350 x 280 with
              title JavaFx App. Try it out and see the results.</p>

<pre class="code-pre"><code class="language-java">import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.layout.BorderPane;
import javafx.stage.Stage;

public class firstJavaFXProgram extends Application{

      public static void main(String[]args){
        launch(args);
      }

      public void start(Stage primaryStage){

        BorderPane pane = new BorderPane();
        Scene scene = new Scene(pane, 350, 280);

        primaryStage.setScene(scene);
        primaryStage.setTitle("JavaFX App");
        primaryStage.show();
      }

    }
</code> </pre>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Importing JavaFX Packages</h1>
              <p class="lesson_paragraph_20_margin">As usual, JavaFX programs always start with some <i class="light">import</i> statements that refer
              to the various JavaFX packages for which the application will use. In the example above, there are 4 <i class="light">import</i> statements.
              It's important to notice that all JavaFX packages begin with <i class="light">javafx</i>. Below, there is a brief information regarding
              each package.
              </p>
              <ul class="lesson_paragraph_list">
                <li><strong>javafx.application.* :</strong> This is the most important JavaFX package. Every JavaFX application depends on the core
                  class Application.
                </li>
                <li><strong>javafx.scene.* :</strong> This package holds the Scene class. The Scene class holds all the UI elements displayed by the
                  application.
                </li>
                <li><strong>javafx.scene.layout.* :</strong> Every different layout design is defined by this package. In the example above we used
                  the BorderPane layout. The purpose of a layout is to manage the position of each element in the UI
                </li>
                <li><strong>javafx.stage.* :</strong> Defines the container of all the UI objects. It is the highest-level window of all the JavaFX
                  applications within which all the elements are displayed. Sometimes a Stage takes two parameters which determine the
                  <strong>width </strong>and the <strong>height</strong> of the window itself.
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
