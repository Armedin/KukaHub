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
