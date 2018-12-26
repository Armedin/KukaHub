
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


  console.log("\n %c KukaHub Version 1.0.2.1 \n", "color:#eee;background:#444;padding:5px 0;");
});
