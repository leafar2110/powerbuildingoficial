<?php
   require_once trailingslashit( get_template_directory() ) . 'inc/ventas_power.php';
function powerbuildingoficial_styles(){



}

add_action('wp_enqueue_scripts', 'powerbuildingoficial_styles');



add_theme_support('post-thumbnails');

/** Nueva Navegacion **/
register_nav_menus(array(
    'menu_principal' => __('Menu Principal', 'powerbuildingoficial')
  
  ) );

//Custom login styles
function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/mystyle.css" />';
}
add_action('login_head', 'my_custom_login');



/*********Funciones de tema *****************/

 /*****Banner *******/	
function theme_customize_register($wp_customize){	
	$wp_customize->add_panel('panel1',
        array(
            'title' => 'Banner',
            'priority' => 1,
            )
        );
 
	/////Banner	1
	$wp_customize->add_section('banner1', array (
		'title' => 'Banner 1',
        'panel' => 'panel1'
	));
	
	$wp_customize->add_setting('banner1_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_titulo_control', array (
		'label' => 'Título',
		'section' => 'banner1',
		'settings' => 'banner1_titulo'
	)));
	
	$wp_customize->add_setting('banner1_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'banner1',
		'settings' => 'banner1_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('banner1_boton', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_boton_control', array (
		'label' => 'Botón',
		'section' => 'banner1',
		'settings' => 'banner1_boton'
	)));	

	$wp_customize->add_setting('banner1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner1_link_control', array (
		'label' => 'Enlace Botón',
		'section' => 'banner1',
		'settings' => 'banner1_link'
	)));	

	$wp_customize->add_setting('banner1_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner1_imagen_control', array (
		'label' => 'Imagen Desktop',
		'section' => 'banner1',
		'settings' => 'banner1_imagen'
	)));

	$wp_customize->add_setting('banner1_imagen_responsive');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner1_imagen_responsive_control', array (
		'label' => 'Imagen Responsive',
		'section' => 'banner1',
		'settings' => 'banner1_imagen_responsive'
	)));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner1_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'banner1',
		'settings' => 'banner1_imagen'
	)));

	/////Banner	2
	$wp_customize->add_section('banner2', array (
		'title' => 'Banner 2',
        'panel' => 'panel1'
	));
	
	$wp_customize->add_setting('banner2_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner2_titulo_control', array (
		'label' => 'Título',
		'section' => 'banner2',
		'settings' => 'banner2_titulo'
	)));
	
	$wp_customize->add_setting('banner2_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner2_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'banner2',
		'settings' => 'banner2_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('banner2_boton', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner2_boton_control', array (
		'label' => 'Botón',
		'section' => 'banner2',
		'settings' => 'banner2_boton'
	)));	

	$wp_customize->add_setting('banner2_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner2_link_control', array (
		'label' => 'Enlace Botón',
		'section' => 'banner2',
		'settings' => 'banner2_link'
	)));

	$wp_customize->add_setting('banner2_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner2_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'banner2',
		'settings' => 'banner2_imagen'
	)));

	/////Banner	3
	$wp_customize->add_section('banner3', array (
		'title' => 'Banner 3',
        'panel' => 'panel1'
	));
	
	$wp_customize->add_setting('banner3_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner3_titulo_control', array (
		'label' => 'Título',
		'section' => 'banner3',
		'settings' => 'banner3_titulo'
	)));
	
	$wp_customize->add_setting('banner3_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner3_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'banner3',
		'settings' => 'banner3_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('banner3_boton', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner3_boton_control', array (
		'label' => 'Botón',
		'section' => 'banner3',
		'settings' => 'banner3_boton'
	)));	

	$wp_customize->add_setting('banner3_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'banner3_link_control', array (
		'label' => 'Enlace Botón',
		'section' => 'banner3',
		'settings' => 'banner3_link'
	)));

	$wp_customize->add_setting('banner3_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner3_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'banner3',
		'settings' => 'banner3_imagen'
	)));




  /***** Powerbuilding Masthead *******/

	$wp_customize->add_panel('panel2',
        array(
            'title' => 'Powerbuilding Masthead',
            'priority' => 2,
            )
        ); 

	/////powerbuilding-masthead1
	$wp_customize->add_section('powerbuilding-masthead1', array (
		'title' => 'Powerbuilding Masthead 1',
        'panel' => 'panel2'
	));
	
	$wp_customize->add_setting('powerbuilding-masthead1_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'powerbuilding-masthead1_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'powerbuilding-masthead1',
		'settings' => 'powerbuilding-masthead1_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('powerbuilding-masthead1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'powerbuilding-masthead1_link_control', array (
		'label' => 'Enlace',
		'section' => 'powerbuilding-masthead1',
		'settings' => 'powerbuilding-masthead1_link'
	)));

	/////powerbuilding-masthead2
	$wp_customize->add_section('powerbuilding-masthead2', array (
		'title' => 'Powerbuilding Masthead 2',
        'panel' => 'panel2'
	));
	
	$wp_customize->add_setting('powerbuilding-masthead2_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'powerbuilding-masthead2_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'powerbuilding-masthead2',
		'settings' => 'powerbuilding-masthead2_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('powerbuilding-masthead2_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'powerbuilding-masthead2_link_control', array (
		'label' => 'Enlace',
		'section' => 'powerbuilding-masthead2',
		'settings' => 'powerbuilding-masthead2_link'
	)));

	/////powerbuilding-masthead3  
	$wp_customize->add_section('powerbuilding-masthead3', array (
		'title' => 'Powerbuilding Masthead 3',
        'panel' => 'panel2'
	));
	
	$wp_customize->add_setting('powerbuilding-masthead3_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'powerbuilding-masthead3_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'powerbuilding-masthead3',
		'settings' => 'powerbuilding-masthead3_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('powerbuilding-masthead3_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'powerbuilding-masthead3_link_control', array (
		'label' => 'Enlace',
		'section' => 'powerbuilding-masthead3',
		'settings' => 'powerbuilding-masthead3_link'
	)));


  /*****Become Powerbuilder *******/	
	$wp_customize->add_panel('panel3',
        array(
            'title' => 'Become Powerbuilder',
            'priority' => 3,
            )
        );  
	/////become-powerbuilder1
	$wp_customize->add_section('become-powerbuilder1', array (
		'title' => 'Become Powerbuilder 1',
        'panel' => 'panel3'
	));
	
	$wp_customize->add_setting('become-powerbuilder1_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'become-powerbuilder1_titulo_control', array (
		'label' => 'Título',
		'section' => 'become-powerbuilder1',
		'settings' => 'become-powerbuilder1_titulo'
	)));
	
	$wp_customize->add_setting('become-powerbuilder1_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'become-powerbuilder1_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'become-powerbuilder1',
		'settings' => 'become-powerbuilder1_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('become-powerbuilder1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'become-powerbuilder1_link_control', array (
		'label' => 'Enlace',
		'section' => 'become-powerbuilder1',
		'settings' => 'become-powerbuilder1_link'
	)));

	$wp_customize->add_setting('become-powerbuilder1_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'become-powerbuilder1_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'become-powerbuilder1',
		'settings' => 'become-powerbuilder1_imagen'
	)));	

	/////become-powerbuilder2
	$wp_customize->add_section('become-powerbuilder2', array (
		'title' => 'Become Powerbuilder 2',
        'panel' => 'panel3'
	));
	
	$wp_customize->add_setting('become-powerbuilder2_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'become-powerbuilder2_titulo_control', array (
		'label' => 'Título',
		'section' => 'become-powerbuilder2',
		'settings' => 'become-powerbuilder2_titulo'
	)));
	
	$wp_customize->add_setting('become-powerbuilder2_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'become-powerbuilder2_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'become-powerbuilder2',
		'settings' => 'become-powerbuilder2_contenido',
		'type' => 'textarea'
	)));
    
	$wp_customize->add_setting('become-powerbuilder2_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'become-powerbuilder2_link_control', array (
		'label' => 'Enlace',
		'section' => 'become-powerbuilder2',
		'settings' => 'become-powerbuilder2_link'
	)));

	$wp_customize->add_setting('become-powerbuilder2_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'become-powerbuilder2_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'become-powerbuilder2',
		'settings' => 'become-powerbuilder2_imagen'
	)));	


  /*****Customized Service *******/	
	$wp_customize->add_panel('panel4',
        array(
            'title' => 'Customized Service',
            'priority' => 4,
            )
        );  
	/////customized-service1
	$wp_customize->add_section('customized-service1', array (
		'title' => 'Customized Service 1',
        'panel' => 'panel4'
	));
	
	$wp_customize->add_setting('customized-service1_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service1_titulo_control', array (
		'label' => 'Título',
		'section' => 'customized-service1',
		'settings' => 'customized-service1_titulo'
	)));	
    
	$wp_customize->add_setting('customized-service1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service1_link_control', array (
		'label' => 'Enlace',
		'section' => 'customized-service1',
		'settings' => 'customized-service1_link'
	)));

	$wp_customize->add_setting('customized-service1_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customized-service1_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'customized-service1',
		'settings' => 'customized-service1_imagen'
	)));	

	/////customized-service2
	$wp_customize->add_section('customized-service2', array (
		'title' => 'Customized Service 2',
        'panel' => 'panel4'
	));
	
	$wp_customize->add_setting('customized-service2_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service2_titulo_control', array (
		'label' => 'Título',
		'section' => 'customized-service2',
		'settings' => 'customized-service2_titulo'
	)));
    
	$wp_customize->add_setting('customized-service2_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service2_link_control', array (
		'label' => 'Enlace',
		'section' => 'customized-service2',
		'settings' => 'customized-service2_link'
	)));

	$wp_customize->add_setting('customized-service2_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customized-service2_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'customized-service2',
		'settings' => 'customized-service2_imagen'
	)));		

	/////customized-service 3

	$wp_customize->add_section('customized-service3', array (
		'title' => 'Customized Service 3',
        'panel' => 'panel4'
	));
	
	$wp_customize->add_setting('customized-service3_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service3_titulo_control', array (
		'label' => 'Título',
		'section' => 'customized-service3',
		'settings' => 'customized-service3_titulo'
	)));
    
	$wp_customize->add_setting('customized-service3_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service3_link_control', array (
		'label' => 'Enlace',
		'section' => 'customized-service3',
		'settings' => 'customized-service3_link'
	)));

	$wp_customize->add_setting('customized-service3_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customized-service3_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'customized-service3',
		'settings' => 'customized-service3_imagen'
	)));	

	/////customized-service 4

	$wp_customize->add_section('customized-service4', array (
		'title' => 'Customized Service 4',
        'panel' => 'panel4'
	));
	
	$wp_customize->add_setting('customized-service4_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service4_titulo_control', array (
		'label' => 'Título',
		'section' => 'customized-service4',
		'settings' => 'customized-service4_titulo'
	)));
    
	$wp_customize->add_setting('customized-service4_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'customized-service4_link_control', array (
		'label' => 'Enlace',
		'section' => 'customized-service4',
		'settings' => 'customized-service4_link'
	)));

	$wp_customize->add_setting('customized-service4_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customized-service4_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'customized-service4',
		'settings' => 'customized-service4_imagen'
	)));


  /***** Workmode *******/	
	$wp_customize->add_panel('panel5',
        array(
            'title' => 'Workmode',
            'priority' => 5,
            )
        );  
	/////workmode1
	$wp_customize->add_section('workmode1', array (
		'title' => 'Workmode',
        'panel' => 'panel5'
	));
	
	$wp_customize->add_setting('workmode1_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'workmode1_titulo_control', array (
		'label' => 'Título',
		'section' => 'workmode1',
		'settings' => 'workmode1_titulo'
	)));
    
	$wp_customize->add_setting('workmode1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'workmode1_link_control', array (
		'label' => 'Enlace',
		'section' => 'workmode1',
		'settings' => 'workmode1_link'
	)));

	$wp_customize->add_setting('workmode1_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'workmode1_imagen_control', array (
		'label' => 'Imagen Fondo',
		'section' => 'workmode1',
		'settings' => 'workmode1_imagen'
	)));	

  /***** WE-ARE-A-MOVEMENT *******/	
	$wp_customize->add_panel('panel6',
        array(
            'title' => 'We are a movement',
            'priority' => 6,
            )
        );  
	/////we-are-a-movement1
	$wp_customize->add_section('we-are-a-movement1', array (
		'title' => 'we-are-a-movement',
        'panel' => 'panel6'
	));
	
	$wp_customize->add_setting('we-are-a-movement1_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'we-are-a-movement1_titulo_control', array (
		'label' => 'Título',
		'section' => 'we-are-a-movement1',
		'settings' => 'we-are-a-movement1_titulo'
	)));
    
	$wp_customize->add_setting('we-are-a-movement1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'we-are-a-movement1_link_control', array (
		'label' => 'Enlace',
		'section' => 'we-are-a-movement1',
		'settings' => 'we-are-a-movement1_link'
	)));


 /*****Banner Votaciones *******/	

	$wp_customize->add_panel('panel7',
        array(
            'title' => 'Votaciones',
            'priority' => 7,
            )
        );
 
	/////Banner	1
	$wp_customize->add_section('vota_banner1', array (
		'title' => 'Banner 1',
        'panel' => 'panel7'
	));
	
	$wp_customize->add_setting('vota_banner1_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner1_titulo_control', array (
		'label' => 'Título',
		'section' => 'vota_banner1',
		'settings' => 'vota_banner1_titulo'
	)));
	
	$wp_customize->add_setting('vota_banner1_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner1_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'vota_banner1',
		'settings' => 'vota_banner1_contenido',
		'type' => 'textarea'
	)));

	$wp_customize->add_setting('vota_banner1_boton', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner1_boton_control', array (
		'label' => 'Botón',
		'section' => 'vota_banner1',
		'settings' => 'vota_banner1_boton'
	)));	

	$wp_customize->add_setting('vota_banner1_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner1_link_control', array (
		'label' => 'Enlace Botón',
		'section' => 'vota_banner1',
		'settings' => 'vota_banner1_link'
	)));	
    
	$wp_customize->add_setting('vota_banner1_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'vota_banner1_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'vota_banner1',
		'settings' => 'vota_banner1_imagen'
	)));

	/////Banner	2
	$wp_customize->add_section('vota_banner2', array (
		'title' => 'Banner 2',
        'panel' => 'panel7'
	));
	
	$wp_customize->add_setting('vota_banner2_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner2_titulo_control', array (
		'label' => 'Título',
		'section' => 'vota_banner2',
		'settings' => 'vota_banner2_titulo'
	)));
	
	$wp_customize->add_setting('vota_banner2_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner2_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'vota_banner2',
		'settings' => 'vota_banner2_contenido',
		'type' => 'textarea'
	)));

	$wp_customize->add_setting('vota_banner2_boton', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner2_boton_control', array (
		'label' => 'Botón',
		'section' => 'vota_banner2',
		'settings' => 'vota_banner2_boton'
	)));	

	$wp_customize->add_setting('vota_banner2_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner2_link_control', array (
		'label' => 'Enlace Botón',
		'section' => 'vota_banner2',
		'settings' => 'vota_banner2_link'
	)));	
    
	$wp_customize->add_setting('vota_banner2_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'vota_banner2_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'vota_banner2',
		'settings' => 'vota_banner2_imagen'
	)));

	/////Banner	3
	$wp_customize->add_section('vota_banner3', array (
		'title' => 'Banner 3',
        'panel' => 'panel7'
	));
	
	$wp_customize->add_setting('vota_banner3_titulo', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner3_titulo_control', array (
		'label' => 'Título',
		'section' => 'vota_banner3',
		'settings' => 'vota_banner3_titulo'
	)));
	
	$wp_customize->add_setting('vota_banner3_contenido', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner3_contenido_control', array (
		'label' => 'Contenido',
		'section' => 'vota_banner3',
		'settings' => 'vota_banner3_contenido',
		'type' => 'textarea'
	)));

	$wp_customize->add_setting('vota_banner3_boton', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner3_boton_control', array (
		'label' => 'Botón',
		'section' => 'vota_banner3',
		'settings' => 'vota_banner3_boton'
	)));	

	$wp_customize->add_setting('vota_banner3_link', array(
		'default' => ''
	));
	
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'vota_banner3_link_control', array (
		'label' => 'Enlace Botón',
		'section' => 'vota_banner3',
		'settings' => 'vota_banner3_link'
	)));	
    
	$wp_customize->add_setting('vota_banner3_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'vota_banner3_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'vota_banner3',
		'settings' => 'vota_banner3_imagen'
	)));

	
	/////Publicidad
	$wp_customize->add_section('publicidad', array (
		'title' => 'Publicidad',
        'panel' => 'panel7'
	));
	
	$wp_customize->add_setting('publicidad_imagen');
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'publicidad_imagen_control', array (
		'label' => 'Imagen',
		'section' => 'publicidad',
		'settings' => 'publicidad_imagen'
	)));	

}	
add_action('customize_register','theme_customize_register');


// Register Custom Post Type

$url="http://localhost/wp_site_powerbuilding/wp-admin/";


/*********** PUBLICACIÓN ***********/
function custom_post_type_publicacions() {

	$labels = array(
		'name'                  => _x( 'Publicaciones', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Publicaciones', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Publicaciones', 'text_domain' ),
		'name_admin_bar'        => __( 'Publicaciones', 'text_domain' ),
		'archives'              => __( 'Archivos del artículo', 'text_domain' ),
		'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Buscar artículo', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Publicacions', 'text_domain' ),
		'description'           => __( 'Publicacions image', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => '' . get_stylesheet_directory_uri() . '/images/production/ico-powerbuilding.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page', 
	);
	register_post_type( 'publicacions', $args );

}
add_action( 'init', 'custom_post_type_publicacions', 0 );


/****************Modificando Colummnas Admin Posts ****************************/


function my_theme_columns_head($defaults) {
    $defaults['publicacion'] = 'Publicación';
    return $defaults;
}
add_filter('manage_publicacions_posts_columns', 'my_theme_columns_head');

 
function fill_publicacions_posts_columns( $column_name, $post_id ) {
    
    $publicacion_meta = get_post_meta($post_id);    
 
    switch( $column_name ):            

        case 'publicacion':
            $post_id = $publicacion_meta['publicacion'][0];
            $queried_post_img = get_post($post_id);
            $imagen_publicacion = $queried_post_img->guid;
            echo "<a href='$imagen_publicacion' target='_blank'><img src='$imagen_publicacion' height='80' width='110'></a>";

            break;

    endswitch;
    
}
add_action( 'manage_publicacions_posts_custom_column', 'fill_publicacions_posts_columns', 10, 2 );



  // Products

  // Ocultar algunas columnas en el listado de productos

add_filter( 'manage_edit-product_columns', 'dpw_change_product_columns',10, 1 );

function dpw_change_product_columns( $columns ) {

  	unset($columns['taxonomy-duracion']); 
  	unset($columns['taxonomy-objetivos']); 
  	unset($columns['taxonomy-niveles']); 
  	unset($columns['taxonomy-fuerza']);
  	unset($columns['taxonomy-estetica']);  
  	unset($columns['taxonomy-entrenamientos']);


	return $columns;

}

/*********** VENDEDORES ***********/
function custom_post_type_vendedor() {

  $labels = array(
    'name'                  => _x( 'Vendedores', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Vendedores', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Vendedores', 'text_domain' ),
    'name_admin_bar'        => __( 'Vendedores', 'text_domain' ),
    'archives'              => __( 'Archivos del artículo', 'text_domain' ),
    'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
    'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
    'all_items'             => __( 'Vendedores Power', 'text_domain' ),
    'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
    'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
    'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
    'edit_item'             => __( 'Editar artículo', 'text_domain' ),
    'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
    'view_items'            => __( 'Ver artículos', 'text_domain' ),
    'search_items'          => __( 'Buscar artículo', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
    'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
    'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
    'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
    'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
    'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
    'items_list'            => __( 'Lista de artículos', 'text_domain' ),
    'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
    'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Vendedor', 'text_domain' ),
    'description'           => __( 'Vendedor image', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title', '', '', 'custom-fields' ),
    'taxonomies'            => array( ''),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => 'ventas_create_admin_menu',
    'menu_position'         => 5,
    'menu_icon'             => '' . get_stylesheet_directory_uri() . '/images/production/ico-powerbuilding.png',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'vendedor', $args );

}
add_action( 'init', 'custom_post_type_vendedor', 0 );



/*********** ENTRENADORES ***********/
function custom_post_type_entrenador() {

	$labels = array(
		'name'                  => _x( 'Biografía', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Biografía', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Biografía', 'text_domain' ),
		'name_admin_bar'        => __( 'Biografía', 'text_domain' ),
		'archives'              => __( 'Archivos del artículo', 'text_domain' ),
		'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Buscar artículo', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Entrenador', 'text_domain' ),
		'description'           => __( 'Entrenador image', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( ''),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => '' . get_stylesheet_directory_uri() . '/images/production/ico-powerbuilding.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'entrenador', $args );

}
add_action( 'init', 'custom_post_type_entrenador', 0 );

/*********** CUESTIONARIOS ENTRENAMIENTOS ***********/ 
function custom_post_type_cuestionarios_entre() {

	$labels = array(
		'name'                  => _x( 'Cuestionarios Entrenamientos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Cuestionarios Entrenamientos', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cuestionarios Entre', 'text_domain' ),
		'name_admin_bar'        => __( 'Cuestionarios Entrenamientos', 'text_domain' ),
		'archives'              => __( 'Archivos del artículo', 'text_domain' ),
		'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Buscar artículo', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Cuestionarios Entrenamientos', 'text_domain' ),
		'description'           => __( 'Cuestionarios Entrenamientos image', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => '' . get_stylesheet_directory_uri() . '/images/production/ico-powerbuilding.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page', 
	);
	register_post_type( 'cuestionarios_entre', $args );

}
add_action( 'init', 'custom_post_type_cuestionarios_entre', 0 );

 // Columns Cuestionarios Entrenamientos

// cuestionarios Entrenamientos
function my_theme_columns_head_entre($defaults) {
	unset($defaults['tags']);
	unset($defaults['categories']);
	$defaults['Entrenador'] = 'Entrenador';
    $defaults['Estado'] = 'Estado';
    $defaults['Entrenamiento'] = 'Plan Entrenamiento';    
    return $defaults;
}
add_filter('manage_cuestionarios_entre_posts_columns', 'my_theme_columns_head_entre');

 
function fill_cuestionarios_entre_posts_columns( $column_name, $post_id ) {
    
    $publicacion_meta = get_post_meta($post_id);    
    $plan_entrenamiento1= NULL;
    $post_id_entrenamiento = NULL;
     $post_id3 = NULL;
    switch( $column_name ):  

        case 'Entrenador':
            
            $post_id1 = $publicacion_meta['producto_id_entre'][0];
            $post_id3 = meta_value( 'entrenador',  $post_id1 );
            $queried_post_entrenador = get_post($post_id3);
            $entrenador = $queried_post_entrenador->post_title;  
            if (  $post_id3 != NULL) {
            	echo "$entrenador"; 
            }
            if (  $post_id3 == NULL) {
            	echo "Ninguno"; 
            }                     
            break;                

        case 'Estado':
            $post_id_estado = $publicacion_meta['estado_entre'][0];
            if($post_id_estado == NULL){ $post_id_estado = "POR REVISAR"; }
            echo "$post_id_estado";
           break;

        case 'Entrenamiento':
            
            $post_id_entrenamiento = $publicacion_meta['archivo_plan_de_entrenamiento'][0];
            $queried_id_entrenamiento = get_post($post_id_entrenamiento);
            $plan_entrenamiento = $queried_id_entrenamiento->guid;
            if ($post_id_entrenamiento != NULL) {
            	$plan_entrenamiento1 = "Ver Plan";
            }
            echo "<a href='$plan_entrenamiento' target='_blank'>$plan_entrenamiento1</a>";            
            break;         

    endswitch;    
}
add_action( 'manage_cuestionarios_entre_posts_custom_column', 'fill_cuestionarios_entre_posts_columns', 10, 2 );


/*********** CUESTIONARIOS DIETA ***********/ 
function custom_post_type_cuestionarios_dieta() {

	$labels = array(
		'name'                  => _x( 'Cuestionarios Dieta', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Cuestionarios Dieta', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cuestionarios Dieta', 'text_domain' ),
		'name_admin_bar'        => __( 'Cuestionarios Dieta', 'text_domain' ),
		'archives'              => __( 'Archivos del artículo', 'text_domain' ),
		'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Buscar artículo', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Cuestionarios Dieta', 'text_domain' ),
		'description'           => __( 'Cuestionarios Dieta image', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => '' . get_stylesheet_directory_uri() . '/images/production/ico-powerbuilding.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page', 
	);
	register_post_type( 'cuestionarios_dieta', $args );

}
add_action( 'init', 'custom_post_type_cuestionarios_dieta', 0 );

 // Columns Cuestionarios Dieta

// cuestionarios Dieta
function my_theme_columns_head_dieta($defaults) {
	unset($defaults['tags']);
	unset($defaults['categories']);
	$defaults['Entrenador'] = 'Entrenador';
    $defaults['Estado'] = 'Estado';
    $defaults['Alimentacion'] = 'Plan Alimentación';    
    return $defaults;
}
add_filter('manage_cuestionarios_dieta_posts_columns', 'my_theme_columns_head_dieta');

 
function fill_cuestionarios_dieta_posts_columns( $column_name, $post_id ) {
    
    $publicacion_meta = get_post_meta($post_id);    
    
    switch( $column_name ):  

        case 'Entrenador':
            
            $post_id1 = $publicacion_meta['producto_id'][0];
            $post_id3 = meta_value( 'entrenador',  $post_id1 );
            $queried_post_entrenador = get_post($post_id3);
            $entrenador = $queried_post_entrenador->post_title; 
            if ( $post_id3 != NULL) {
             	echo "$entrenador";
             } 
            if ( $post_id3 == NULL) {
             	echo "Ninguno";
             }             
                      
            break;                

        case 'Estado':
            $post_id_estado = $publicacion_meta['estado_dieta'][0];
            if($post_id_estado == NULL){ $post_id_estado = "POR REVISAR"; }
            echo "$post_id_estado";
           break;

        case 'Alimentacion':
            $plan_alimentacion1= NULL;
            $post_id_alimentacion = $publicacion_meta['archivo_plan_de_alimentacion'][0];
            $queried_id_alimentacion = get_post($post_id_alimentacion);
            $plan_alimentacion = $queried_id_alimentacion->guid;
            if ($post_id_alimentacion != NULL) {
            	$plan_alimentacion1 = "Ver Plan";
            }
            echo "<a href='$plan_alimentacion' target='_blank'>$plan_alimentacion1</a>";            
            break;         

    endswitch;    
}
add_action( 'manage_cuestionarios_dieta_posts_custom_column', 'fill_cuestionarios_dieta_posts_columns', 10, 2 );



/*********** TESTIMONIALS ***********/
function custom_post_type_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonios', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonios', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonios', 'text_domain' ),
		'archives'              => __( 'Archivos del artículo', 'text_domain' ),
		'attributes'            => __( 'Atributos del artículo', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal:', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir artículo nuevo', 'text_domain' ),
		'add_new'               => __( 'Añadir nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Buscar artículo', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'No se encuentra en la basura', 'text_domain' ),
		'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Lista de artículos de navegación', 'text_domain' ),
		'filter_items_list'     => __( 'Filtro lista artículos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'text_domain' ),
		'description'           => __( 'Testimonials image', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => '' . get_stylesheet_directory_uri() . '/images/production/ico-powerbuilding.png',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Testimonials', $args );

}
add_action( 'init', 'custom_post_type_testimonials', 0 );

/*******************Taxonomy Products *****************/

// Register Duración Custom Taxonomy
function duracion_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Duración', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Duración', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Duración', 'text_domain' ),
		'all_items'                  => __( 'Todas las Duraciones', 'text_domain' ),
		'parent_item'                => __( 'Parent Duración', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Duración:', 'text_domain' ),
		'new_item_name'              => __( 'Nueva Duración', 'text_domain' ),
		'add_new_item'               => __( 'Agregar Nueva Duración', 'text_domain' ),
		'edit_item'                  => __( 'Editar Duración', 'text_domain' ),
		'update_item'                => __( 'Actualizar Duración', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Buscar Duración', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'duracion', array( 'product' ), $args );
}
add_action( 'init', 'duracion_taxonomy', 0 );

// Register Niveles Custom Taxonomy
function niveles_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Niveles', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Niveles', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Niveles', 'text_domain' ),
		'all_items'                  => __( 'Todas los Niveles', 'text_domain' ),
		'parent_item'                => __( 'Parent Niveles', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Niveles:', 'text_domain' ),
		'new_item_name'              => __( 'Nueva Nivel', 'text_domain' ),
		'add_new_item'               => __( 'Agregar Nuevo Nivel', 'text_domain' ),
		'edit_item'                  => __( 'Editar Nivel', 'text_domain' ),
		'update_item'                => __( 'Actualizar Nivel', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Buscar Niveles', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'niveles', array( 'product' ), $args );
}
add_action( 'init', 'niveles_taxonomy', 0 );

// Register Objetivos Custom Taxonomy
function objetivos_taxonomy() {

	$labels = array(
		'name'                       => _x( 'objetivos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'objetivos', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'objetivos', 'text_domain' ),
		'all_items'                  => __( 'Todas los objetivos', 'text_domain' ),
		'parent_item'                => __( 'Parent objetivos', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent objetivos:', 'text_domain' ),
		'new_item_name'              => __( 'Nueva Objetivo', 'text_domain' ),
		'add_new_item'               => __( 'Agregar Nuevo Objetivo', 'text_domain' ),
		'edit_item'                  => __( 'Editar Objetivo', 'text_domain' ),
		'update_item'                => __( 'Actualizar Objetivo', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Buscar objetivos', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'objetivos', array( 'product' ), $args );
}
add_action( 'init', 'objetivos_taxonomy', 0 );


// Register Fuerza Custom Taxonomy

function fuerza_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Especialidad Fuerza', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Especialidad Fuerza', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Especialidad Fuerza', 'text_domain' ),
		'all_items'                  => __( 'Todas los Especialidades Fuerza', 'text_domain' ),
		'parent_item'                => __( 'Parent Especialidad Fuerza', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Especialidad Fuerza:', 'text_domain' ),
		'new_item_name'              => __( 'Nueva Especialidad Fuerza', 'text_domain' ),
		'add_new_item'               => __( 'Agregar Nueva Especialidad Fuerza', 'text_domain' ),
		'edit_item'                  => __( 'Editar Especialidad Fuerza', 'text_domain' ),
		'update_item'                => __( 'Actualizar Especialidad Fuerza', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Buscar Especialidad Fuerza', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'fuerza', array( 'product' ), $args );
}
add_action( 'init', 'fuerza_taxonomy', 0 );


// Register Estética Custom Taxonomy
function estetica_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Especiales Estética', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Especiales Estética', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Especiales Estética', 'text_domain' ),
		'all_items'                  => __( 'Todas las Especiales Estética', 'text_domain' ),
		'parent_item'                => __( 'Parent Especiales Estética', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Especiales Estética:', 'text_domain' ),
		'new_item_name'              => __( 'Nueva Especial Estética', 'text_domain' ),
		'add_new_item'               => __( 'Agregar Nuevos Especiales Estética', 'text_domain' ),
		'edit_item'                  => __( 'Editar Especiales Estética', 'text_domain' ),
		'update_item'                => __( 'Actualizar Especiales Estética', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Buscar Especiales Estética', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'estetica', array( 'product' ), $args );
}
add_action( 'init', 'estetica_taxonomy', 0 );

// Register Entrenamientos Custom Taxonomy 
function entrenamientos_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Entrenamientos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Entrenamientos', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Entrenamientos', 'text_domain' ),
		'all_items'                  => __( 'Todas los Entrenamientos', 'text_domain' ),
		'parent_item'                => __( 'Parent Entrenamientos', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Entrenamientos:', 'text_domain' ),
		'new_item_name'              => __( 'Nueva Entrenamientos', 'text_domain' ),
		'add_new_item'               => __( 'Agregar Nuevos Entrenamientos', 'text_domain' ),
		'edit_item'                  => __( 'Editar Entrenamientos', 'text_domain' ),
		'update_item'                => __( 'Actualizar Entrenamientos', 'text_domain' ),
		'view_item'                  => __( 'Ver Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Buscar Entrenamientos', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'entrenamientos', array( 'product' ), $args );
}
add_action( 'init', 'entrenamientos_taxonomy', 0 );


// Register - login

/*********** Bar ***********/

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
}


/*********** Register ***********/

add_action('wp_ajax_register_user_front_end', 'register_user_front_end', 0);
add_action('wp_ajax_nopriv_register_user_front_end', 'register_user_front_end');
function register_user_front_end() {
	$new_user_name = stripcslashes($_POST['new_user_name']);
	$new_user_email = stripcslashes($_POST['new_user_email']);
	$new_user_password = $_POST['new_user_password'];
	$password_confirm = $_POST['re_pwd'];;
	$user_nice_name = strtolower($_POST['new_user_email']);
	$user_data = array(
		'user_login' => $new_user_name,
		'user_email' => $new_user_email,
		'user_pass' => $new_user_password,
		'user_nicename' => $user_nice_name,
		'display_name' => $new_user_first_name,
		'role' => 'customer'
	);
	require_once(ABSPATH . WPINC . '/registration.php');
	if (username_exists($new_user_name)){
		error_registro()->add('usuario_repetido' , __('El usuario ya existe'));
	}

	if ($new_user_name = ''){
		error_registro()->add('usuario_vacio' , __('El usuario está vacio'));
	}

	if(!is_email($new_user_email)){
		error_registro()->add('email_invalido' , __('El email es invalido'));
	}

	if(email_exists($new_user_email)){
		error_registro()->add('email_existente' , __('El email ya existe'));
	}

	if($new_user_password != $password_confirm){
		error_registro()->add('pass_mismatch' , __('La contraseña no coincide'));
	}


	$errors = error_registro()->get_error_messages();

	if (empty($errors)){
		$user_id = wp_insert_user($user_data);
		wp_set_password($new_user_password , $user_id);
		$code = sha1( $user_id . time() );    
		global $wpdb;    
		$wpdb->update( 
			'stts_users',   
			array( 'user_activation_key' => $code, ),       
			array( 'ID' =>    $user_id ),     
			array( '%s')
		);
		$activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink(37));  
		echo 'Registro exitoso!';
	}else{
		foreach ($errors as $error) {
			echo $error;
		}
	}
	die();
}

function error_registro(){
		static $wp_error; // Will hold global variable safely
		return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
	}


/*********** Login ***********/

function ajax_login_init(){

	wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
	wp_enqueue_script('ajax-login-script');

	wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url(),
		'loadingmessage' => __('Sending user info, please wait...')
	));

		// Enable the user with no privileges to run ajax_login() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
	add_action('init', 'ajax_login_init');
}


function ajax_login(){
	// First check the nonce, if it fails the function will break
	check_ajax_referer( 'ajax-login-nonce', 'security' );

		// Nonce is checked, get the POST data and sign user on
	$info = array();
	$info['user_login'] = $_POST['username'];
	$info['user_password'] = $_POST['password'];
	$info['remember'] = true;

	$user_signon = wp_signon( $info, false );
	if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('Usuario o contraseña equivocada.')));
	} else {
		echo json_encode(array('loggedin'=>true, 'message'=>__('Logueo exitoso, redireccionando...')));
	}
	die();
}

function error_message($error){
	$error_msg = '<div class="error_msg">';
	$error_msg .= '<h1>' . $error . '</h1>' ;
	$error_msg .= '</div>';
	return $error_msg;
}

/***********LINK ****************/
function link_upload(){
	global $wpdb; 
    $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'siteurl'"); 
    foreach($result_link as $r)
    {
      $link = $r->option_value;
    }            
    $link_file .= $link;
    return $link_file;
}

/********+WOOCOMERCE *************/
function my_theme_setup() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

//Compatibilidad con galerías a partir de WooCommerce 3.0>
add_action( 'after_setup_theme', 'yourtheme_setup' );

function yourtheme_setup() {


add_theme_support( 'wc-product-gallery-slider' );
}


/**
  * Modificaciones a menu de mi cuenta
  */
 
 /** 
* Modificaciones a menu de mi cuenta 
*/
function my_account_menu_order() {
 $menuOrder = array(
 'orders'             => __( 'Tus pedidos', 'woocommerce' ),
 'downloads'          => __( 'Tus descargas', 'woocommerce' ),
 'edit-address'       => __( 'Direcciones', 'woocommerce' ),
 'edit-account'    => __( 'Mis datos', 'woocommerce' ),
 'customer-logout'    => __( 'Salir', 'woocommerce' ),
 'dashboard'          => __( 'Inicio', 'woocommerce' ),
 );
 return $menuOrder;
 }
 add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


function productos_cliente()
{
  $pedidos = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => get_current_user_id(),
        'post_type'   => wc_get_order_types(),
        'post_status' => 'wc-completed',
        'product_cat' => 'asesorias',
    ) );
   
    $cliente = wp_get_current_user();
    $idcliente = $cliente->ID;
  foreach ($pedidos as $pedido)
  {
    $wp_pedido = new WC_Order($pedido->ID);  
    $usuario = new WP_User($wp_pedido->user_id);
    $informacion_usuario = get_userdata($wp_pedido->user_id);
    $lineas_pedido = $wp_pedido->get_items();
    foreach ($lineas_pedido as $linea_pedido)
    {
          $idproducto=$linea_pedido['product_id'];
          $producto = new WC_Product($idproducto);
          $id_productos= $linea_pedido['product_id'];
          echo $id_productos; 
    }
  }     
}

/******************quitar rango de precios*****************/
 
function precio_desde( $price, $product ) {
     // Precio normal
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	$price = $prices[0] !== $prices[1] ? sprintf( __( '    %1$s ', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
     // Precio rebajado
	$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	sort( $prices );
	$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '    %1$s ', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	if ( $price !== $saleprice ) {
		$price = 5;
	}
	return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', 'precio_desde', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'precio_desde', 10, 2 );

/******************Excerp*****************/
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/***************** Short description code products*****************/

function short_description($product){
	global $wpdb;  
 
    $result_activar_votacion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$product'"); 
    foreach($result_activar_votacion as $r)
    {
            $variable = $r->post_excerpt;
    } 
	return $variable;
}
function description($product){
	global $wpdb;  
 
    $result_activar_votacion = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."posts WHERE ID = '$product'"); 
    foreach($result_activar_votacion as $r)
    {
            $variable = $r->post_content;
    } 
	return $variable;
}

/********************* Objetivos ****************************************/
function parrafos($descripcion)
{  
    $aux = str_replace ("\n", "", $descripcion); 
    $aux = str_replace ("\t", "&nbsp;&nbsp;&nbsp;", $aux); 
    $aux = str_replace (" ", "&nbsp;", $aux); 
    return $aux;
}
/********************* Conevrtir Fechas *********************************/

function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $dia.', '.$num.' de '.$mes.' del '.$anno;
}
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
} 

function dias_asesorias( $fecha_inicio, $fecha_finalizacion ){
    $fecha_inicio_a = new DateTime($fecha_inicio);
    $fecha_finalizacion_a = new DateTime($fecha_finalizacion);
    $diff = $fecha_inicio_a->diff($fecha_finalizacion_a);
    $dias_asesorias = $diff->days;
    return $dias_asesorias;	
}

function dias_asesorados( $fecha_inicio) {
	$fecha_actual=date("Y/m/d");
    $fecha_inicio_a = new DateTime($fecha_inicio);
    $fecha_actual_a = new DateTime($fecha_actual);
    $diff = $fecha_inicio_a->diff($fecha_actual_a);
    $dias_asesorados = $diff->days;
    return $dias_asesorados;
}
function progreso ( $fecha_inicio, $fecha_finalizacion ){
    $dias_asesorias = dias_asesorias( $fecha_inicio, $fecha_finalizacion);
    $dias_asesorados = dias_asesorados( $fecha_inicio );

    $semanas_asesorados = $dias_asesorados/7;
    $semanas_asesorados = number_format($semanas_asesorados,0);

    $semanas_asesorias = $dias_asesorias/7;
    $semanas_asesorias = number_format($semanas_asesorias,0);

    $progreso = ($dias_asesorados/$dias_asesorias)*100;	
    return $progreso;
}
function semanas_asesorados( $fecha_inicio, $fecha_finalizacion ){
	$dias_asesorados = dias_asesorados( $fecha_inicio);
    $semanas_asesorados = $dias_asesorados/7;
    $semanas_asesorados = number_format($semanas_asesorados,0);
    return $semanas_asesorados;
}
function semanas_asesorias( $fecha_inicio, $fecha_finalizacion ){
	$dias_asesorias = dias_asesorias( $fecha_inicio, $fecha_finalizacion );
    $semanas_asesorias = $dias_asesorias/7;
    $semanas_asesorias = number_format($semanas_asesorias,0);
    return $semanas_asesorias;
}
/***************** Meta *****************/

function meta_value( $meta_key, $post_id ){
	          global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."postmeta WHERE meta_key = '$meta_key' and post_id = '$post_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              return $value;

}
/******************** wp_woocommerce_order_items ********/ 

function woocommerce_order_items( $order_item_type, $order_id ){
	          global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_items WHERE order_item_type = 'coupon' and order_id = $order_id"); 
              foreach($result_link as $r)
              {
                      $value = $r->order_item_name;                      
              }
              return $value;

}

function woocommerce_itemrmeta_value( $meta_key, $order_item_id ){
	          global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."woocommerce_order_itemmeta WHERE meta_key = '$meta_key' and order_item_id = '$order_item_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              return $value;

}
/***************** User Meta *****************/

function usermeta_value( $meta_key, $user_id ){
	          global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."usermeta WHERE meta_key = '$meta_key' and user_id = '$user_id'"); 
              foreach($result_link as $r)
              {
                      $value = $r->meta_value;                      
              }
              return $value;

}


function my_add_woo_cat_class($classes) {
$terms = get_the_terms( $classes, 'product_cat' );
foreach ($terms as $term) {
    $product_cat_id = $term->term_id;
    break;
}
    return $classes;
}

/**************************** Limpiar espacios *******************/

 function limpia_espacios($cadena){
  $cadena = str_replace(' ', '', $cadena);
  return $cadena;
}



/********************** Download products ******************/

function get_downloadable_products() {
	$downloads = array();
	if ( $this->get_id() ) {
		$downloads = wc_get_customer_available_downloads( $this->get_id() );
	}
	return apply_filters( 'woocommerce_customer_get_downloadable_products', $downloads );
}

/***************** Meta *****************/

function parent_cat( $cat_id ){
	          global $wpdb;  
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$cat_id'"); 
              foreach($result_link as $r){ 

                      $parent = $r->parent;                      
              }
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$parent'"); 
              foreach($result_link as $r)
              {
                      $value = $r->name;                      
              }
              return $value;

}

/************* Buscar ****************************/

wp_enqueue_script( 'mi-script-ajax',get_bloginfo('stylesheet_directory') . '/js/ajax-search.js', array( 'jquery' ) ); 
wp_localize_script( 'mi-script-ajax', 'MyAjax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

wp_enqueue_script( 'mi-script-form',get_bloginfo('stylesheet_directory') . '/js/form.js', array( 'jquery' ) ); 
wp_localize_script( 'mi-script-form', 'MyAjaxform', array( 'url' => admin_url( 'admin-ajax.php' ) ) );


function add_async_attribute($tag, $handle) {
	// agregar los handles de los scripts en el array
	$scripts_to_async = array('mi-script-ajax', 'mi-script-form', 'ajax-login-script');
	 
	foreach($scripts_to_async as $async_script) {
	   if ($async_script === $handle) {
		  return str_replace(' src', ' defer src', $tag);
	   }
	}
	return $tag;
 }
 add_filter('script_loader_tag', 'add_async_attribute', 10, 2);


 
add_action('wp_ajax_buscar_posts', 'buscar_posts_callback');
add_action('wp_ajax_nopriv_buscar_posts', 'buscar_posts_callback');


function buscar_programas_callback() {
     
    global $post;
     $i=0;
    $var = $_POST['cadena'];
    $cate = $_POST['cat'];
  }   
 
function buscar_posts_callback() {
    global $post;
    global $wpdb;
     $i=0;
    $var = $_POST['cadena'];
    $cate = $_POST['cat'];

    if( $cate != "productos" && $cate != "entrenador" && $cate != "tienda" && $cate != "entrenador_personalizado" && $cate != "blog" ){ 


    	echo '<div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>'; 


              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE slug = '$cate'"); 
              foreach($result_link as $r)
              {
                      $value = $r->term_id;                      
              }   
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_id = '$value'"); 
              foreach($result_link as $r)
              {
                      $parent = $r->parent;                      
              } 
              $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$parent'"); 
              foreach($result_link as $r)
              {
                      $parent_name = $r->slug;                      
              } 
                
if( $parent_name == "blog" ){ 

 echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>'; 
            $args = array(
              's' => $_POST['cadena'],
              'category_name' => $cate
              );
              $query = new WP_query($args);
              if( $query -> have_posts() ):
              while( $query -> have_posts() ):
                $query -> the_post(); 
                $post_thumbnail_id = get_post_thumbnail_id( $query->id );  
                $url = wp_get_attachment_url( $post_thumbnail_id);
            $post_thumbnail_id = get_post_thumbnail_id( $query->id );  
            $url = wp_get_attachment_url( $post_thumbnail_id);?>  
          <div class="col-md-4 item-blog" style="margin-top:50px">
            <div class="imagen-blog">
              <a href="<?php the_permalink();  ?>">
                <?php the_post_thumbnail('', array('class' => 'img-responsive'));  ?>
              </a>
            </div>

            <div class="content-item-blog">
              <a href="<?php the_permalink();  ?>"><h4><?php the_title(); ?></h4></a>
              <div class="details-item-blog row">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor.svg" />
                    <a href=""><?php the_author(); ?></a>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock.svg" />
                    <a href=""><?php the_time(get_option('date_format')); ?> </a>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file.svg" />
                    <a href=""><?php the_category(); ?></a>
                  </div>

              </div>
              <br />
              <div class="descrition-item-blog">
              <?php the_excerpt();  ?>
              </div>
            </div>
          </div>

                    
    <?php $i++; $conta++; endwhile; endif; ?>              
     <?php } ?>
    <!-- tienda -->
    <?php if( $parent_name == "tienda" ){ 
    $args = array( 'post_type' => 'product', 'product_cat' => $cate, 's' => $_POST['cadena']);     
    $myposts = get_posts( $args );
    echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>';   
    foreach( $myposts as $post ) :  setup_postdata($post); global $product;?>
          <?php foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                $cat = $category->name;               
               }
            $i++; 
            $subca = NULL;
                $producto = get_the_ID();
                $cat = NULL;

                $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_relationships WHERE object_id = '$producto' "); 
                foreach($result_link as $ra)
                {
                   $term_taxonomy_id = $ra->term_taxonomy_id;
                   $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."term_taxonomy WHERE term_taxonomy_id = '$term_taxonomy_id' AND taxonomy = 'product_cat' "); 
                   foreach($result_link as $re)
                   {  
                      $term_taxonomy_id2  = $re->term_taxonomy_id;
                      $result_link = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."terms WHERE term_id = '$term_taxonomy_id2' "); 
                    foreach($result_link as $res)
                      {
                        if ($res->slug == 'packs') {
                             $subca = 'packs';
                         } 
                      }  
                   }  
                 }               
          ?>    
    <!-- product -->

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>" >
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>" >
                                <div class="info-item-shop">
                                    
                                    <h5 class="title-item-shop" > <a href="<?php the_permalink() ?>" ><?php the_title(); ?></a> </h5>
                                    
                                    <?php if ($subca != 'packs') { ?>    
                                        <span class="price-item-shop" style="font-weight:600!important; color:#808285;"><?php echo $product->get_price_html(); ?></span>                    
                                   <?php } ?>
                                    <?php if ($subca == 'packs') { ?>    
                                        <span class="price-item-shop" style="font-weight:600!important; color:#808285;"><?php the_field('precio_producto_pack') ?>€</span>                    
                                   <?php } ?>                                   
                                    

                                </div>
                            </a>
                        </div>
                    </div>
           
        <?php endforeach; ?>
    <?php } ?>

<?php } ?>


   <?php if( $cate == "productos"){ 
echo '<div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>'; 
    $args = array( 'post_type' => 'product', 's' => $_POST['cadena']);     
    $myposts = get_posts( $args );
    echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>';   
    foreach( $myposts as $post ) :  setup_postdata($post); global $product;
       $post_pro = get_the_ID();
       foreach((get_the_terms($post_pro, 'duracion' )) as $category) 
       {                
            $categoria_p = $category->name;               
       }
    ?>
          <?php foreach((get_the_terms($post_pro, 'product_cat' )) as $category) {                
                $cat = $category->name;               
               }
            $i++;    
          ?>    
    <!-- product -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>">
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>">
                                <div class="info-item-shop">
                                    <p class="details-item-shop">
                                    <?php if ($cat == 'PROGRAMAS') {
                                    	echo "Programa"; echo $categoria_p;  
                                    }?>
                                    <?php if ($cat == 'ASESORÍAS') {
                                    	 echo "Entrenamiento + Dieta";
                                    }?>
                                    </p>
                                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles </a></span></div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span
                                                class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
                                    </div>

                                    <span>
                                        <form action="">                             
                                          <a class="btn-add-to-bag text-center" href="?add-to-cart=<?php echo get_the_ID(); ?>"><span class="icon-add-to-bag"><img src="<?php echo get_bloginfo('template_directory') ?>/images/icons/icon-bag.svg" alt="Add to bag"></span> AGREGAR A LA BOLSA</a>                              
                                        </form>
                                    </span>

                                </div>
                            </a>
                        </div>
                    </div>    
    <!-- end product -->        
           
        <?php endforeach; ?>
        <?php } ?>
 
    <!-- tienda -->
    <?php
    if( $cate != "entrenador" && $cate == "tienda"){ 
echo '<div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>'; 
    $args = array( 'post_type' => 'product', 'product_cat' => 'TIENDA', 's' => $_POST['cadena']);     
    $myposts = get_posts( $args );
    echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>';   
    foreach( $myposts as $post ) :  setup_postdata($post); global $product;?>
          <?php foreach((get_the_terms($post_id, 'product_cat' )) as $category) {                
                $cat = $category->name;               
               }
            $i++;    
          ?>    
    <!-- product -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item-shop">
                            <a href="<?php the_permalink() ?>">
                                <img class="img-responsive" src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title(); ?>">
                                <div class="info-item-shop">
                                    <p class="details-item-shop">
                                    <?php if ($cat == 'PROGRAMAS') {
                                    	 the_field('duracion'); 
                                    }?>
                                    <?php if ($cat == 'ASESORÍAS') {
                                    	 echo "Entrenamiento + Dieta";
                                    }?>
                                    </p>
                                    <h5 class="title-item-shop"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><span class="view-details"><a href="<?php the_permalink() ?>">Ver detalles </a></span></div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right"><span
                                                class="price-item-shop"><?php echo $product->get_price_html(); ?></span></div>
                                    </div>

                                    <span>
                                        <form action="">                             
                                          <a class="btn-add-to-bag text-center" href="?add-to-cart=<?php echo get_the_ID(); ?>"><span class="icon-add-to-bag"><img src="<?php echo get_bloginfo('template_directory') ?>/images/icons/icon-bag.svg" alt="Add to bag"></span> AGREGAR A LA BOLSA</a>                              
                                        </form>
                                    </span>

                                </div>
                            </a>
                        </div>
                    </div>  
           
        <?php endforeach; ?>
        <?php } ?>

    <!-- entrenador -->
    <?php
    if( $cate == "entrenador" ){ 
    	echo '<div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>'; 
                echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>';   
    $args = array( 'post_type' => 'entrenador', 's' => $_POST['cadena']);     
                        $argsBanner = array( 'post_type' => 'entrenador', 's' => $_POST['cadena'], 'meta_key' => 'personalizados', 'meta_value' => 'No' ); 
                        $Banners = new WP_Query($argsBanner);   
                        if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                            $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                            $url = wp_get_attachment_url( $post_thumbnail_id);
                        ?>                             

                        <div class="col-md-5 col-sm-3 col-xs-4 no-padding">
                            <div class="trainer-item-page">
                                 <a href="<?php echo the_permalink() ?>">
                                 
                                     <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                     <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                 
                                 </a>
                            </div>
                        </div>
    <?php $i++; endwhile; endif; ?> 
        <?php } ?>
 <!-- end entrenador -->     
 <!-- entrenador persoalizado-->
    <?php
    if( $cate == "entrenador_personalizado" ){ 
    	echo '<div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>'; 
                echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>';   
    $args = array( 'post_type' => 'entrenador', 's' => $_POST['cadena']);     
                        $argsBanner = array( 'post_type' => 'entrenador', 's' => $_POST['cadena'], 'meta_key' => 'personalizados', 'meta_value' => 'Si' ); 
                        $Banners = new WP_Query($argsBanner);   
                        if ($Banners->have_posts()) : while($Banners->have_posts() ) : $Banners->the_post();  
                            $post_thumbnail_id = get_post_thumbnail_id( $Banners->id );  
                            $url = wp_get_attachment_url( $post_thumbnail_id);
                        ?>                             

                        <div class="col-md-5 col-sm-3 col-xs-4 no-padding">
                            <div class="trainer-item-page">
                                 <a href="<?php echo the_permalink() ?>">
                                 
                                     <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                                     <h4 class="name-trainer-item-page"><?php the_title(); ?></h4>
                                 
                                 </a>
                            </div>
                        </div>
    <?php $i++; endwhile; endif; ?> 
        <?php } ?>
 <!-- end entrenador -->  

    <!-- blog -->
    <?php
    if( $cate == "blog" ){  $conta = 0;
    	echo '<div id="cargando" style="display:none;margin-top:20px"><center><svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-pbo">

    <circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke="{{config.stroke}}"
        ng-attr-stroke-width="{{config.innerWidth}}" ng-attr-stroke-linecap="{{config.linecap}}" fill="none" r="30"
        stroke="#cc2531" stroke-width="5" stroke-linecap="square" transform="rotate(18.2736 50 50)">
        <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;180 50 50;720 50 50"
            keyTimes="0;0.5;1" dur="1.3s" begin="0s" repeatCount="indefinite"></animateTransform>
        <animate attributeName="stroke-dasharray" calcMode="linear"
            values="18.84955592153876 169.64600329384882;150.79644737231007 37.6991118430775;18.84955592153876 169.64600329384882"
            keyTimes="0;0.5;1" dur="1.3" begin="0s" repeatCount="indefinite"></animate>
    </circle>
</svg></center></div>'; 
                echo ' <div class="col-xs-12">
                <h4 style="color:#000 !important;margin-bottom: 30px;">Resultados para: '.$var.'</h4></div>';       
              $args = array(
              's' => $_POST['cadena'],
              'category_name' => 'Blog'
              );
              $query = new WP_query($args);
              if( $query -> have_posts() ):
              while( $query -> have_posts() ):
                $query -> the_post(); 
                $post_id = get_the_ID();
                foreach((get_the_terms($post_id, 'category' )) as $category) 
                {                
                     $categoria = $category->name;       
                     $category_id = $category->term_id;           
                }
                $category_link = get_category_link( $category_id );            
                $post_thumbnail_id = get_post_thumbnail_id( $query->id );  
                $url = wp_get_attachment_url( $post_thumbnail_id);
                $post_thumbnail_id = get_post_thumbnail_id( $query->id );  
                $url = wp_get_attachment_url( $post_thumbnail_id);?>                             

                    <?php  if ($conta<2){ ?>

                    <div class="col-md-6 col-sm-6 new-item-6 no-padding">

                        <div class="new-item-6-img">

                          <a href="<?php echo the_permalink() ?>">
                            <img class="new-item-img-zoom" src="<?php echo $url ?>" alt="<?php the_title() ?>">
                          </a>
                        </div>
     
                     <div class="new-item-6-meta">
     
                         <h2 class="new-item-6-title">
                           <a href="<?php the_permalink();  ?>"><?php the_title(); ?> <?php echo $category->cat_term_id; ?></a>
                         </h2>
                  
                         <div class="details-item-blog">
                             <div class="author-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor-white.svg" />
                                 <?php the_author_posts_link(); ?>
                             </div>
                             <div class="date-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock-white.svg" />
                               <a href=""><?php the_time(get_option('date_format')); ?></a>
                             </div>
                             <div class="category-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file-white.svg" />
                               <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                             </div>
                         </div>
 
                     </div>
 
                     <a class="link-new-item-blog" href="<?php the_permalink();  ?>"></a>
 
                    </div>                    
                    <?php  }  ?>                
                    <?php  if ($conta>=2 AND $conta <5){ ?>
                    <div class="col-md-4 col-sm-6 new-item-6 no-padding">
                        <div class="new-item-6-img">
                          <a href="<?php echo the_permalink() ?>">
                            <img class="new-item-img-zoom" src="<?php echo $url ?>" alt="<?php the_title(); ?>">
                          </a>
                        </div>     
                     <div class="new-item-6-meta">     
                         <h2 class="new-item-4-title">
                           <a href="<?php echo the_permalink() ?>"><?php the_title() ?></a>
                         </h2>
                  
                         <div class="details-item-blog">
                             <div class="author-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor-white.svg" />
                              <?php the_author_posts_link(); ?>
                             </div>
                             <div class="date-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock-white.svg" />
                               <a href=""><?php the_time(get_option('date_format')); ?></a>
                             </div>
                             <div class="category-detail">
                               <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file-white.svg" />
                               <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                             </div>
                         </div>
 
                     </div> 
                     <a class="link-new-item-blog" href="<?php echo the_permalink() ?>"></a> 
                    </div>
                    <div class="visible-sm clearfix"></div>
                     <?php  }  ?> 
                      <div class="visible-sm clearfix"></div>


                     <?php if($conta>=5) { ?>
          <div class="col-md-4 item-blog" style="margin-top:50px">
            <div class="imagen-blog">
              <a href="<?php the_permalink();  ?>">
                <?php the_post_thumbnail('', array('class' => 'img-responsive'));  ?>
              </a>
            </div>

            <div class="content-item-blog">
              <a href="<?php the_permalink();  ?>"><h4><?php the_title(); ?></h4></a>
              <div class="details-item-blog row">
                  <div class="author-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-autor.svg" />
                    <?php the_author_posts_link(); ?>
                  </div>
                  <div class="date-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-clock.svg" />
                    <a href=""><?php the_time(get_option('date_format')); ?> </a>
                  </div>
                  <div class="category-detail">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/icons/icon-file.svg" />
                    <a href="<?php echo $category_link; ?>"><?php echo $categoria; ?></a>
                  </div>

              </div>
              
              <div class="descrition-item-blog">
              <?php the_excerpt();  ?>
              </div>
            </div>
          </div>

                     <?php } ?>
    <?php $i++; $conta++; endwhile; endif; ?> 


        <?php } ?>
 <!-- end blog -->    

       <?php 	
        if ($i == 0) {
        	echo '<div class="col-md-12"><p>No hay resultados</p></div>';
        }
    die(); // 
}