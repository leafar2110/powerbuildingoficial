 function objetoAjax(){
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) { 
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false; }
        } 
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
          xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    }
  
function enviarDatos(){ 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
 //recogemos los valores de los inputs
  var link_form=document.fvalida.link_form.value;
  //duracion=document.fvalida.duracion.value;
  categoria=document.fvalida.categoria.value;
  buscar=document.fvalida.buscar.value;

  $("#cargando").css("display", "inline");

    var duracion = $('[name="duracion[]"]:checked').map(function(){
      return this.value;
    }).get();
    
   
    var niveles = $('[name="niveles[]"]:checked').map(function(){
      return this.value;
    }).get();

    var objetivos = $('[name="objetivos[]"]:checked').map(function(){
      return this.value;
    }).get();    
 
    var fuerza = $('[name="fuerza[]"]:checked').map(function(){
      
     // $('[name="estetica[]"]' ).prop("checked", false);  
      return this.value;
    }).get();
  
    var estetica = $('[name="estetica[]"]:checked').map(function(){
      return this.value;
    }).get(); 


  div = document.getElementById('hidden');
  div.style.display = 'none';
         
   //instanciamos el objetoAjax
  ajax=objetoAjax();
  var URLactual = getAbsolutePath();
  function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
  //uso del medotod POST
  //archivo que realizará la operacion
  //ajax.open("POST", "http://localhost/wp_site_powerbuilding/form/", true);
  ajax.open("POST", "https://powerbuildingoficial.com/form/", true);
  //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
    divResultado.innerHTML = ajax.responseText
      //llamar a funcion para limpiar los inputs
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
  ajax.send("duracion="+duracion+"&niveles="+niveles+"&objetivos="+objetivos+"&fuerza="+fuerza+"&estetica="+estetica+"&categoria="+categoria+"&buscar="+buscar)
 

}

function desactivar(){
  if ($(".case").length == $(".case:checked").length) {  
  } else {  
    $(".casef").prop("checked", false);  
    $('[name="fuerza[]"]' ).prop("checked", false); 
  }    
      var fuerza = 0;
      return fuerza;
}

function desactivare(){
  if ($(".casef").length == $(".casef:checked").length) {  
    //$(".case").prop("checked", true);  
  } else {  
    $(".case").prop("checked", false);  
    $('[name="estetica[]"]' ).prop("checked", false); 
  }   
      var estetica = 0;
      return estetica;
}

 function ActivarCampoOtroTema(){ 
            div = document.getElementById('filter-set');
            div.style.display = 'inline';
            div2 = document.getElementById('activo');
            div2.style.display = 'none';            
            div3 = document.getElementById('oculto');
            div3.style.display = 'block';
  }  
 function ActivarCampoOtroTemaoculto(){ 
            div = document.getElementById('filter-set');
            div.style.display = 'block';
            div2 = document.getElementById('activo');
            div2.style.display = 'block';            
            div3 = document.getElementById('oculto');
            div3.style.display = 'none';
  }


  function ActivarCampoOtroTema2(){ 
            div = document.getElementById('filter-set2');
            div.style.display = 'inline';
            div2 = document.getElementById('activo2');
            div2.style.display = 'none';            
            div3 = document.getElementById('oculto2');
            div3.style.display = 'block';
  }  
 function ActivarCampoOtroTema2oculto(){ 
            div = document.getElementById('filter-set2');
            div.style.display = 'block';
            div2 = document.getElementById('activo2');
            div2.style.display = 'block';            
            div3 = document.getElementById('oculto2');
            div3.style.display = 'none';
  }

 function ActivarCampoOtroTema3(){ 
            div = document.getElementById('filter-set3');
            div.style.display = 'inline';
            div2 = document.getElementById('activo3');
            div2.style.display = 'none';            
            div3 = document.getElementById('oculto3');
            div3.style.display = 'block';
  }  
 function ActivarCampoOtroTema3oculto(){ 
            div = document.getElementById('filter-set3');
            div.style.display = 'block';
            div2 = document.getElementById('activo3');
            div2.style.display = 'block';            
            div3 = document.getElementById('oculto3');
            div3.style.display = 'none';
  } 
   function ActivarCampoOtroTema4(){ 
            div = document.getElementById('filter-set4');
            div.style.display = 'inline';
            div2 = document.getElementById('activo4');
            div2.style.display = 'none';            
            div3 = document.getElementById('oculto4');
            div3.style.display = 'block';
  }  
 function ActivarCampoOtroTema4oculto(){ 
            div = document.getElementById('filter-set4');
            div.style.display = 'block';
            div2 = document.getElementById('activo4');
            div2.style.display = 'block';            
            div3 = document.getElementById('oculto4');
            div3.style.display = 'none';
  } 

 function ActivarCampoOtroTema5(){ 
            div = document.getElementById('filter-set5');
            div.style.display = 'inline';
            div2 = document.getElementById('activo5');
            div2.style.display = 'none';            
            div3 = document.getElementById('oculto5');
            div3.style.display = 'block';
  }  
 function ActivarCampoOtroTema5oculto(){ 
            div = document.getElementById('filter-set5');
            div.style.display = 'block';
            div2 = document.getElementById('activo5');
            div2.style.display = 'block';            
            div3 = document.getElementById('oculto5');
            div3.style.display = 'none';
  }  