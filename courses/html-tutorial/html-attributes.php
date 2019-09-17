<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
?>

 <html>
   <head>
<?php
   include_adsense();
   include_script_tag();
   getHeader("HTML Attributes | Kuka Academy");
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
          CHANGE ONLY THIS ONE !
      /////////////////////////////
  -->

  <div class="course_lesson_main_body">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Section 1: HTML Tutorial, Lecture 1.2</h3>
              <h2>HTML Attributes</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">


              <p class="lesson_paragraph_20_margin">So far we have used tags in their simpliest form, but HTML attributes
              can be added to HTML elements to provide additional information about that element. An attribute is used
              to define the characteristics of an HTML element and it is always specified in the <strong>start tag</strong>.
              HTML elements can have one or more attributes.
              </p>
              <p class="lesson_paragraph_20_margin">All attributes are made up of two parts: a <strong>name</strong> and a
                <strong>value</strong> seperated by an equals (=) sign. The form is like so: <code>name="value"</code>. Just like
                the HTML tags, attribute names and values are case-insensitive, but W3C recommends using lowercase.
              </p>
              <p class="lesson_paragraph_20_margin">Let's take a look to some of the most used attributes.
              </p>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The src Attribute</h1>
              <p class="lesson_paragraph_20_margin">The <code class="tag-span">img</code> tag is used to define HTML images. To
                display an image, the filename of the desired image should be specified in the <code>src</code> attribute.
              </p>
              <pre class="code-pre small-code"><code class="html">&lt;img src="filename.jpg"&gt;</code></pre>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The href Attribute</h1>
              <p class="lesson_paragraph_20_margin">To define a HTML link, the <code class="tag-span">a</code> tag is used.
               The <code>href</code> attribute specifies the link's destination.
              </p>
              <pre class="code-pre small-code"><code class="html">&lt;a href="https://www.google.com"&gt;Visit Google&lt;/a&gt;</code></pre>
              <p class="lesson_paragraph_20_margin">When you click the link, Google will show up.</p>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Width and height Attributes</h1>
              <p class="lesson_paragraph_20_margin">To specify the width and the height of a HTML element, the <code>width</code> and
                <code>height</code> attributes are used.
              </p>
              <pre class="code-pre small-code"><code class="html">&lt;img src="filename.jpg" width="500" height="250"&gt;</code></pre>
              <p class="lesson_paragraph_20_margin">Unless specified, the width and height are in pixels by default.</p>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Align Attribute</h1>
              <p class="lesson_paragraph_20_margin"> The <code>align</code> attribute allows you to align elements in different
                positions such as to the left, right or the center of the page. By default, elements will align to the left. This
                attribute is not used a lot since most of the elements style is done in CSS.
              </p>
<pre class="code-pre small-code"><code class="html">&lt;p align="right"&gt;Right aligned text&lt;/p&gt;
&lt;p align="center"&gt;Center aligned text&lt;/p&gt;
&lt;p align="left"&gt;Left aligned text&lt;/p&gt;
</code></pre>


              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">Title Attribute</h1>
              <p class="lesson_paragraph_20_margin"> The <code>title</code> attribute adds a title to the element. The
                specified value of the title will show as a tooltip when you mouse over the element with the title attribute.
              </p>
<pre class="code-pre small-code">
<code class="html">&lt;h2 title="I'm a title"&gt;
  Hover over me.
&lt;/h2&gt;</code></pre>
              <div class="lesson_paragraph_20_margin"></div>
              <div class="lesson_paragraph_20_margin"></div>
              <div class="lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow font-16">
                <span>Both single and double quotes can be used for the attribute values. However, double quotes are
                more commonly used. In some cases, when the attribute value itself contains double quotes, it is
                neccessary to wrap the value in single quotes, e.g. : <br><code>value='I like the "Harry Potter" book'</code>.</span>
              </div>


              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The Style Attribute</h1>
              <p class="lesson_paragraph_20_margin"> The <code>style</code> attribute specifies an inline CSS
                style for an element such as font size, color, border etc.
              </p>
<pre class="code-pre small-code"><code class="html">&lt;p style="color:blue;font-size:16px"&gt;
  I am a blue text
&lt;/p&gt;
</code></pre>
              <p class="lesson_paragraph_20_margin"> The <code class="tag-span">p</code> element will appear with
                a blue color and with a size of 16 pixels. The style attribute will be explained later in more depth.
              </p>


              <!-- <h1 class="lesson_paragraph_20_margin lecture_sub_heading">The Id Attributes</h1>
              <p class="lesson_paragraph_20_margin"> The <code>id</code> attribute is used to specify a unique
                name or identifier for an HTML element. This makes it easier for the CSS or JavaScript to access the
                the element with the specific id value and perform certain tasks.
              </p>
<pre class="code-pre small-code"><code class="html">&lt;style&gt;
#text {
    color:red;
    font-size:18px;
}
&lt;/style&gt;


&lt;p id="text"&gt;Paragraph&lt;/p&gt;
</code></pre>
              <div class="lesson_paragraph_20_margin"></div>
              <div class="lesson_paragraph_20_margin lesson_important_oex93model model0ex93_blue font-16">
                <span>The id of an element is unique within a HTML document. Every element can only have one single
                id and no elements can have the same id. </span>
              </div> -->










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
