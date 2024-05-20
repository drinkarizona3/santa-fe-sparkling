(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const
      $body = $('body'),
      loadingWait = 1500,
      createObserver = function(sections, options, callback) {
        sections.forEach( section => {
          const observer = new IntersectionObserver(callback, options);
          observer.observe(section);
        });
      };

    $body.addClass('sf-start-intro');

    $(window).on('load', ()=> {
      setTimeout( () => $body.addClass('sf-end-intro'), loadingWait);
      setTimeout( () => $body.addClass('sf-loaded'), loadingWait * 1.5 );
    });

    function changeProductSectionState(){

      const 
        elementsToChange = ['#sf-background', '#navbar'],
        navbar = document.querySelector('#navbar'),
        sections = document.querySelectorAll('.sf-flavor, #sf-social'),
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

              elementsToChange.forEach( (selector, i) => {

                const element = document.querySelector(selector);

                element.setAttribute('data-sf-theme', flavorHandle);

                element.classList.add('sf-animate');

                setTimeout( () => element.classList.remove('sf-animate'), 800)
              });
            } else {
              $body.removeClass('sf-products-in-view');
            }
          });
        };

        createObserver(sections, options, callback);
    }

    changeProductSectionState();

  });

})(jQuery, this);