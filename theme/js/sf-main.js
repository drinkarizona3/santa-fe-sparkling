(function($, root, undefined) { 

  'use strict';

  $(function() {
    
    const loadingWait = 1500;

    $body.addClass('sf-end-intro');

    $(window).on('load', ()=> {
      const $body = $('body');
      setTimeout( () => $body.addClass('sf-end-intro'), loadingWait);
      setTimeout( () => $body.addClass('sf-loaded'), loadingWait * 1.5 );
    });

  });

})(jQuery, this);