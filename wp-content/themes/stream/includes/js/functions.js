jQuery(function($){

var FUNCTION_THEME = window.FUNCTION_THEME || {};

/* ==================================================
   Filter Team
================================================== */

FUNCTION_THEME.people = function (){
if($('#team-people').length > 0){      
    var $container = $('#team-people');

    $container.imagesLoaded(function() {
        $container.isotope({
          animationEngine : 'best-available',
          itemSelector : '.single-people',
          layoutMode: 'sloppyMasonry'
        });
    });


    // filter items when filter link is clicked
    var $optionSets = $('#team-filter .option-set'),
        $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options );
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }

        return false;
    });
}
};

/* ==================================================
   Filter Portfolio
================================================== */

FUNCTION_THEME.portfolio = function (){
if($('#portfolio-projects').length > 0){       
    var $container = $('#portfolio-projects');

    $container.imagesLoaded(function() {
        $container.isotope({
          // options
          animationEngine: 'best-available',
		  layoutMode: 'sloppyMasonry',
          itemSelector : '.item-project'
        });
    });
	
	$(window).smartresize(function() {
		$('#portfolio-projects').isotope('reLayout');
	});


    // filter items when filter link is clicked
    var $optionSets = $('#portfolio-filter .option-set'),
        $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');

        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options );
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }

        return false;
    });
}
};


/* ==================================================
   Masonry Blog
================================================== */

FUNCTION_THEME.masonryBlog = function (){
if($('.masonry-blog').length > 0){ 

	var $container = $('.masonry-area');

   
    $container.isotope({
      // options
      animationEngine: 'best-available',
	  layoutMode: 'sloppyMasonry',
      itemSelector : '.item-blog'
    });
    
	
	$(window).smartresize(function() {
		$container.isotope('reLayout');
	});

}
};

/* ==================================================
   Side Menu 
================================================== */

FUNCTION_THEME.sideMenu = function(){
if($('section.primary-side-menu').length > 0){
var current_scroll;
	"use strict";

	$('li.side_menu_button_wrapper a.side_menu_button_link,  a.close_side_menu').click(function(e){
		e.preventDefault();
		if(!$('li.side_menu_button_wrapper a.side_menu_button_link').hasClass('opened')){
			$('.primary-side-menu').css({'visibility':'visible'});
			$(this).addClass('opened');
			$('body').addClass('right_side_menu_opened');
			current_scroll = $(window).scrollTop();
			
			$(window).scroll(function() {
				if(Math.abs($scroll - current_scroll) > 400){
					$('body').removeClass('right_side_menu_opened');
					$('li.side_menu_button_wrapper a').removeClass('opened');
					var hide_side_menu = setTimeout(function(){
						$('.primary-side-menu').css({'visibility':'hidden'});
						clearTimeout(hide_side_menu);
					},400);
				}
			});
		}else{
			$('li.side_menu_button_wrapper a.side_menu_button_link').removeClass('opened');
			$('body').removeClass('right_side_menu_opened');
			var hide_side_menu = setTimeout(function(){
				$('.primary-side-menu').css({'visibility':'hidden'});
				clearTimeout(hide_side_menu);
			},400);
		}
	});
}
};

/* ==================================================
   DropDown 
================================================== */

FUNCTION_THEME.dropDown = function(){
	$('.dropmenu').on('click', function(e){
		$(this).toggleClass('open');
		
		$('.dropmenu-active').stop().slideToggle(350, 'easeOutExpo');
		
		e.preventDefault();
	});
	
	// Dropdown
	$('.dropmenu-active a').on('click', function(e){
		var dropdown = $(this).parents('.dropdown');
		var selected = dropdown.find('.dropmenu .selected');
		var newSelect = $(this).html();
		
		$('.dropmenu').removeClass('open');
		$('.dropmenu-active').slideUp(350, 'easeOutExpo');
		
		selected.html(newSelect);
		
		e.preventDefault();
	});

	// Listed Portfolio
	$('.portfolio-right a').on('click', function(e){
		var portfolio_click = $('.portfolio-left');
		var portfolio_selected = portfolio_click.find('.selected');
		var portfolio_newSelect = $(this).html();
		
		portfolio_selected.html(portfolio_newSelect);
		
		e.preventDefault();
	});
	
	// Listed Knowledgebase
	$('.knowledgebase-right a').on('click', function(e){
		var knowledgebase_click = $('.knowledgebase-left');
		var knowledgebase_selected = knowledgebase_click.find('.selected');
		var knowledgebase_newSelect = $(this).html();
		
		knowledgebase_selected.html(knowledgebase_newSelect);
		
		e.preventDefault();
	});

	// Listed Team
	$('.team-right a').on('click', function(e){
		var team_click = $('.team-left');
		var team_selected = team_click.find('.selected');
		var team_newSelect = $(this).html();
		
		team_selected.html(team_newSelect);
		
		e.preventDefault();
	});
};

/* ==================================================
   Chart Progress 
================================================== */

FUNCTION_THEME.circularGraph = function(){
	var chart = $(".chart");
	
	$(chart).each(function() {
		var currentChart = $(this),
			currentSize = currentChart.attr('data-size'),
			currentLine = currentChart.attr('data-line'),
			currentBgColor = currentChart.attr('data-bgcolor'),
			currentTrackColor = currentChart.attr('data-trackcolor');
		currentChart.easyPieChart({
			animate: 2000,
			barColor: currentBgColor,
			trackColor: currentTrackColor,
			lineWidth: currentLine,
			size: currentSize,
			lineCap: 'butt',
			scaleColor: false,
			onStep: function(value) {
          		this.$el.find('.percentage').text(~~value);
        	}
		});
	});

};


/* ==================================================
   Search Overlay 
================================================== */

FUNCTION_THEME.searchOverlay = function(){
if($('div.search-overlay-control').length > 0){
	var 	searchBttn = document.querySelector( 'a.search-overlay' ),
		overlay = document.querySelector( 'div.search-overlay-control' ),
		closeBttn = overlay.querySelector( 'span.overlay-close-btn' );
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };

	function toggleOverlay() {
		if( classie.has( overlay, 'overlay-area-open' ) ) {
			classie.remove( overlay, 'overlay-area-open' );
			classie.add( overlay, 'overlay-area-close' );
			var onEndTransitionFn = function( ev ) {
				if( support.transitions ) {
					if( ev.propertyName !== 'visibility' ) return;
					this.removeEventListener( transEndEventName, onEndTransitionFn );
				}
				classie.remove( overlay, 'overlay-area-close' );
			};
			if( support.transitions ) {
				overlay.addEventListener( transEndEventName, onEndTransitionFn );
			}
			else {
				onEndTransitionFn();
			}
		}
		else if( !classie.has( overlay, 'overlay-area-close' ) ) {
			classie.add( overlay, 'overlay-area-open' );
		}
	}
	searchBttn.addEventListener( 'click', toggleOverlay );
	closeBttn.addEventListener( 'click', toggleOverlay );
}
};

/* ==================================================
   Login Overlay 
================================================== */

FUNCTION_THEME.loginOverlay = function(){
if($('div.login-overlay-control').length > 0){	
	var 	loginBttn = document.querySelector( 'a.login-overlay' ),
		overlay = document.querySelector( 'div.login-overlay-control' ),
		closeBttn = overlay.querySelector( 'span.overlay-close-btn' );
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };

	function toggleOverlay() {
		if( classie.has( overlay, 'overlay-area-open' ) ) {
			classie.remove( overlay, 'overlay-area-open' );
			classie.add( overlay, 'overlay-area-close' );
			var onEndTransitionFn = function( ev ) {
				if( support.transitions ) {
					if( ev.propertyName !== 'visibility' ) return;
					this.removeEventListener( transEndEventName, onEndTransitionFn );
				}
				classie.remove( overlay, 'overlay-area-close' );
			};
			if( support.transitions ) {
				overlay.addEventListener( transEndEventName, onEndTransitionFn );
			}
			else {
				onEndTransitionFn();
			}
		}
		else if( !classie.has( overlay, 'overlay-area-close' ) ) {
			classie.add( overlay, 'overlay-area-open' );
		}
	}
	loginBttn.addEventListener( 'click', toggleOverlay );
	closeBttn.addEventListener( 'click', toggleOverlay );
}
};

/* ==================================================
   Classie 
================================================== */

FUNCTION_THEME.classie = function(){

"use strict";

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

};


/* ==================================================
   FancyBox
================================================== */

FUNCTION_THEME.fancyBox = function(){
	if($('.fancybox').length > 0 || $('.fancybox-media').length > 0 || $('.fancybox-various').length > 0){
		
		$(".fancybox").fancybox({
			padding:0,
			helpers : {
				title : { type: 'inside' }
			},
			beforeLoad : function() {
                this.title =  (this.title ? '' + this.title : '');
            }
		});
			
		$('.fancybox-media').fancybox({
			padding : 0,
			helpers : {
				media : true
			},
			openEffect  : 'none',
			closeEffect : 'none',
			width       : 800,
    		height      : 450,
    		aspectRatio : true,
    		scrolling   : 'no'
		});
		
		$(".fancybox-various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	}
};

/* ==================================================
   Accordion
================================================== */

FUNCTION_THEME.accordion = function(){
	if($('.accordion').length > 0 ){
		var accordion_trigger = $('.accordion-heading.accordionize');
		
		accordion_trigger.delegate('.accordion-toggle','click', function(e){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				accordion_trigger.find('.active').addClass('inactive');          
				accordion_trigger.find('.active').removeClass('active');   
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			e.preventDefault();
		});
	}
};

/* ==================================================
   Toggle
================================================== */

FUNCTION_THEME.toggle = function(){
	if($('.accordion').length > 0 ){
		var accordion_trigger_toggle = $('.accordion-heading.togglize');
		
		accordion_trigger_toggle.delegate('.accordion-toggle','click', function(e){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$(this).addClass('inactive');
			}
			else{
				$(this).removeClass('inactive');
				$(this).addClass('active');
			}
			e.preventDefault();
		});
	}
};

/* ==================================================
   Tabs
================================================== */

FUNCTION_THEME.tabs = function(){
if($('.tabbable').length > 0 ){
    $('.tabbable').each(function() {
        $(this).find('li').first().addClass('active');
        $(this).find('.tab-pane').first().addClass('active'); 
    });
}
};

/* ==================================================
	Testimonial Sliders
================================================== */

FUNCTION_THEME.testimonial = function(){
if($('.testimonial').length > 0 ){
	$('.testimonial').flexslider({
		animation:"fade",
		easing:"swing",
		controlNav: true, 
		reverse:false,
		smoothHeight:true,
		directionNav: false, 
		controlsContainer: '.ig-testimonials-container',
		animationSpeed: 400
	});
}

if($('#twitter-feed .slides').length > 0 ){
	$('#twitter-feed').flexslider({
		animation:"fade",
		easing:"swing",
		controlNav: false, 
		reverse:false,
		smoothHeight:true,
		directionNav: false, 
		controlsContainer: '#twitter-feed',
		animationSpeed: 400
	});
}
};

/* ==================================================
	Big Twitter Feeds Slider
================================================== */

FUNCTION_THEME.bigTweetSlide = function(){
if($('#twitter-feed .slides').length > 0 ){
	$('#twitter-feed').flexslider({
		animation:"fade",
		easing:"swing",
		controlNav: false, 
		reverse:false,
		smoothHeight:true,
		directionNav: false, 
		controlsContainer: '#twitter-feed',
		animationSpeed: 400
	});
}
};

/* ==================================================
   Tooltip
================================================== */

FUNCTION_THEME.toolTip = function(){ 
    $('a[data-toggle=tooltip]').tooltip();
};

/* ==================================================
	Scroll to Top
================================================== */

FUNCTION_THEME.scrollToTop = function(){
			
			// HIDE #BACK-TOP FIRST
			$("#back-top").hide();
				
			// FADE IN #BACK-TOP
			$(function () {
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$('#back-top').fadeIn();
					} else {
						$('#back-top').fadeOut();
					}
				});
			
			// SCROLL BODY TO 0px ON CLICK
				$('#back-top a').click(function () {
						$('body,html').animate({
							scrollTop: 0
						}, 800);
						return false;
					});
				});
			
};

/* ==================================================
   Responsive Video
================================================== */

FUNCTION_THEME.video = function(){
	$('.videoWrapper, .video-embed').fitVids();
};

/* ==================================================
	Custom Select
================================================== */

FUNCTION_THEME.customSelect = function(){
	if($('.selectpicker').length > 0){
		$('.selectpicker').selectpicker();
	}
};

/* ==================================================
   MediaElements
================================================== */

FUNCTION_THEME.mediaElements = function(){

$('audio, video').each(function(){
    $(this).mediaelementplayer({
    // if the <video width> is not specified, this is the default
    defaultVideoWidth: 480,
    // if the <video height> is not specified, this is the default
    defaultVideoHeight: 270,
    // if set, overrides <video width>
    videoWidth: -1,
    // if set, overrides <video height>
    videoHeight: -1,
    // width of audio player
    audioWidth: 400,
    // height of audio player
    audioHeight: 50,
    // initial volume when the player starts
    startVolume: 0.8,
    // path to Flash and Silverlight plugins
    pluginPath: theme_objects.base + '/includes/js/mediaelement/',
    // name of flash file
    flashName: 'flashmediaelement.swf',
    // name of silverlight file
    silverlightName: 'silverlightmediaelement.xap',
    // useful for <audio> player loops
    loop: false,
    // enables Flash and Silverlight to resize to content size
    enableAutosize: true,
    // the order of controls you want on the control bar (and other plugins below)
    // Hide controls when playing and mouse is not over the video
    alwaysShowControls: false,
    // force iPad's native controls
    iPadUseNativeControls: false,
    // force iPhone's native controls
    iPhoneUseNativeControls: false,
    // force Android's native controls
    AndroidUseNativeControls: false,
    // forces the hour marker (##:00:00)
    alwaysShowHours: false,
    // show framecount in timecode (##:00:00:00)
    showTimecodeFrameCount: false,
    // used when showTimecodeFrameCount is set to true
    framesPerSecond: 25,
    // turns keyboard support on and off for this instance
    enableKeyboard: true,
    // when this player starts, it will pause other players
    pauseOtherPlayers: true,
    // array of keyboard commands
    keyActions: []
    });
});

$('.video-wrap video').each(function(){
    $(this).mediaelementplayer({
    	enableKeyboard: false,
        iPadUseNativeControls: false,
        pauseOtherPlayers: true,
        iPhoneUseNativeControls: false,
        AndroidUseNativeControls: false
    });

    if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
	    $(".video-section-container .mobile-video-image").show();
	    $(".video-section-container .video-wrap").remove()
	}
});

$(".video-section-container .video-wrap").each(function (b) {
	var min_w = 1500;
	var header_height = 0;
	var vid_w_orig = 1280;
	var vid_h_orig = 720;
    
    var f = $(this).closest(".video-section-container").outerWidth();
    var e = $(this).closest(".video-section-container").outerHeight();
    $(this).width(f);
    $(this).height(e);
    var a = f / vid_w_orig;
    var d = (e - header_height) / vid_h_orig;
    var c = a > d ? a : d;
    min_w = 1280 / 720 * (e + 20);
    if (c * vid_w_orig < min_w) {
        c = min_w / vid_w_orig
    }
    $(this).find("video, .mejs-overlay, .mejs-poster").width(Math.ceil(c * vid_w_orig + 2));
    $(this).find("video, .mejs-overlay, .mejs-poster").height(Math.ceil(c * vid_h_orig + 2));
    $(this).scrollLeft(($(this).find("video").width() - f) / 2);
    $(this).find(".mejs-overlay, .mejs-poster").scrollTop(($(this).find("video").height() - (e)) / 2);
    $(this).scrollTop(($(this).find("video").height() - (e)) / 2)
});

};

FUNCTION_THEME.resizeMediaElements = function(){
	var entryAudioBlog = $('.audio-thumb');
	var entryVideoBlog = $('.video-thumb');

	entryAudioBlog.each(function() { 
		$(this).css("width", $('article').width() + "px"); 
	}); 

	entryVideoBlog.each(function() { 
		$(this).css("width", $('article').width() + "px"); 
	}); 
};

/* ==================================================
	Animations Module
================================================== */

FUNCTION_THEME.animationsModule = function(){
	
	function elementViewed(element) {
		if (Modernizr.touch && $(document.documentElement).hasClass('no-animation-effects')) {
			return true;
		}
		var elem = element,
			window_top = $(window).scrollTop(),
			offset = $(elem).offset(),
			top = offset.top;
		if ($(elem).length > 0) {
			if (top + $(elem).height() >= window_top && top <= window_top + $(window).height()) {
				return true;
			} else {
				return false;
			}
		}
	};
	
	function onScrollInterval(){
		var didScroll = false;
		$(window).scroll(function(){
			didScroll = true;
		});
		
		setInterval(function(){
			if (didScroll) {
				didScroll = false;
			}
			
			if($('.chart').length > 0 ){
				$('.chart').each(function() {
					var currentChart = $(this);
					if (elementViewed(currentChart)) {
						FUNCTION_THEME.circularGraph(currentChart);
					}
				});	
			}
			
			if($('.animated-content').length > 0 ){
				$('.animated-content').each(function() {
					var currentObj = $(this);
					var delay = currentObj.data('delay');
					if (elementViewed(currentObj)) {
						currentObj.delay(delay).queue(function(){
							currentObj.addClass('animate');
						});
					}
				});
			}
			
		}, 250);
	};
	
	onScrollInterval();
};

/* ==================================================
   Count Number 
================================================== */

FUNCTION_THEME.count = function(){
	if($('.counter-number').length > 0 ){
		$('.counter-number').appear(function() {
			$('.timer').countTo();
		});
	}

	if($('.progress-bar').length > 0 ){
		$('.progress-bar').appear(function() {
			$('.bar').addClass('ole');
		});
	}
};

/* ==================================================
   Infinite Share 
================================================== */

FUNCTION_THEME.infiniteShare = function(){	
	
	var completed = 0;
	var windowLocation = window.location.href.replace(window.location.hash, '');
	
	if( $('a.facebook-share').length > 0 || $('a.twitter-share').length > 0 || $('a.pinterest-share').length > 0) {
  
	 
		////facebook
		
		//load share count on load  
		$.getJSON("http://graph.facebook.com/?id="+ windowLocation +'&callback=?', function(data) {
			if((data.shares != 0) && (data.shares != undefined) && (data.shares != null)) { 
				$('.facebook-share a span.count, a.facebook-share span.count').html( data.shares );	
			}
			else {
				$('.facebook-share a span.count, a.facebook-share span.count').html( 0 );	
			}
			completed++;
			socialFade();
		});
	 
		function facebookShare(){
			window.open( 'https://www.facebook.com/sharer/sharer.php?u='+windowLocation, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.facebook-share').click(facebookShare);
		
		////twitter
		
		//load tweet count on load 
		$.getJSON('http://urls.api.twitter.com/1/urls/count.json?url='+windowLocation+'&callback=?', function(data) {
			if((data.count != 0) && (data.count != undefined) && (data.count != null)) { 
				$('.twitter-share a span.count, a.twitter-share span.count').html( data.count );
			}
			else {
				$('.twitter-share a span.count, a.twitter-share span.count').html( 0 );
			}
			completed++;
			socialFade();
		});
		
		function twitterShare(){
			if($(".section-title h1").length > 0) {
				var $pageTitle = encodeURIComponent($(".section-title h1").text());
			} else {
				var $pageTitle = encodeURIComponent($(document).find("title").text());
			}
			window.open( 'http://twitter.com/intent/tweet?text='+$pageTitle +' '+windowLocation, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		function wooTwitterShare(){
			window.open( 'http://twitter.com/intent/tweet?text='+$("h1.product_title").text() +' '+windowLocation, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.infinite-share:not(".woo") .twitter-share').click(twitterShare);
		$('.infinite-share.woo .twitter-share').click(wooTwitterShare);
		
		////pinterest
		
		//load pin count on load 
		$.getJSON('http://api.pinterest.com/v1/urls/count.json?url='+windowLocation+'&callback=?', function(data) {
			if((data.count != 0) && (data.count != undefined) && (data.count != null)) { 
				$('.pinterest-share a span.count, a.pinterest-share span.count').html( data.count );
			}
			else {
				$('.pinterest-share a span.count, a.pinterest-share span.count').html( 0 );
			}
			completed++;
			socialFade();
		});
		
		function pinterestShare(){
			var $sharingImg = ($('.single-portfolio').length > 0 && $('div[data-featured-img]').attr('data-featured-img') != 'empty' ) ? $('div[data-featured-img]').attr('data-featured-img') : $('.main-content img').first().attr('src'); 
			
			if($(".section-title h1").length > 0) {
				var $pageTitle = encodeURIComponent($(".section-title h1").text());
			} else {
				var $pageTitle = encodeURIComponent($(document).find("title").text());
			}
			
			window.open( 'http://pinterest.com/pin/create/button/?url='+windowLocation+'&media='+$sharingImg+'&description='+$pageTitle, "pinterestWindow", "height=640,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		function wooPinterestShare(){
			window.open( 'http://pinterest.com/pin/create/button/?url='+windowLocation+'&media='+$('img.attachment-shop_single').first().attr('src')+'&description='+$('h1.product_title').text(), "pinterestWindow", "height=640,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.infinite-share:not(".woo") .pinterest-share').click(pinterestShare);
		$('.infinite-share.woo .pinterest-share').click(wooPinterestShare);
		
		//fadeIn
		$('a.infinite-sharing > span.count').hide().css('width','auto');
		function socialFade(){

			if(completed == $('a.infinite-sharing').length && $('a.infinite-sharing').parent().hasClass('in-sight')) {
				
				$('.infinite-share > .infinite-sharing').animate({'padding':'8px 6px'},350,'easeOutSine');
				
				//sharing loadin
				$('.infinite-share a.infinite-sharing').each(function(i){
					var $that = $(this);
					
					$(this).find('> span').show(350,'easeOutSine',function(){
						$that.find('> span').animate({'opacity':1},800);
					});
					
				});
			}
		}
		
		//social light up
		$('.infinite-share').each(function() {

			$(this).appear(function() {
				
				$(this).addClass('in-sight');
				socialFade();
				
				$(this).find('> *').each(function(i){
					
					var $that = $(this);
					
					setTimeout(function(){ 
						
						$that.delay(i*100).queue(function(){ 
							
							var $that = $(this); $(this).addClass('hovered'); 
							
							setTimeout(function(){ 
								$that.removeClass('hovered');
							},300); 
							
						});
					
					},450);
				});
			
			},{accX: 0, accY: -115});
		
		}); 
		
		
	}

};

/* ==================================================
   Animation Header on Scroll
================================================== */

FUNCTION_THEME.animationHeader = function(){
	//if($('header.sticky-header').length > 0 ){
		$(window).scroll(function(){
	        var $this = $(this),
	            pos   = $this.scrollTop();
				
	        if (pos > 100){
	            $('header.header-menu-overlap').removeClass('header-menu-overlap').addClass('menu-on-rail');
				$('.menu_holder.menu-pre-color-black').removeClass('menu-pre-color-black').addClass('menu-pre-color-black-block');
				$('.menu_holder.menu-pre-color-white').removeClass('menu-pre-color-white').addClass('menu-pre-color-white-block');
	        } else {
	            $('header.menu-on-rail').removeClass('menu-on-rail').addClass('header-menu-overlap');
				$('.menu_holder.menu-pre-color-black-block').removeClass('menu-pre-color-black-block').addClass('menu-pre-color-black');
				$('.menu_holder.menu-pre-color-white-block').removeClass('menu-pre-color-white-block').addClass('menu-pre-color-white');
	        }
			if (pos > 100){
	            $('header.header-menu-overlap-image').removeClass('header-menu-overlap-image').addClass('menu-on-rail');
	        } else {
	            $('header.menu-on-rail').removeClass('menu-on-rail').addClass('header-menu-overlap-image');
	        }
	    });
	//}
};

/* ==================================================
   Change Prev & Next On Blog
================================================== */

FUNCTION_THEME.changeNav = function(){
$('#pagination a.prev').html('<i class="icon-arrow-left72"></i>');
$('#pagination a.next').html('<i class="icon-uniE6F8"></i>');
};

/* ==================================================
   Progress Bar
================================================== */

FUNCTION_THEME.progressBar = function(){	
	$('.progress-bar').each(function(i){
		
		$(this).appear(function(){
			
			var percent = $(this).find('span').attr('data-width');
			var $endNum = parseInt($(this).find('span strong i').text());
			var $that = $(this);
			
			$(this).find('span').animate({
				'width' : percent + '%'
			},1600, 'easeOutCirc',function(){
			});
			
			$(this).find('span strong').animate({
				'opacity' : 1
			},1350);
			
			
			$(this).find('span strong i').countTo({
				from: 0,
				to: $endNum,
				speed: 1100,
				refreshInterval: 30,
				onComplete: function(){
		
				}
			});	
			
			////100% progress bar 
				if(percent == '100'){
					$that.find('span strong').addClass('full');
				}
	
		});

	});
} 

/* ==================================================
	Init
================================================== */

$(window).load(function(){
	if($('.animation-enabled').length > 0 ){
		FUNCTION_THEME.leavePage();
	}
});

$(document).ready(function(){
	// Animation Transition Preload Page
	if($('.animation-enabled').length > 0 ){
		
		FUNCTION_THEME.reloader();
		
		$('body').jpreLoader({
			splashID: "#jSplash",
			showSplash: true,
			showPercentage: true,
			autoClose: true,
			loaderVPos: "50%"
		}, function() {				
			$("header").delay(150).animate({'opacity' : 1, 'marginTop': 0}, 500, 'easeOutExpo', function(){
				$('#main').delay(150).animate({'opacity' : 1}, 500, 'easeOutExpo', function(){
					$('footer').animate({'opacity' : 1}, 500, 'easeOutExpo');
				});
			});
		});
	}

	// Set Portfolio Thumbnails Size
	if($('.item-project').length > 0 ){
		$(".item-project").imagesLoaded(function() {
	        $(".item-project").each(function () {
		        var e = $(".project-name", this).height(),
		            t = $(".project-name", this).width();
		        $(".project-name .va", this).css("height", e).css("width", t)
		    });
	    });
	}
	
	// Set Team Thumbnails Size
	if($('.single-people').length > 0 ){
		$(".single-people").imagesLoaded(function() {
	        $(".single-people").each(function () {
		        var e = $(".team-name", this).height(),
		            t = $(".team-name", this).width();
		        $(".team-name .va", this).css("height", e).css("width", t)
		    });
	    });
	}
	
	FUNCTION_THEME.sideMenu();
	FUNCTION_THEME.dropDown();
	FUNCTION_THEME.infiniteShare();
	FUNCTION_THEME.animationHeader();
	FUNCTION_THEME.animationsModule();
	FUNCTION_THEME.mediaElements();
	FUNCTION_THEME.resizeMediaElements();
	FUNCTION_THEME.video();
	FUNCTION_THEME.masonryBlog();
	FUNCTION_THEME.people();
	FUNCTION_THEME.portfolio();
	FUNCTION_THEME.accordion();
	FUNCTION_THEME.toggle();
	FUNCTION_THEME.tabs();
	FUNCTION_THEME.testimonial();
	FUNCTION_THEME.bigTweetSlide();
	FUNCTION_THEME.toolTip();
	FUNCTION_THEME.fancyBox();
	FUNCTION_THEME.customSelect();
	FUNCTION_THEME.count();
	FUNCTION_THEME.searchOverlay();
	FUNCTION_THEME.loginOverlay();
	FUNCTION_THEME.classie();
	FUNCTION_THEME.scrollToTop();
	FUNCTION_THEME.progressBar();
	FUNCTION_THEME.changeNav();
});

$('.primary-side-menu').css({'right':'0px'});

$(window).resize(function(){
	FUNCTION_THEME.resizeMediaElements();

	// Resize Portfolio Thumbnails Size
	if($('.item-project').length > 0 ){
	    $(".item-project").each(function () {
	        var e = $(".project-name", this).height(),
	            t = $(".project-name", this).width();
	        $(".project-name .va", this).css("height", e).css("width", t)
	    });
	}
	// Resize Team Thumbnails Size
	if($('.single-people').length > 0 ){
	    $(".single-people").each(function () {
	        var e = $(".team-name", this).height(),
	            t = $(".team-name", this).width();
	        $(".team-name .va", this).css("height", e).css("width", t)
	    });
	}

	// Resize Video Background
	$(".video-section-container .video-wrap").each(function (b) {
		var min_w = 1500;
		var header_height = 0;
		var vid_w_orig = 1280;
		var vid_h_orig = 720;
	    
	    var f = $(this).closest(".video-section-container").outerWidth();
	    var e = $(this).closest(".video-section-container").outerHeight();
	    $(this).width(f);
	    $(this).height(e);
	    var a = f / vid_w_orig;
	    var d = (e - header_height) / vid_h_orig;
	    var c = a > d ? a : d;
	    min_w = 1280 / 720 * (e + 20);
	    if (c * vid_w_orig < min_w) {
	        c = min_w / vid_w_orig
	    }
	    $(this).find("video, .mejs-overlay, .mejs-poster").width(Math.ceil(c * vid_w_orig + 2));
	    $(this).find("video, .mejs-overlay, .mejs-poster").height(Math.ceil(c * vid_h_orig + 2));
	    $(this).scrollLeft(($(this).find("video").width() - f) / 2);
	    $(this).find(".mejs-overlay, .mejs-poster").scrollTop(($(this).find("video").height() - (e)) / 2);
	    $(this).scrollTop(($(this).find("video").height() - (e)) / 2)
	});
});

});