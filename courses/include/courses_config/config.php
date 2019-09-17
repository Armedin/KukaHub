<?php

    // Main Initialization
    include(__DIR__."/lesson.php");
    include(__DIR__."/course.php");
    include(__DIR__."/config_methods.php");
    $lessonID = get_lesson_id();
    $relativeLessonID = get_relative_lesson_id();
    $courseID = get_course_id();
    $lesson = new Lesson ($lessonID, $courseID, $relativeLessonID);
    $course = new Course ($courseID);
    $userID = getSessionUser_id();

    //Adsense Account
    $adsense = 0; // 0 - For unactivate , 1 - For activate
    $ads_client_id = "ca-pub-1435728539463730"; // Publisher ID

    //Tag Manager
    $tagmanager = 0;

    function getJavaScriptDet(){
      echo '<script type="text/javascript">var lessonID="'.$GLOBALS['lessonID'].'", courseID="'.$GLOBALS['courseID'].'";</script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
      <script type="text/javascript" async src="'.ROOT_DIR.'/dist/js/MathJax/MathJax.js?config=TeX-MML-AM_CHTML"></script>';
    }

    function include_adsense(){
      if($GLOBALS['adsense'] == 1){
        echo '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <script>
                (adsbygoogle = window.adsbygoogle || []).push({
                  google_ad_client: "'.$GLOBALS['ads_client_id'].'",
                  enable_page_level_ads: true
                });
              </script>';
      }
    }

    function include_script_tag(){
      if($GLOBALS['tagmanager'] == 1){
        echo "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WND543L');</script>
<!-- End Google Tag Manager -->";
      }
    }

    function include_noscript_tag(){
      if($GLOBALS['tagmanager'] == 1){
        echo '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WND543L"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
      }
    }


?>
