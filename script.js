$(document).ready(function() {

	/* Isotope */

	// initialize isotope
	var $containerBooks = $('#books');
	var $containerIndex = $('#index');
	$containerBooks.delay(0).show().css({ opacity: 0 }).animate({ opacity: 1 }, 800 ).isotope();
	$containerIndex.isotope();	

	// books ordered
	$('#books-filter a').click(function() {
		// remove all class active
		$('#books-filter a').removeClass('active');

		// add class active in clicked link
		$(this).addClass('active');

		if ( $(this).hasClass('date') ) {
			$('#authors').hide();
			$('#books, #author-filtrated').fadeIn();
			$('#pagination').fadeIn();

			var selector = $(this).attr('data-filter');
			$containerBooks.isotope({ filter: selector });
			return false;		
		} 

		if ( $(this).hasClass('author') ) {
			$('#books, #author-filtrated, #pagination').hide();
			$('#authors').fadeIn();

			$containerIndex.isotope({ filter: selector });
			return false;
		}		
	});

	

	/* Lightbox */

	if( $(window).width() > 600 ) {
		// add attr to links
		$('#books a').addClass('lightbox');
		$('#books a').attr({ 'data-fancybox-type':'iframe'/*, 'rel':'books'*/});

		// add function lightbox
		$('#books .lightbox').fancybox({
			width		: '1000px',
			height		: '540px',
			autoSize	: false,
			fitToView	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			padding		: 0,
			title		: null
		});
	}



	/* Order Author */

	var authorsLi = '';

	// Create each for all list 	
	$('#authors-list li').each(function( li ) {
		
		// Recive element a item
		authorsLi = $(this);

		$.each([ 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z' ], function( alphabetic, letter ) {
			// Check first letter of iten and put to #indexL
			if ( authorsLi.text().charAt(0) == letter ) {
				$('#index-'+letter).append( authorsLi );
			}
		}); // and each Alphabetic
	}); // and each #authors-List li




	/* Remove Duplicte List in Author */

	var liText = '', liList = $('.col li'), listForRemove = [];

	$(liList).each(function () {
		var text = $(this).text();
			if (liText.indexOf('|'+ text + '|') == -1) {
				liText += '|'+ text + '|';
			} else {
				listForRemove.push($(this));
			}
	});

	$(listForRemove).each(function () { $(this).remove(); });



	/* Single */
	$('.single .download').click(function() {
		// To work for new tab and close popup
		setTimeout(function() { parent.$.fancybox.close(); });
	});
	

/*
$('.book img').lazy({
	effect: "fadeIn",
	effectTime: 200
});
*/

}); // end Jquery