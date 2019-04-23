
(function($){
	$.snowfall = function(element, options){
		var	defaults = {
			image      : 'img',
			flakeCount : 100,
			flakeIndex: 100,
			minSize : '30px',
			maxSize : '61px',
			minSpeed : 2,
			maxSpeed : 3,
			shadow : false
		},
		options = $.extend(defaults, options),
		random = function random(min, max){
			return Math.round(min + Math.random()*(max-min));
		};

		$(element).data("snowfall", this);

		function Flake(_x, _y, _size, _speed, _id){
			this.id = _id;
			this.x  = _x;
			this.y  = _y;
			this.size = _size;
			this.speed = _speed;
			this.step = 0,
			this.stepSize = random(1,10) / 100;
			var snow_array = ['1','2','3','4'];

			var rand = Math.floor( Math.random() * 100) ;
			num = 0;
			if (rand < 50) num = 1;
			if (rand < 1) num = 2;
			var rnd_move = Math.floor((Math.random() * 5) + 1);
			var rnd_size = Math.floor((Math.random() * 32) + 1);
			var flakeMarkup = '<p class="single_particle"><img src="images/particles/0'+ snow_array[num] +'.png" id="flake-' + this.id +'" style="width:' + this.size + 'px; position: fixed; top: ' + this.y + 'px; left:' + this.x+'px;animation: petal'+rnd_move+' 5s cubic-bezier(0.645, 0.045, 0.355, 1) infinite; font-size: 0px; z-index: ' + options.flakeIndex+';"  class="snowfall-flakes"></p>';

			if($(element).get(0).tagName === $(document).get(0).tagName){
				$('body').append(flakeMarkup);
				element = $('body');
			}else{
				$(element).append(flakeMarkup);
			}

			this.element = document.getElementById('flake-' + this.id);

			this.update = function(){
				elHeight = $(element).height(); // For dynamic contents!
				this.y += this.speed;

				if(this.y > (elHeight) - (this.size  + 6)){
					this.reset();
				}

				// this.element.style.top = this.y + 'px';
				this.element.style.top =($(window).height()-120)- this.y + 'px';
				// this.element.style.left = this.x + 'px';u

				this.step += this.stepSize;
				this.x += Math.cos(this.step);

				if(this.x > (elWidth) - widthOffset || this.x < widthOffset){
					this.reset();
				}
			}
			this.reset = function(){
				this.y = 0;
				this.x = random(widthOffset, elWidth - widthOffset);
				this.stepSize = random(1,10) / 100;
				this.size = random((options.minSize * 100), (options.maxSize * 100)) / 100;
				this.speed = random(options.minSpeed, options.maxSpeed);
			}
		}

		var flakes = [],
		flakeId = 0,
		i = 0,
		elHeight = $(element).height(),
		elWidth = $(element).width(),
		widthOffset = 0,
		snowTimeout = 0;
		if($(element).get(0).tagName === $(document).get(0).tagName){
			widthOffset = 25;
		}

		$(window).bind("resize", function(){
			elHeight = $(element).height();
			elWidth = $(element).width();
		});


		for(i = 0; i < options.flakeCount; i+=1){
			flakeId = flakes.length;
			flakes.push(new Flake(random(widthOffset,elWidth - widthOffset), random(0, elHeight), random((options.minSize * 100), (options.maxSize * 100)) / 100, random(options.minSpeed, options.maxSpeed), flakeId));
		}

		if(options.round){
			$('.snowfall-flakes').css({'-moz-border-radius' : options.maxSize, '-webkit-border-radius' : options.maxSize, 'border-radius' : options.maxSize});
		}

		if(options.shadow){
			$('.snowfall-flakes').css({'-moz-box-shadow' : '1px 1px 1px #555', '-webkit-box-shadow' : '1px 1px 1px #555', 'box-shadow' : '1px 1px 1px #555'});
		}

		function snow(){
			for( i = 0; i < flakes.length; i += 1){
				flakes[i].update();
			}

			snowTimeout = setTimeout(function(){snow()}, 30);
		}

		snow();

		this.clear = function(){
			$(element).children('.snowfall-flakes').remove();
			flakes = [];
			clearTimeout(snowTimeout);
		};
	};

	$.fn.snowfall = function(options){
		if(typeof(options) == "object" || options == undefined){
			return this.each(function(i){
				(new $.snowfall(this, options));
			});
		}else if (typeof(options) == "string") {
			return this.each(function(i){
				var snow = $(this).data('snowfall');
				if(snow){
					snow.clear();
				}
			});
		}
	};
})(jQuery);

//snowfall
var win_w = $(window).width();
		if(win_w > 765){
			setTimeout(function(){
				$('#mainContent').snowfall({
				image      : 'img',
				flakeCount : 18,
				flakeIndex : 1,
				maxSpeed   : 8,
				minSpeed   : 6,
				maxSize    : 30,
				minSize    : 30,
				round      : true,
				shadow     : false
			 });
			},700);
	}
