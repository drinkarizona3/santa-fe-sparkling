/*
 * b4st JS
 */

(function ($) {

	'use strict';

	$(document).ready(function() {

		// Comments

		$('.commentlist li').addClass('card mb-3');
		$('.comment-reply-link').addClass('btn btn-secondary');

		// Forms

		$('select, input[type=text], input[type=email], input[type=password], textarea').addClass('form-control');
		$('input[type=submit]').addClass('btn btn-primary');

		// Pagination fix for ellipsis

		$('.pagination .dots').addClass('page-link').parent().addClass('disabled');

		// You can put your own code in here

<<<<<<< HEAD
		$(window).on('load', ()=> {
			setTimeout($('body').addClass('sf-loaded'), 500);
=======
		const loadingWait = 1000;
		$(window).on('load', ()=> {
			setTimeout($('body').addClass('sf-end-intro'), loadingWait);
			setTimeout($('body').addClass('sf-loaded'), loadingWait * 1.5 );
>>>>>>> main-content
		});

	});

}(jQuery));
