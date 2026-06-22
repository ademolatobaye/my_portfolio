/* Main js */
(function ($) {
  "use strict";

  /*  Loader  */
  $(window).on("load", function () {
    $(".bl-loader").fadeOut("slow");
  });

  /* Lazy-load non-hero images */
  const heroImages = document.querySelectorAll(".bl-hero img");

  heroImages.forEach(function (img, index) {
    img.decoding = "async";

    if (index === 0) {
      img.loading = "eager";
      img.setAttribute("fetchpriority", "high");
    } else {
      img.loading = "lazy";
    }
  });

  document.querySelectorAll("img").forEach(function (img) {
    img.decoding = "async";

    if (!img.closest(".bl-hero")) {
      img.loading = "lazy";
    }
  });

  /* Mobile menu toggle */
  const bl_toggle = document.querySelector(".toggle-btn");
  const menu = document.querySelector(".menu");

  if (bl_toggle && menu) {
    const closeMenu = () => {
      bl_toggle.classList.remove("active");
      menu.classList.remove("active");
      document.body.classList.remove("no-scroll");
    };

    const toggleMenu = () => {
      bl_toggle.classList.toggle("active");
      menu.classList.toggle("active");
      document.body.classList.toggle("no-scroll");
    };

    bl_toggle.addEventListener("click", toggleMenu);
    bl_toggle.addEventListener("keydown", function (event) {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        toggleMenu();
      }
    });

    menu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", closeMenu);
    });

    menu.addEventListener("click", function (event) {
      if (event.target === menu) {
        closeMenu();
      }
    });

    const menuPanel = menu.querySelector(".mobile-menu-panel");
    if (menuPanel) {
      menuPanel.addEventListener("click", function (event) {
        event.stopPropagation();
      });
    }

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") {
        closeMenu();
      }
    });

    window.addEventListener("resize", function () {
      if (window.innerWidth > 991) {
        closeMenu();
      }
    });
  }

  /* Label slider */
  $(function () {
    // Check if the element exists
    if ($('.label-auto').length > 0) {
      $('.label-auto').infiniteslide({
        direction: 'left',
        speed: 50,
        clone: 10
      });
    }
  });

  /*  Onclick icon expand education and experience  */
  $(".box-title .icon").on("click", function () {
    const $current = $(this).parent().siblings(".details");
    $(".details").not($current).slideUp("slow"); // close others
    $current.slideToggle("slow"); // toggle current
  });

  /* Portfolio */
  $(function () {
    if ($('.item-grid').length > 0) {
      var filterList = {
        init: function () {
          $('.item-grid').mixItUp({
            selectors: {
              target: '.item',
              filter: '.filter'
            },
            load: {
              filter: 'all'
            }
          });
        }
      };
      filterList.init();
    }
  });

  /* Blog */
  $(function () {
    if ($('.bl-blog-wrap').length > 0) {
      $('.bl-blog-wrap').owlCarousel({
        loop: true,
        margin: 24,
        responsiveClass: true,
        dots: false,
        nav: false,
        pagination: false,
        responsive: {
          0: {
            items: 1,
          },
          768: {
            items: 2,
          },
          992: {
            items: 3,
          }
        }
      });
    }
  });

  /* Testimonials */
  $(function () {
    if ($('.testimonials-slider').length > 0) {
      $('.testimonials-slider').owlCarousel({
        loop: true,
        margin: 24,
        responsiveClass: true,
        dots: false,
        nav: false,
        pagination: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
          },
          992: {
            items: 2,
          }
        }
      });
    }
  });
  /* Brand */
  $(function () {
    if ($('.bl-brand-slider').length > 0) {
      $('.bl-brand-slider').owlCarousel({
        loop: true,
        margin: 24,
        responsiveClass: true,
        dots: false,
        nav: false,
        pagination: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 2,
          },
          421: {
            items: 3,
          },
          768: {
            items: 4,
          },
          992: {
            items: 5,
          },
          1200: {
            items: 6,
          },
          1400: {
            items: 7,
          }
        }
      });
    }
  });

  /**  Pricing Tab Effect  **/
$(document).ready(function () {

  const $tabs = $(".tab-btn");
  const $prices = $(".plan-price .price");
  const $overlay = $(".overlay-active");

  // ✅ Condition: if elements not found → stop
  if (!$tabs.length || !$prices.length || !$overlay.length) return;

  const pricingData = {
    monthly: [0, 29, 59, 99],
    annually: [0, 23, 47, 79],
  };

  // 🔥 Tab click (price + active state)
  $tabs.on("click", function (e) {
    e.preventDefault();

    const $tab = $(this);
    const plan = $tab.data("plan");

    if (!pricingData[plan]) return; // ✅ safe condition

    $tabs.removeClass("active");
    $tab.addClass("active");

    $prices.each(function (i) {
      const $price = $(this);
      const newPrice = pricingData[plan][i];

      if (newPrice === undefined) return; // ✅ safety

      gsap.to({ val: parseInt($price.text().replace("$", ""), 10) || 0 }, {
        val: newPrice,
        duration: 0.6,
        ease: "power2.out",
        onUpdate: function () {
          $price.text("$" + Math.round(this.targets()[0].val));
        },
        onComplete: function () {
          $price.text("$" + newPrice);
        }
      });
    });

    $(".duration").text(plan === "monthly" ? "/month" : "/year");

    setOverlayPosition($tab);
  });

  // 🔥 Overlay position
  function setOverlayPosition($el) {
    if (!$el.length) return;

    const el = $el[0];
    const parent = el.parentElement;

    if (!parent) return;

    const rect = el.getBoundingClientRect();
    const parentRect = parent.getBoundingClientRect();

    gsap.to($overlay, {
      left: rect.left - parentRect.left,
      width: rect.width,
      duration: 0.4,
      ease: "power2.out",
    });
  }

  // ✅ Set initial overlay
  const $activeTab = $(".tab-btn.active");
  if ($activeTab.length > 0) {
    setOverlayPosition($activeTab);
  }

});

  /* Tab to top */
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $(".back-to-top").fadeIn();
    } else {
      $(".back-to-top").fadeOut();
    }
  });

  var blprogressPath = document.querySelector('.back-to-top-wrap path');
  var pathLength = blprogressPath.getTotalLength();
  blprogressPath.style.transition = blprogressPath.style.WebkitTransition = 'none';
  blprogressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  blprogressPath.style.strokeDashoffset = pathLength;
  blprogressPath.getBoundingClientRect();
  blprogressPath.style.transition = blprogressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    blprogressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.back-to-top-wrap').addClass('active-progress');
    } else {
      jQuery('.back-to-top-wrap').removeClass('active-progress');
    }
  });
  jQuery('.back-to-top-wrap').on('click', function (event) {
    event.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, duration);
    return false;
  });

  /*  Copyright years JS  */
  var el_copyright_year = document.getElementById("copyright_year");

  if (el_copyright_year) {
    var date = new Date().getFullYear();
    el_copyright_year.innerHTML = date;
  }

})(jQuery);

