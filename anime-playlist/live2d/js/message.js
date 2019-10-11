var message_Path='/KukaHub/anime-playlist/live2d/' ;
var talkAPI="" ;
var home_Path='http://localhost/KukaHub/anime-playlist/';

var userAgent = window.navigator.userAgent.toLowerCase();
var norunAI = [ "android", "iphone", "ipod", "ipad", "windows phone", "mqqbrowser" ,"msie","trident/7.0"];
var canRun = true;
var modelType = 0;


for(var i=0;i<norunAI.length;i++){
	if(userAgent.indexOf(norunAI[i]) > -1){
		canRun = false;
		break;
	}
}

if(!window.WebGLRenderingContext){
	canRun = false;
}

if(canRun){

	var hitFlag = false;
	var hideAIFlag = false;
	var liveTalkTimer = null;
	var sleepTimer_ = null;
	var AITalkFlag = false;
	var talkNum = 0;


	(function (){
		function renderTip(template, context) {
			var tokenReg = /(\\)?\{([^\{\}\\]+)(\\)?\}/g;
			return template.replace(tokenReg, function (word, slash1, token, slash2) {
				if (slash1 || slash2) {
					return word.replace('\\', '');
				}
				var variables = token.replace(/\s/g, '').split('.');
				var currentObject = context;
				var i, length, variable;
				for (i = 0, length = variables.length; i < length; ++i) {
					variable = variables[i];
					currentObject = currentObject[variable];
					if (currentObject === undefined || currentObject === null) return '';
				}
				return currentObject;
			});
		}

		String.prototype.renderTip = function (context) {
			return renderTip(this, context);
		};

		var re = /x/;
		re.toString = function() {
			showMessage('Haha, you opened the console, do you want to know my secret?', 5000);
			talkValTimer();
			return '';
		};

		$(document).on('copy', function (){
			showMessage('You just copied something~~', 5000);
			talkValTimer();
		});

		function initTips(){
			var msgType = 'message.json';
			$.ajax({
				cache: true,
				url: message_Path+msgType,
				dataType: "json",
				success: function (result){
					$.each(result.mouseover, function (index, tips){
						$(tips.selector).mouseover(function (){
							var text = tips.text;
							if(Array.isArray(tips.text)) text = tips.text[Math.floor(Math.random() * tips.text.length + 1)-1]; //Get the random word ;)
							text = text.renderTip({text: $(this).text()});
							showMessage(text, 3000);
							talkValTimer();
							clearInterval(liveTalkTimer);
							liveTalkTimer = null;
						});
						$(tips.selector).mouseout(function (){
							showHitokoto();
							if(liveTalkTimer == null){
								liveTalkTimer = window.setInterval(function(){
									showHitokoto();
								},8000);
							};
						});
					});
					$.each(result.click, function (index, tips){
						$(tips.selector).click(function (){
							if(hitFlag){
								return false
							}
							hitFlag = true;
							setTimeout(function(){
								hitFlag = false;
							},8000);
							var text = tips.text;
							if(Array.isArray(tips.text)) text = tips.text[Math.floor(Math.random() * tips.text.length + 1)-1];
							text = text.renderTip({text: $(this).text()});
							showMessage(text, 3000);
						});
						clearInterval(liveTalkTimer);
						liveTalkTimer = null;
						if(liveTalkTimer == null){
							liveTalkTimer = window.setInterval(function(){
								showHitokoto();
							},8000);
						};
					});
				}
			});
		}

		initTips();


		var text;
		//Incredible AI development here LOL (jokin')
		var now = (new Date()).getHours();
		if (now > 2 || now <= 5) {
			text = 'Are you a night owl? Aren\'t you feeling sleepy? ';
		} else if (now > 5 && now <= 11) {
			text = 'Good Morning! The day is just about to get started !';
		} else if (now > 11 && now <= 14) {
			text = 'It\'s lunch time！Awesome!';
		} else if (now > 14 && now <= 17) {
			text = 'What are you up to？';
		} else if (now > 17 && now <= 21) {
			text = 'Good Evening! How was your day today?';
		} else if (now > 23 && now <= 2) {
			text = 'It\'s already so late. Go to sleep~~';
		} else {
			text = 'Hello Baka！';
		}
		showMessage(text, 4000);
	})();

	liveTalkTimer = setInterval(function(){
		showHitokoto();
	},8000);

	function showHitokoto(){

		if(sessionStorage.getItem("Sleepy")!=="1"){
			if(!AITalkFlag){
				var talkContent = [];
				var live2d_weiyu_cache = $('.live2d_weiyu_cache');
				for(var i=0;i<live2d_weiyu_cache.length;i++){
					talkContent.push(live2d_weiyu_cache.eq(i).text());
				}
				var num = talkNum;
				showMessage(talkContent[num], 15000);
				talkNum++;
				if(talkNum>live2d_weiyu_cache.length){
					talkNum=0;
				}
				talkValTimer();

			}
		}else{
			hideMessage(0);
			if(sleepTimer_==null){
				sleepTimer_ = setInterval(function(){
					checkSleep();
				},200);
			}
		}
	}

	function checkSleep(){
		var sleepStatu = sessionStorage.getItem("Sleepy");
		if(sleepStatu!=='1'){
			talkValTimer();
			showMessage('You are back~', 0);
			clearInterval(sleepTimer_);
			sleepTimer_= null;
		}
	}

	function showMessage(text, timeout){
		if(Array.isArray(text)) text = text[Math.floor(Math.random() * text.length + 1)-1];

		$('.message').stop();
		$('.message').html(text);
		$('.message').fadeTo(200, 1);

	}
	function talkValTimer(){
		$('#live_talk').val('1');
	}

	function hideMessage(timeout){
		//$('.message').stop().css('opacity',1);
		if (timeout === null) timeout = 5000;
		$('.message').delay(timeout).fadeTo(200, 0);
	}

	function initLive2d (){
		var hasModels = false;
		//Init the AI-s which have more than one model
		var MashiroModelJson = ["model/mashiro/ryoufuku.model.json","model/mashiro/seifuku.model.json","model/mashiro/shifuku.model.json"];
		var MashiroModelType = modelType;

		//Set Mentor ID (Default is 0)
		if(localStorage.getItem("live2dMentor") === null){
			localStorage.setItem("live2dMentor", "3");
		}
		if(parseInt(localStorage.getItem("live2dMentor")) === 3){ //Mashiro
			$(".type_dress").css("display","block");
			hasModels = true;
		}

		$(".type_dress").on('click',function(){
			if(hasModels){
				MashiroModelType++;
				if(MashiroModelType>=MashiroModelJson.length){
					MashiroModelType = 0;
				}
				loadlive2d("live2d", message_Path+MashiroModelJson[MashiroModelType]);
			}
		});

		$('#hideButton').on('click', function(){
			if(hideAIFlag){
				return false;
			}else{
				hideAIFlag = true;
				localStorage.setItem("live2dhidden", "0");
				$('#live2dModule').fadeOut(200);
				$('#open_live2d').delay(200).fadeIn(200);
				setTimeout(function(){
					hideAIFlag = false;
				},300);
			}
		});
		$('#chingChongBtn').on('click',function(){
			if($('#chingChongBtn').hasClass('ching_chongMode')){
				$('body').removeClass('shake');
				$('.fully_openedPlaylist_cont').removeClass('shake');
				$('.openedPlaylist_lyrics_cont').removeClass('rainbow');
				$('.fully_openedPlaylist_cont').removeClass('rainbow');
				$('#chingChongBtn').removeClass('ching_chongMode');
			}else{
				var partyTypes = $('#partyType').val();
				var typesArr = partyTypes.split(",");
				var type = typesArr[Math.floor(Math.random() * typesArr.length)];
				if(type == "shake"){
					$('#chingChongBtn').addClass('ching_chongMode');
					$('body').addClass('shake');
					$('.fully_openedPlaylist_cont').addClass('shake');
				}else{
					$('.openedPlaylist_lyrics_cont').addClass('rainbow');
					$('.fully_openedPlaylist_cont').addClass('rainbow');
				}
				$('#chingChongBtn').addClass('ching_chongMode');

			}
		});
		$('#open_live2d').on('click', function(){
			if(hideAIFlag){
				return false;
			}else{
				hideAIFlag = true;
				localStorage.setItem("live2dhidden", "1");
				$('#open_live2d').fadeOut(200);
				$('#live2dModule').delay(200).fadeIn(200);
				setTimeout(function(){
					hideAIFlag = false;
				},300);
			}
		});
		$(".select_mentorBtn").on('click',function(){
			$("#open_live2d").click();
		})
		$('#showInfoBtn').on('click',function(){
			showMessage("Coming soon !",3000);
		});
		$('#showTalkBtn').on('click',function(){
			showMessage("Coming soon !",3000);
		});


		//Get Location
		var landL = sessionStorage.getItem("historywidth");
		var landB = sessionStorage.getItem("historyheight");
		if(landL == null || landB ==null){
			landL = '5px'
			landB = '0px'
		}
		$('#live2dModule').css('left',landL+'px');
		$('#live2dModule').css('bottom',landB + 'px');

		//Mobile
		function getEvent() {
			return window.event || arguments.callee.caller.arguments[0];
		}
		var smcc = document.getElementById("live2dModule");
		var moveX = 0;
		var moveY = 0;
		var moveBottom = 0;
		var moveLeft = 0;
		var moveable = false;
		var docMouseMoveEvent = document.onmousemove;
		var docMouseUpEvent = document.onmouseup;
		smcc.onmousedown = function(){
			var ent = getEvent();
			moveable = true;
			moveX = ent.clientX;
			moveY = ent.clientY;
			var obj = smcc;
			moveBottom = parseInt(obj.style.bottom);
			moveLeft = parseInt(obj.style.left);
			if(isFirefox=navigator.userAgent.indexOf("Firefox")>0){
				window.getSelection().removeAllRanges();
			}
			document.onmousemove = function(){
				if(moveable){
					var ent = getEvent();
					var x = moveLeft + ent.clientX - moveX;
					var y = moveBottom +  (moveY - ent.clientY);
					obj.style.left = x + "px";
					obj.style.bottom = y + "px";
				}
			};
			document.onmouseup = function(){
				if(moveable){
					var historywidth = obj.style.left;
					var historyheight = obj.style.bottom;
					historywidth = historywidth.replace('px', '');
					historyheight = historyheight.replace('px', '');
				  sessionStorage.setItem("historywidth", historywidth);
					sessionStorage.setItem("historyheight", historyheight);
					document.onmousemove = docMouseMoveEvent;
					document.onmouseup = docMouseUpEvent;
					moveable = false;
					moveX = 0;
					moveY = 0;
					moveBottom = 0;
					moveLeft = 0;
				}
			};
		};
	} //Ends initLive2d

	$(document).ready(function() {
		initLive2d();
		updateLive2D(localStorage.getItem("live2dMentor"));
	});


	//main function
	function updateLive2D(live2d_type){
		if(live2d_type == 0){
			var AITextureSrc = [
				[
					message_Path+"model/histoire/histoire.1024/texture_00.png",
					message_Path+"model/histoire/histoire.1024/texture_01.png",
					message_Path+"model/histoire/histoire.1024/texture_02.png",
					message_Path+"model/histoire/histoire.1024/texture_03.png"
			 ]
			];
		}else if(live2d_type == 1){
			var AITextureSrc = [
				[
					message_Path+"model/rem/remu2048/texture_00.png"
			  ]
			];
		}else if(live2d_type == 2){
			var AITextureSrc = [
				[
					message_Path+"model/miku/miku.1024/texture_00.png"
				]
			];
		}
		else if(live2d_type == 3){
			var AITextureSrc = [
				[
					message_Path + "model/mashiro/seifuku.1024/L2DMSR_U_00.png",
					message_Path + "model/mashiro/seifuku.1024/L2DMSR_U_01.png",
					message_Path + "model/mashiro/seifuku.1024/L2DMSR_U_02.png"
				],
				[
					message_Path + "model/mashiro/shifuku.1024/L2DMSR_S_00.png",
					message_Path + "model/mashiro/shifuku.1024/L2DMSR_S_01.png",
					message_Path + "model/mashiro/shifuku.1024/L2DMSR_S_02.png",
					message_Path + "model/mashiro/shifuku.1024/L2DMSR_S_03.png"
				],
				[
					message_Path + "model/mashiro/ryoufuku.1024/L2DMSR_R_00.png",
					message_Path + "model/mashiro/ryoufuku.1024/L2DMSR_R_01.png",
					message_Path + "model/mashiro/ryoufuku.1024/L2DMSR_R_02.png"
				],
			]
		}

		AITextureSrc = AITextureSrc[modelType];
		var images = [];
		var imgLength = AITextureSrc.length;

		var loadingNum = 0;
		for(var i=0;i<imgLength;i++){
			images[i] = new Image();
			images[i].src = AITextureSrc[i];
			images[i].onload = function(){
				loadingNum++;

				if(loadingNum===imgLength){
					var live2dhidden = localStorage.getItem("live2dhidden");
					if(live2dhidden==="0"){
						setTimeout(function(){
							$('#open_live2d').fadeIn(200);
						},1300);
					}else{
						setTimeout(function(){
							$('#live2dModule').fadeIn(200);
						},1300);
					}

					localStorage.setItem("live2dMentor",live2d_type);
					setTimeout(function(){
						if(live2d_type == 0){
							loadlive2d("live2d",  message_Path+"/model/histoire/model.json");
						}else if(live2d_type == 1){
							loadlive2d("live2d",  message_Path+"/model/rem/rem.json");
						}else if(live2d_type == 2){
							loadlive2d("live2d",  message_Path+"/model/miku/miku.model.json");
						}
						else if(live2d_type == 3){
							loadlive2d("live2d",  message_Path+"/model/mashiro/ryoufuku.model.json");
						}
					},1000);
					images = null;
				}
			}
		}
	}
}
