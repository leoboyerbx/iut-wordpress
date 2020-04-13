(function( $ ) {
	'use strict';
	function hide_all(box_types) {
		box_types.map(type => {
			$('#candidat_details_'+type).hide()
		})
	}

	$(document).ready(() => {
		if($('#new_candidat_trigger').length) {
			// Si on est sur l'ajout d'un candidat
			let box_types = []
			$('#candidat_type option').each(function () {
				box_types.push(this.value)
			})
			console.log(box_types)

			hide_all(box_types)
			$('#candidat_details_' + $('#candidat_type').get(0).value).show()

			$('#candidat_type').change(function () {
				hide_all(box_types)
				$('#candidat_details_' + this.value).show()
			})
		}
		$('.edit-type').each(function () {
			const $button = $(this).find('button')
			$(this).find('select').change(() => {
				$button.css('display', 'inline-block')
			})
			$(this).find('.js-edit-color').wpColorPicker({
				change: () => {
					$button.css('display', 'inline-block')
				}
			})
		})
		$('.color-field-add').wpColorPicker({})

	})
})( jQuery );
