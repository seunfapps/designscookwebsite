
var dat_demo_global = Array();
if(!dat_img_dir){var dat_img_dir = "images/"}

jQuery(document).ready(function () {
	jQuery('body').append('<div id="dat-demo-settings"><strong>Style Selector</strong><span class="dat-demo-button"><span><i class="fa fa-gear"></i>Change Style</span></span><div class="dat-demo-inner"></div></div>');


	jQuery("#dat-demo-settings .dat-demo-button").click(function () {
		jQuery("#dat-demo-settings").toggleClass("active");
		return false;
	});

	function __dat_demo_css(datDemoID, datDemoValue) {
		for (var i = dat_demo_global[datDemoID].length - 1; i >= 0; i--) {
			if(dat_demo_global[datDemoID][i][3]){
				jQuery(dat_demo_global[datDemoID][i][0]).css(dat_demo_global[datDemoID][i][1], dat_demo_global[datDemoID][i][2] + datDemoValue);
			}else{
				jQuery("head").append("<style>"+dat_demo_global[datDemoID][i][0]+" { "+dat_demo_global[datDemoID][i][1]+": "+(dat_demo_global[datDemoID][i][2] + datDemoValue)+"; }</style>");
			}
			// console.log("#"+datDemoID+ " : "+dat_demo_global[datDemoID][i][0]+ ", "+dat_demo_global[datDemoID][i][2] + dat_demo_global[datDemoID][i][1]);
		};
		return true;
	}

	function __dat_demo(datDemoID, datDemoTitle, datDemoDescription, datDemoType, datDemoItems, datDemoCSS) {
		if(jQuery("#dat-demo-settings")){

			if(datDemoType == "select"){
				var build_list = "";
				for (var i = datDemoItems.length - 1; i >= 0; i--) {
					build_list = '<option value="'+datDemoItems[i][0]+'">'+datDemoItems[i][1]+'</option>' + build_list;
				};
				dat_demo_global[datDemoID] = datDemoCSS;
				jQuery('.dat-demo-inner').append('<div class="dat-demo-row"><strong>'+datDemoTitle+'</strong><i>'+datDemoDescription+'</i><div><label for="'+datDemoID+'"><select name="'+datDemoID+'" id="'+datDemoID+'">'+build_list+'</select></label></div></div>');
				jQuery('#'+datDemoID).bind("change", function () {
					__dat_demo_css(datDemoID, jQuery(this).val());
					return false;
				});
			}else

			if(datDemoType == "bulls"){
				var build_list = "";
				for (var i = datDemoItems.length - 1; i >= 0; i--) {
					build_list = '<a href="#" class="dat-demo-bull" rel="'+datDemoItems[i][1]+'" style="'+datDemoItems[i][0]+': '+datDemoItems[i][1]+';"></a>' + build_list;
				};
				dat_demo_global[datDemoID] = datDemoCSS;
				jQuery('.dat-demo-inner').append('<div class="dat-demo-row"><strong>'+datDemoTitle+'</strong><i>'+datDemoDescription+'</i><div class="dat-demo-bulls" id="'+datDemoID+'">'+build_list+'</div></div>');
				jQuery('#'+datDemoID+' .dat-demo-bull').bind("click", function () {
					__dat_demo_css(datDemoID, jQuery(this).attr("rel"));
					return false;
				});
			}

		}else{
			return false;
		}
		return true;
	}

	__dat_demo("datmainfont", "Main Font Family", "These are just a few fonts, in total there are 630+", "select",
		Array(["Ropa Sans", "Ropa Sans (Default)"], ["Fauna One", "Fauna One"], ["Rambla", "Rambla"], ["Oleo Script", "Oleo Script"], ["Rokkitt", "Rokkitt"]),
		Array(["#main-menu, #main-menu > ul > li a, #sidebar > .widget > h3, h1, h2, h3, h4, h5, h6, .content-wrapper, #footer, .upcomming-widget > span, .upcomming-widget > a", "font-family", "", false]));

	__dat_demo("datmainfontsec", "Secondary Font Family", "", "select",
		Array(["Fauna One", "Fauna One (Default)"], ["Ropa Sans", "Ropa Sans"], ["Rambla", "Rambla"], ["Oleo Script", "Oleo Script"], ["Rokkitt", "Rokkitt"]),
		Array(["#content .block-title h2, #content .block-title span", "font-family", "", false]));

	__dat_demo("datcolor", "Predefined Color Scheme", "These are just a few color presets, in reality there are unlimited color possibilities", "bulls",
		Array(["background-color", "#5d4d43"], ["background-color", "#235175"], ["background-color", "#2F7719"], ["background-color", "#911C1C"], ["background-color", "#303030"], ["background-color", "#000000"]),
		Array([".s-big-button, .s-big-button:hover, .tag-cloud a, .tag-cloud a:hover, #content .block-title h2:before, #content .block-title h2:after, .comment-reply-link:hover, .s-border-button:hover", "background-color", "", false],
			["body, a, .comment-button, #content h2 a, #content h3 a, .comment-reply-link, .s-border-button", "color", "", false],
			[".comment-reply-link, .s-border-button", "box-shadow", "inset 0px 0px 0px 2px ", false]));

	__dat_demo("datcolors", "Main Menu Color", "", "bulls",
		Array(["background-color", "#c70609"], ["background-color", "#235175"], ["background-color", "#2F7719"], ["background-color", "#5d4d43"], ["background-color", "#303030"], ["background-color", "#000000"]),
		Array(["#main-menu > ul > li ul.sub-menu, #main-menu > ul > li:hover", "background-color", "", false]));

	__dat_demo("dattexture", "Background Textures", "You can upload custom one", "bulls",
		Array(["background-image", "url("+dat_img_dir+"background-1.jpg)"], ["background-image", "url("+dat_img_dir+"background-2.jpg)"], ["background-image", "url("+dat_img_dir+"background-3.jpg)"], ["background-image", "url("+dat_img_dir+"background-4.jpg)"]),
		Array(["#dat-surround-inner", "background-image", "", true]));



	// Webfont import

	WebFontConfig = {
		google: { families: [ 'Fauna+One::latin', 'Rambla:400,700:latin', 'Ropa+Sans::latin', 'Rokkitt:400,700:latin', 'Oleo+Script:400,700:latin' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
			'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();

});

