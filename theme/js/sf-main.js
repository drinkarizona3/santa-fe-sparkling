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
        elementsToChange = ['#sf-background', '#navbar'],
        navbar = document.querySelector('#navbar'),
        sections = document.querySelectorAll('.sf-flavor, #sf-social, #sf-intro'),
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

              console.log(entry.target)

              if (entry.target.id === 'sf-intro') {
                $body.addClass('scrolled-intro');
              } else {
                $body.removeClass('scrolled-intro');
              }

              elementsToChange.forEach( (selector, i) => {

                const element = document.querySelector(selector);

                element.setAttribute('data-sf-theme', flavorHandle);

                element.classList.add('sf-animate');

                setTimeout( () => element.classList.remove('sf-animate'), 800)
              });
            }
          });
        };

      sections.forEach( flavor => {
        const observer = new IntersectionObserver(callback, options);
        observer.observe(flavor);
      });
    }

    observeSections();

  });

})(jQuery, this);