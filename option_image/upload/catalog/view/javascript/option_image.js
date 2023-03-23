$(window).load(function(){
	$('input[type=radio]').on('change', function(){
		let novo = $(this).attr('src');
		$('.thumbnails li:not(.image-additional) .thumbnail img').not('.image-additional').attr('src', novo);
		$('.swiper-slide-active img').attr('src', novo);
	});
	$('input[type=radio]').on('click', function(){
		var marcador = $(this).attr('marcador');
		var irpara = '.swiper-slide[marcador='+marcador+']';
		var slide = Number($(irpara).attr('data-index'));
		var image_swiper = $('.main-image').data('swiper');
		image_swiper.slideTo(slide, 0);
	});
})
