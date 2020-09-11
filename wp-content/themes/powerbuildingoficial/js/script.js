(function($){

	$(document).on('click','.more-link',function(e){
	 	e.preventDefault();
	 	link = $(this);
	 	id   = link.attr('href').replace(/^.*#more-/,'');

		$.ajax({
			url : dcms_vars.ajaxurl,
			type: 'product',
			data: {
				action : 'dcms_ajax_readmore',
				id_post: id
			},
			beforeSend: function(){
				link.html('Cargando ...');
			},
			success: function(resultado){
				 $('#post-'+id).find('.entry-content').html(resultado);		
			}

		});

	});

})(jQuery);
