
var courseApp = {}; //Init object!

$(document).ready(function(){

  "use strict";


  //Init Button Events
  courseApp.initButtons = function(){
    $("body").on("click",".course_lesson_curriculum_trigger",function(){
      $("body").toggleClass("opened_curriculum_sidebar");
    });
    $("body").on("click",".course_lesson_overlay",function(){
      if($("body").hasClass("opened_curriculum_sidebar")){
        $("body").removeClass("opened_curriculum_sidebar");
      }
    });
    $(".curriculum_section_item").on("click",function(){
      $(this).toggleClass("opened");
      $(this).closest(".course_curriculum_section").find(".curriculum_section_subs_items").slideToggle();
    });
  }


  courseApp.slimScroller = function(_el){
    _el.each(function(){
   		$(this).slimScroll({
   			height:"100%",
   			color:$(this).attr("data-color")||"#71808f",
   			railOpacity:"0.9",
   			size:"4px"
   			})
   	});

  }


  courseApp.initButtons();

  courseApp.slimScroller($(".slim-scroller"));


  $("pre code").each(function(a,b){
    hljs.highlightBlock(b);
  });

  $('pre.code-pre').each(function(index) {
        $(this).append('<div class="code_options-div"><span class="close_code-div"></span><span class="min_code-div"></span><span class="expand_code-div"></span></div>');
        $(this).html('<div class="pre-div">' + $(this).html() + '</div>');
        var preDiv = $(this).find('.pre-div');
        var findCodeMatch = preDiv.find('code').html().match(/\n/g);
        var row = findCodeMatch ? findCodeMatch.length + 1 : 1;
        var rowHtml = '1';
        for (var i = 2; i <= row; i++) {
            rowHtml += '<br />' + i
        }
        preDiv.before('<div class="pre-row">' + rowHtml + '</div>');
        var preRow = $(this).find('.pre-row');
        preDiv.on('scroll', function(event) {
              preRow.prop('scrollTop', preDiv.prop('scrollTop'))
          })
  });

  $("body").on("click",".lecture_completed_btn",function(e){
      e.preventDefault();
      if($(this).hasClass('completed')){
        return false;
      }

      if(typeof username !== 'undefined' && typeof token !== 'undefined' && typeof user_id !== 'undefined'){
        $.ajax({
          type: "POST",
          url: "../include/updateCourse.php",
          data: {username: username, token: token, user_id: user_id, course_id: courseID, lesson_id: lessonID},
          dataType: "json",
          success: function(response){
            if(response.status == 0){
              Snackbar.showToast({def_text:response.error, duration: 1500});
            }else if(response.status == 1){
                $(".lecture_completed_btn").addClass("completed");
                $(".course_lessons_navigation_o_O_bott").addClass("completed_lesson");
            }else{
              Snackbar.showToast({def_text:'An unknown error has occured.', duration:1500});
            }
          },
          error: function(xhr){
            Snackbar.showToast({def_text:xhr.responseText, duration:1500});
          }
        });
      }else{
        Snackbar.showToast({def_text:"You need to be logged in!", duration: 1500});
      }


  });


  console.log("\n %c KukaAcademy Version 1.0.2.1 \n", "color:#eee;background:#444;padding:5px 0;");
});
