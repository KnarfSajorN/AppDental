  /*  =============================================================================
        TRANSITION PAGE
    ============================================================================== */

  /**
   * Show page loader
   */
  function showLoader() {
    $('.page-loader').removeClass('is-invisible');

    // Animation
    var tl = new TimelineLite();

    tl.fromTo(
      $('.page-loader--bg-a'),
      .7, {
        x: '100%',
      }, {
        x: '0%',
        ease: Power3.easeInOut,
      },
      0
    );
    tl.fromTo(
      $('.page-loader--bg-b'),
      .9, {
        x: '100%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      },
      0
    );

    tl.fromTo(
      $('.page-loader--and'),
      .9, {
        x: $(window).outerWidth() / 1.8,
      }, {
        x: 0,
        ease: Power3.easeInOut,
      },
      0
    );

    tl.fromTo(
      $('.page-loader path'),
      .9, {
        strokeDashoffset: 286
      }, {
        strokeDashoffset: 0,
        ease: Power1.easeInOut
      },
      0
    );

    tl.staggerFromTo(
      $('.page-loader .splitter-letter'),
      .9, {
        alpha: 0,
        x: $(window).outerWidth() / 10,
      }, {
        alpha: 1,
        x: 0,
        ease: Power3.easeOut,
      },
      .01,
      0.25
    );

    tl.call(function() {
      //loadingFull = true;
    });
  }

  showLoader();



  /**
   * Hide page loader
   */
  function hideLoader() {
    // Animation hide loader
    var tl = new TimelineLite();

    tl.fromTo(
      $('.page-loader--bg-a'),
      .9, {
        x: '0%',
      }, {
        x: '-100%',
        ease: Power2.easeInOut,
      },
      0
    );
    tl.fromTo(
      $('.page-loader--bg-b'),
      .7, {
        x: '0%',
      }, {
        x: '-100%',
        ease: Power3.easeInOut,
      },
      0
    );

    tl.fromTo(
      $('.page-loader--and'),
      .9, {
        x: 0,
      }, {
        x: $(window).outerWidth() / -1.8,
        ease: Power3.easeInOut,
      },
      0
    );

    tl.to(
      $('.page-loader path'),
      .9, {
        strokeDashoffset: -286,
        ease: Power1.easeInOut
      },
      0
    );

    tl.staggerFromTo(
      $('.page-loader .splitter-letter'),
      .6, {
        alpha: 1,
        x: 0,
      }, {
        alpha: 0,
        x: $(window).outerWidth() / -10,
        ease: Power3.easeInOut,
      },
      .01,
      0
    );

    tl.call(function() {
      $('.page-loader').addClass('is-invisible');
    })
  }


  setTimeout(function() {
    hideLoader();
  }, 1500);