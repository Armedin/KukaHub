
<?php
echo'
<div class="taskEnded_n3dzx">
  <img class="taskCompletion-avatar_n3dzx" src="'. pro_pic_stat_destination(). (isUserLoggedIn()?get_profile_picture(getSessionUser_id()):def_pro_pic()).'">
  <div class="banner-pe23x27">Congratulations!</div>
  <div class="taskEnded_desciptn3dzx">
    <div class="points0yk_sum8p">
      You got <span class="text-darkgreen"><span class="tot_points">'.$totalPoints.'</span> points</span>
    </div>
    <div class="all-questionsptn_8ehjex">
      <div class="questionptn_8ehjex">
        <div class="questionptnText_8ehjex">
          <div class="questionptnTitle_d93hdn">
            <span class="questionptnTitleDesc_d93hdn">Points for questions</span>
            <span class="dots_notgy9e">..............................................................................................................................................................................</span>
          </div>
          <div class="questionDescription_65iht">
          '.$correct_answers. ' ' .($correct_answers>1?'problems':'problem').' answered correctly
          </div>
        </div>
        <div class="questionptn-right_8ehjex">
          <div class="points_achi09pg">+'.$points.'</div>
        </div>
      </div>
      <div class="questionptn_8ehjex">
        <div class="questionptnText_8ehjex">
          <div class="questionptnTitle_d93hdn">
            <span class="questionptnTitleDesc_d93hdn">Points for completion</span>
            <span class="dots_notgy9e">..............................................................................................................................................................................</span>
          </div>
          <div class="questionDescription_65iht">
          First time completing this quiz
          </div>
        </div>
        <div class="questionptn-right_8ehjex">
          <div class="points_achi09pg">+150</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

setTimeout(function(){
  $(".taskEnded_n3dzx").addClass("show");
$(window).scrollTop(0);
$(".tot_points").each(function(){
  $(this).prop("Counter", 0).animate({
    Counter: $(this).text()
  },{
    duration: 1000,
    easing: "swing",
    step: function (now) {
      $(this).text(Math.ceil(now));
    }
  });
});
if(typeof username == "undefined" && typeof token == "undefined" && typeof user_id == "undefined"){
  Snackbar.showToast({def_text:"You need to be logged in to climb the points", duration:1500});
}
},150);
</script>';
?>
