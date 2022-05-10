(function ($) {

	$(document).ready(function () {

		$(document).on('click', '.button-class', function () {
			const select = $('.select_move_div').val();
			const headerHeight = $('header').height();
			if (select) {
				console.log(headerHeight);
				$('html, body').animate({
					scrollTop: $(select).offset().top - headerHeight,
				}, 1500);
			}
		});

	});

})(jQuery);
