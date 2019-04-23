


/*
  SnackBar Custom
*/

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
    duration : 1500,
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










var musicApp = {};

$(document).ready(function(){
  "use strict";


  /*
    PreLoader for Ajax (Sound Like loader)
  */
  musicApp.ajaxPreLoader = '<div class="music_all_bars"><div class="music_single_bar"></div><div class="music_single_bar">'+
  '</div><div class="music_single_bar"></div><div class="music_single_bar"></div><div class="music_single_bar"></div>'+
  '<div class="music_single_bar"></div><div class="music_single_bar"></div><div class="music_single_bar"></div</div>';

  /*
  Remove the Ajax ajaxPreLoader
  */
   musicApp.removeAjaxPreloader = function(element)
  {
    element.siblings().css('position','');
    element.fadeOut('fast',function(){
    element.find('.inner').remove();
    });
  }

  /**
   * Function for parsing attributes
   */
  musicApp.parseAttributes = function ( $value, $default ) {
    if( typeof $default == 'undefined') {$default = [];}
    if (typeof $value == 'undefined') return ;
    var $result = $default;
    var $params_pairs = $value.split( '|' );
    if ( $params_pairs ) {
      $params_pairs.forEach ( function(element) {
        var $param = element.split( ':' );
        if (  $param[0]  && $param[1] ) {
          $result[ $param[0] ] = $param[1];
        }
      });
    }
    return $result;
  }


  /*
  * Viewport.js
  * Important since Ajax takes time to loads
  * Viewport helps to leave an offset!
  */

  musicApp.viewportAnimate = function(_el){
    _el.each(function(){

      var _el = $(this),
          _container =  $(document),
          _offset = typeof $(this).attr('data-offset') === 'undefined' ? '100%' : $(this).attr('data-offset');

      _el.css('opacity','0');
      _el.viewPort({
        offset: _offset,
        container: _container,
        callback : function(data){
          musicApp.animateEffects(_el);
        }
      });
    });
  }

  /*
  * Animation using anime.js
  */

  musicApp.animateEffects = function(_selector){
    function animate(_el){
      _el.css('opacity','0');
      _el.imagesLoaded(function(){
        setTimeout(function(){
          _el.css('opacity','1');
        },150);

        var _animateItem = _el.attr('animate-item'),
            _animationEffect = _el.attr('animation-effect');

         var targetedItem = [];

         _el.find(_animateItem).each(function(){
           targetedItem.push($(this)[0]);

           if( animationEffects.effects[_animationEffect].perspective != undefined ) {
             targetedItem.forEach(function(item) {
               item.parentNode.style.WebkitPerspective = item.parentNode.style.perspective = animationEffects.effects[_animationEffect].perspective + 'px';
             });
           }
           if( animationEffects.effects[_animationEffect].origin != undefined ) {
             targetedItem.forEach(function(item) {
               item.style.WebkitTransformOrigin = item.style.transformOrigin = animationEffects.effects[_animationEffect].origin;
             });
           }
         });

           var animationSettings = animationEffects.effects[_animationEffect],
               animationOptions = typeof animationSettings !== 'undefined' ? animationSettings.animeOpts : animationEffects.effects['slideUp'],
               _target = {targets: targetedItem};

           animationSettings = Object.assign(animationOptions,_target);
           var Anime = anime(animationSettings);


      });
    }

    $(_selector).each(function(){
      var _el = $(this);
      animate(_el);
    });
  }





  /*
    Load navigation tabs
  */
  musicApp.navTabs = function(_selector){
    $(document).on('click',_selector,function(e){
      e.preventDefault();
      var _this = $(this);
      var _dataTarget = $(_this.attr("data-target"));
      var _contentTarget = $(_this.attr("content-target"));
      var pastActiveTab = _this.parent().siblings(".active").find('a');
      var pastActiveTabTarget = pastActiveTab.attr("data-target");


      if(!_this.hasClass('loaded') && _this.attr('content-target')){

        $(".ajax_navTabs_preloader").append('<div class="inner"><div class="preloader_wrapper">'+musicApp.ajaxPreLoader+'</div></div>');

        musicApp.changeNavigationTabs(_this, _dataTarget);

        $(".ajax_navTabs_preloader:first").fadeIn('fast',function(){
          var ajaxContent = _this.attr('content-target');
          if(!ajaxContent) return;

          var data;
          $.ajax({
             url: "include/playlists.php?action="+ajaxContent,
             type: "POST",
             data: data,
             dataType: "json",
             success: function(response){
               if(response.status == 0){
                 Snackbar.showToast({def_text:response.error});
               }else{
                 _dataTarget.append(response.data);
                 _this.addClass('loaded'); //Keeps track of everything loaded so that we don't do ajax over again...


                 _dataTarget.imagesLoaded(function(){//After everything loads up

                   musicApp.loadedAjaxContent(_dataTarget);
                   $('pastActiveTabTarget').css('opacity','0');

                   setTimeout(function(){
                     var pastHeight = $(pastActiveTabTarget).height();

                     $(pastActiveTabTarget).removeClass('active').css('opacity','');
                     $(_dataTarget).addClass('active').css('min-height',pastHeight+'px');

                     musicApp.removeAjaxPreloader($('.ajax_navTabs_preloader'));
                     _dataTarget.css('min-height','');

                  },500);

                });

               }
              },
               error: function(xhr, ajaxOptions, thrownError){
                 Snackbar.showToast({def_text:"An Unknown Error occured!"});
               }
             });

        });

      }else if(_this.attr('data-target')){
        musicApp.changeNavigationTabs(_this, _dataTarget);
        _dataTarget.css('min-height','');
      }
    });


  musicApp.changeNavigationTabs = function(_this, _dataTarget){

    if(!_this.hasClass('active')){

      var tabParent = _this.parent().parent();
      var pastActiveTab = tabParent.find('.navigation_item.active>.active');
      var pastActiveTarget = pastActiveTab.attr('data-target');

      tabParent.find('li.active').removeClass('active');
      $(pastActiveTab).removeClass('active');
      _this.parent().addClass("active");
      _this.addClass("active");
    }

    if(!$(_dataTarget).hasClass('active') && $(_this).hasClass('loaded')){
        var pastHeight = $(pastActiveTarget).height();
        $(_dataTarget).addClass('active').css('min-height',pastHeight+'px');
        $(pastActiveTarget).removeClass('active');
    }
  }
} //End musicApp.navTabs

/**
   * Music App Lyrics
   *
*/
  musicApp.lyrics = function(_sel){

  }

/**
   * Modal Opening
   *
*/

  musicApp.manageModal = function(_sel){
    $("body").on("click",_sel, function(e){
      e.preventDefault();
      var _this = $(this);
      var _dataTarget = $(_this.attr("data-target"));
      _dataTarget.css("display","block");
      $("body").append('<div class="modal-backdrop"></div>');
      $('.modal-backdrop').addClass("open");
      $("body").addClass("locked_body");
    });
  }


/**
   * Main Owl Carousel
   *
*/
  musicApp.carousel = function(_el){

    var $autoWidth = true;

    _el.imagesLoaded(function(){
      if($autoWidth){
        _getAutoWidth();
        setTimeout(function(){
          _getAutoWidth();
        },1000);
      }
      _init();
    });

    $(window).resize(function(){
      setTimeout(function(){
        if($autoWidth){
          _getAutoWidth();
        }
        _init();
      },500);
    });

    var carousel_owl = _el.find('.owl-carousel');
    function _init(){
      carousel_owl.owlCarousel({
        margin: 0,
        autoWidth: true,
        loop: false,
        autoplay:true,
        autoplayTimeout:4000,
        autoplaySpeed: 1500
      });


      $(window).resize(function(){
        setTimeout(function(){
          carousel_owl.trigger('refresh.owl.carousel');
        },1000);
      });



    }



    function _getAutoWidth(){
      var responsiveWidth = typeof _el.attr("responsive-width")!== undefined? musicApp.parseAttributes(_el.attr("responsive-width")) : false;

      if(responsiveWidth){
        var width = musicApp.columnWidth(responsiveWidth,_el.children());

        if(typeof width !== 'undefined'){
          _el.find('.item').css('width',width);
        }
      }else{

      }
      carousel_owl.trigger('refresh.owl.carousel');
    }


  } //End carousel main function

  /**
   * Function to extract column width from parent attribute
   * to put to child for rendering
   */
  musicApp.columnWidth = function (responsiveWidth,_el){

    var _return;
    var width;
    if(responsiveWidth){
      responsiveWidth.forEach(function(element,value){
        if(_el.width() > parseInt(value) ){ // If container is greater -> percentage
          width = element;
        }
      });
    }else{//If responsiveWidth not defined,check it with width of parent
       width = typeof $(this).data('width') != 'undefined' && parseInt($(this).data('width')) > _el.width() ? _el.width() : $(this).data('width');
    }
    if(width){
      //Case 1 a String (Percentage)
      if( typeof width !== 'number' && width.indexOf('%') > 0){
        var percentWidth = parseFloat(width.substr(0,width.length -1));//Remove percentage sign
        var width = _el.width()*(percentWidth/100);
      }
      if($.isNumeric(width)){
        _return = width+'px';
      }else{
        _return = width;
      }
      return _return;
    }


  }


  /**
   * After Ajax Content loaded
   * Call all the possible functions!
   */
  musicApp.loadedAjaxContent = function(_el){
    // Init owl carousel
    _el.imagesLoaded(function(){
      _el.find(".anime-owl-main").each(function(){
        musicApp.carousel($(this));
      });
    });

    musicApp.viewportAnimate(_el.find('.viewport-animate'));

    return 'true';
  }


  /**
   * Login Through Modal
   */

  musicApp.onLogin = function(_sel){
    $("body").on("click",_sel,function(e){
        e.preventDefault();
        $(_sel).html('<span class="loading_spinner"></span>');
        $(_sel).prop("disabled",true);
        $(".form_input>input").prop("disabled",true);

        var username = $("#username").val();
        var password = $("#password").val();

        if(username.replace(/^\s+|\s+$/g, "").length == 0){
          $(_sel).html('提交');
          $(_sel).prop("disabled",false);
          $(".form_input>input").prop("disabled",false);
          Snackbar.showToast({def_text:"Please enter your Username or Email address"});
        } else if(password.replace(/^\s+|\s+$/g, "").length == 0){
          $(_sel).html('提交');
          $(_sel).prop("disabled",false);
          $(".form_input>input").prop("disabled",false);
          Snackbar.showToast({def_text:"Please enter your password"});
        }else{
          $.ajax({
            type: "POST",
            url: "include/verify.php?action=login",
            data: {username: username, password: password},
            dataType: "json",
            success: function(response){
              if(response.status == 0){
                Snackbar.showToast({def_text:response.error});
              }else if(response.status == 1){
                Snackbar.showToast({def_text:"Login Succesfully"});
                window.location.href = "";
              }else{
                Snackbar.showToast({def_text:"An unknown error has occured!"});
              }
              $(_sel).html('提交');
              $(_sel).prop("disabled",false);
              $(".form_input>input").prop("disabled",false);
            },
            error: function(xhr, ajaxOptions, thrownError){
              Snackbar.showToast({def_text:"An unknown error has occured!"});
              $(_sel).html('提交');
              $(_sel).prop("disabled",false);
              $(".form_input>input").prop("disabled",false);
            }
          });
        }

    });

  }


  /**
   * Login Through Modal
   */


   musicApp.onRegister = function(_sel){
     $("body").on("click",_sel,function(event){
         event.preventDefault();

         var username = $("#register-username").val();
         var email = $("#register-email").val();
         var password = $("#register-password").val();
         var repassword = $("#register-password2").val();
         var checkbox = $("#terms_9vo_O_ph73bw_checkbox");
         var redict_location = $("#redict_location").val();

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
               url: "include/verify.php?action=register",
               data: {username: username, email: email, password: password, repassword: repassword, redict_location: redict_location},
               dataType: "json",
               success: function(response){
                 if(response.status == 0){
                   Snackbar.showToast({def_text:response.error});
                 }else if(response.status == 1){
                   window.location.href= redict_location;
                 }else{
                   Snackbar.showToast({def_text:'An unknown error has occured.'});
                 }
               },
               error: function(xhr){
                 Snackbar.showToast({def_text:xhr.responseText});
               }

             });
         }
     });
   };


   /**
    * Logout
    */

    $("body").on("click","#logout_btn",function(event){
      event.preventDefault();
      $.post("include/verify.php?action=logout", {token: token, user_id: user_id}).done(function(data){
        if(data == "error"){
          Snackbar.showToast({def_text: "An unknown error has occured!"});
        }else{
          window.location.href="";
        }
      })
    });


  // Body Loaded
  $('body').imagesLoaded(function(){
    setTimeout(function(){
      $('.anime_music_loader').fadeOut('fast');
    },300);
  });

  //Load Tabs
  musicApp.navTabs('.navigation_cont_loader');
  $(".navigation_item.active>a").trigger('click');

  //Initialize Owl Carousel
  $(".anime-owl-main").each(function(){
    musicApp.carousel($(this));
  });

  // animate on view port
  musicApp.viewportAnimate($('.viewport-animate'));

  //SideMenu Toggler
  $(".navbar_floating_btn").on("click",function(){
    $("#layout_manager").toggleClass("sidemenu_compressed");
  });


    // Find a more efficient way ! // TODO
    musicApp.manageModal(".login_link");
    musicApp.onLogin(".login_submit");
    musicApp.onRegister("#register_playlist_submit");

    $("body").on("click",".modal-backdrop",function(){
      $(".modal-backdrop").remove();
      $("body").removeClass("locked_body");
      $("#modal_SignInBox").css("display","none");
    });

    // Search Song !!!

    $("#search_song").on("keyup",function(e){
      e.preventDefault();
      var _this = $("#search_song");
      var _cont = $(".autocomplete-songs");
      if(_this.val().replace(/^\s+|\s+$/g, "").length >= 3){


        $.ajax({
          type: "POST",
          url: "include/search.php?action=search-song",
          data: {value: _this.val()},
          dataType: "json",
          success: function(response){
            if(response.status == 0){
              Snackbar.showToast({def_text:response.error});
            }else if(response.status == 1){
              _cont.html(response.data);
              if(!_cont.is(":visible")){
                _cont.css("display","block");
              }

            }else{
              Snackbar.showToast({def_text:'An unknown error has occured.'});
            }
          },
          error: function(xhr){
            Snackbar.showToast({def_text:xhr.responseText});
          }

        });

      }else{
        if(_cont.is(":visible")){
          _cont.css("display","none");
        }
      }

    });


    //Change mentor
    $(".mentor-avatar").on("click",function(){
      $(".mentor-avatar").removeClass("selectedAvatar");
      $(this).addClass("selectedAvatar");
      var avatar_img= $(this).find(".avatar_img");
      var modelImg;
      if(avatar_img.hasClass("rem_avatar")){
        modelImg = 'rem_bg.png';
        $(".nameLabel").text("Rem");
      }else if(avatar_img.hasClass("miku_avatar")){
        modelImg = 'miku_bg.png';
        $(".nameLabel").text("Miku");
      }else if (avatar_img.hasClass("histoire_avatar")){
        modelImg = 'histoire_bg.png';
        $(".nameLabel").text("Histoire");
      }
      //$(".background_mentorImg>img").attr("src","images/"+modelImg);
      $(".background_mentorImg").css({"background-image":"url(images/"+modelImg+")"});
    });

console.log("\n %c KukaHub/Academy Version 1.0.2.1 \n", "color:#eee;background:#444;padding:5px 0;");

})
