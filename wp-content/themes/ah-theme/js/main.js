import Swiper from 'swiper/bundle';
/** Include any other scripts here - this will combine them via Webpack for the final output script. */

import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from "gsap/SplitText";
import Lenis from 'lenis'

gsap.registerPlugin(ScrollTrigger, SplitText);

((window, document, $, undefined) => {

  /*******************************************************************************/
  /* MODULE
  /*******************************************************************************/

  const Base = (() => {

    /**
     * Runs when the document is ready.
     */
    const ready = () => {
      console.log('document ready!');

    };

    const smoothScrolling = () => {
      const lenis = new Lenis()
      
      lenis.on('scroll', ScrollTrigger.update)
      
      gsap.ticker.add((time)=>{
        lenis.raf(time * 1000)
      })
      
      gsap.ticker.lagSmoothing(0)

      function scrollToHash() {
        const hash = window.location.hash;
        
        if (hash) {
          const $targetElement = $(hash);
          const $siteHeader = $('.site-header');
      
          if ($targetElement.length && $siteHeader.length) {
            // Get the height of the site header
            const headerHeight = $siteHeader.outerHeight();
            
            // Calculate the target position, offset by the header height
            const targetPosition = $targetElement.offset().top - headerHeight;
      
            // Use Lenis to scroll to the target position
            lenis.scrollTo(targetPosition);
          }
        }
      }
      
      // Add hashchange event listener
      $(window).on('hashchange', function(event) {
        event.preventDefault();
        scrollToHash();
      });
      
      scrollToHash();
    }

    const headerJS = () => {
      $('.hamburger').on('click', function () {
        $('html').toggleClass('menu-active');
        $('.mobile-menu, .hamburger').toggleClass('active');
        $('html').toggleClass('html-overflow-hidden');
      })

      $(document).on('keydown', function(e) {
        if (e.key === "Escape" || e.keyCode === 27) {
          $('html').removeClass('menu-active html-overflow-hidden');
          $('.mobile-menu, .hamburger, .site-header').removeClass('active');
        }
      });

      $('.site-header__menu-mobile .menu-item-has-children >.main-menu-item button').on('click', function (e) {
        e.preventDefault();
        const curMenuItem = $(this).parents('.menu-item');
        if(!curMenuItem.hasClass('active')) {
            // $('.site-header .menu-item .sub-menu').stop().slideUp();
            $('.site-header .menu-item').removeClass('active')
        }
        // curMenuItem.find('.sub-menu').stop().slideToggle();
        curMenuItem.find('.sub-page').toggleClass('active');
        curMenuItem.toggleClass('active');
    
    });    

      // Handle clicking the back button to close the submenu
      $('.site-header__menu-mobile .sub-page .back').on('click', function (e) {
          e.preventDefault(); // Prevent the default action

          // Find the parent .sub-page and remove the .active class
          $(this).closest('.sub-page').removeClass('active');
      });

      var lastScroll = $(window).scrollTop();
    
      $(document).on("scroll", function () {
        var currentScroll = $(window).scrollTop();
        var scrollThreshold = $(window).width() < 768 ? 150 : 200;
    
        if (currentScroll > scrollThreshold) {
          $(".site-header").addClass("scrolling");
        } else {
          $(".site-header").removeClass("scrolling");
        }

        if (currentScroll) {
          $(".site-header").toggleClass("up", lastScroll > currentScroll);
        } else {
          $(".site-header").removeClass("up");
        }
    
        lastScroll = currentScroll;
      });
    };

    /**
     * Runs when the window is loaded.
     */
    const accordionJS = () => {
      const block = $('.accordions-wrapper');
      if (block.length) {
        const headings = block.find('.accordion-heading');
        const contents = block.find('.accordion-content');
        headings.on('click', function () {
          if (!$(this).hasClass('active')) {
            block.find('.accordion-heading.active').parent().find('.accordion-content').stop().slideUp()
            block.find('.accordion-heading.active').attr('aria-expanded', 'false');
            block.find('.accordion-heading.active').removeClass('active');
          }
          $(this).toggleClass('active')
          $(this).parent().find('.accordion-content').stop().slideToggle()
          if ($(this).attr('aria-expanded') == 'true') {
            $(this).attr('aria-expanded', 'false')
          } else {
            $(this).attr('aria-expanded', 'true')
          }
        })
      }
    };



    const swiperFunctions = () => {
      const swipers = $('.swiper');
      if (swipers.length) {
        swipers.each(function () {
          const $this = $(this);
          const swiperType = $this.data('swiper-type');
          switch (swiperType) {
            case 'homepage-hero':
              new Swiper($this.get(0), 
                {
                  loop: true,
                  autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                  },
                }
              );
              break;
            case 'testimonials':
              new Swiper($this.get(0), 
                {
                  loop: true,
                  autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                  },
                  pagination: {
                    el: $this.parents('section').find('.swiper-pagination').get(0),
                    clickable: true,
                  },
                  navigation: {
                    nextEl: $this.parents('section').find('.swiper-button-next').get(0),
                    prevEl: $this.parents('section').find('.swiper-button-prev').get(0),
                  },
                }
              );
              break;
            case 'example-swiper':
              new Swiper($this.get(0), 
                {
                  loop: true,
                  spaceBetween: 100,
                  autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                  },
                  speed: 1000,
                  pagination: {
                    el: $this.parents('section').find('.swiper-pag').get(0),
                    clickable: true,
                  },
                  navigation: {
                    nextEl: $this.parents('section').find('.swiper-btn-next').get(0),
                    prevEl: $this.parents('section').find('.swiper-btn-prev').get(0),
                  },
                }
              );
              break;
          }
        });
      }
    };



    const animationsJS = () => {
      const animations = $('[data-animate]');
      if (animations.length) {
        animations.each(function () {
          const $this = $(this);
          const animationType = $this.data('animate');
          switch (animationType) {
            case 'fade-in':
              gsap.to($this, {
                opacity: 1,
                duration: 1,
                ease: 'power2.inOut',
                delay: $this.data('delay') || 0,
                scrollTrigger: {
                  trigger: $this,
                  start: 'top bottom',
                },
              });
              break;
            case 'fade-left':
              gsap.to($this, {
                opacity: 1,
                x: 0,
                duration: 1,
                ease: 'power2.inOut',
                delay: $this.data('delay') || 0,
                scrollTrigger: {
                  trigger: $this,
                  start: 'top bottom',
                },
              });
              break;
            case 'fade-right':
              gsap.to($this, {
                opacity: 1,
                x: 0,
                duration: 1,
                ease: 'power2.inOut',
                delay: $this.data('delay') || 0,
                scrollTrigger: {
                  trigger: $this,
                  start: 'top bottom',
                },
              });
              break;
            case 'fade-up':
              gsap.to($this, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power2.inOut',
                delay: $this.data('delay') || 0,
                scrollTrigger: {
                  trigger: $this,
                  start: 'top bottom',
                },
              });
              break;
            case 'fade-down':
              gsap.to($this, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power2.inOut',
                delay: $this.data('delay') || 0,
                scrollTrigger: {
                  trigger: $this,
                  start: 'top bottom',
                },
              });
              break;
              default:
                // If data-animate is set to 'class-on-scroll', add the class 'animated' on scroll into view
                ScrollTrigger.create({
                  trigger: $this,
                  start: 'top bottom',
                  onEnter: () => {
                    $this.addClass('animated');
                  }
                });
                break;
          }
        });
      }
    };



    const load = () => {
      console.log('document load!');
    };

    /**
     * Return our module's publicly accessible functions.
     */
    return {
      ready: ready,
      animationsJS: animationsJS,
      smoothScrolling: smoothScrolling,
      headerJS: headerJS,
      accordionJS: accordionJS,
      swiperFunctions: swiperFunctions,
      load: load
    };

  })();

  /*******************************************************************************/
  /* MODULE INITIALISE
  /*******************************************************************************/

  jQuery(document).ready(function($) {
    Base.ready();
    Base.animationsJS();
    Base.smoothScrolling(); // enable lenis smooth scrolling
    Base.accordionJS();
    Base.headerJS();
    Base.swiperFunctions();
  });

  jQuery(window).on('load', function($) {
    Base.load();
  });

})(window, document, jQuery);
