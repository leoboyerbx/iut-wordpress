(function( $ ) {
	'use strict';

	$(document).ready(function () {
		const restURL = $('.multimedialpes-candidatures').data('rest-url')
		$('[data-candidate-id]').click(function (ev) {
			ev.preventDefault()
			const $modal = $('#candidate-modal-wrapper')
			$modal.addClass('visible')
			$.ajax({
				url: restURL+ 'cmb2/v1/boxes'
			}).done(data => {
				console.log(data)
			})
		})
	})


})( jQuery );
