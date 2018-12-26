
//Snackbar !!!

// To know //
/********

the codes typeof define === 'function' and define.amd
are used to check the presence of require.js which in a
javascript dependency management library.
amd stands for asynchronous module definition.

Factories are simply function that are used instead of classes.
*******/


(function(root, factory) {
    'use strict';

    if (typeof define === 'function' && define.amd) {
        define([], function() {
            return (root.Snackbar = factory());
        });
    } else if (typeof module === 'object' && module.exports) {
        module.exports = root.Snackbar = factory();
    } else {
        root.Snackbar = factory();
    }
})
(this, function() {

  var Snackbar = {};

  Snackbar.current = null;

  var $defaults = {
    def_text : "Snackbar Default Text",
    textColor: "#fff",
    background_color: "#323232",
    duration : 4000,
    showAction : true,
    actionText_color : "#eeff41",
    actionText : "Dismiss",
    onClick: function(element) {
        element.css("opacity","0");
    },
    onClose: function(element) {}
  };


  Snackbar.showToast = function($options){
    var options = $.extend({}, $defaults, $options);

    if (Snackbar.current) {

        Snackbar.current.css("opacity","0");
        setTimeout(
            function() {
                if ($("body").has($(this)))
                  $(this).remove();

            }.bind(Snackbar.current),
            500
        );
    }

    Snackbar.toast = $("<div></div>");
    Snackbar.toast.attr('id','snackbar_cont');

    var innerSnack = $("<div></div>").addClass("snackbar").text(options.def_text);
    Snackbar.toast.append(innerSnack);


    if(options.showAction){
      var actionBtn = $("<button></button>");
      actionBtn.addClass("actionBtn");
      actionBtn.text(options.actionText);
      actionBtn.css("color",options.actionText_color);
      actionBtn.on("click",function(){
        options.onClick(Snackbar.toast);
      });
      innerSnack.append(actionBtn);
    }

    if(options.duration){
      setTimeout(function(){
         if(Snackbar.current == this){
           Snackbar.current.css("opacity","0");
           Snackbar.current.css("top","-80px");
           Snackbar.current.css("bottom","-80px");
         }
      }.bind(Snackbar.toast),options.duration
    );
  }

    Snackbar.toast.on("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",function(event){

      if (event.originalEvent.propertyName === 'opacity' && $(this).css("opacity") == '0') {
        if (typeof(options.onClose) === 'function')
            options.onClose($(this));

          $(this).remove();
          if (Snackbar.current === this) {
              Snackbar.current = null;
          }
      }
    }.bind(Snackbar.toast)
  );

    Snackbar.current = Snackbar.toast;

    $("body").append(Snackbar.toast);
    //Just to make sure transition will work for the first time as well !!!
    var $bottom = window.getComputedStyle(document.getElementById('snackbar_cont')).bottom;
    var $top = window.getComputedStyle(document.getElementById('snackbar_cont')).top;
    Snackbar.toast.css("opacity","1");
    Snackbar.toast.attr('id','snackbar_cont');
    Snackbar.toast.addClass("show");
  }

  Snackbar.close = function() {
      if (Snackbar.current) {
          Snackbar.current.css("opacity","0");
      }
  };

    return Snackbar;
});






// Check if the Email is Valid
function isValidEmailAddress( emailAddress ) {
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	return pattern.test( emailAddress );
}

function changeNavbar_items(){
  var scrollDistance = $(document).scrollTop()+72;
  var welcome = $("#welcome").offset().top-2;
  var about = $("#about").offset().top-2;
  var video = $("#video").offset().top-2;
  var courses = $("#courses").offset().top-2;
  var contact = $("#contact").offset().top-2;
  if(scrollDistance > contact){
    $(".navbar_la10ndp_item.active").removeClass("active");
    $('a[href="#contact"]').parent().addClass("active");
  }
  else if(scrollDistance> courses){
    $(".navbar_la10ndp_item.active").removeClass("active");
    $('a[href="#courses"]').parent().addClass("active");
  }
  else if(scrollDistance > video){
    $(".navbar_la10ndp_item.active").removeClass("active");
    $('a[href="#video"]').parent().addClass("active");
  }
  else if(scrollDistance > about){
    $(".navbar_la10ndp_item.active").removeClass("active");
    $('a[href="#about"]').parent().addClass("active");
  }
  else if(scrollDistance > welcome){
    $(".navbar_la10ndp_item.active").removeClass("active");
    $('a[href="#welcome"]').parent().addClass("active");
  }else{
    $(".navbar_la10ndp_item.active").removeClass("active");
  }

}

// Check page loads!
$("body").addClass("locked_body");

$(document).ready(function(){
  $(".page_ff0exef_o_O_loader").fadeOut(500);
  $("body").removeClass("locked_body");
});

$("document").ready(function(){


    // Landing Page Navbar && Collapse Button
    $(function(){

      if($("body").hasClass("mainPage_landing")){

      var $nav = $(".page_la10ndp_header");

      $nav.toggleClass('sticky_navbar', $(this).scrollTop() > 5);
      changeNavbar_items();

      $(document).on("scroll",function(){
        changeNavbar_items();
        $nav.toggleClass('sticky_navbar', $(this).scrollTop() > 5);

      });
      var opened = false;
      $(".navbar_la10ndp_toggle").on("click",function(){
        $(this).toggleClass("closed");
        $(".navbar_la10ndp_header_not_collapsed").slideToggle("1000");
        $(".page_la10ndp_header").css("height","auto");
      });
    }
  });

    $(".account_logout_ophf39v4_btn>a").on("click",function(){
      $("body").addClass("has_overlay");
      $("body").addClass("logout_int_opened");
    });

    $(".logout_0ngkev_no_btn").on("click",function(e){
      e.preventDefault();
      $("body").removeClass("has_overlay");
      $("body").removeClass("logout_int_opened");
    });
    $(".searchResults").on("click",function(){
      $("body").addClass("has_overlay");
      $("body").addClass("search_oexf98v3a_opened");
    });

    $(".page_overlay").on("click",function(){
      $("body").removeClass("has_overlay");
      if($("body").hasClass("search_oexf98v3a_opened")){
        $("body").removeClass("search_oexf98v3a_opened");
      }else if ($("body").hasClass("logout_int_opened")){
        $("body").removeClass("logout_int_opened");
      }
    });

    $(".reset_oexf98v3a_search").on("click",function(e){
      e.preventDefault();
      $("body").removeClass("has_overlay");
      $("body").removeClass("search_oexf98v3a_opened");
    });

    $(".friendRequest-btn").on("click",function(e){
      e.stopPropagation();
      $(".friendRequestMenu").slideToggle("fast");
    });

    $(".notifications-btn").on("click",function(e){
      e.stopPropagation();
      $(".notificationMenu").slideToggle("fast");
    });

    $(".user_menu_ophf39v4_Cont").on("click",function(e){
      e.stopPropagation();
      $(".user_profileInfo_cont").slideToggle("fast");
    });

    $(".dropdown-menu").on("click",function(e){
      e.stopPropagation();
    });

    $(document).on("click",function(e){
      $(".dropdown-menu").hide();
    });



    ///////////////////////////////////////
      ///  PAGE SIDEBAR MANAGMENT  ////
    //////////////////////////////////////
    var collapse_sidebar_width = 1400;
    var width;
    var height;
    var isSideBarCollapsed=false;
    function updateSidebar(){

      width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

      if(width<=collapse_sidebar_width){
        if(!isSideBarCollapsed){
          $(".page-sidebar").addClass("sidebar-close");
        }
        $(".content").css("margin-left","0");
        $(".page-headerWrapper").css("margin-left","0");
        $(".sidebar-toggler").css("display","block");
        isSideBarCollapsed=true;
      }else{
        $(".content").css("margin-left","260px");
			  $(".page-headerWrapper").css("margin-left","260px");
        $(".sidebar-toggler").css("display","none");
        $(".page-sidebar").removeClass("sidebar-close");
        $("body").removeClass("has_overlay");
        $("body").removeClass("locked_body");
        isSideBarCollapsed=false;
      }
    }

    $(window).on("resize",updateSidebar);
    $(window).on("load",updateSidebar);

    $(".sidebar-mainToggler").on("click",function(){
      if($(".page-sidebar").hasClass("sidebar-close"))
			{
        $(".page-sidebar").removeClass("sidebar-close");

        if(width<=collapse_sidebar_width){
          $("body").addClass("has_overlay");
          $("body").addClass("locked_body");
        }else{
          $(".page-headerWrapper").css("margin-left","260px");
          $(".content").css("margin-left","260px");
        }
      }else{
        $(".page-sidebar").addClass("sidebar-close");
				$(".page-headerWrapper").css("margin-left","0");
        $(".content").css("margin-left","0");
        if(width<=collapse_sidebar_width)
				{
					$("body").removeClass("has_overlay");
					$("body").removeClass("locked_body");
				}
      }
    });

    //Second action for this
    $(".page_overlay").on("click",function(){
      $("body").removeClass("locked_body");
      $("body").removeClass("has_overlay");
      if(width<=collapse_sidebar_width && !$(".page-sidebar").hasClass("sidebar-close")){
        $(".page-sidebar").addClass("sidebar-close");
      }
      else if(!$(".login_oexf98v3a_container").hasClass("closed")){
        $(".login_oexf98v3a_container").fadeOut("1000").addClass("closed");
        $("body").removeClass("loginForm_oexf98v3a_opened");
      }

    });
    $(".login_oexf98v3a_close").on("click",function(){
      $("body").removeClass("has_overlay");
      $("body").removeClass("loginForm_oexf98v3a_opened");
      $(".login_oexf98v3a_container").fadeOut("1000").addClass("closed");
    });

    $(".open_ophf39v4_loginModel").on("click",function(){
      $("body").addClass("has_overlay");
      $("body").addClass("loginForm_oexf98v3a_opened");
      $(".login_oexf98v3a_container").css("display","flex").hide().fadeIn("5000").removeClass("closed");
    });


    //////////////////////////////////////////////////////////
         ////  LOGIN AND REGISTER INPUT BUTTONS   ////
    /////////////////////////////////////////////////////////

    $('input[type=email].input_with_borderErrors').on('keyup',function(){
      $(this).removeClass("invalid");
      if(isValidEmailAddress($(this).val()) ){
        $(this).removeClass("invalid").addClass("is_valid");
      }else{
        $(this).removeClass("is_valid");
      }
    });

    $('input[type=text].input_with_borderErrors').on('keyup',function(){
      $(this).removeClass("invalid");
      if($(this).val().replace(/^\s+|\s+$/g, "").length>=6){
          $(this).removeClass("invalid").addClass("is_valid");
      }else{
        $(this).removeClass("is_valid");
      }
    });

    $('input[type=password].input_with_borderErrors').on('keyup',function(){
      $(this).removeClass("invalid");
      if($(this).val().replace(/^\s+|\s+$/g, "").length>=6){
          $(this).removeClass("invalid").addClass("is_valid");
      }else{
        $(this).removeClass("is_valid");
      }
    });



    ///////////////////////////////////////
         ////  AJAX REGISTER   ////
    //////////////////////////////////////

    $("#submit-register").on("click",function(event){
        event.preventDefault();

        var username = $("#register-username").val();
        var email = $("#register-email").val();
        var password = $("#register-password").val();
        var repassword = $("#register-password2").val();
        var checkbox = $("#terms_9vo_O_ph73bw_checkbox");

        if(username.replace(/^\s+|\s+$/g, "").length == 0){
          $("#register-username").addClass("invalid");
          Snackbar.showToast({def_text:"Please enter your Username !"});
        }else if(username.replace(/^\s+|\s+$/g, "").length<6){
          $("#register-username").addClass("invalid");
          Snackbar.showToast({def_text:"Your username must be at least 6 characters long"});
        }else if(email.replace(/^\s+|\s+$/g, "").length == 0){
          $("#register-email").addClass("invalid");
          Snackbar.showToast({def_text:"Please enter your Email Address"});
        }else if(!isValidEmailAddress(email)){
          $("#register-email").addClass("invalid");
          Snackbar.showToast({def_text:"Invalid Email Address"});
        }else if(password.replace(/^\s+|\s+$/g, "").length == 0){
          $("#register-password").addClass("invalid");
          $("#register-password2").addClass("invalid");
          Snackbar.showToast({def_text:"Please enter your Password!"});
        }else if(password.replace(/^\s+|\s+$/g, "").length < 6){
          $("#register-password").addClass("invalid");
          $("#register-password2").addClass("invalid");
          Snackbar.showToast({def_text:"Your password must be at least 6 characters long!"});
        }else if(repassword.replace(/^\s+|\s+$/g, "").length == 0){
          $("#register-password").addClass("invalid");
          $("#register-password2").addClass("invalid");
          Snackbar.showToast({def_text:"Please enter your Password (Confirm) !"});
        }else if(password != repassword){
          $("#register-password").addClass("invalid");
          $("#register-password2").addClass("invalid");
          Snackbar.showToast({def_text:"Your passwords do not match"});
        }else if(!checkbox.is(":checked")){
          Snackbar.showToast({def_text:"You must agree to the terms & conditions !"});
        }else{
            $.ajax({
              type: "POST",
              url: "include/entry.php?action=register",
              data: {username: username, email: email, password: password, repassword: repassword},
              dataType: "json",
              success: function(response){
                if(response.status == 0){
                  Snackbar.showToast({def_text:response.error});
                }else if(response.status == 1){
                      window.location.href = "./profile.php?id="+user_id;
                }else{
                  Snackbar.showToast({def_text:'An unknown error has occured.'});
                }
              },
              error: function(){
                Snackbar.showToast({def_text:"An unknown error has occured."});
              }

            });
        }
    });


    ///////////////////////////////////////
         ////  AJAX LOGIN   ////
    //////////////////////////////////////

    $("#submit-login").on("click",function(event){
        event.preventDefault();

        var username = $("#login-username").val();
        var password = $("#login-password").val();


        if(username.replace(/^\s+|\s+$/g, "").length == 0){
          Snackbar.showToast({def_text:"Please enter your Username or Email address"});
        } else if(password.replace(/^\s+|\s+$/g, "").length == 0){
          Snackbar.showToast({def_text:"Please enter your password"});
        }else{

          $.ajax({
            type: "POST",
            url: "include/entry.php?action=login",
            data: {username: username, password: password},
            dataType: "json",
            success: function(response){
              if(response.status == 0){
                Snackbar.showToast({def_text:response.error});
              }else if(response.status == 1){
                window.location.href="email-confirm.php";
              }else{
                Snackbar.showToast({def_text:"An unknown error has occured"});
              }
            },
            error: function(xhr, ajaxOptions, thrownError){
              Snackbar.showToast({def_text:"An unknown error has occured"});
            }
          });

        }

    });

      //////////////////////////////////////////////////
	      //////////// ACCOUNT ACTIVATION ////////////
	    //////////////////////////////////////////////////


      $("#get_new_activation_key").on("click",function(event){

        event.preventDefault();

        $.ajax({
          type: "POST",
          url: "include/entry.php?action=get-new-activation-key",
          data: {username: username, user_id: user_id, token: token},
          dataType: "json",
          success: function(response){
            if(response.status == 0){
              Snackbar.showToast({def_text:response.error});
            }else if(response.status == 1){
              Snackbar.showToast({def_text:"Email send successfully"});
            }else{
              Snackbar.showToast({def_text:"An unknown error has occured"});
            }
          },
          error: function(xhr, ajaxOptions, thrownError){
            Snackbar.showToast({def_text:"An unknown error has occured"});
          }

        });

      });



      //////////////////////////////////////////////////////////////////
	        //////////// GETTING USER INPUT (WIZARD FORM)////////////
	    /////////////////////////////////////////////////////////////////


      function isEmptyInput(init_input){
        var input = init_input.val();
        if(input.replace(/^\s+|\s+$/g, "").length == 0){
          return false;
        }else{
          return true;
        }
      }

      function isValidPhone(phoneInput){
        var filter = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        if(!filter.test(phoneInput)){
          $("input#phone-number").closest(".form-group").addClass("has-error");
        }
      }


      $(".form_wizard_step_btn").on("click",function(e){

        // We don't want to just go to Finish setup without finishing all of inputs

        var currentInputs = $(".wizard_input");
        var hasErrors = false;
        for(var i=0;i<currentInputs.length;i++){
          if(!isEmptyInput($(currentInputs[i]))){
            hasErrors = true;
          }
        }

        // Check whether to enable/disable back btn
        var current = $(this).attr('href');

        if(current != "#step-4" || (current == "#step-4" && hasErrors == false)){
        if($(".back_btn").hasClass("disabled") && current != "#step-1"){
          $(".back_btn").removeClass("disabled");
        }else if(!$(".back_btn").hasClass("disabled") && current == "#step-1"){
          $(".back_btn").addClass("disabled");
        }

        e.preventDefault();
        var target = $($(this).attr('href'));
        $(".form_wizard_step_btn").removeClass("active_step");
        $(this).addClass("active_step");

        //Show the div associated with the btn and hide the others
        $(".form_wizard_03jg4f_o_O_form_cont").removeClass("show");
        target.addClass("show");
        target.find("input:eq(0)").focus();

      }
      });



      $(".form_wizard_03jg4f_o_O_btns_wrapper .next_btn").on("click",function(){

        var currentStep = $(this).closest(".form_wizard_03jg4f_o_O_form_cont");
        var currentStepButton = currentStep.attr("id");
        var currentInputs = currentStep.find("input.wizard_input, textarea.wizard_input");
        var nextStepWizard = $(".form_wizard_03jg4f_o_O_steps_cont .form_wizard_step a[href='#" + currentStepButton +"']").parent().next().children("a");

        var isValid = true;
        $(".form-group").removeClass("has-error");
        for(var i=0;i<currentInputs.length;i++){
          if($(currentInputs[i]).is("#phone-number")){
            isValidPhone($(currentInputs[i]).val());
          }
          if(!isEmptyInput($(currentInputs[i]))){
            isValid = false;
            $(currentInputs[i]).closest(".form-group").addClass("has-error");
          }
        }

        if(isValid){
          nextStepWizard.trigger('click');
        }
      });

      $(".form_wizard_03jg4f_o_O_btns_wrapper .back_btn").on("click",function(){

        if(!$(this).hasClass("disabled")){
            var currentStep = $(this).closest(".form_wizard_03jg4f_o_O_form_cont");
            var currentStepButton = currentStep.attr("id");
            var currentInputs = currentStep.find("input");
            var prevStepWizard = $(".form_wizard_03jg4f_o_O_steps_cont .form_wizard_step a[href='#"+ currentStepButton +"']").parent().prev().children("a");

            prevStepWizard.trigger('click');
        }
      });



      //////////////////////////////////////////////////////////////////
          //////////// OPENING THE CHANGE PROFILE IMAGE MODAL /////////////
      /////////////////////////////////////////////////////////////////

      //Bug 1 -> Fix number input
      $(function(){
		    $(".form_opog4vh_uploadPic_btn").on("click",function(){
			  $(".change_opog4vh_pickModal").css("display","block");

			window.setTimeout( function() {
				$(".change_opog4vh_pickModal").addClass("open");
			}, 100);
			$("body").addClass("locked_body");
			$("body").css("padding-right","15px");
		});

		$(".change_opog4vh_closeModal, .close_opog4vh_modal ").on("click",function(){
			$(".change_opog4vh_pickModal").removeClass("open");

			$(".change_opog4vh_pickModal").one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
			function(e){
				$(".change_opog4vh_pickModal").css("display","none");
				$("body").removeClass("locked_body");
				$("body").css("padding-right","");
				$("change_opog4vh_selectImg_btn input").val("");
				$(this).off('webkitTransitionEnd moztransitionend transitionend oTransitionEnd');
 			});
		});

		window.onclick = function(event){
			if(event.target.matches(".change_opog4vh_pickModal")){
				$(".change_opog4vh_pickModal").removeClass("open");
				$(".change_opog4vh_pickModal").one("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
			function(e){
				$(".change_opog4vh_pickModal").css("display","none");
				$("body").removeClass("locked_body");
				$("body").css("padding-right","");
				$("change_opog4vh_selectImg_btn input").val("");
				$(this).off('webkitTransitionEnd moztransitionend transitionend oTransitionEnd');
 			});
			}
		}

	});

  // Got all user info
  $("#get-started-finish-btn").on("click",function(event){
    event.preventDefault();

    //Create a FormData to append everything

    var form_data = new FormData();


    var firstname = $("#get-started-firstname").val();
    var lastname = $("#get-started-lastname").val();
    var gender = $("#get-started-gender").val();
    var age = $("#get-started-age").val();

    var phone_number = $("#phone-number").val();
    var birthday = $("#get-started-birthday").val();
    var location = $("#get-started-location").val();
    var study_place = $("#get-started-study_place").val();
    var biography = $("#get-started-biography").val();

    //Append everything in FormData (also user_id and token from the normal js )
    form_data.append("user_id", user_id);
    form_data.append("token", token);
    form_data.append("file", profile_pic_image);
    form_data.append("firstname", firstname);
    form_data.append("lastname", lastname);
    form_data.append("gender", gender);
    form_data.append("age", age);
    form_data.append("phone_number", phone_number);
    form_data.append("birthday", birthday);
    form_data.append("location", location);
    form_data.append("study_place", study_place);
    form_data.append("biography", biography);

    if(firstname.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(lastname.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(gender.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(age.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(phone_number.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(birthday.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(study_place.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else if(biography.replace(/^\s+|\s+$/g, "").length == 0){
      Snackbar.showToast({def_text:"Please fill in all the required information !"});
    }else{
      $.ajax({
        url: "include/user-information.php?action=insert-info",
        data: form_data,
			  processData: false,
			  contentType: false,
        type: "POST",
        dataType: "json",
        success: function(response){
          if(response.status == 0){
            Snackbar.showToast({def_text:response.error});
          }else if(response.status == 1){
              window.location.href = "./profile.php?id="+user_id;
          }else{
            Snackbar.showToast({def_text:'An unknown error has occured.'});
          }
        },
        error: function(xhr, ajaxOptions, thrownError){
          Snackbar.showToast({def_text:xhr.responseText});
        }

      });

    }
  });

  //////////////////////////////////////////////////////////////////
      //////////// Log the User Out/////////////
  /////////////////////////////////////////////////////////////////

  $("body").on("click","#logout",function(event){
    event.preventDefault();
    $.post("include/entry.php?action=logout", {token: token, user_id: user_id}).done(function(data){
      if(data == "error"){
        Snackbar.showToast({def_text: "An unknown error has occured!"});
      }else{
        window.location.href="login.php";
      }
    })
  });

  //////////////////////////////////////////////////////////////////
      //////////// Remove Profile Picture /////////////
  /////////////////////////////////////////////////////////////////

  $("#remove-profile-picture").on("click",function(event){

    event.preventDefault();
    $.post("include/user-information.php?action=remove-pro-pic", {token : token, user_id: user_id}).done(function(data){

      if(data == "error"){
        Snackbar.showToast({def_text: "An unknown error occured! Try again later."});
      }else{
        $(".profile_picture_selection").attr("src",data);
      }

    });

  });

  //////////////////////////////////////////////////////////////////
      //////////// Update User Information /////////////
  /////////////////////////////////////////////////////////////////

  $("body").on("click",".form_opog4vh_updateChanges_btn",function(event){
      event.preventDefault();

      //Create a FormData to append everything

      var form_data = new FormData();

      var firstname = $("#settings-firstname").val();
      var lastname = $("#settings-lastname").val();
      var birthday = $("#settings-birthday").val();
      var location = $("#settings-location").val();
      var biography = $("#settings-biography").val();

      //Append everything in FormData (also user_id and token from the normal js )
      form_data.append("user_id", user_id);
      form_data.append("token", token);
      form_data.append("file", profile_pic_image);
      form_data.append("firstname", firstname);
      form_data.append("lastname", lastname);
      form_data.append("birthday", birthday);
      form_data.append("location", location);
      form_data.append("biography", biography);


      if(firstname.replace(/^\s+|\s+$/g, "").length == 0){
        Snackbar.showToast({def_text:"Firstname can't be empty!"});
      }else if(lastname.replace(/^\s+|\s+$/g, "").length == 0){
        Snackbar.showToast({def_text:"Lastname can't be empty!"});
      }else if(birthday.replace(/^\s+|\s+$/g, "").length == 0){
        Snackbar.showToast({def_text:"Birthday can't be empty!"});
      }else if(location.replace(/^\s+|\s+$/g, "").length == 0){
        Snackbar.showToast({def_text:"Location can't be empty!"});
      }else if(biography.replace(/^\s+|\s+$/g, "").length == 0){
        Snackbar.showToast({def_text:"Biography can't be empty!"});
      }else{
        $.ajax({
          url : "include/user-information.php?action=update-user-profile",
          data: form_data,
  			  processData: false,
  			  contentType: false,
          type : "POST",
          dataType : "json",
          success : function(response){
            if(response.status == 0){
              Snackbar.showToast({def_text : response.error});
            }else if(response.status == 1){
              Snackbar.showToast({def_text : "Profile Updated Successfully!"});
            }else{
              Snackbar.showToast({def_text : "An unknown error has occured !"});
            }
          },
          error : function(xhr, ajaxOptions, thrownError){
            Snackbar.showToast({def_text : xhr.responseText});
          }
        })
      }
  });

  //////////////////////////////////////////////////////////////////
      //////////// Send user friend request /////////////
  /////////////////////////////////////////////////////////////////

  $("body").on("click", "#add-friend",function(event){
    event.preventDefault();
    var friend_id = $(this).attr("attr-id");
    $.post("include/user_friends.php?action=add-friend", {user_id: user_id, token: token, username: username, target_id: friend_id},
    function(data){
      if(data == "error1"){
        Snackbar.showToast({def_text: "Friend request has already been sent"});
      }else if(data == "error2"){
        Snackbar.showToast({def_text: "Invalid Username! Try again later"});
      }else if(data == "error3"){
        Snackbar.showToast({def_text: "Invalid Token! Try again later"});
      }else if(data == "error4"){
        Snackbar.showToast({def_text: "Invalid Friend Request! User doesn't exist"});
      }else if(data == "done"){
        $("#add-friend[attr-id='"+friend_id +"']").attr("id","pending-request").html("Pending request...");
        Snackbar.showToast({def_text: "Friend request send"});
      }else{
        Snackbar.showToast({def_text: "An unknown error has occured! Try again later"});
      }

    });
  });

  //////////////////////////////////////////////////////////////////
      //////////// ACCEPT AND REJECT FRIEND REQUESTS /////////////
  /////////////////////////////////////////////////////////////////
  $(".friendReqMenu").on("click", "#accept-request", function(event){
    event.preventDefault();
    var friend_id = $(this).attr("attr-id");
    $.post("include/user_friends.php?action=accept-request", {user_id: user_id, token: token, username: username, target_id: friend_id},
    function(data){

        if(data == "done"){
          var btn_cont = $("#accept-request").parent().parent().parent();
          var cont_width = btn_cont.width();
          cont_width = -(cont_width + 100);
          btn_cont.animate({
            marginLeft: cont_width,
            opacity: 0
          }, 480, function(){
            $(this).remove();
          })
        }else{
          Snackbar.showToast({def_text: data});
        }
    });
  });

  $(".friendReqMenu").on("click", "#reject-request", function(event){
    event.preventDefault();
    var friend_id = $(this).attr("attr-id");
    $.post("include/user_friends.php?action=reject-request", {user_id: user_id, token: token, username: username, target_id: friend_id},
    function(data){

      if(data == "done"){
        var btn_cont = $("#reject-request").parent().parent().parent();
        var cont_width = btn_cont.width();
        cont_width = -(cont_width + 100);
        btn_cont.animate({
          marginLeft: cont_width,
          opacity: 0
        }, 480, function(){
          $(this).remove();
        })
      }else{
        Snackbar.showToast({def_text: data});
      }
    });
  });

  //////////////////////////////////////////////////////////////////
      //////////// GET FRIEND REQUESTS FROM DB /////////////
  /////////////////////////////////////////////////////////////////

  function getFriendRequests(){
    $.ajax({
      type: "POST",
      url: "include/user_friends.php?action=get-friend-requests",
      data: {username: username, token: token, user_id: user_id},
      dataType: "json",
      success: function(response){
        if(response.status == 0){
          Snackbar.showToast({def_text:response.error});
        }else if(response.status == 1){
            $(".friendRequestMenu>.friendReqMenu").html(response.output);
        }else{
          Snackbar.showToast({def_text:'An unknown error has occured.'});
        }
      },
      error: function(){
        Snackbar.showToast({def_text:"An unknown error has occured."});
      }
    });
  }

  $("#friendRequest-btn").on("click",function(event){
    event.preventDefault();
    getFriendRequests();
    getUnseenFriendRequests();
  });

  //////////////////////////////////////////////////////////////////
      //////////// GET TOTAL UNSEEN FRIEND REQ FROM DB /////////////
  /////////////////////////////////////////////////////////////////

  function getUnseenFriendRequests(){
    $.post("include/user_friends.php?action=get-unseen-friend-requests", {user_id: user_id, token: token, username: username},
    function(data){
        if(data != "null"){
          $(".unreadFriendReq").removeClass("badge_no_display").html(data);
        }else{
            $(".unreadFriendReq").addClass("badge_no_display").html("0");
        }
    });
  }

  /*setInterval(function(){
			getUnseenFriendRequests();
		}, 1000);*/


    // $(".course_lesson_curriculum_trigger").on("click",function(){
    //   $("body").toggleClass("opened_curriculum_sidebar");
    // });
    // $(".course_lesson_overlay").on("click",function(){
    //   if($("body").hasClass("opened_curriculum_sidebar")){
    //     $("body").removeClass("opened_curriculum_sidebar");
    //   }
    // });
    // $(".curriculum_section_item").on("click",function(){
    //   $(this).toggleClass("opened");
    //   $(this).closest(".course_curriculum_section").find(".curriculum_section_subs_items").slideToggle();
    // });
    //

});





//
