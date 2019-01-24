<?php
  include('../../include/init_constantFunctions.php');
 ?>

 <html>
   <head>

   <?php getHeader("Recursive Functions | KukaHub"); ?>
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
                    <h5><a href="#">Recursive Functions in Programming</a></h5>
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
              <h3>Section 1: Recursive Functions, Lecture 1.1</h3>
              <h2>Recursive Functions in Programming</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">
                Recursive function in programming have the exact same definition as the recursive functions input in
                Maths. However, there are 3 main steps that must be fullfilled in order to make a valid recursive function.
                Firstly, the function must call itself. Secondly, the function must have a statement that prevents the function
                from calling itself infinitely many times. Lastly, the function must terminate after a defined number of calls.
              </p>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Factorial Function</h1>
              <p class="lesson_paragraph_20_margin">
                Let's take a look at the factorial recursive function. Factorial is denoted as $n!$ and is the product
                of all positive integers less than or equal to $n$. For example, $$5! = 5\times4\times3\times2\times1$$
                In order to find the factorial of a number using recursion function, we need to be aware that
                $0!=1$. So, looking at the example above, we can construct a recursive function.
                $$f(n) = n * f(n-1)$$
              </p>

<pre class="code-pre"><code class="language-java">public class Factorial {
    public static void main(String[]args) {

    Scanner in = new Scanner(System.in);
    int num = in.nextInt();
    System.out.println(factorial(num)); // Calls the factorial function

    }

    public static int factorial(int n) {
      if(n>1) {
        return n * factorial(n-1);
      }else {
        return 1;
      }
    }

  }
      </code></pre>

              <p class="lesson_paragraph_20_margin">
                In order to fully make sense of the recursive functions, you need to know about the
                <span class="light-green">stack frame</span>. A stack frame is like a deck of cards, in which
                each card is placed above the other. Each of these cards represent a function.Let's take as an example
                $3!$ When we initially call the function, out stack will look like this:
              </p>
              <p class="lesson_paragraph_20_margin">
                Stack Level 1 : $factorial(3)$<br> Since $3>1$, then we call the function again until we have $n=1$. So we have <br>
                Stack Level 2 : $factorial(2)$<br>
                Stack Level 3 : $factorial(1)$<br>In this stage, since $n=1$, the value $1$ is returned. Now the unwinding process takes place.
                This process goes through every level on the stack and executes the functions associated with each level in order. Then these levels
                are destroyed until the stack is empty. So, the returning values will look like this:<br>
                Stack Level 3 : $1$ <br>
                Stack Level 2 : $3 \times factorial(1) = 2\times1=2$<br>
                Stack Level 1 : $3 \times factorial(2) = 3\times2=6$  <br>
                So in the end we get the value $6$. This is how the recursive functions work!
              </p>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Fibonacci Numbers Function</h1>
              <p class="lesson_paragraph_20_margin">
                Now that you have a bit of knowledge about recurive functions, let's take a look at the recursive function
                of the Fibonacci Numbers. The idea is the same, but it varies upon what the user wants to use.
              </p>

<pre class="code-pre"><code class="language-java">public class FibonacciNumbers {

    public static void main(String[]args) {

      Scanner in = new Scanner(System.in);
      System.out.println("Enter the number of sequences of the Fibonacci");
      int number = in.nextInt();
      for(int i=0;i&ltnumber;i++) {
        System.out.print(calculateFibonacci(i)+" ");
      }

    }

     public static int calculateFibonacci(int n) {
       if(n==0) {
         return 0;
       }else if(n==1) {
         return 1;
       }else{
         return calculateFibonacci(n-1) + calculateFibonacci(n-2);
       }

     }

   }
      </code></pre>

              <p></p>

            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<div class="course_lessons_navigation_o_O_bott">
  <div class="course_lessons_navigation_one_side left_side">
    <a href="recursive-functions.php">
      <span class="icon left"><i class="fal fa-chevron-left"></i></span>
      <span class="section_prev_info_text">Section 1: Introduction to Recursive Functions, Lecture 1.0</span>
    </a>
  </div>
  <div class="course_lessons_navigation_completed_lecture">
    <a class="lecture_completed_btn">
      <span class="text">Complete</span>
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
