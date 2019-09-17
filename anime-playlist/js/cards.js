(function($){
	$.fn.rotate_box = function(){
		var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
                            window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
		var	elm = $(this),
			elm_in = $('.inner', this),
			btn = $('.face, .back', elm),
			deg = 0,
			turn = false,
			turn_cls = 'reverse';

		var rotate_anm = function(){
			elm_in.css({
				'transform' : 'rotateY(' + deg * -2 + 'deg)'
			});
		};

		var rotate = function(){
			requestAnimationFrame(function(){
				rotate_anm();
				if( deg == 45 ){
					if( turn === false ){
						elm.addClass(turn_cls);
					} else {
						elm.removeClass(turn_cls);
					}
					deg = 315;
				}
				if( deg <= 45 ){
					deg += 5;
					rotate();
				} else if( deg < 360 && deg > 45 ) {
					deg += 3;
					rotate();
				} else {
					deg = 0;
					elm_in.attr('style', '');
					if( turn === false ){
						turn = true;
					} else {
						turn = false;
					}
				}
			});
		};

		rotate();
	};
})(jQuery);





var userCardsInfoArr = [];
var wmCardImgPath = 'images/cards/';

//Holds card + how many of same cards !
var showedCard = 0;
var cardsDispSize = 12;

function searchUserCards(){
 $('#wmCardLoading').stop(true, false).delay(800).fadeIn(100);
 $.ajax({
	 type: 'POST',
	 url: 'include/card_search.php?action=search-cards',
	 data: {user_id: user_id},
	 dataType: 'json',
	 success: function(result){
		 if(result.code=="1"){
			 $('#wm_mylist_title').html('您的当前信息');// Your current info!
			 $('#wm_mylist_title').fadeIn(500);
			 $('.wm_tiaozhan_body').hide();
			 var cardData = result.data;
			 var cardDataArr = cardData.split(",");
			 var cardsCount = result.cardCount;
			 var cardsCountArr = cardsCount.split(",");
			 $('.wm_user_level').empty().text(result.level);
			 $('.wm_user_score').empty().text(result.score);
			 $('.wm_user_getcard_count').empty().text(String(cardDataArr.length)+'/'+String(result.cardLength));
			 $('.wm_user_info_table').show();
			 $('.wm_user_info_body').fadeIn(300);

			 userCardsInfoArr = [];
			 for(var i =0;i<cardDataArr.length;i++){
				 var cardItemInfoArr = [cardDataArr[i],cardsCountArr[i]];
				 userCardsInfoArr.push(cardItemInfoArr);
			 }
				showedCard = 0;
				userCardsInfoArr.sort(function(a,b){return a<b?1:-1});// Sorting from rarity >
				$('.wm_mycard_list').empty();
				displayCards();
			 if(userCardsInfoArr.length>cardsDispSize){
				 $('#wm_cardmore_btn').fadeIn('200');
			 }

		 }else if(result.code=="2"){
			 $('#wm_mylist_title').text('还没有获得过卡牌'); //User has no cards!
			 $('#wm_mylist_title').fadeIn(500);
		 }
		 $('#wmCardLoading').stop(true, false).fadeOut(100);
	 },
	 error:function(xhr){
		 console.log(xhr.responseText);
		 $('#wmCardLoading').stop(true, false).fadeOut(100);
	 }
 });
}


function displayCards(){
 showedCard = showedCard + cardsDispSize;
 var pageCount = Math.ceil(showedCard/cardsDispSize)-1;
 var addCount = pageCount*cardsDispSize;
 if(showedCard >= userCardsInfoArr.length){
	 showedCard = userCardsInfoArr.length;
	 $('#wm_cardmore_btn').fadeOut('200');
 }
 var delay = 0;
 for(var i =0;i<showedCard - addCount;i++){
	 var html_ = '<a href="'+wmCardImgPath+userCardsInfoArr[i+addCount][0]+'.jpg" class="wm_getcard_box col-md-2 col-xs-3" style="display:none;" target="_blank"><img class="wm_getcard_img" src="'+wmCardImgPath+userCardsInfoArr[i+addCount][0]+'.jpg"><br><span class="wm_card_nums">×'+userCardsInfoArr[i+addCount][1]+'</span></a>';
	 $('.wm_mycard_list').append(html_);
	 //$('.wm_getcard_box').last().delay(delay).fadeIn(400);
	 $('.wm_getcard_box').fadeIn(400);
	 delay = delay + 200;
 }
}


var showCards = 6;
function getBestCards(){
	$.ajax({
 	 type: 'POST',
 	 url: 'include/card_search.php?action=search-cards',
 	 data: {user_id: user_id},
 	 dataType: 'json',
 	 success: function(result){
 		 if(result.code=="1"){
 			 var cardData = result.data;
 			 var cardDataArr = cardData.split(",");
 			 var cardsCount = result.cardCount;
 			 var cardsCountArr = cardsCount.split(",");
 			 userCardsInfoArr = [];

 			 for(var i =0;i<cardDataArr.length;i++){
 				 var cardItemInfoArr = [cardDataArr[i],cardsCountArr[i]];
 				 userCardsInfoArr.push(cardItemInfoArr);
 			 }
 				userCardsInfoArr.sort(function(a,b){return a<b?1:-1});// Sorting from rarity >
				if(showCards>userCardsInfoArr.length){
 				 showCards=userCardsInfoArr.length;
 			  }
				var _html="";
				for(var i=0; i<showCards; i++){
					 _html+= '<a href="'+wmCardImgPath+userCardsInfoArr[i][0]+'.jpg" class="wm_getcard_box col-xs-6 col-md-2" target="_blank"><img class="wm_getcard_img" src="'+wmCardImgPath+userCardsInfoArr[i][0]+'.jpg"></a>';
				}
				$(".profile_user_084nv9vnr_o_O_cardCollection").html(_html);

 		 }else if(result.code=="2"){
 			 $('#wm_mylist_title').text('还没有获得过卡牌'); //User has no cards!
 		 }
 	 },
 	 error:function(xhr){
 		 console.log(xhr.responseText);
 	 }
  });

}




$(document).ready(function(){

  var selected = false;
  var wmCardPluginpath_ = 'include/drawCard.php?action=draw-card';

  $('#wmGetCard').on('click','.selectcard',function(){
   if(selected){
     return false;
   }

   var choiseIndex = $(this).attr('data-id');
   selected = true;
   $('#wmCardLoading').stop(true, false).delay(800).fadeIn(100);
  　　　$.ajax({
       type: 'POST',
       url: wmCardPluginpath_,
       dataType: 'json',
       data: {choiseIndex:choiseIndex, user_id: user_id, username: username, token: token},
       success: function(result){
          $('#wmCardLoading').stop(true, false).fadeOut(100);
          if(result.code == '2'){ //Exceded number of tries!
           $('#alertTitle').text('您已经超过每天的抽卡次数');
           selected = false;
         }else if(result.code == '1'){
           $('#alertTitle').text('快看看都抽到了什么吧');
           for(var i=0;i<result.cardChoiseList.length;i++){
           var cardId = result.cardChoiseList[i];
           var imgSrc = wmCardImgPath+ cardId+'.jpg';
           $('#wmGetCard').find('.selectcard .wm_card_img').eq(i).attr('src',imgSrc);
           }
           $('#wmCardChioseInputBody').fadeOut(300,function(){
             result.chancesLeft = 5;
           if(result.chancesLeft<=0){
             $('#wm_card_rechiose_btn').attr('disabled','true');
           }else{
             $('#wm_card_rechiose_btn').removeAttr('disabled');
             $('#wm_card_rechiose_btn').show();
           }
           $('.wm_card_restart_body').show();
           });
           $('#wmGetCard').find('.selectcard').eq(result.choiseIndex).addClass('selectedcard');
           if(result.choiseIndex==0){
           setCardScroll('left');
           }else if(result.choiseIndex==1){
           setCardScroll('center');
           }else if(result.choiseIndex==2){
           setCardScroll('right');
           }
           $('#wmGetCard').find('.selectcard.selectedcard').rotate_box(); //Selected card opens first :)
           setTimeout(function(){
           var selElem_ = $('#wmGetCard').find('.selectcard');
           for(var j=0;j<selElem_.length;j++){
             if(!selElem_.eq(j).hasClass('selectedcard')){
               selElem_.eq(j).addClass('no-selectedcard');
             }
           }
           $('#wmGetCard').find('.selectcard.no-selectedcard').rotate_box();
           },700)
           selected = true;
           searchUserCards();
         }else{
           alert('Unknown Error! Please contact the administrator!');
         }
       },
       error:function(xhr){
         selected = false;
         alert(xhr.responseText);
         $('#wmCardLoading').stop(true, false).fadeOut(100);
       }
      });

  });



  function setCardScroll(positionType){
		var cardListWidth = $('#wmCardList').width();
		var wmGetCardWidth = $('#wmGetCard').width();
		if(wmGetCardWidth>cardListWidth){
			if(positionType=='left'){
				$('#wmCardList').animate({scrollLeft: 0}, 200);
			}else if(positionType=='center'){
				$('#wmCardList').animate({scrollLeft: (wmGetCardWidth-cardListWidth)/2}, 200);
			}else if(positionType=='right'){
				$('#wmCardList').animate({scrollLeft: wmGetCardWidth-cardListWidth}, 200);
			}
		}
	}

  $("#wm_card_rechiose_btn").on("click",function(){
    reChooseBtn();
  });

  $("#wm_cardmore_btn").on("click",function(){
    displayCards();
  });

  function reChooseBtn(){
		$('#wm_card_rechiose_btn').attr('disabled','true');
		$('.no-selectedcard').removeClass('no-selectedcard');
		$('#wmGetCard').addClass('animated fadeOutDown');
		$('#wmGetCard').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$('#wmGetCard .selectcard').attr('class','card selectcard');
			$('#wmGetCard').removeClass('fadeOutDown').addClass('fadeInDown');
			$('#wmGetCard').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				$('#wmGetCard').removeClass('fadeInDown').removeClass('animated');
				$('#alertTitle').text('继续神抽吧');
				selected = false;
			});
		});
	}

});

//New Design
var animationDone = false;
var cardAnimation = anime.timeline();
var selected_card = false;
var cardPluginPath_ = 'include/drawCard.php?action=draw-card';
var cardImgPath = 'images/cards/';
var cardCount = $('.single_b930bwc_card').length;

cardAnimation.add({
	targets: ".single_b930bwc_card",
	rotateY: [180,900],
	translateY: [150,0],
	transformOrigin: ["50% 100%", "50% 100%"],
	easing: "easeOutQuad",
	scale: [0,0.75],
	delay: 1200,
	duration: 500
})
.add({
	targets: ".single_b930bwc_card",
	scale: [0.75,1],
	rotateZ: function(el, i) {
		return ["0deg", Math.floor((cardCount/2))*-15 + (i*15)+"deg"];
	},
	boxShadow: ['0 0 0px rgb(185, 153, 107, 0)','0 0 36px rgba(255, 204, 128, 1)'],
	elasticity: 100,
	duration: 800,
	complete: function () {
		animationDone = true;
		pulse();
	}
})

function pulse() {
	cardAnimation = anime({
		targets: ".single_b930bwc_card",
		scale: [1,0.95],
		rotateZ: function(el, i) {
			return [Math.floor((cardCount/2))*-15 + (i*15)+"deg", Math.floor((cardCount/2))*-17 + (i*17)+"deg"];
		},
		boxShadow: ['0 0 36px rgba(255, 204, 128, 1)','0 0 50px rgba(255, 204, 128, 1)'],
		easing: "easeInOutCubic",
		duration: 5000,
		loop: true,
		direction: 'alternate'
	})
}

function hoverCards() {
	if (animationDone && !selected_card) {
		cardAnimation.pause();
		cardAnimation = anime.timeline();
		cardAnimation.add({
			targets: ".single_b930bwc_card",
			rotateZ: function(el, i) {
			return Math.floor((cardCount/2))*-15 + (i*15)+"deg";
		},
			translateX: function(el, i) {
				return Math.floor((cardCount/2))*-112 + (i*112)+"px";
			},
			scale: 1,
			easing: "easeInOutSine",
			duration: 400
		});
	}
}
function unhoverCards() {
	if (animationDone && !selected_card ) {
		cardAnimation.pause();
		cardAnimation = anime.timeline();
		cardAnimation.add({
			targets: ".single_b930bwc_card",
			rotateZ: function(el, i) {
			return Math.floor((cardCount/2))*-15 + (i*15)+"deg";
			},
			translateX: function(el, i) {
				return 0+"px";
			},
			scale: 1,
			easing: "easeInOutSine",
			duration: 500,
			complete: function() {
				pulse();
			}
		});
	}
}


var degree = 0;
function revealCards(){
		cardAnimation.pause();
		cardAnimation = anime.timeline();
		cardAnimation.add({
			targets: ".single_b930bwc_card",
			translateY:40,
			easing: "easeInOutSine",
			duration: 600,
			delay: 100
		})
		.add({
			targets: ".single_b930bwc_card",
			begin: function() {
				$(".selectedCard .face").fadeTo(2300, 1);
			},
			translateY:40,
			rotateY: 2160,
			duration: 2000,
			easing: "easeInOutCubic",
			complete: function(){
				$(".selectedCard").addClass("showLight");
				cardAnimation.pause();
				cardAnimation = anime({
					targets: ".drawing_cards_b930bwc_achievement_cont",
					scaleY: [0,1],
					easing: "linear",
					duration: 400
				});
			}
		})

}

function close() {
	cardAnimation.pause();
	cardAnimation = anime({
		targets: [".single_b930bwc_card",".drawing_cards_b930bwc_achievement_cont"],
		scale: 0,
		rotateZ: 0,
		translateX: 0,
		opacity: 0,
		easing: "easeInSine",
		duration: 400
	});
}


$(".single_b930bwc_card").on("mouseenter", hoverCards);
$(".single_b930bwc_card").on("mouseleave", unhoverCards);
$(".achievement_btn").on("click",close);

$(".single_b930bwc_card").on("click", function(){
	if(selected_card || !animationDone){
		return false;
	}

	var choiseIndex = $(this).attr('data-id');
	selected_card = true;
 　　　$.ajax({
			type: 'POST',
			url: cardPluginPath_,
			dataType: 'json',
			data: {choiseIndex:choiseIndex, user_id: user_id, username: username, token: token},
			success: function(result){
				 if(result.code == '2'){ //Exceded number of tries!
					alert('Exceeded!');
					selected_card = false;
				}else if(result.code == '1'){

					for(var i=0;i<result.cardChoiseList.length;i++){
					var cardId = result.cardChoiseList[i];
					var imgSrc = cardImgPath+ cardId+'.jpg';
					$('#getCard').find('.single_b930bwc_card .card_img').eq(i).attr('src',imgSrc);
					}
					$('#getCard').find('.single_b930bwc_card').eq(result.choiseIndex).addClass("selectedCard");
					$('#getCard').find('.single_b930bwc_card').not('.selectedCard').remove();
					
					revealCards();
					selected_card = true;
				}else{
					alert('Unknown Error! Please contact the administrator!');
				}
			},
			error:function(xhr){
				selected_card = false;
				alert(xhr.responseText);
			}
		 });

});
