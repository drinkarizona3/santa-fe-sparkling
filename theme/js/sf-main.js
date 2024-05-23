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
      },
      changeSectionState = function(selector, handle){

        const element = document.querySelector(selector),
              navLinks = document.querySelectorAll('.nav-link'),
              currentMenuLink = document.querySelector(`#nav-link__${handle}`);
            
        element.setAttribute('data-sf-theme', handle);

        element.classList.add('sf-animate');

        // navLinks.forEach( link => link.classList.remove('active'));
        // currentMenuLink.classList.add('active');

        setTimeout( () => element.classList.remove('sf-animate'), 800)
      };

    function intro() {
      $body.addClass('sf-start-intro');
  
      $(window).on('load', ()=> {
        setTimeout( () => $body.addClass('sf-end-intro'), loadingWait);
        setTimeout( () => $body.addClass('sf-loaded'), loadingWait * 1.5 );
      });
    }

    function observeProductsSection(){
      const flavorsSection = document.querySelector('#sf-flavors');

      function checkIfInProductsSection(entry) {

        if (entry.isIntersecting) {
          $body.addClass('sf-intersecting-products');
        } else {
          $body.removeClass('sf-intersecting-products');

          //elementSelectors.forEach( selector => changeSectionState(selector, 'pink-grapefruit'));
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

      function handleStateChange(entry) {

        if (entry.isIntersecting) {

          const _target = entry.target,
                flavorHandle = _target.dataset.sfTheme;

          sections.forEach( section => section.classList.remove('sf-active'));
          _target.classList.add('sf-active');

          elementSelectors.forEach( (selector, i) => {
            changeSectionState(selector, flavorHandle);
          });
        }   
        
      }

      createObserver(sections, handleStateChange, {
        root: null,
        rootMargin: "0px",
        threshold: .5
      });


    }

    function parallaxContainer(){

      const 
        sections = document.querySelectorAll('.sf-flavor__container'),
        thresholds = [],
        sectionElements = [...sections].reduce((object, section) => {
          const handle = section.firstElementChild.getAttribute('data-sf-theme');

          object[handle] = {
            el: section,
            top: section.offsetTop
          };

          return object;
        }, {})

      for (let i = 0; i <= 1.0; i += 0.01) {
        thresholds.push(i);
      }

      function handleParallax(entry) {
       
        const 
          target = entry.target,
          handle = target.firstElementChild.getAttribute('data-sf-theme'),     
          background = document.querySelector(`#sf-background[data-sf-theme="${handle}"]`),
          animateBackgroundElements = function(el, ratio) {
            el.style.transform = `translate3d(${Math.floor(ratio * 100)}%, 0, 0)`;
          };

          if (background) {

            const parallaxElements = background.querySelectorAll('[data-sf-parallax]');

            if (!parallaxElements.length) return
          
            if (entry.isIntersecting) {
              parallaxElements.forEach( el => animateBackgroundElements(el, entry.intersectionRatio));
            }

          }

          
      }

      createObserver(sections, handleParallax, {
        root: null,
        rootMargin: "0px",
        threshold: thresholds
      });

    }

    intro();
    observeProductsSection();
    changeProductSectionState();
    parallaxContainer();

  });

})(jQuery, this);