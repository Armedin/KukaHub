<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
 ?>

 <html>
   <head>

<?php
   include_adsense();
   include_script_tag();
   getHeader("Recursive Functions | KukaHub");
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
              <h3>Section 1: Recursive Functions, Lecture 1.0</h3>
              <h2>Introduction to Recursive Functions </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">

              <p class="lesson_paragraph_20_margin">A <strong>recursive function</strong> is a type of function that is defined in terms of itself.
              The process of executing the recursive function is called recursion. In simple words, a recursive function if a function that
              calls itself.</p>
              <div class="lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                <span>A recursive function uses its previous terms to find out its next term!</span>
              </div>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">How recursive functions work</h1>
              <p class="lesson_paragraph_20_margin">In order to understand how recursive functions work, let's look at one recusive
              function. Consider the below function :</p>
              <p class="lesson_paragraph_20_margin">
                $f(x) = f(x-1) + f(x-2) $, given that $f(1)=1 $ and $f(2) =1 $
              <p>
              <p class="lesson_paragraph_20_margin">At first, looking at this function might make no sense, but eventually
              it becomes easier to understand. As we can see, in order to know nth term, we need to know what the
              <span class="light-green">previous two terms are</span>. For example, $f(3) = f(2) + f(1)$ and we know
              from the information given above that $f(1)=1$
             and $f(2)=1$, so we conclude that $f(3) = 1+ 1$, so $f(3) = 2$.</p>
             <p class="lesson_paragraph_20_margin">By using the same approach, we can find any term of this function,
               as long as we know the value of the two previous terms! Note that most of the recusive function will give you
               the beginning value(s) that are needed to find the other sequences. In this case, without those beginning values
               there is <span class="light-yellow">no way </span> to determine what each term of the sequence actually is!
             </p>
             <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Some Interesting Information</h1>
             <p class="lesson_paragraph_20_margin">Were you able to figure out what sequence this recursive function gives out?
               If so, very well done to you! It's the Fibonacci sequence. If we keep on finding every term of that recursive
               function, we end up with the following values : $1,1,2,3,5,8...$
             </p>
             <p class="lesson_paragraph_20_margin">Here is an interesting fact about Fibonacci Numbers. Did you know that
               there is a special relationship between Golden Ratio and Fibonacci Numbers? In order to see this relationship,
               we firstly need to understand how Golden Ratio works. Just like Fibonacci sequence, Golden Ratio is defined by a
               recursive function.
             </p>
             <p class="lesson_paragraph_20_margin">Golden Ratio is defined by the following function:
               $$f(\phi+1) = 1 + {1\over f(\phi)}$$ The symbol $\phi$ is called <span class="light-green">Phi.</span>
               The initial value is $f(\phi) = 1$. The first few terms
                are $$1,\ 2,\ 1.5,\ 1.\overline 6,\ 1.625...$$
                As we keep finding more terms, we will found out that the sequence convertes to $\phi$ giving a value of
                $1.61803$.
             </p>
             <p class="lesson_paragraph_20_margin">Golden Ratio is defined by the following function:
               $$f(\phi+1) = 1 + {1\over f(\phi)}$$ The symbol $\phi$ is called <span class="light-green">Phi.</span>
               The initial value is $f(\phi) = 1$. The first few terms
                are $$1,\ 2,\ 1.5,\ 1.\overline 6,\ 1.625...$$
                As we keep finding more terms, we will found out that the sequence convertes to $\phi$ giving a value of
                $1.61803$.
             </p>
             <p class="lesson_paragraph_20_margin">You might be asking where is the connection between Fibonacci Numbers
               and the Golden Ratio. The answer now is quite simple. If we divide two successive (one after the other) Fibonacci
               Numbers, we get a ratio that is really close to the Golden Ratio. For example consider
               the $12^{th}$ and $13^{th}$ terms of the Fibonacci Series.
               $${233 \over 144} =1.618056$$
               <div class="lesson_paragraph_20_margin lesson_important_oex93model model0ex93_blue">
                 <span>We always get the Golden Ratio when we take the ratio of two successive terms of the
                   Fibonacci sequence!</span>
               </div>
               <p class="lesson_paragraph_20_margin">
                Below is an image of what we call The Fibonacci Spiral. It is an approximation of the golden ratio. This image
                clearly describes the relationship between the two!
               </p>
               <div class="image_container_centered">
                <img src="img/fibonacciSpiral.svg.png">
              </div>
             </p>
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
