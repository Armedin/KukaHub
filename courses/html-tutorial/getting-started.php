<?php
  include('../../include/init_constantFunctions.php');
  require '../include/courses_config/config.php';
?>

 <html>
   <head>
<?php
    include_adsense();
    include_script_tag();
    getHeader("Getting Started | Kuka Academy");
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
              <h3>Section 1: HTML Tutorial, Lecture 1.1</h3>
              <h2>Getting Started</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">


              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">A Simple HTML Document</h1>
              <pre class="code-pre"><code class="html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;My First HTML Tutorial&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;h1&gt;This is a heading&lt;/h1&gt;
&lt;p&gt;This is a paragraph.&lt;/p&gt;

&lt;/body&gt;
&lt;/html&gt;
              </code></pre>
              <p class="lesson_paragraph_20_margin">
                As mentioned before, HTML is a markup language that consists of various elements that format the content. A HTML document
                is simply a text file made up of HTML elements. The HTML elements are represented by tags. The HTML tags tell the browser
                to represent the appropriate elements.
              </p>
              <p class="lesson_paragraph_20_margin">
                Let's break down the example above :
              </p>
              <ul class="lesson_paragraph_list">
                <li>The <code class="tag-span">!DOCTYPE html</code> declaration defines the document type and HTML version.</li>
                <li>The <code class="tag-span">html</code> element is the HTML document's root element. It mainly contains
                the document header which is represented by <code class="tag-span">head</code> and the document body which is
                represented by <code class="tag-span">body</code>.</li>
                <li>The <code class="tag-span">head</code> tag contains information that is not viewable within the browser,
                although the <code class="tag-span">title</code> tag is an exception to this.</li>
                <li>The <code class="tag-span">title</code> tag is used to specify a title for the document.</li>
                <li>The <code class="tag-span">body</code> tag contains the visible page content. Most of the code is written
                within this tag.</li>
                <li>The <code class="tag-span">h1</code> tag represents a level 1 (large) heading.</li>
                <li>The <code class="tag-span">p</code> tag defines a paragraph.</li>
              </ul>

              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">HTML Elements</h1>
              <p class="lesson_paragraph_20_margin">
                Most of the HTML elements consist of a <strong>open</strong> and an <strong>close</strong> tag, with the content
                of the element beings placed in between them. You may have noticed that there is a slight difference between the
                opening and closing tag - the closing tag contains a forward slash (<code>/</code>) after
                <code><</code>.
              </p>
              <p class="lesson_paragraph_20_margin">
                The usually format is like this :<br>
                <code class="tag-span">tagname</code>This is the content ... <code class="tag-span">/tagname</code>
              </p>
              <div class="font-16 lesson_paragraph_20_margin lesson_important_oex93model model0ex93_yellow">
                There are elements that have no content such as the &lt;br&gt; element (line break). These elements are
                called <strong>empty</strong> elements and they do not have an end tag.
              </div>
              <h1 class="lesson_paragraph_20_margin lecture_sub_heading">lowercase or UPPERCASE</h1>
              <p class="lesson_paragraph_20_margin">
                HTML is not case sensitive, so <code class="tag-span">P</code> means the same as <code class="tag-span">p</code>.
                Most developers use lowercase since it helps with the readability of your code. Furthermore, W3C recommends
                using lowercase in HTML.
              </p>
              





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
