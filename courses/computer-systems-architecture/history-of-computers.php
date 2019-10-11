<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("History of Computers | Kuka Academy");
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
          CHANGE ONLY THIS ONE!
      /////////////////////////////
  -->
  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: Computer Systems Architecture, Lecture 1.0</h3>
              <h2>History of Computers</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">Before we begin to learn about computer systems architecture, we first need to ask ourselves "What actually is
                computer science". We need to know that computer science is not only about computers. Computer science is a very broad subject with lots of applications.
                We can define computer science as the <strong> study of the principles of computers and computation</strong>.
             </p>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Abstraction</h1>
              <p class="lesson_paragraph_20_margin">
                If you were asked to write a program that perform a certain task using a hardward such as a microcontroller, you would probably be
                taken aback. It's really tought to do such a task. For this reason, we have <span class="light-yellow">abstraction</span>.
              </p>
              <p class="lesson_paragraph_20_margin">
                Abstraction can be defined as the process of removing (or ignoring) details that we don't need in order to focus on the ones
                that are of a higher importance. Let's look at one classic example that we may all be very familiar with; London underground tube map.
              </p>
              <div class="image_container_centered">
                <img src="img/abstraction-map.jpeg">
              </div>
              <p class="lesson_paragraph_20_margin">
                When you are traveling from destination A to B, you look on the map for which line to take and which destination to stop. The map doesn't
                give you information regarding the time it takes to travel from one stop to another. This is what abstraction is about, removing unnecessary detail
                to focus only on the information we need. Furthermore, from the map view, the transport system looks fairly simple, but the underlying system is
                very complex. Again, we have abstraction. Anytime you see simple interfaces covering up complex systems, you should think of "abstraction".
              </p>


              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Layers of Abstraction</h1>
              <p class="lesson_paragraph_20_margin">
                Abstraction lets us create an idea of what the problem is and how to solve it correctly. We remove any detail or patterns that are not needed
                to get to the solution. Without abstraction, we might end up with a wrong solution. <br>
                Suppose you are asked to write a program that does "X" thing. You have to think about the problem and the algorithm(s) that you will need to use to
                achieve the goal. Next, you use programming language to implement the idea in reality. The operating system (OS) layer then kicks in. It acts as a bridge
                between the user and the hardware.
              </p>
              <div class="image_container_centered">
                <img src="img/layers-of-abstraction.jpg">
              </div>
              <p class="lesson_paragraph_20_margin">
                The operating system needs to interact with Instruction Set Architecture (ISA). The ISA is relate to programming and consists of addressing modes, registers,
                instructions etc. It provides commands to the processor, to tell it what it needs to do. An example of ISA is <span class="light-yellow">x86</span>
                instruction set. The hardware will have a microarchitecture that refers to the logic of how the instructions are going to be executed.
                <br> As we can see, the further we look, the order of abstraction decreases until we reach the physics layer in which we have electrons, i.e electricity.
              </p>

              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_green">
                In conclusion, a programmer who writes software code doesn't need to pay much attention to the hardware because of the abstractions. He only needs
                to know how to interact with the operating system.
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
