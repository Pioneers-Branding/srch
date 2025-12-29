(function ($) {
   "use strict";
   $(document).ready(function () {
      $(".dashboard-bottom, .notification-list").niceScroll({});
      $(document).on('click', '.click_show_icon', function () {
         $(".nav-right-content").toggleClass("active");
      });
      new WOW().init();
      $(document).on('click', '.single-location, .date-time-list .list', function () {
            if ($(this).hasClass('time-slot')) {
                $('.time-slot').siblings().removeClass('active');
            }
            if (!($(this).hasClass('past-date') || $(this).hasClass('past-time'))) {
                $(this).siblings().removeClass('active');
                
                if (typeof $(this).attr('data-date') !== 'undefined') { 
                    $('.date-container').find('.date-select').removeClass('active');
                }
                $(this).addClass('active');
            }
        });

      $(document).on('click', '.dashboard-list .has-children a', function (e) {
         var db = $(this).parent('.has-children');
         if (db.hasClass('open')) {
            db.removeClass('open');
            db.find('.submenu').children('.has-children').removeClass("open");
            db.find('.submenu').removeClass('open');
            db.find('.submenu').slideUp(300, "swing");
         } else {
            db.addClass('open');
            db.children('.submenu').slideDown(300, "swing");
            db.siblings('.has-children').children('.submenu').slideUp(300, "swing");
            db.siblings('.has-children').removeClass('open');
         }
      });
      $(document).on('click', '.close-bars, .body-overlay', function () {
         $('.dashboard-close, .dashboard-left-content, .body-overlay').removeClass('active');
      });
      $(document).on('click', '.sidebar-icon', function () {
         $('.dashboard-close, .dashboard-left-content, .body-overlay').addClass('active');
      });
      $('.category-slider').slick({
         slidesToShow: 5,
         slidesToScroll: 1,
         arrows: false,
         dots: true,
         prevArrow: '<div class="prev-icon"><i class="las la-angle-left"></i></div>',
         nextArrow: '<div class="next-icon"><i class="las la-angle-right"></i></div>',
         infinite: true,
         autoplay: false,
         pauseOnHover: true,
         swipeToSlide: true,
         responsive: [{
            breakpoint: 1200,
            settings: {
               slidesToShow: 4,
            }
         }, {
            breakpoint: 992,
            settings: {
               slidesToShow: 3,
            }
         }, {
            breakpoint: 768,
            settings: {
               slidesToShow: 2,
            }
         }, {
            breakpoint: 425,
            settings: {
               slidesToShow: 1,
            }
         }]
      });
      $('.services-slider').slick({
         slidesToShow: 3,
         slidesToScroll: 1,
         arrows: false,
         dots: true,
         prevArrow: '<div class="prev-icon"><i class="las la-angle-left"></i></div>',
         nextArrow: '<div class="next-icon"><i class="las la-angle-right"></i></div>',
         infinite: true,
         autoplay: false,
         pauseOnHover: true,
         swipeToSlide: true,
         responsive: [{
            breakpoint: 1200,
            settings: {
               slidesToShow: 2,
            }
         }, {
            breakpoint: 992,
            settings: {
               slidesToShow: 2,
            }
         }, {
            breakpoint: 768,
            settings: {
               slidesToShow: 1,
            }
         }, {
            breakpoint: 576,
            settings: {
               slidesToShow: 1,
            }
         }]
      });
      $('.professional-slider').slick({
         slidesToShow: 5,
         slidesToScroll: 1,
         arrows: true,
         dots: false,
         prevArrow: '<div class="prev-icon"><i class="las la-angle-left"></i></div>',
         nextArrow: '<div class="next-icon"><i class="las la-angle-right"></i></div>',
         infinite: true,
         autoplay: false,
         pauseOnHover: true,
         swipeToSlide: true,
         responsive: [{
            breakpoint: 1200,
            settings: {
               slidesToShow: 4,
            }
         }, {
            breakpoint: 992,
            settings: {
               slidesToShow: 3,
            }
         }, {
            breakpoint: 768,
            settings: {
               slidesToShow: 2,
            }
         }, {
            breakpoint: 576,
            settings: {
               slidesToShow: 2,
            }
         }]
      });
      $('.clientlogo-slider').slick({
         slidesToShow: 4,
         slidesToScroll: 1,
         arrows: false,
         dots: true,
         prevArrow: '<div class="prev-icon"><i class="las la-angle-left"></i></div>',
         nextArrow: '<div class="next-icon"><i class="las la-angle-right"></i></div>',
         infinite: true,
         autoplay: true,
         pauseOnHover: true,
         swipeToSlide: true,
         responsive: [{
            breakpoint: 992,
            settings: {
               slidesToShow: 3,
            }
         }, {
            breakpoint: 576,
            settings: {
               slidesToShow: 2,
            }
         }]
      });
      $(document).on('click', '.faq-contents .faq-title', function (e) {
         var fq = $(this).parent('.faq-item');
         if (fq.hasClass('open')) {
            fq.removeClass('open');
            fq.find('.faq-panel').removeClass('open');
            fq.find('.faq-panel').slideUp(300, "swing");
         } else {
            fq.addClass('open');
            fq.children('.faq-panel').slideDown(300, "swing");
            fq.siblings('.faq-item').children('.faq-panel').slideUp(300, "swing");
            fq.siblings('.faq-item').removeClass('open');
            fq.siblings('.faq-item').find('.faq-title').removeClass('open');
            fq.siblings('.faq-item').find('.faq-panel').slideUp(300, "swing");
         }
      });
      $('select').niceSelect();
      $(document).on('click', 'ul.tabs li', function () {
         var tab_id = $(this).attr('data-tab');
         $('ul.tabs li').removeClass('active');
         $('.tab-content-item').removeClass('active');
         $(this).addClass('active');
         $("#" + tab_id).addClass('active');
      });
      $(document).on('click', '.pagination-list li', function () {
         $(this).siblings().removeClass("active");
         $(this).addClass("active");
      });
      
      $(document).on('click', '.navbar-toggler', function () {
         $(this).toggleClass("active")
      });
      $(document).on('click', '.back-to-top', function () {
         $("html,body").animate({
            scrollTop: 0
         }, 1500);
      });
   });
   $(window).on('scroll', function () {
      var ScrollTop = $('.back-to-top');
      if ($(window).scrollTop() > 300) {
         ScrollTop.fadeIn(300);
      } else {
         ScrollTop.fadeOut(300);
      }
   });
   $(window).on('load', function () {
      $('#preloader').delay(300).fadeOut('fast');
      $('body').delay(300).css({
         'overflow': 'visible'
      });
   });
})(jQuery);