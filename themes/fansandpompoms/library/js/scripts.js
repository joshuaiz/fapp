/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

/*!------------------------------------------------------
 * jQuery nearest v1.0.3
 * http://github.com/jjenzz/jQuery.nearest
 * ------------------------------------------------------
 * Copyright (c) 2012 J. Smith (@jjenzz)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
(function($, d) {
  $.fn.nearest = function(selector) {
    var self, nearest, el, s, p,
        hasQsa = d.querySelectorAll;

    function update(el) {
      nearest = nearest ? nearest.add(el) : $(el);
    }

    this.each(function() {
      self = this;

      $.each(selector.split(','), function() {
        s = $.trim(this);

        if (!s.indexOf('#')) {
          // selector starts with an ID
          update((hasQsa ? d.querySelectorAll(s) : $(s)));
        } else {
          // is a class or tag selector
          // so need to traverse
          p = self.parentNode;
          while (p) {
            el = hasQsa ? p.querySelectorAll(s) : $(p).find(s);
            if (el.length) {
              update(el);
              break;
            }
            p = p.parentNode;
          }
        }
      });

    });

    return nearest || $();
  };
}(jQuery, document));


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();


// Show/hide captions on carousel
  $(".soliloquy-item").hover(function () {
       var caption = $(this).find(".soliloquy-caption").first();
        caption.toggle();
       var active = caption.nearest('.soliloquy-link');
       caption.appendTo(active);
    });


$('.sharing-post .sola_nl_sign_up_box').appendTo('.sharing-post .mashsb-toggle-container');

$('.article-footer .sola_nl_sign_up_box').appendTo('.article-footer .mashsb-toggle-container');

if($('.byline .comments-link').text().length == 0 ) {
  $('.comments-link').text('0 Comments');

}

$('.sub-menu').hover(function() {
  $(this).closest('.menu-item-has-children').css('background', '#eeeeee');
}, function() {
  $(this).closest('.menu-item-has-children').css('background', 'none');
});

// $('.feature-image').load(function() {
//   $(this).closest('.home-feature').css('height', $(this).height());
// });

var img = $('.feature-image img'); 
img.load(function() {
    var width = img.width();
    var height = img.height();
    $('.home-feature, .home-feature .post-title').css('height', height);
    $('.home-feature, .home-feature .post-title').css('overflow', 'hidden');
});

$('.feature-tagline').appendTo('.feature-link .post-title');



}); /* end of as page load scripts */


// jQuery(document).ready(function($){
//   $(window).scroll(function(){
//   var sticky = $('header'),
//       scroll = $(window).scrollTop();

//   if (scroll >= 100) sticky.addClass('header-scroll');
//   else sticky.removeClass('header-scroll');
// });
// });

jQuery(document).ready(function($){
  var offset = $( ".sticky-header" ).offset();
var sticky = document.getElementById("sticky-header")

$(window).scroll(function() {

    if ( $('body').scrollTop() > offset.top){
        $('.sticky-header').addClass('header-scroll');
    } else {
         $('.sticky-header').removeClass('header-scroll');
    } 

});
});
