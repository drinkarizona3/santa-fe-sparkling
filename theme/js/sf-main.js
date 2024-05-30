(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const
      $body = $('body'),
      loadingWait = 1500,
      elementSelectors = ['#sf-background', '#navbar'],
      // Utility Functions
      createObserver = function(sections, func, options) {

        const callback = (entries, observer) => entries.forEach( (entry) => {
          func(entry, i);
        });

        sections.forEach( section => {
          const observer = new IntersectionObserver(callback, options);
          observer.observe(section);
        });
      };
    
    // Main functions
    function intro() {
      $body.addClass('sf-start-intro');
  
      $(window).on('load', ()=> {
        setTimeout( () => $body.addClass('sf-end-intro'), loadingWait);
        setTimeout( () => $body.addClass('sf-loaded'), loadingWait * 1.5 );
      });
    }

    function observeProductSections(){
      const flavorsSection = document.querySelector('#sf-flavors');

      function checkIfInProductsSection(entry) {

        if (entry.isIntersecting) {
          $body.addClass('sf-intersecting-products');
        } else {
          $body.removeClass('sf-intersecting-products');
        }
      }

      createObserver([flavorsSection], checkIfInProductsSection, {
        root: null,
        rootMargin: "-15% 0% -50% 0%",
        threshold: 0
      });
    }

    function changeProductSectionState(){

      const sections = document.querySelectorAll('.sf-flavor');

      function handleStateChange(entry, i) {

        if (entry.isIntersecting) {

          const _target = entry.target,
                flavorHandle = _target.dataset.sfTheme;
          
          sections.forEach( section => section.classList.remove('sf-active'));
          _target.classList.add('sf-active');

          elementSelectors.forEach( (selector, i) => {

            const element = document.querySelector(selector);
        
            element.setAttribute('data-sf-theme', flavorHandle);

            element.classList.add('sf-animate');
            setTimeout( () => element.classList.remove('sf-animate'), 800);
            
          });

        } 
      }

      createObserver(sections, handleStateChange, {
        root: null,
        rootMargin: "0px",
        threshold: .5
      });

    }

    function introduceElements(){

      const thresholds = [];

      for (let i = 0; i <= 1.0; i += 0.01) {
        thresholds.push(i);
      }

      function handleIntro(entry) {
       
        const target = entry.target;
       
      }

      createObserver(flavorContainers, handleIntro, {
        root: null,
        rootMargin: "0px",
        threshold: thresholds
      });

    }

    intro();
    observeProductSections();
    changeProductSectionState();
    //introduceElements();

  });

})(jQuery, this);