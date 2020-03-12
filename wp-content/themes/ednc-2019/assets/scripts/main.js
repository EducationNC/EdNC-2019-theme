/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
(function($) {

  // Determine trigger for touch/click events
  var clickortap;
  if ($('html').hasClass('touch')) {
    clickortap = 'touchend';
  } else {
    clickortap = 'click';
  }

  jQuery(document).ready(function($){

    $('.tabs').tabslet({
     active :1,
     animation : true
     });

  });

  $(document).ready( function() {
   /* Check width on page load*/
   if ($(window).width() < 990) {
     $('#chapters-inside').addClass('chapters-mobile');
     $('#chapters-inside').removeClass('chapters-full');
   }
   else {
     $('#chapters-inside').addClass('chapters-full');
     $('#chapters-inside').removeClass('chapters-mobile');
   }
 });


  $(window).on('resize', function() {
    if ($(window).width() < 990) {
      $('#chapters-inside').addClass('chapters-mobile');
      $('#chapters-inside').removeClass('chapters-full');
    }
    else {
      $('#chapters-inside').addClass('chapters-full');
      $('#chapters-inside').removeClass('chapters-mobile');
    }
  });



  $('.lwptoc_item').on(clickortap, function() {
    if ($('#chapters-inside').hasClass('chapters-mobile')) {
         console.log ("mobile");
         $('.lwptoc_items').toggle();
         // $('.lwptoc_toggle_label').toggle();
         $('.lwptoc_toggle_label').text("show");
         // var text = $('.lwptoc_toggle_label').text();
         // $('.lwptoc_toggle_label').text(text == "show" ? "show" : "hide");
    }
  });

  $(window).scroll(function(e){
    var $el = $('.chapters-full');
    var isPositionFixed = ($el.css('position') === 'fixed');
    if ($(this).scrollTop() > 950 && !isPositionFixed){
      $el.css({'position': 'fixed', 'top': '10%'});
    }
    if ($(this).scrollTop() < 950 && isPositionFixed){
      $el.css({'position': 'static', 'top': '75%'});
    }

  });


  $('iframe').filter(function(){
    return this.src.match(/youtube\.com/i);
  }).wrap("<div class='videoWrapper'></div>");

  $( document ).ready(function() {
       console.log( "document loaded" );
   });

   $( window ).on( "load", function() {
       console.log( "window loaded" );
   });

  $(".menu-btn a").click(function () {
    $(".overlay").fadeToggle(200);
    $("body").toggleClass('fixedPosition').toggleClass('fixedPositionOff');
    $(this).toggleClass('btn-open').toggleClass('btn-close');
  });

  $('.menu a').on('click', function () {
    $(".overlay").fadeToggle(200);

    $(".menu-btn a").toggleClass('btn-open').toggleClass('btn-close');
  });

  $('#menu-main-nav li').click( function() {
      $(this).find('ul').toggle();
  });

  if ($('.overlay').is(':visible')) {
    console.log ("visible");
    $('body').addClass("fixedPosition");
  } else {
    $('body').removeClass("fixedPosition");
  }


  $('.entry-title').waypoint(function(direction) {
    if (direction === 'down') {
      $('.main-logo-article').addClass('hide');
      $('.header-title').removeClass('hide');
    }
  }, {
    offset: '0%'
  });

  $('.entry-title').waypoint(function(direction) {
    if (direction === 'up') {
      $('.main-logo-article').removeClass('hide');
      $('.header-title').addClass('hide');
    }
  }, {
    offset: '0%'
  });


  $(function() {
    $('#reach0').addClass('active');
  });


  // $('.main').waypoint(function(direction) {
  //   if (direction === 'down') {
  //       $(".secondary-logos").addClass("hide");
  //       $(".spacer").css({"height": "60px"});
  //       $(".main-logo").addClass("active");
  //       $(".top-nav").addClass("active");
  //   }
  // }, {
  //   offset: '15%'
  // });
  //
  // $('.main').waypoint(function(direction) {
  //   if (direction === 'up') {
  //       $(".secondary-logos").removeClass("hide");
  //       $(".spacer").css({"height": "200px"});
  //       $(".top-nav").removeClass("active");
  //       $(".main-logo").removeClass("active");
  //   }
  // }, {
  //   offset: '200px'
  // });


  // var offsetHeight = document.getElementById('top-nav').offsetHeight;
  // console.log (offsetHeight);


  // Hamburger Menu
  $(window).on("scroll", function() {
    if($(window).scrollTop() >= 20) {
        $(".secondary-logos").addClass("hide");
        $(".second-row").addClass("hide");
        $(".spacer").removeClass("height-175");
        $(".spacer").addClass("height-0");
        $(".spacer-article").addClass("height-0");
        $(".spacer-article").removeClass("height-63-article");
        $(".main-logo").addClass("active");
        $("body").addClass("is-scrolled");
        $(".top-nav").addClass("active");
        $(".responsive-menu-pro-button").removeClass("top-15");
        $(".responsive-menu-pro-button").addClass("top-0");
    } else {
        $(".secondary-logos").removeClass("hide");
        $(".second-row").removeClass("hide");
        $(".spacer").addClass("height-175");
        $(".spacer").removeClass("height-0");
        $(".spacer-article").removeClass("height-0");
        $(".spacer-article").addClass("height-63-article");
        $(".top-nav").removeClass("active");
        $(".main-logo").removeClass("active");
        $("body").removeClass("is-scrolled");
        $(".responsive-menu-pro-button").addClass("top-15");
        $(".responsive-menu-pro-button").removeClass("top-0");
    }
  });


  $(".content-block-4:nth-child(4n):not(:nth-last-child(1)").after('<hr class="full">');
  $(".content-block-3:nth-child(3n):not(:nth-last-child(1)").after('<hr class="full">');

  // // Reacb Widget
  // $('.block-content-reach').on('click', function () {
  //   // $('.full-width-reach').css('display', 'block');
  //   // $(".full-width-reach").html('reach1');
  //   return false;
  // });

  // JQuery Version
  console.log($().jquery);

  // $('.slider').slick({
  //   infinite: false,
  //   dots: true,
  //   arrows: true,
  //   adaptiveHeight: true,
  //   speed: 500,
  //   fade: true,
  //   cssEase: 'linear'
  // });


  // $('.block-content-reach').on('click', 'a', function () {
  //
  //     $('.current').not($(this).parents('div').addClass('current')).removeClass('current');
  //     // // fade out all open subcontents
  //     // $('.pbox:visible').hide();
  //     // // fade in new selected subcontent
  //     // var test = $('.pbox[id=' + $(this).attr('data-id') + ']').show();
  //     // $(".slider").slick("refresh");
  // });

  // $('.block-content-reach').click( function () {
  //   var a = document.getElementById("div1");
  //   a.scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
  // });
  //
  // $('.block-content-reach-2').click( function () {
  //   var a = document.getElementById("div2");
  //   a.scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
  // });
  //
  // $('.block-content-reach-3').click( function () {
  //   var a = document.getElementById("div3");
  //   a.scrollIntoView({behavior: "smooth", block: "center", inline: "nearest"});
  // });



  var submitIcon = $('.searchbox-icon');
  var inputBox = $('.searchbox-input');
  var searchBox = $('.searchbox');
  var isOpen = false;
  submitIcon.click(function(){
      if(isOpen === false){
          searchBox.addClass('searchbox-open');
          inputBox.focus();
          isOpen = true;
      } else {
          searchBox.removeClass('searchbox-open');
          inputBox.focusout();
          isOpen = false;
      }
  });

  submitIcon.mouseup(function(){
          return false;
      });
  searchBox.mouseup(function(){
          return false;
      });
  $(document).mouseup(function(){
          if(isOpen === true){
              $('.searchbox-icon').css('display','block');
              submitIcon.click();
          }
  });

  // Global Search
  $('.global-nav__search').click(function(e) {
    e.preventDefault();
    $('body').toggleClass('search-active');
  });

  // Global nav hamburger
  var menuActiveClass = 'menu-active';
  var menuCloseHandler = function(event){
    // if the target is a descendent of container do nothing
    if ($(event.target).is(".global-nav__hamburger, .global-nav__hamburger *, .global-nav-mobile, .global-nav-mobile *")) {
        return;
    }

    // remove event handler from document and hide menu
    $(document).off("click", menuCloseHandler);
    $('body').removeClass(menuActiveClass);
  };

  $('.global-nav__menu').click(function(e) {
    e.preventDefault();
    e.stopPropagation();

    if (!$('body').hasClass(menuActiveClass)) {
      $('body').addClass(menuActiveClass);
      $(document).on("click", menuCloseHandler);
    } else {
      $('body').removeClass(menuActiveClass);
      $(document).off("click", menuCloseHandler);
    }
  });


  // Temporarily remove menus without children from the hamburger
  $('.global-nav__hamburger__nav > li, .global-nav-mobile__main__nav > li').each(function(index) {
    if ($(this).children('.sub-menu').length < 1) {
      $(this).remove();
    }
  });

  // Connect Menu

  var connectMenuActiveClass = 'connect-active';
  var connectCloseHandler = function(event){
    // if the target is a descendent of container do nothing
    if ($(event.target).is(".global-nav__connect-menu, .global-nav__connect-menu *")) {
        return;
    }

    // remove event handler from document and hide menu
    $(document).off("click", connectCloseHandler);
    $('body').removeClass(connectMenuActiveClass);
  };

  $('.global-nav__link--connect').click(function(e) {
    e.preventDefault();
    e.stopPropagation();

    if (!$('body').hasClass(connectMenuActiveClass)) {
      $('body').addClass(connectMenuActiveClass);
      $(document).on("click", connectCloseHandler);
    } else {
      $('body').removeClass(connectMenuActiveClass);
      $(document).off("click", connectCloseHandler);
    }
  });


  // Advanced Search with FacetWP
  
  // hide empty facets
  $(document).on('facetwp-loaded', function() {
      $.each(window.FWP.settings.num_choices, function(key, val) {
          var $parent = $('.facetwp-facet-' + key).closest('.search__filters__facet');
          if (0 === val) {
            $parent.hide();
          } else {
            $parent.show();
          }
      });
  });


  // document.getElementById("searchbox-input").keyup = function() {
  //   buttonUp();
  // };

  // $("body").on("keydown", "searchbox-input", function () {
  //   buttonUp();
  // });


  function buttonUp() {
    var inputVal = $('.searchbox-input').val();
    inputVal = $.trim(inputVal).length;
    console.log (inputVal);
    if( inputVal !== 0){
        $('.searchbox-icon').css('display','none');
    } else {
        $('.searchbox-input').val('');
        $('.searchbox-icon').css('display','block');
    }
  }


  $(".searchbox input").keyup(function(){
      buttonUp();
  });

  $(".searchbox input").keydown(function(event){
    var e = event || window.event;
    if (e.keyCode === 13) {
        var frm = document.getElementsByName('search');
        frm.submit();
        frm.reset();
        $('.searchbox-input').val('');
        return false;
    }
  });

  // document.getElementById('searchbox-input').onkeydown = function(event){
  //   var e = event || window.event;
  //   if (e.keyCode === 13) {
  //       var frm = document.getElementsByName('search');
  //       frm.submit();
  //      	frm.reset();
  //       $('.searchbox-input').val('');
  //       return false;
  //   }
  // };

  // Check for mobile or IE
  var ismobileorIE = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|MSIE|Trident|Edge/i.test(navigator.userAgent);
  var isSafari = /Safari/i.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);


  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.

  var Sage = {
    // All pages
    'common': {
      init: function() {

        // Toggle search button to show search field
        $('#header-search #icon-search').on(clickortap, function() {
          if ($('#header-search .input-sm').hasClass('visible')) {
            $('#header-search form').submit();
          } else {
            $('#header-search .input-sm').addClass('visible').focus();
          }
        });

        // Hide header search field when it loses focus
        $('#header-search .input-sm').on('blur', function() {
          window.setTimeout(function() {
            $('#header-search .input-sm').removeClass('visible');
          }, 200);
        });

        // Submit search form on mobile nav when search icon is clicked
        $('#mobile-nav #icon-search').on(clickortap, function() {
          $('#mobile-nav .mobile-search form').submit();
        });

        // Toggle menu button to x close state on click
        $('#nav-toggle').on(clickortap, function(e) {
          e.preventDefault();
          if ($(this).hasClass('active')) {
            $(this).removeClass('active');
          } else {
            $(this).addClass('active');
          }
        });

        // Expandable mobile nav menu
        $('#mobile-nav .expandable-title, #mobile-nav .widgettitle-in-submenu').on(clickortap, function(e) {
          e.preventDefault();
          if ($(this).hasClass('open')) {
            $(this).removeClass('open');
          } else {
            $(this).addClass('open');
          }
        });

        // Helper function for translation cookies
        function getDomainName(hostName) {
          return hostName.substring(hostName.lastIndexOf(".", hostName.lastIndexOf(".") - 1) + 1);
        }

        // Set up translation on click
        $(document).on(clickortap,'a#gtranslate', function(e) {
          e.preventDefault();
          hostname = window.location.hostname;
          domain = getDomainName(hostname);
          document.cookie = "googtrans=/en/es;path=/;domain=" + domain + ";";
          location.reload();
        });

        // Make sure WordPress embeds have correct permissions
        $('iframe.wp-embedded-content').attr('sandbox', 'allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox');

        // Add special class to default WP embeds
        $('iframe.wp-embedded-content').not('[src*="/flash-cards/"]').closest('.entry-content-asset').addClass('wp-embed');

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        if (window.location.search === '?feedback') {
          if ($('#popmake-21098').length) {         // Dev environment
            $('#popmake-21098').popmake('open');
            $('#popmake-21110').popmake('close');
          }
          if ($('#popmake-26020').length) {         // Prod environment
            $('#popmake-26020').popmake('open');
            $('#popmake-26025').popmake('close');
          }
        }
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // Single posts
    'single': {
      init: function() {
        // Add body class for any posts with full width hero featured images
        if ($('.entry-header').hasClass('hero-image')) {
          if (!ismobileorIE) {
            $('body').addClass('hero-image-full');
          } else {
            $('body').addClass('hero-image');
          }
        }

        // Parallax featured image when hero
        if ($('.entry-header').hasClass('hero-image')) {
          // only do parallax if this is not mobile or IE
          if (!ismobileorIE) {
            var img = $('.entry-header.hero-image .parallax-img');

            // Set up CSS for devices that support parallax
            img.css({'top': '0%', 'position':'absolute'});

            // Do it on init
            parallax(img);

            // Happy JS scroll pattern
            var scrollTimeout;  // global for any pending scrollTimeout
            $(window).scroll(function () {
            	if (scrollTimeout) {
            		// clear the timeout, if one is pending
            		clearTimeout(scrollTimeout);
            		scrollTimeout = null;
            	}
            	scrollTimeout = setTimeout(parallax(img), 10);
            });
          }
        }

        // Wrap any object embed with responsive wrapper (except for map embeds)
        $.expr[':'].childof = function(obj, index, meta, stack){
          return $(obj).parent().is(meta[3]);
        };
        $('object:not(childof(.tableauPlaceholder)').wrap('<div class="object-wrapper"></div>');

        // Add special classes to .entry-content-wrapper divs for Instagram and Twitter embeds (not fixed ratio)
        $('.instagram-media').parent('.entry-content-asset').addClass('instagram');
        $('.twitter-tweet').parent('.entry-content-asset').addClass('twitter');

        // Add special class to .entry-content-wrapper for Slideshare (vertical fixed ratio)
        $('iframe[src*="slideshare.net"]').parent('.entry-content-asset').addClass('slideshare');

        // Add special class to .entry-content-wrapper for SoundCloud (fixed height)
        $('iframe[src*="soundcloud"]').parent('.entry-content-asset').addClass('soundcloud');

        // Make sure iframes for flash-cards embeds scroll and add special class
        if (!ismobileorIE && !isSafari) {
          $('iframe.wp-embedded-content[src*="/flash-cards/"]').attr('scrolling', 'yes');
        }
        $('iframe.wp-embedded-content[src*="/flash-cards/"]').closest('.entry-content-asset').addClass('flash-cards');

        // Wrap tables with Bootstrap responsive table wrapper
        $('.entry-content table').addClass('table table-striped').wrap('<div class="table-responsive"></div>');

        // Add watermark dropcap on pull quotes (left and right)
        $('blockquote p[style*="left"], blockquote p[style*="right"]').each(function() {
          var text = $(this).text();
          $(this).attr('data-before', text.charAt(0));
        });

        // Open Magnific for all image link types inside articles
        $('.entry-content a[href$=".gif"], .entry-content a[href$=".jpg"], .entry-content a[href$=".png"], .entry-content a[href$=".jpeg"]').not('.gallery a').magnificPopup({
          type: 'image',
          midClick: true,
          mainClass: 'mfp-with-zoom',
          zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
              return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
          },
          image: {
            cursor: 'mfp-zoom-out-cur',
            verticalFit: true,
            titleSrc: function(item) {
              return $(item.el).children('img').attr('alt');
            }
          }
        });

        // Gallery lightboxes in articles
        $('.gallery').each(function() { // the containers for all your galleries
          $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            midClick: true,
            mainClass: 'mfp-with-zoom',
            zoom: {
              enabled: true,
              duration: 300,
              easing: 'ease-in-out',
              opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
              }
            },
            image: {
              cursor: 'mfp-zoom-out-cur',
              verticalFit: true,
              titleSrc: function(item) {
                return $(item.el).children('img').attr('alt');
              }
            }
          });
        });

        // Smooth scroll to anchor on same page
        $('a[href*="#"]:not([href="#"]):not(.collapsed)').on(clickortap, function() {
          if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name="' + this.hash.slice(1) +'"]');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });

        // Automatically create TOC of chapters
        $('.hentry a.chapter').each(function() {
          $('#chapters .nav').append('<li><a href="#' + $(this).attr('name') + '">' + $(this).attr('data-name') + '</a></li>');
        }).promise().done(function() {
          if ($('#chapters .nav').is(':empty')) {
            $('#chapters').hide();
          }
        });



        // Chapters Affix
        $(window).on('load', function() {
          $('#chapters .nav').affix({
            offset: {
              top: function() {
                return (this.top = $('#chapters .nav').offset().top);
              },
              bottom: function () {
                return (this.bottom = $('footer.content-info').outerHeight(true) + $('.above-footer').outerHeight(true) + 100);
              }
            }
          });
        });

        // Scrollspy for chapters
        $('body').scrollspy({
          target: '#chapters',
          offset: 60
        });
      }
    },
    // Flash cards
    'single_flash_cards': {
      init: function() {
        /**
         * For embeds on non-mobile devices
         */
       if (!ismobileorIE && !isSafari) {
          // Hide default card
          $('.wp-embed-card').hide();
          // Show full flash cards
          $('.wp-embed').show();
        }
        /**
         * Bootstrap Affix
         */
		/*
        $(window).on('load', function() {
          $('#fc-left-nav .toc').affix({
            offset: {
              top: function() {
                return (this.top = $('#fc-left-nav .toc').offset().top - 20);
              },
              bottom: function () {
                return (this.bottom = $('footer.content-info').outerHeight(true) + $('.above-footer').outerHeight(true) + 100);
              }
            }
          });
        }); */
      },
      finalize: function() {
        /**
         * OWL CAROUSEL 2
         */

        // Init Owl Carousel 2
        var owl = $("#fc-carousel");

        // Function to set hash based on navigation link clicks
        $('#fc-left-nav a').on('click', function(e) {
          e.preventDefault();
          window.location.hash = $(this).data('hash');
        });

        // Function to set nav states based on slide position
        function navState(type, prop) {

          var prev = $('.fc-nav .fc-prev');
          var next = $('.fc-nav .fc-next');
          var size = owl.find('.owl-item').length;

          // Determine current slide
          if (type === 'changed') {
            index = prop.item.index;
            hash = $(prop.target).find(".owl-item").eq(index).find(".fc").data('hash');
          } else {
            index = owl.find('.owl-item.active').index();
            hash = owl.find('.owl-item.active').find('.fc').data('hash');
          }

          // Set index number in top nav bar
          $('#fc-index').text('Flash card ' + (index + 1) + '/' + size);

          // Prev state
          if (index === 0) {
            prev.addClass('disabled');
          } else {
            prev.removeClass('disabled');
          }

          // Next state
          if (index + 1 === size) {
            next.addClass('disabled');
          } else {
            next.removeClass('disabled');
          }

          // Active state for TOC
          $('#fc-left-nav .toc li').removeClass('active');
          $('#fc-left-nav .toc').find('a[href="#' + hash + '"]').parent('li').addClass('active');
        }

		$(window).on('load', function() {
			setTimeout(function(){
			  owl.owlCarousel({
				items: 1,
				loop: false,
				autoHeight: true,
				URLhashListener: true,
				startPosition: 'URLHash',
				onInitialized: navState
			  });
		  }, 2000);
		});


        // Manual carousel nav
        $('.fc-nav .fc-next').on(clickortap, function() {
          owl.trigger('next.owl.carousel');
        });

        $('.fc-nav .fc-prev').on(clickortap, function() {
          owl.trigger('prev.owl.carousel');
        });

        // Functions to run when slides changed
        owl.on('changed.owl.carousel', function(prop) {
          // Set nav states
          navState('changed', prop);

          // Hash change on carousel nav
          var current = prop.item.index;
          var hash = $(prop.target).find(".owl-item").eq(current).find(".fc").data('hash');
          window.location.hash = hash;
        });
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  $('#gform_wrapper_6').css("display","block");

  // var rc = rough.canvas(document.getElementById('canvas'));
  // rc.line(1, 1, 300, 1);
  // var ctx = rc.getContext("2d");
  // ctx.font = "30px Arial";
  // ctx.fillStyle = 'red';
  // ctx.fillText("Hello World", 1, 1);

})(jQuery); // Fully reference jQuery after this point.
