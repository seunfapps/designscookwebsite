
var _omSliderAutoslide = (typeof _omSliderAutoslide === "undefined")? true : _omSliderAutoslide;
var _omSliderSlideTime = (typeof _omSliderSlideTime === "undefined")? 5 : _omSliderSlideTime;

var om_slider_width = 1000;
var om_slider_height = 370;

var om_slider_loading = 0;

jQuery(document).ready(function() {
	
	jQuery('.header-search input[type="text"]').focus(function() {
		jQuery(this).parent().find('span').css('display', 'none');
	}).blur(function() {
		var thisel = jQuery(this);
		if(thisel.val() != "")return false;
		thisel.parent().find('span').css('display', 'block');
	});
	
	jQuery('a[href="#basket-toggle"]').click(function() {
		jQuery(this).parent().toggleClass('active');
		jQuery('.basket-content').animate({
			height: "toggle"
		}, 300, function() {
			jQuery('.basket-new').css('display', 'none');
		});
		return false;
	});

	jQuery(".accordion .accordion-tab > a").click(function () {
		var thisel = jQuery(this).parent();
		if(!thisel.hasClass("active")){
			thisel.siblings(".accordion-tab.active").children(".accordion-block").animate({
				opacity: 'toggle',
				padding: 'toggle',
				height: 'toggle'
			}, 200, function () {
				jQuery(this).parent().removeClass("active");
			});
		}
		thisel.children(".accordion-block").animate({
			opacity: 'toggle',
			padding: 'toggle',
			height: 'toggle'
		}, 200, function () {
			jQuery(this).parent().toggleClass("active");
		});
		return false;
	});

	jQuery("#main-menu ul").append('<li class="responsive-menu-link"><a href="#dat-menu"><i class="fa fa-bars"></i>Show Menu</a></li>');

	jQuery(".omnomnom-slider").addClass("om-preloading");
	jQuery(".omnomnom-slider img").one('load', function() {
		var thissize = jQuery(".omnomnom-slider img").size();
		om_slider_loading = om_slider_loading+1;
		if(om_slider_loading == thissize){

			jQuery(".omnomnom-slider").removeClass("om-preloading");
			jQuery(".omnomnom-slider").each(function () {
				var _thisel = jQuery(this),
					_innerel = _thisel.find(".omnomnom-slider-inner");

				omMakeResponsive(_thisel, _innerel);

				_thisel.find(".om-layer").each(function () {
					omMakeResponsive(_thisel, jQuery(this));
				});
			});

			if(_omSliderAutoslide){
				jQuery(".dial").knob();
				jQuery(".omnomnom-slider-inner").bind("mouseenter", function () {
					if(jQuery(this).hasClass("inprocess")){ return false; }
					clearTimeout(_omSlideAnimationSeq);
					_omSliderTempMouse = false;
				}).bind("mouseleave", function () {
					if(jQuery(this).hasClass("inprocess")){ return false; }
					clearTimeout(_omSlideAnimationSeq);
					_omSliderTempMouse = true;
					omAnimateDonut();
				});
			}else{
				jQuery(".dial").hide();
			}

		}
	}).each(function() {
		if(this.complete) jQuery(this).load();
	});

	jQuery(".om-slider-pager > a").click(function () {
		var _thisel = jQuery(this),
			_curindex = _thisel.index();
		
		if(_thisel.parent().siblings(".omnomnom-slider-inner").hasClass("inprocess")){return false;}
		_omSliderAutoslide = false;
		omHideSlide(jQuery(".om-slide.isactive"), _thisel.parent().siblings(".omnomnom-slider-inner").children(".om-slide").eq(_curindex));
		_thisel.addClass("active").siblings(".active").removeClass("active");
		return false;
	});

	jQuery('.dat-scrollnimate').each( function(i){
		var bottom_of_object = jQuery(this).offset().top;
		var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

		if( bottom_of_window <= bottom_of_object ){
			jQuery(this).children("div, a, blockquote").css("visibility", "hidden");
		}else{
			scrollNimate(jQuery(this));
			jQuery(this).removeClass("dat-scrollnimate");
		}
	});

	jQuery(window).scroll( function(){
		jQuery('.dat-scrollnimate').each( function(i){
			var bottom_of_object = jQuery(this).offset().top;
			var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

			if( bottom_of_window > bottom_of_object ){
				scrollNimate(jQuery(this));
				jQuery(this).removeClass("dat-scrollnimate");
			}
		});
	});


	jQuery(".dat-carousel-pager > a").click(function () {
		var _element = jQuery(this),
			goindex = _element.index(),
			animationIn = _element.parent().parent().data("animatein"),
			animationOut = _element.parent().parent().data("animateout");

		_element.addClass("active").siblings(".active").removeClass("active");
		_element.parent().siblings().eq(goindex).removeClass(animationOut).addClass("active animated "+animationIn).siblings(".active").removeClass("active "+animationIn).addClass("animated "+animationOut);
		return false;
	});

	jQuery(".woocommerce-tabs > ul.tabs li").click(function () {
		var thisel = jQuery(this);
		// alert(thisel.index());
		thisel.parent().children().eq(thisel.index()).addClass("active").siblings().removeClass("active").parent().siblings(".panel").eq(thisel.index()).show().siblings(".panel").hide();
		return false;
	});

});

function scrollNimate(_element) {

	var datanime = _element.data("animation"),
		uptimeout = 0;
	
	_element.children("div, a, blockquote").each(function () {
		var coolem = jQuery(this);
		coolem.css("visibility", "hidden");
		setTimeout(function () {
			coolem.css("visibility", "visible").addClass("animated "+datanime);
		}, uptimeout);
		uptimeout = uptimeout+200;
	});
	_element.removeClass("dat-scrollnimate");
	return false;

}

var _omSliderTempMouse = true;
var _omSliderTempTime = 0;
var _omSlideAnimationSeq;

function omAnimateDonut() {
	if(!_omSliderTempMouse){ return false; }
	if(!_omSliderAutoslide){ jQuery('.dial').val(0).trigger('change'); return false; }
	_omSliderTempTime+=1;
	jQuery('.dial').val(_omSliderTempTime).trigger('change');
	if(_omSliderTempTime >= 100){ _omSliderTempTime = 0; jQuery('.dial').val(_omSliderTempTime).trigger('change'); omSlideNext(jQuery(".omnomnom-slider")); return false; }
	
	var _omSlideAnimationSeq = setTimeout(function () {
		omAnimateDonut();
	}, _omSliderSlideTime*1000/100);
	return true;
}

function omSlideNext(slider_el) {
	var currentid = slider_el.children(".omnomnom-slider-inner").children(".om-slide.isactive"),
		nextid = currentid.next();
	if(nextid.length){
		omHideSlide(currentid, nextid);
		jQuery(".omnomnom-slider .om-slider-pager > a").eq(nextid.index()).addClass("active").siblings(".active").removeClass("active");
	}else{
		omHideSlide(currentid, slider_el.children(".omnomnom-slider-inner").children(".om-slide").eq(0));
		jQuery(".omnomnom-slider .om-slider-pager > a").eq(0).addClass("active").siblings(".active").removeClass("active");
	}
}

// Make layers responsive
function omMakeResponsive(_thisel, _innerel) {
	if(!_innerel.hasClass("om-is-responsive")){
		jQuery(".omnomnom-slider").addClass("forceinitial").children(".omnomnom-slider-inner").css("width", om_slider_width).css("height", om_slider_height);
		jQuery(".om-slide").flowtype();
		_innerel.css("padding-bottom", (100/parseInt(_innerel.width())*parseInt(_innerel.height()))+"%").css("width", (100/parseInt(om_slider_width)*parseInt(_innerel.width()))+"%").css("left", (100/parseInt(om_slider_width)*parseInt(_innerel.css("left")))+"%").css("top", (100/parseInt(om_slider_height)*parseInt(_innerel.css("top")))+"%").css("height", "auto");
		jQuery(".omnomnom-slider").removeClass("forceinitial").children(".omnomnom-slider-inner").css("width", "100%").css("height", "100%");
		jQuery(".om-slide").flowtype();

		setTimeout(function () {
			if(typeof _innerel.data("href") != "undefined"){
				_innerel.addClass("om-is-href").bind("click", function () {
					window.location = _innerel.data("href");
					return false;
				})
			}
			omLayersSlide(_innerel);
			_innerel.css("height", "auto").addClass("om-is-responsive");
		}, 100);
	}
}

function omHideSlide(slide_el, next_el) {
	if(slide_el.hasClass("isactive")){

		slide_el.children(".om-layer").each(function() {
			var _innerel = jQuery(this),
				leanimation = (typeof _innerel.data("animation-in") === "undefined")?"fadeIn":_innerel.data("animation-in"),
				leanimationout = (typeof _innerel.data("animation-out") === "undefined")?"fadeOut":_innerel.data("animation-out"),
				ledelay = (typeof _innerel.data("delayout") === "undefined")?0:_innerel.data("delayout");

			slide_el.parent().addClass("inprocess");
			_innerel.removeClass(leanimation);
			setTimeout(function () {
				_innerel.addClass('animated '+leanimationout).css("opacity", "1");
				if(_innerel.index() == slide_el.children(".om-layer").size()-1){
					_innerel.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
						slide_el.removeClass("isactive");
						setTimeout(function () {
							slide_el.parent().removeClass("inprocess");
							if(typeof next_el != "undefined"){
								omShowSlide(next_el);
							}
						}, 100);
					});
				}
			}, ledelay);
		});

	}
}

function omShowSlide(slide_el) {
	if(!slide_el.hasClass("isactive")){

		slide_el.addClass("isactive");
		slide_el.children(".om-layer").each(function() {
			omLayersSlide(jQuery(this))
		});

	}
}

function omLayersSlide(_innerel) {
	var leanimation = (typeof _innerel.data("animation-in") === "undefined")?"fadeIn":_innerel.data("animation-in"),
		leanimationout = (typeof _innerel.data("animation-out") === "undefined")?"fadeOut":_innerel.data("animation-out"),
		ledelay = (typeof _innerel.data("delay") === "undefined")?0:_innerel.data("delay");

	jQuery(".omnomnom-slider-inner").addClass("inprocess");
	if(_innerel.hasClass("om-layer") && _innerel.parent().hasClass("isactive")){
		_innerel.removeClass(leanimationout).css("padding-bottom", "0px").css("opacity", "0");
		setTimeout(function () {
			_innerel.addClass('animated '+leanimation).css("opacity", "1");
			if(_innerel.index() == _innerel.parent().children(".om-layer").size()-1){
				_innerel.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
					setTimeout(function () {
						omAnimateDonut();
						jQuery(".omnomnom-slider-inner").removeClass("inprocess");
					}, 100);
				});
			}
		}, ledelay);
	}
}



