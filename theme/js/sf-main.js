(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const
      $body = $('body'),
      loadingWait = 1500,
      elementSelectors = ['#sf-background', '#navbar'],
      createObserver = function(sections, func, options) {

        const callback = (entries, observer) => entries.forEach( entry => {
          func(entry);
        });

        sections.forEach( section => {
          const observer = new IntersectionObserver(callback, options);
          observer.observe(section);
        });
      };

    function intro() {
      $body.addClass('sf-start-intro');
  
      $(window).on('load', ()=> {
        setTimeout( () => $body.addClass('sf-end-intro'), loadingWait);
        setTimeout( () => $body.addClass('sf-loaded'), loadingWait * 1.5 );
      });
    }

    function observeProductsSection(){
      const flavorsSection = document.querySelector('#sf-flavors'),
            navbar = document.querySelector('#navbar');

      function checkIfInProductsSection(entry) {
        console.log(flavorsSection)

        if (entry.isIntersecting) {
          $body.addClass('sf-intersecting-products');
        } else {
          $body.removeClass('sf-intersecting-products');
          elementSelectors.forEach( selector => {
            document.querySelector(selector)
                    .setAttribute('data-sf-theme', 'pink-grapefruit');
          })
        }
      }

      createObserver([flavorsSection], checkIfInProductsSection, {
        root: null,
        rootMargin: "-25% 0% -50% 0%",
        threshold: 0
      });
    }

    function changeProductSectionState(){

      const sections = document.querySelectorAll('.sf-flavor, #sf-social');

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

    intro();
    observeProductsSection();
    changeProductSectionState();

  });

})(jQuery, this);