(function( $ ) {
	'use strict';

	$(document).ready(function () {

		const restURL = $('.multimedialpes-candidatures').data('rest-url')
		$('.js-multimedialpes-view').click(function (ev) {
			ev.preventDefault()
			const url = this.href
			const $modalWrapper = $('#candidate-modal-wrapper')
			const $modal = $('#candidate-modal')
			$modalWrapper.addClass('visible')
			$.ajax({
				url
			}).done(data => {
				const resultPage = $.parseHTML(data)
				$modal.html($(resultPage).find('[data-api]').html())
			})
		})

		$('#candidate-modal-wrapper').click(function (ev) {
			if (ev.target === this) {
				$(this).removeClass('visible')
			}
		})

		$('.multimedialpes-filter-btn').click(function (ev) {
			ev.preventDefault()

			const selector = this.dataset.filter === "*" ? '' : this.dataset.filter
			$('.multimedialpes_card').hide()
			$('.multimedialpes_card' + selector).show()
		})

	})


})( jQuery );
