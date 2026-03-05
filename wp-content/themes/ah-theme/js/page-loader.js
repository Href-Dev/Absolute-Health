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
                    const stageDelaysMs = [
                        1000, // stage 1
                        1000, // stage 2
                        1000, // stage 3
                        1500, // stage 4
                        3000, // stage 5
                        4000, // stage 6
                        3000, // stage 7
                        1500, // stage 8
                        1000, // stage 9
                        1800, // stage 10
                        1800, // stage 11
                        2000, // stage 12
                        1500, // stage 13
                        1000, // stage 14
                        1000, // stage 15
                        1000, // stage 16
                        1000, // stage 17
                    ];

                    let totalDelay = 0;
                    stageDelaysMs.forEach((delay, index) => {
                        totalDelay += delay;
                        setTimeout(() => {
                            $('.page-loader-container').removeClass('stage-' + index);
                            $('.page-loader-container').addClass('stage-' + (index + 1));
                        }, totalDelay);
                        console.log(totalDelay);
                    });

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
