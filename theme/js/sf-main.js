(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const
      $body = $('body'),
      elementSelectors = ['#sf-background', '#navbar'],
      flavorSections = document.querySelectorAll('.sf-flavor'),
      // Utility Functions
      createObserver = function(sections, func, options) {

        const callback = (entries, observer) => entries.forEach( (entry) => {
          func(entry);
        });

        sections.forEach( section => {
          const observer = new IntersectionObserver(callback, options);
          observer.observe(section);
        });
      };
    
    // Main functions
    function observeProductSections(){
      const flavorsSection = document.querySelector('#sf-flavors');

      function checkIfInProductsSection(entry) {

        if (entry.isIntersecting) {
          $body.addClass('sf-intersecting-products');
        } else {
          $body.removeClass('sf-intersecting-products');
          flavorSections.forEach( section => section.classList.remove('sf-active'));
        }
      }

      createObserver([flavorsSection], checkIfInProductsSection, {
        root: null,
        rootMargin: "-15% 0% -50% 0%",
        threshold: 0
      });
    }

    function changeProductSectionState(){

      function handleStateChange(entry) {

        if (entry.isIntersecting) {

          const _target = entry.target,
                flavorHandle = _target.dataset.sfTheme;
          
          flavorSections.forEach( section => section.classList.remove('sf-active'));
          _target.classList.add('sf-active');

          elementSelectors.forEach( (selector) => {

            const element = document.querySelector(selector);
        
            element.setAttribute('data-sf-theme', flavorHandle);

            element.classList.add('sf-animate');
            setTimeout( () => element.classList.remove('sf-animate'), 800);
            
          });

        } 
      }

      createObserver(flavorSections, handleStateChange, {
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

      createObserver(flavorSections, handleIntro, {
        root: null,
        rootMargin: "0px",
        threshold: thresholds
      });

    }

    function nav() {
        const
          navbar = document.querySelector('#navbarDropdown'),
          links = document.querySelectorAll('.nav-link');

    
        links.forEach( link => link.addEventListener('click', function(){
          navbar.classList.remove('show');
        }));
    }

    function parallax() {

      const parallaxElements = document.querySelectorAll('[data-sf-parallax]'),
            parallaxElProps = [...parallaxElements].reduce( (props, element) => {

              props[element.id] = {
                el: element,
                top: element.scrollTop,
                speed: element.getAttribute('data-sf-parallax')['speed']
              }

              return props;

            }, {}),
            animate = function(el) {
              const percentage = ((window.scrollY - parallaxElements[el.id].top) / window.innerHeight) * 100;
            };

      function handleParallax(entries) {

        entries.forEach(entry => {

          const target = entry.target;

          if (entry.isIntersecting) {
              target.classList.add('in-view');
          } else {
            target.classList.remove('in-view');
          }
        })
      }

      createObserver(parallaxElements, handleParallax, {
        root: null,
        rootMargin: "0px",
        threshold: 1.0
      });

      console.log(parallaxElements);
    }

    observeProductSections();
    changeProductSectionState();
    nav();
    //introduceElements();
    parallax();

  });

})(jQuery, this);