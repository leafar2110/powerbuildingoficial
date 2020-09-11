<?php
/*
Plugin Name: Activación votaciones
Description: Plugins solo para uso interno
Author: Misledy Alastre
Author URI: http://misleportafolio.webcindario.com/
Version: 1.0
License: GPLv2
*/
defined( 'ABSPATH' ) or die( '¡Sin trampas!' );
define('dir_inc_path', dirname(__FILE__));
define('dir_inc', dir_inc_path . '/inc');

require_once( dir_inc . '/menu_votacion.php' ); 
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


?>