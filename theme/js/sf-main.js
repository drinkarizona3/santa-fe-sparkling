(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const
      $body = $('body'),
      loadingWait = 1500;

    $body.addClass('sf-start-intro');

    $(window).on('load', ()=> {
      setTimeout( () => $body.addClass('sf-end-intro'), loadingWait);
      setTimeout( () => $body.addClass('sf-loaded'), loadingWait * 1.5 );
    });

    function observeSections(){

      const 
        dynamicSelectors = ['#sf-background', '#navbar'],
        navbar = document.querySelector('#navbar'),
        flavorSections = document.querySelectorAll('.sf-flavor, #sf-social'),
        fixedContent = document.querySelector('#sf-background'),
        changeElementTheme = function(selectors){

        },
        options = {
          root: null,
          rootMargin: "0px",
          threshold: .5
        },
        callback = (entries, observer) => {
          entries.forEach( entry => {

            if (entry.isIntersecting) {
              const flavorHandle = entry.target.dataset.flavor;

              dynamicSelectors.forEach( (selector, i) => {

                const element = document.querySelector(selector);

                element.setAttribute('data-sf-theme', flavorHandle);

                element.classList.add('active');
              });
            } else {
              dynamicSelectors.forEach( selector =>  element.classList.remove('active') );
            }
          });
        };

      flavorSections.forEach( flavor => {
        const observer = new IntersectionObserver(callback, options);
        observer.observe(flavor);
      });
    }

    observeSections();

  });

})(jQuery, this);