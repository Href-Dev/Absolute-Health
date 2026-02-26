/** Include any other scripts here - this will combine them via Webpack for the final output script. */
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from "gsap/SplitText";

gsap.registerPlugin(ScrollTrigger, SplitText);

// INSERT_YOUR_CODE
// Run only when jQuery is available (script may load before footer jQuery)
function runWhenjQueryReady() {
    const jQuery = window.jQuery;
    if (typeof jQuery !== 'function') {
        requestAnimationFrame(runWhenjQueryReady);
        return;
    }

    ((window, document, jQuery) => {

        /*******************************************************************************/
        /* MODULE
        /*******************************************************************************/

        const Base = (() => {

            /**
             * Runs when the document is ready.
             */
            const ready = () => {
                console.log('document ready!');

                const $pageLoaderContainer = $('.page-loader-container');
                if ($pageLoaderContainer.length) {
                    //   const totalStages = 16;

                    //   // Disable user scroll on this page (lock stays for the whole page)
                    //   $('body').addClass('page-loader-scroll-lock');

                    //   // Optional: block wheel/touch/keyboard scroll as extra guard
                    //   const preventScroll = (e) => e.preventDefault();
                    //   document.addEventListener('wheel', preventScroll, { passive: false });
                    //   document.addEventListener('touchmove', preventScroll, { passive: false });

                    //   /**
                    //    * Delay (ms) before advancing to each stage. Index 0 = initial (stage 0), then delay before stage 1, then before stage 2, etc.
                    //    * Adjust these to control exactly when each swap happens.
                    //    */
                    //   const stageDelaysMs = [
                    //     0,     
                    //     1000,
                    //     5000,
                    //     150000,
                    //     200000,
                    //     200000,
                    //     150000,
                    //     150000,
                    //     200000,
                    //     200000,
                    //     150000,
                    //     150000,
                    //     200000,
                    //     200000,
                    //     150000,
                    //     150000,
                    //   ];

                    //   function setStage(stage) {
                    //     const s = Math.min(stage, totalStages - 1);
                    //     for (let i = 0; i < totalStages; i++) {
                    //       $pageLoaderContainer.removeClass("stage-" + i);
                    //     }
                    //     $pageLoaderContainer.addClass("stage-" + s);
                    //   }

                    //   // Schedule each stage from delays (no loop – explicit timeouts for full control)
                    //   let elapsed = 0;
                    //   for (let i = 0; i < totalStages; i++) {
                    //     elapsed += stageDelaysMs[i];
                    //     ((stage) => {
                    //       setTimeout(() => setStage(stage), elapsed);
                    //     })(i);
                    //   }

                    //   setStage(0);
                    let clickCount = 13;
                    $(document).on('click', 'body', function () {
                        if (clickCount != 0) {
                            $('.page-loader-container').removeClass('stage-' + (clickCount - 1));
                        }
                        $('.page-loader-container').addClass('stage-' + clickCount);
                        clickCount++;
                    })


                    const LinkEl = $('.page-loader .link-el');
                    LinkEl.each(function () {
                        const $this = $(this);
                        $this.on('mouseenter', function () {
                            if ($(this).hasClass('link-el__tl')) {
                                $(this).parent().addClass('link-el__tl-hover');
                            } else if ($(this).hasClass('link-el__bl')) {
                                $(this).parent().addClass('link-el__bl-hover');
                            } else if ($(this).hasClass('link-el__tr')) {
                                $(this).parent().addClass('link-el__tr-hover');
                            } else if ($(this).hasClass('link-el__br')) {
                                $(this).parent().addClass('link-el__br-hover');
                            }
                        });
                        $this.on('mouseleave', function () {
                            $(this).parent().removeClass('link-el__tl-hover');
                            $(this).parent().removeClass('link-el__bl-hover');
                            $(this).parent().removeClass('link-el__tr-hover');
                            $(this).parent().removeClass('link-el__br-hover');
                        });
                    });
                }

            };



            const load = () => {
            };

            /**
             * Return our module's publicly accessible functions.
             */
            return {
                ready: ready,
                load: load
            };

        })();

        /*******************************************************************************/
        /* MODULE INITIALISE
        /*******************************************************************************/

        jQuery(document).ready(function ($) {
            Base.ready();
        });

        jQuery(window).on('load', function ($) {
            Base.load();
        });

    })(window, document, jQuery);
}

runWhenjQueryReady();
