/*
 * Author: GratDei
 * Author URI: http://consulting.fluztech.com
 * Theme Name: AirRoom
 * Version: 1.0.0
 */

/*global jQuery, google, CountUp, mapInitialLatitude, mapInitialLongitude*/

(function($) {
  "use strict";

  $(document).ready(function() {
    const $window = $(window);
    const GabiExpress = {
      init: function() {
        const $this = this;

        $this.build();
        $this.events();
      },
      build: function() {
        const $this = this;

        /**
         * Create custom select boxes
         */
        $this.createSelectBoxes();

        /**
         * Create Slick Sliders
         */
        $this.createSlickSliders();
      },
      events: function() {
        const $this = this;

        /**
         * Functions called on window resize
         */
        $this.windowResize();

        /**
         * Enable dropdown menu
         */
        $this.enableDropdownMenu();

        /**
         * Make the navbar stick to the top on scroll
         */
        $this.stickyNav();
      },

      createSelectBoxes: function() {
        if ($("select").length) {

          $("select").chosen({
            allow_single_deselect: true,
            disable_search_threshold: 12
          });

        }
      },

      windowResize: function() {
        var rtime;
        var timeout = false;
        var delta = 200;

        $(window).resize(function() {

          rtime = new Date();
          if (timeout === false) {
            timeout = true;
            setTimeout(resizeend, delta);
          }

        });

        function resizeend() {

          if (new Date() - rtime < delta) {
            setTimeout(resizeend, delta);
          } else {
            timeout = false;

            // Refresh Slick Carousels
            if ($("#carousel-deals").length) {
              $("#carousel-deals").slick("setPosition");
            }

            if ($("#carousel-testimonials").length) {
              $("#carousel-testimonials").slick("setPosition");
            }
          }

        }
      },

      createSlickSliders: function() {

        if ($("#carousel-testimonials").length) {

          $("#carousel-testimonials").slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            prevArrow: $(".controls-slide.testimonials .prev"),
            nextArrow: $(".controls-slide.testimonials .next"),
            dots: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
          });

        }
      },

      enableDropdownMenu: function() {

        $("body").on("mouseenter mouseleave", ".nav-item", function(e) {
          if ($(window).width() > 750) {

            var _d = $(e.target).closest(".nav-item");
            _d.addClass("show");
            setTimeout(function() {
              _d[_d.is(":hover") ? "addClass" : "removeClass"]("show");
            }, 1);

          }
        });

      },

      stickyNav: function() {

        new Waypoint({
          element: document.getElementById("l-top-bar"),
          handler: function(direction) {
            if (direction === "down") {
              $("#l-nav").addClass("sticky-top");
            } else {
              $("#l-nav").removeClass("sticky-top");
            }
          },
          offset: -document.getElementById("l-top-bar").offsetHeight
          
        });
      }
    };

    GabiExpress.init();
  });
})(jQuery);
