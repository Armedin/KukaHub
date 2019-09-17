<?php
  include('../../include/init_constantFunctions.php');

?>

 <html>
   <head>

<?php
   include_adsense();
   include_script_tag();
   getHeader("Group Exercises 1 | Kuka Academy");
?>
   <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <link rel="stylesheet" href="../../dist/css/custom-highlight.css">
   </head>
 <body class="course_learning_page">


  <!-- /////////////////////////////
          CHANGE ONLY THIS ONE !
      /////////////////////////////
  -->

  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Edexcel GCE Paper 1</h3>
              <h2>Core Pure Mathematics </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">


              <!-- Question 1 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Question 1</div>
              <p class="lesson_paragraph_20_margin">
              $\\[0pt]$Given that $4$ and $-3+2i$ are roots of the equation:
              $$ \\[0pt] x^{3}+ax^{2}+bx-52=0$$
               where $a$ and $b$ are real constants.
               Find the value of $a$ and the value of $b$ and hence write down the equation.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    Since all the coefficients in the expression are real numbers, then the third root of the
                    equation is the conjugate of $-3+2i$, so it's <strong>$-3-2i$</strong>.<br>
                    The sum of roots is the negative value of the coefficient of $x^2$ divided by the coefficient of $x^{3}$.
                    So, $4+(-3-2i)+(-3+2i)=-a$; $a=2$.<br>
                    The sum of the product of the roots is the coefficient of $x$ divided by the coefficient of $x^{3}$.<br>
                    $\\[3pt]$ $4(2i-3)+4(-2i-3)+(2i-3)(-2i-3) = b$
                    $\\[3pt]$ $8i-12-12-8i-6i+4+9+6i = b$
                    $\\[3pt]$ $b = -11$.
                    $\\[0pt]$ So the equation is $x^{3}+2x^{2}-11x-52=0$
                  </p>
                </div>
              </div>

              <!-- Question 2 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Question 2</div>
              <p class="lesson_paragraph_20_margin">
              Use de Moivre's theorem to show that <br>
              $$ cos(6\theta)=32cos^{6}\theta-48cos^{4}\theta+18cos^{2}\theta-1$$

              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    $(cos \theta+ isin \theta)^6 = cos(6\theta) + isin(6\theta)$;
                    $\\[3pt]$ By expanding out the brackets, on the left side we get:
                    $\\[3pt]$ $cos^{6}\theta + \binom{6}{1}cos^{5}\theta isin\theta + \binom{6}{2}cos^{4}\theta (isin\theta)^{2}$
                     $+ \binom{6}{3}cos^{3}\theta (isin\theta)^{3} + \binom{6}{4}cos^{2}\theta (isin\theta)^{4}$
                     $+ \binom{6}{5}cos\theta (isin\theta)^{5} + (isin\theta)^{6}$
                     $\\[3pt]$ By equating the real parts we get :
                    $\\[3pt]$ $cos(6\theta) = cos^{6}\theta-15cos^{4}\theta sin^{2}\theta$ $+15cos^{2}\theta sin^{4}\theta-sin^{6}\theta$
                    $\\[3pt]$ $=cos^{6}\theta-15cos^{4}(1-cos^{2}\theta)$ $+15cos^{2}\theta(1-cos^{2}\theta)^2-(1-cos^2\theta)^3$
                    $\\[3pt]$ $=cos^{6}\theta-15cos^{4}+15cos^6\theta+15cos^2\theta-30cos^4\theta+15cos^6\theta$ $-1+3cos^2\theta-3cos^4\theta+cos^6\theta$
                    $\\[3pt]$ $=32cos^6\theta-48cos^4\theta+18cos^2\theta-1$
                    $\\[3pt]$ Therefore,
                    $\\[3pt]$ $cos(6\theta)=32cos^6\theta-48cos^4\theta+18cos^2\theta-1$
                  </p>
                </div>
              </div>

              <!-- Question 3 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Question 3</div>
              <p class="lesson_paragraph_20_margin">
              Prove that <br>
              $$\sum_{r=1}^{n} \dfrac{1}{(r+1)(r+3)} = \dfrac{n(an+b)}{12(n+2)(n+3)} $$
              $\\[0pt]$ where $a$ and $b$ are constants to be found.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    $\require{cancel}$
                    By expressing $\dfrac{1}{(r+1)(r+3)}$ as partial fractions, we get :
                    $\\[3pt]$ $\dfrac{1}{(r+1)(r+3)} = \dfrac{1}{2(r+1)} - \dfrac{1}{2(r+3)}$
                    $\\[3pt]$ If we let $f(r) = \dfrac{1}{2(r+1)}$, then we can notice that
                    what we got is:
                    $$\sum_{r=1}^{n} f(r) - f(r+2) = f(1)+f(2)-f(n+1)-f(n+2) $$
                    $\\[0pt]$ In case you don't remember this result, then you need to write enough
                    terms to make it clear which terms cancel out. So,
                    $\\[0pt]$ $\sum_{r=1}^{n} \dfrac{1}{(r+1)(r+3)} \equiv \sum_{r=1}^{n} \left( \dfrac{1}{2(r+1)} - \dfrac{1}{2(r+3)} \right) $
                    $\\[4pt]$  $\begin{align} \text{When }r=1& : \qquad \dfrac{1}{4} - \cancel{\dfrac{1}{8}}
                    \\[4pt]    r =2& : \qquad \dfrac{1}{6} - \cancel{\dfrac{1}{10}}
                    \\[4pt]    r =3& : \qquad \cancel{\dfrac{1}{8}} - \cancel{\dfrac{1}{12}}
                    \\[4pt]     \vdots
                    \\[4pt]    r=n-1& : \qquad \cancel{\dfrac{1}{2n}} - \dfrac{1}{2(n+2)}
                    \\[4pt]    r=n& : \qquad \cancel{\dfrac{1}{2(n+1)}} - \dfrac{1}{2(n+3)} \end{align}$
                    $\\[8pt]$ So, $\sum_{r=1}^{n} \dfrac{1}{(r+1)(r+3)} = \dfrac{1}{4} + \dfrac{1}{6} - \dfrac{1}{2(n+2)} -\dfrac{1}{2(n+3)}
                    \\[16pt] = \dfrac{5(n+2)(n+3)-6(n+3)-6(n+2)}{12(n+2)(n+3)}
                    \\[16pt] = \dfrac{n(5n+13)}{12(n+2)(n+3)}$
                  </p>
                </div>
              </div>

              <!-- Question 4 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Question 4</div>
              <p class="lesson_paragraph_20_margin">
              Prove by induction that, for all positive integers $n$, <br>
              $$f(n)=2^{3n+1}+3(5^{2n+1}) $$
              $\\[0pt]$ is divisible by 17.
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    When $n=1$,$f(1)=2^{3n+1}+3(5^{2n+1}) = 16+375=391$
                    $\\[0pt]$ $391 = 17 \times 23$, so the statement is true for $n=1$.
                    $\\[0pt]$ Assume the statement is true for $n=k$, so $f(k)=2^{3k+1}+3(5^{2k+1})$ is divisible by $17$.
                    $\\[0pt]$  Consider $n=k+1$,
                    $\\[0pt]$ $\begin{align} f(k+1) & = 2^{3k+4} + 3(5^{2k+3})
                    \\[4pt] & = 2^3(2^{3k+1}) + 3(5^2)(5^{2k+1})
                    \\[4pt] & = 8(2^3k+1) + 75(5^{2k+1})
                    \end{align}$
                    $\\[8pt]$ $\begin{align} f(k+1) - f(k) & = 8(2^3k+1) - (2^3k+1) + 75(5^{2k+1}) - 3(5^{2k+1})
                    \\[4pt] & = 7(2^3k+1)+72(5^{2k+1})
                    \\[4pt] & = 7f(k) + 17\times3(5^{2k+1})
                    \end{align}$
                    $\\[0pt]$ So, $f(k+1) = 8f(k) + 17\times3(5^{2k+1})$
                    $\\[4pt]$ Since the statement holds for $n=1$ and it's true for $n=k$ and it has been shown
                    that it's true for $n=k+1$, then the statement is true for all $n\in\mathbb{Z^+}$.

                  </p>
                </div>
              </div>

              <!-- Question 5 -->
              <div class="lesson_paragraph_20_margin example_model_heading">Question 5</div>
              <p class="lesson_paragraph_20_margin">
              $$f(x) = \dfrac{x+2}{x^2+9}$$
              $\\[0pt]$ Show that the mean value of $f(x)$ over the interval $\left[0,3\right]$ is
              $\dfrac{1}{6}\ln 2 + \dfrac{1}{18}\pi$
              </p>
              <div class="example_model_body">
                <div class="inner_model">
                  <p class="lesson_paragraph_20_margin">
                    $ \begin{align} \int_{0}^{3} f(x) dx & = \int_{0}^{3} \dfrac{x+2}{x^2+9} dx
                    \\[2pt] & = \int_{0}^{3} \dfrac{x}{x^2+9} + \int_{0}^{3} \dfrac{2}{x^2+9}
                    \\[2pt] & = \left[\dfrac{1}{2}\ln(x^2+9) + \dfrac{2}{3}arctan\left(\dfrac{x}{3}\right) \right]_0^3
                    \\[2pt] & = \dfrac{1}{2}\ln18 + \dfrac{2}{3}arctan\left(\dfrac{3}{3}\right) - \left(\dfrac{1}{2}\ln9 + \dfrac{2}{3}arctan(0) \right)
                    \\[2pt] & = \dfrac{1}{2}\ln2 + \dfrac{\pi}{6}
                    \end{align}$
                    $\\[2pt]$ Mean value of $f(x) = \dfrac{1}{3-0}\left(\dfrac{1}{2}\ln2 + \dfrac{\pi}{6}\right)$
                    $\\[2pt]$ So, $\dfrac{1}{6}\ln2 + \dfrac{1}{18}\pi $.
                  </p>
                </div>
              </div>




            </div>

          </div>
        </div>
      </div>
    </div>

  </div>



  <?php  //include ('../include/courses_config/lesson_navigations.php')?>


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
