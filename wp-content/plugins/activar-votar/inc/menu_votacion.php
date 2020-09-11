<?php

load_plugin_textdomain('votaciones', false, basename( dirname( __FILE__ ) ) . '' );
global $version;
$version = "1.0";

add_action( 'admin_menu', 'votar_create_admin_menu'); 
function votar_create_admin_menu() { 
 add_menu_page ( 'Activar Votaciones', 'Activar Votaciones', 'manage_options', 'votar_create_admin_menu_plugin', 'activar_pagina_de_opciones', '
dashicons-yes' );

}

function activar_pagina_de_opciones(){

    echo("<div class='wrap'><h2>Activar Votaciones</h2></div>");
    echo("<div class='wrap'><br></div>");

    if(isset($_POST['action']) && $_POST['action'] == "salvaropciones"){
        update_option('activar_activar_votacion',$_POST['activar_votacion']);
        update_option('activar_fecha_votacion',$_POST['fecha_votacion']);        

        echo("<div class='updated message' style='padding: 10px'>Opciones guardadas.</div>");
    }
 ?>

    <form method='post'>
        <input type='hidden' name='action' value='salvaropciones'>
        <table>
            <tr>
                <td>
                    <label for='cabecera'>Activar votación</label>
                </td>
                
                <td>
                   <?php
                     $bases=get_option('activar_activar_votacion');
                     if ($bases == 'Si') {
                         echo '<input type="checkbox" class="checkboxes" name="activar_votacion" id="activar_votacion" value="No" checked><span class="tooltiptext">';
                     }
                     else{
                        echo '<input type="checkbox" class="checkboxes" name="activar_votacion" id="activar_votacion" value="Si" ><span class="tooltiptext">';
                     }
                   ?>                     
                </td>
            </tr>  
            <tr><td><br></td></tr>          
            <tr>
                <td>
                    <label for='cabecera'>Fecha Votación</label>
                </td>
                <td>
                    <input type='date' name='fecha_votacion' id='fecha_votacion' value='<?=get_option('activar_fecha_votacion')?>'>
                </td>
            </tr>
            <tr><td><br></td></tr>           
            <tr>
                <td colspan='2'>
                    <input class="button-primary" type='submit' value='Guardar'>
                </td>
            </tr>
        </table>
    </form>
 <?php


  }








 
?>