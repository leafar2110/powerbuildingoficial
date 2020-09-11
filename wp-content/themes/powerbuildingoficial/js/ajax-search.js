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
function ocultartienda(){
div1 = document.getElementById('content-shop');
          div1.style.display = 'none';
          $("#cargando").css("display", "inline"); 
}
function loader(){
  $("#cargando").css("display", "inline"); 
}
function ocultarblog(){
div3 = document.getElementById('tabblog');
          div3.style.display = 'none';
}

function Activarbuscaentre(){
          $("#cargando").css("display", "inline"); 
          $("#tabContent1").css("display", "none");
}

function Activarentre(){
div = document.getElementById('posts_container');
          div.style.display = 'none';
          div2 = document.getElementById('tabContent1');
          div2.style.display = 'block';	
}