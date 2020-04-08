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

			hide_all(box_types)
			$('#candidat_details_' + $('#candidat_type').get(0).value).show()

			$('#candidat_type').change(function () {
				hide_all(box_types)
				$('#candidat_details_' + this.value).show()
			})

		}

		$('.color-field')
				.wpColorPicker({
					change: function (event, ui) {
						console.log(event, ui)
					}
				})
	})
})( jQuery );
