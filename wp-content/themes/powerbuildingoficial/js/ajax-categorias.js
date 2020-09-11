jQuery(document).ready(function($) {
    var cadena='';
    var cat='';
    $('#ajax-form').submit(function(e){
                 e.preventDefault();
         jQuery.post(MyAjax.url, {action : 'buscar_posts' ,cadena : $('#cadena').val(),cat : $('#cat').val() }, function(response) {
                $('#posts_container').hide().html(response).fadeIn();
            });
    });
         
});
