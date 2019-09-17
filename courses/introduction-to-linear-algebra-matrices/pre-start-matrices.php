<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>

<?php
   include_adsense();
   include_script_tag();
   getHeader("Before studying matrices | KukaHub");
?>
   </head>
 <body class="course_learning_page">
   <?php include_noscript_tag(); ?>
   <?php include ('../include/courses_config/course_lesson_header.php')  ?>
   <?php include ('../include/courses_config/course_curriculum.php')  ?>


  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: Introduction to matrices , Lecture 1.0</h3>
              <h2>Before you start </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">Before we start learning about Matrices, you should know how to do the following things :</p>
              <div class="paragraph_wdt688px container_inner">
                <ul class="nr-list">
							    <li>
							    	<div class="block_xf8d_math">
									    <div class="block_xf8d_inner-math">
										    <span>
											     Solve a quadratic equation.
											     $\\[5pt]$
											     <div class="block_xf8d_inner-math_sub light-blue">
												      e.g.$\enspace$ Solve $2x^2+x-10=0$
												      $\\[5pt]$ $2x^2+x-10=(2x+5)(x-2)$
												      $\\[5pt]$ Since $2x^2+x-10=0$, $(2x+5)(x-2)=0$
												      $\\[5pt]$ Hence $x=-\dfrac{5}{2}$ and $2$
											     </div>
										     </span>
									     </div>
							 	     </div>
						       </li>
							     <li>
								     <div class="block_xf8d_math">
									     <div class="block_xf8d_inner-math">
										     <span>
											     Solve a pair of simultaneous equations.
											     $\\[5pt]$
											     <div class="block_xf8d_inner-math_sub light-blue">
												     e.g.$\enspace$ Solve the simultaneous equations
												     $\\[5pt]$  $x^2+2y^2= 6,x-y=3$
												     $\\[5pt]$  $x^2+2y^2=6$ and $x=y+3$
												     $\\[5pt]$ so $(3+y)^2+2y^2-6=0$
												     $\\[5pt]$ $3y^2+6y+3=0$
												     $\\[5pt]$ $3(y+1)^2=0$
												     $\\[5pt]$ Hence $y=-1,x=2$
											     </div>
										     </span>
									     </div>
								     </div>
							    </li>
                  <li>
								    <div class="block_xf8d_math">
									    <div class="block_xf8d_inner-math">
										    <span>
											    Solve a polynomial equation
											    $\\[5pt]$
											    <div class="block_xf8d_inner-math_sub light-blue">
												    e.g.$\enspace$  Solve the equation $x^3 + 2x^2 -x + 2 = 0$ given that $ x = 2$ is one of its roots.
												    $$
												    \require{enclose}
												    \begin{array}{r}x^2-1\\x-2\enclose{longdiv}{x^3-2x^2-x+2}\\
												    -\underline{\left(x^3-2x^2\right)}\hspace{3.0em}\\-x+2\hspace{0.6em}\\
												    -\underline{(-x+2)}\\0\hspace{1.33em}\\
												    \end{array}
												    $$
												    $x^3-2x^2-x+2=0$ so $(x-2)(x+1)(x-1)=0$
											    	$\\[5pt]$ Hence $x=2$ or $x=\pm1$
											    </div>
										    </span>
									    </div>
								    </div>
							   </li>
                 <li>
                   <div class="block_xf8d_math">
                     <div class="block_xf8d_inner-math">
                       <span>
                         Calculate the area of plane shapes
                         $\\[5pt]$
                         <div class="block_xf8d_inner-math_sub light-blue">
                           e.g.$\enspace$  Calculate the area of the parallelogram $ABCD$, where $AB = 10, AD=6$ and  $\angle DAB = 60°$.
                           $\\[5pt]$ Area of $ABCD = 2  \times $ area of triangle $ABD$
                           $\\[5pt]$ $ = 2 \times \dfrac{1}{2} \times 10 \times 6 \times sin(60) $
                           $\\[5pt]$ $ = 60 \times \dfrac{\sqrt{3}}{2}$
                           $\\[5pt]$ $ = 30\sqrt{3} $ square units
                         </div>
                       </span>
                     </div>
                   </div>
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
 <script type="text/javascript" src="../js/courses.js"></script>
 <script type="text/x-mathjax-config">

   MathJax.Hub.Config({
    showMathMenu : false,
    messageStyle: "none",
    tex2jax: {preview: "none"},
    displayAlign: "left",
    tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
   });

 </script>

</body>
</html>
