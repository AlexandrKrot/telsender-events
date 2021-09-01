<?php

/**
 * @package HOT
 * @version 0.1
 */
/*
Plugin Name: Telsender Events
Description:
Author: Pechenki
Version: 0.1
Author URI: https://pechenki.top/
*/
//////////////////////////////////
if ( ! defined( 'ABSPATH' )  &&  !defined( 'TELSENDER_DIR' )) {
    exit;
}
define( 'TELSENDEREvent_DIR', plugin_dir_path( __FILE__ ) );
define( 'TELSENDEREvent_DIR_NAME', dirname( plugin_basename( __FILE__ ) ) );
define( 'TSCFWCEvent_SETTING', 'tsev__globalSetind' );



require_once( TELSENDEREvent_DIR . 'autoload.php' );




// Регистрируем хук через
// add_action( $tag, $function_to_add, $priority, $accepted_args );
add_action( 'telsender_init', function($Telsender){
    $TelsenderEvent = new pechenki\TelsenderEvent\src\TelsenderEvent($Telsender);
}, 10, 2 );