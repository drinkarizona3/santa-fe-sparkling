(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const
      $body = $('body'),
      loadingWait = 1500,
      createObserver = function(sections, func, options) {

        const callback = (entries, observer) => entries.forEach( entry => {
          func(entry);
        });

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

    function observeProductsSection(){
      const flavorsSection = document.querySelector('#sf-flavors');

      function checkIfInProductsSection(entry) {

        if (entry.isIntersecting) {
          $body.addClass('sf-intersecting-products')
        } else {
          $body.removeClass('sf-intersecting-products');
        }
      }

      createObserver([flavorsSection], checkIfInProductsSection, {
        root: flavorsSection,
        rootMargin: "1%",
        threshold: 0
      });
    }

    function changeProductSectionState(){

      const 
        elementSelectors = ['#sf-background', '#navbar'],
        sections = document.querySelectorAll('.sf-flavor, #sf-social');

        function changeState(entry) {
          if (entry.isIntersecting) {
            const flavorHandle = entry.target.dataset.flavor;

            elementSelectors.forEach( (selector, i) => {

              const element = document.querySelector(selector);

              element.setAttribute('data-sf-theme', flavorHandle);

              element.classList.add('sf-animate');

              setTimeout( () => element.classList.remove('sf-animate'), 800)
            });
          } 
        }

        createObserver(sections, changeState, {
          root: null,
          rootMargin: "0px",
          threshold: .5
        });
    }

    observeProductsSection();
    changeProductSectionState();

  });

})(jQuery, this);