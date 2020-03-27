(function( $ ) {
	'use strict';

	$(document).ready(function () {
		$('[data-candidate-id]').click(function (ev) {
			ev.preventDefault()
			const $modal = $('#candidate-modal-wrapper')
			$modal.addClass('visible')
			$.ajax()
		})
	})


})( jQuery );
