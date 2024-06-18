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

        if (entry.isIntersecting) {
          
           const target = entry.target,
                  can = target.querySelector('.sf-flavor__image-image'),
                 percentage = Math.floor(entry.intersectionRatio * 100);


            console.log(target,can);
   
            can.style.transform = `translate3d(0, -${percentage}vh, 0)`;
        }
       
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

    function parallax(sectionSelector) {

      const 
            section = document.querySelector(sectionSelector),
            parallaxElements = section.querySelectorAll('[data-sf-parallax]'),
            parallaxElProps = [...parallaxElements].reduce( (props, element) => {

              props[element.id] = {
                el: element,
                top: element.scrollTop,
                speed: JSON.parse(element.getAttribute('data-sf-parallax')).speed
              }

              return props;

            }, {}),
            animateElements = function(elements) {

              elements.forEach( element => {
                
                const 
                  elementID = element.id,
                  percentage = ((window.scrollY - parallaxElProps[elementID].top) / window.innerHeight) * 100,
                  tolerance = parallaxElProps[elementID].speed * 2,
                  transformValue = (percentage / tolerance).toFixed(2)

                element.style.transform = `translate3d(0, ${transformValue}vh, 0)`;
              })

            };

      function handleInstersection(entry) {

        const target = entry.target;

        if (entry.isIntersecting) {
          target.classList.add('in-view');
        } else {
          target.classList.remove('in-view');
        }
      }

      function handleParallax() {

        if (section.classList.contains('in-view')) {
          animateElements(parallaxElements);
        }
      }

      createObserver([section], handleInstersection, {
        root: null,
        rootMargin: "0px",
        threshold: .1
      });

      window.addEventListener('scroll', handleParallax);
    
    }

    observeProductSections();
    changeProductSectionState();
    nav();
    introduceElements();
    parallax('.sf-hero');

  });

})(jQuery, this);