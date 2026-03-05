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
      $('.burger-icon').on('click', function () {
        $('html').toggleClass('menu-active');
        $('.menu-container, .burger-icon').toggleClass('active');
        $('html').toggleClass('html-overflow-hidden');
      })

      $(document).on('keydown', function(e) {
        if (e.key === "Escape" || e.keyCode === 27) {
          $('html').removeClass('menu-active html-overflow-hidden');
          $('.menu-container, .burger-icon, .site-header').removeClass('active');
        }
      });

      // Handle clicking the back button to close the submenu
      $('.site-header__menu-mobile .sub-page .back').on('click', function (e) {
          e.preventDefault(); // Prevent the default action

          // Find the parent .sub-page and remove the .active class
          $(this).closest('.sub-page').removeClass('active');
      });

      let lastScroll = $(window).scrollTop();
    
      $(document).on("scroll", function () {
        let currentScroll = $(window).scrollTop();
        let scrollThreshold = $(window).width() < 768 ? 150 : 200;
    
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
            case 'testimonials':
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
                }
              );
              break;
            case 'stats-carousel':
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
                  breakpoints: {
                    0 : {
                      slidesPerView: 1,
                      spaceBetween: 80,
                    },
                    768: {
                      slidesPerView: 2,
                      spaceBetween: 20,
                    },
                    1024: {
                      slidesPerView: 3,
                      spaceBetween: 80,
                    }
                  }
                }
              );
              break;
            case 'small-stats-carousel':
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
                  breakpoints: {
                    0 : {
                      slidesPerView: 1,
                      spaceBetween: 80,
                    },
                    900: {
                      slidesPerView: 2,
                      spaceBetween: 20,
                    },
                    1025: {
                      spaceBetween: 80,
                    }
                  }
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

    const cardsJS = () => {
      const csAltCards = $('.card--cs-alt');
      if (csAltCards.length) {
        csAltCards.each(function () {
          const $this = $(this);
          const height = $this.outerHeight();
          const padding = parseInt($this.find('.text-container').css('padding-top'));
          const titleHeight = $this.find('.title').outerHeight();
          const subtextHeight = height - padding - titleHeight - 20 - 40;
          $this.find('.subtext').css('height', subtextHeight + 'px');
          $this.on('mouseenter', function () {
            $this.find('.subtext-container').stop().slideDown();
          });
          $this.on('mouseleave', function () {
            $this.find('.subtext-container').stop().slideUp();
          });
        });
      }

      const teamCards = $('.card--team');
      if (teamCards.length) {
        const updateOverlayHeights = () => {
          teamCards.each(function () {
            const $card = $(this);
            const $overlay = $card.find('.card-overlay');
            const contentHeight = $card.find('.text-container').outerHeight() + parseInt($overlay.css('padding-top')) + parseInt($overlay.css('padding-bottom'));
            if ($overlay.length) {
              $overlay.css('height', contentHeight + 'px');
              $overlay.data('inactive-height', contentHeight + 'px');
              $overlay.data('active-height', $card.outerHeight() + 'px');
            }
          });
        };

        updateOverlayHeights();
        $(window).on('resize', updateOverlayHeights);

        teamCards.each(function () {
          const $card = $(this);
          const $toggle = $card.find('[data-team-card-toggle]');

          if (!$toggle.length) {
            return;
          }

          // Toggle the active state when "Read more" / "Close" is clicked
          $toggle.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if(!$card.hasClass('is-active')) {
              $card.find('.card-overlay').css('height', $card.find('.card-overlay').data('active-height'));
            } else {
              $card.find('.card-overlay').css('height', $card.find('.card-overlay').data('inactive-height'));
            }
            $card.toggleClass('is-active');
            $card.find('.subtext').stop().slideToggle();
          });
        });
      }
    }



    const heroBlockJS = () => {
      const heroBlock = $('.hero-block');
      if (heroBlock.length) {
        heroBlock.each(function () {
          const $this = $(this);
          const $imageContainer = $this.find('.image-container');
          const $backgroundImage = $imageContainer.find('.background-image');

        if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
          gsap.set($backgroundImage, { scale: 1 });
          ScrollTrigger.create({
            trigger: $this,
            start: "top top",
            end: () => `+=${window.innerHeight}`,
            scrub: true,
            onUpdate: self => {
              const scale = 1 + 0.15 * self.progress;
              gsap.to($backgroundImage, { scale: scale, overwrite: "auto", duration: 0.01 });
            }
          });
        }
        });
      }
    };


    const imageTextBlocksJS = () => {
      const imageTextBlocks = $('.image-text-block');
      if (imageTextBlocks.length) {
        imageTextBlocks.each(function () {
          const $this = $(this);
          const $imageContainer = $this.find('.image-container');
          const $image = $imageContainer.find('img');

        if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
          gsap.set($image, { scale: 1 });
          ScrollTrigger.create({
            trigger: $this,
            start: "top top",
            end: () => `+=${window.innerHeight}`,
            scrub: true,
            onUpdate: self => {
              const scale = 1 + 0.15 * self.progress;
              gsap.to($image, { scale: scale, overwrite: "auto", duration: 0.01 });
            }
          });
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
      cardsJS: cardsJS,
      heroBlockJS: heroBlockJS,
      imageTextBlocksJS: imageTextBlocksJS,
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
    Base.cardsJS();
    Base.heroBlockJS();
    Base.imageTextBlocksJS();
  });

  jQuery(window).on('load', function($) {
    Base.load();
  });

})(window, document, jQuery);
