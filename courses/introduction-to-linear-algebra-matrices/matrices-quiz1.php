<?php
  include('../../include/init_constantFunctions.php');

  if(!isset($_SESSION['score'])){
		$_SESSION['score'] = '0';
	}

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

  <div class="course_lesson_main_body">
    <div class="course_lessons_curriculum">
      <div class="course_lessons_curriculum_inner_div">
        <h1 class="course_lessons_curriculum_title">Course Sections</h1>

        <div class="course_curriculum_section opened">
          <div class="curriculum_section_item opened">
            <div class="curriculum_section_item_info">
              <span> Section 1</span>
              <h3>Section 1: Introduction to Matrices</h3>
            </div>
          </div>
          <div class="curriculum_section_subs_items">
            <a class="curriculum_sub_single_item completed" href="pre-start-matrices.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.0</div>
              <div class="curriculum_single_item_title">Before you start</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed is_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="definition-of-a-matrix.php">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.1</div>
              <div class="curriculum_single_item_title">Definition of a matrix</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            <a class="curriculum_sub_single_item completed" href="#">
              <div class="left_icon">
                <i class="fal fa-file"></i>
              </div>
              <div class="curriculum_item_number">Lecture 1.2</div>
              <div class="curriculum_single_item_title">Matrix algebra</div>
              <div class="curriculum_single_item_percentage"></div>
              <div class="curriculum_single_item_completed">
                <i class="fas fa-check"></i>
              </div>
            </a>
            </div>
          </div>

          <div class="course_curriculum_section">
            <div class="curriculum_section_item">
              <div class="curriculum_section_item_info">
                <span> Section 1</span>
                <h3>Section 2: Determinant and Inverse</h3>
              </div>
            </div>
            <div class="curriculum_section_subs_items">
              <a class="curriculum_sub_single_item completed" href="#">
                <div class="left_icon">
                  <i class="fal fa-file"></i>
                </div>
                <div class="curriculum_item_number">1</div>
                <div class="curriculum_single_item_title">Realistic Graphics</div>
                <div class="curriculum_single_item_percentage"></div>
                <div class="curriculum_single_item_completed is_completed">
                  <i class="fas fa-check"></i>
                </div>
              </a>
              <a class="curriculum_sub_single_item completed" href="#">
                <div class="left_icon">
                  <i class="fal fa-file"></i>
                </div>
                <div class="curriculum_item_number">1</div>
                <div class="curriculum_single_item_title">Realistic Graphics</div>
                <div class="curriculum_single_item_percentage"></div>
                <div class="curriculum_single_item_completed">
                  <i class="fas fa-check"></i>
                </div>
              </a>
              <a class="curriculum_sub_single_item completed" href="#">
                <div class="left_icon">
                  <i class="fal fa-file"></i>
                </div>
                <div class="curriculum_item_number">1</div>
                <div class="curriculum_single_item_title">Realistic Graphics</div>
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
      <div class="footer_regulator"></div>
      <div class="relative_footer-0dex8">
        <div class="quiz_questions_indication_footer">
          <div class="quiz_questions_indication_footer_curr_question">
            <span class="current_question">Question <span class="curr_question"> x </span>
            / <span class="total_questions"> xxx</span></span>
          </div>
          <div class="quiz_questions_indication_footer_one_side">
            <button class="next_question">Next</button>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>

 <?php
 getJs_Files();
 ?>
<script type="text/javascript" src="../js/courses.js"></script>
<script type="text/javascript">

  var questionNum = 1;
  var totalQuestions = 0;

  function loadQuestions(){
  var user_choice = $("input[name=user_choice]:checked").val();
  var topic = "Matrices Addition and Subtraction";
  if(typeof(user_choice) != "undefined"){
    questionNum ++;
  }
  $(".curr_question").html(questionNum);
  $.ajax({
  			type : "POST",
  			url : "../../include/quiz_config/quiz_questionProcess.php?action=get-next-question",
  			data : { 'topic' : topic, 'questionNumber' : questionNum, 'user_choice' : user_choice},
  			success : function(response){
          MathJax.Hub.Queue(function(){
							$(".questionCont_wrapp").html(response);
						});
						MathJax.Hub.Queue(["Typeset",MathJax.Hub]);

  			}
  		});
  }


  function getQuizStats(){
    var topic = "Matrices Addition and Subtraction";
    $.ajax({
      type: "POST",
      url: "../../include/quiz_config/quiz_questionProcess.php?action=get-quiz-stats",
      data: {'topic' : topic},
      dataType: "json",
      success: function(response){
        if(response.status == 1){
          $(".total_questions").html(response.totalQuestions);
          totalQuestions = response.totalQuestions;
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
  if($(document).scrollTop() + window.innerHeight < $('.footer_regulator').offset().top)
      $('.quiz_questions_indication_footer').css('position', 'fixed'); // restore when you scroll up
}




  loadQuestions();
  getQuizStats();



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

    $(".tot_points").each(function(){
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      },{
        duration: 4000,
        easing: 'swing',
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });
    });

    $(document).scroll(function() {
      checkOffset();
    });

$("document").ready(function(){
  checkOffset();

  $(".slim-scroller").each(function(){
 		$(this).slimScroll({
 			height:"100%",
 			color:$(this).attr("data-color")||"#71808f",
 			railOpacity:"0.9",
 			size:"4px"
    })
 	});


  $("body").on("click",".responsiveInnerRadio",function(){
    $(this).find(".answer_radiobox").prop("checked",true);
      //Put inside as well since it won't recognise first time
        $(".next_question").addClass("available");
    });


  $("body").on("change",".radioButt .answer_radiobox",function(){
    $(".next_question").addClass("available");
  });


});


  /***
    Keeping the footer in the bottom
  */


</script>
</body>
</html>
