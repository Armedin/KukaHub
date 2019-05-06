<?php
  include('../../include/init_constantFunctions.php');
  $_SESSION['score'] = '0';

 ?>

 <html>
   <head>

   <?php getHeader("Matrices Quiz 1 | KukaHub"); ?>

   <script type="text/x-mathjax-config">

     MathJax.Hub.Config({
      showMathMenu : false,
      messageStyle: "none",
      tex2jax: {preview: "none"},
      displayAlign: "left",
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
     });

   </script>

   <script type="text/javascript" async
     src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML">
   </script>

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
                    <h5><a href="#">Matrices Quiz</a></h5>
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

  <div class="course_lesson_main_body quiz_page">
    <div class="course_lesson_main_content">

      <div class="container_inner">
        <div class="row-col">
          <div class="col-md-8 col-md-push-2">
            <div class="course_lesson_title">
              <h3>Quiz 1: Introduction to Matrices</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="course_lesson_inner_content_main_info">
        <div class="container_inner">
          <div class="row-col">
            <div class="col-md-8 col-md-push-2">
              <div class="questionCont_wrapp">
                <div class="spinner"></div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="footer_regulator"></div>
  <div class="relative_footer-0dex8">
    <div class="quiz_questions_indication_footer">
      <div class="quiz_questions_indication_footer_curr_question">
        <span class="current_question">Question <span class="curr_question"> --</span>
        / <span class="total_questions"> --</span></span>
      </div>
      <div class="quiz_questions_indication_footer_one_side">
        <button class="next_question">Next</button>
      </div>
    </div>
  </div>


 <?php
 include('../../include/footer.php');
 getJs_Files();
 ?>
<script type="text/javascript" src="../js/courses.js"></script>
<script type="text/javascript">

  var questionNum = 1;
  var totalQuestions = 0;
  var topic = "Matrices Addition and Subtraction";

  function loadQuestions(){
  var user_choice = $("input[name=user_choice]:checked").val();
  if(typeof(user_choice) != "undefined"){
    questionNum ++;
  }
  $.ajax({
  			type : "POST",
  			url : "../include/quiz_config/quiz_questionProcess.php?action=get-next-question",
  			data : { 'topic' : topic, 'questionNumber' : questionNum, 'user_choice' : user_choice},
  			success : function(response){
          MathJax.Hub.Queue(function(){
							$(".questionCont_wrapp").html(response);
						});
						MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
            $(".curr_question").html(questionNum);
  			}
  		});
  }

  function getQuizStats(){
    $.ajax({
      type: "POST",
      url: "../include/quiz_config/quiz_questionProcess.php?action=get-quiz-stats",
      data: {'topic' : topic},
      dataType: "json",
      success: function(response){
        if(response.status == 1){
          $(".total_questions").html(response.totalQuestions);
          totalQuestions = response.totalQuestions;
          loadQuestions();
        }else{
          Snackbar.showToast({def_text:'An unknown error has occured.'});
        }
      },
      error: function(xhr){
        Snackbar.showToast({def_text:xhr.responseText});
      }
  });
}


function checkOffset() {
  if($('.quiz_questions_indication_footer').offset().top
                                         >= $('.footer_regulator').offset().top)
      $('.quiz_questions_indication_footer').css('position', 'static');
  if( window.innerHeight + $(document).scrollTop()  < $('.footer_regulator').offset().top+$('.relative_footer-0dex8').height())
      $('.quiz_questions_indication_footer').css('position', 'fixed'); // restore when you scroll up
}


    $(".next_question").on("click",function(){
      if($(this).hasClass("available") && $(".answer_radiobox").is(":checked")){
        if(questionNum+1 == totalQuestions){
          $(this).text("Finish");
        }
        if(questionNum+1 > totalQuestions){
          $(".quiz_questions_indication_footer").html("");
        }
		    loadQuestions();
        $(this).removeClass("available");
      }
	  });

    $(document).scroll(function() {
      checkOffset();
    });
    $(window).resize(function() {
      checkOffset();
    });

$("document").ready(function(){
  checkOffset();


  $("body").on("click",".responsiveInnerRadio",function(){
    $(this).find(".answer_radiobox").prop("checked",true);
      //Put inside as well since it won't recognise first time
        $(".next_question").addClass("available");
    });

  $("body").on("change",".radioButt .answer_radiobox",function(){
    $(".next_question").addClass("available");
  });

    getQuizStats();

});



</script>
</body>
</html>
