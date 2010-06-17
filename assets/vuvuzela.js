jQuery(document).ready(function(){
	jQuery('#vuvupic')
		.mouseover(function(){jQuery('#nomoreplz').css({'display':'block','opacity':'0.5'})})
		.mouseout(function(){jQuery('#nomoreplz').css('display','none')})
		.click(function(){
			var today = new Date();
			today.setTime( today.getTime() );
			var expires = new Date( today.getTime() + (1000 * 60 * 60) )
			document.cookie = ['vuvuzelator', '=', 'false', ';expires=', expires].join('');
			jQuery(this).remove();
			jQuery('#vuvusound').remove();
		});
});