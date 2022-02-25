<?php
/*
	Plugin Name:	Leader API
	Plugin URI:		https://weallleaders.co.il
	Description: 	Leader API connection
	Author: 		Hosam Monayer
	Author URI: 	https://www.linkedin.com/in/hosam-monayer-49558b53/
	Version: 		4.1.1
	Text Domain: 	Leader
	License: 		GPLv3
*/

defined( 'ABSPATH' ) or die( 'Unauthorized Access!' );
/**********************************************
plugin links
**********************************************/
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'leaderAddActionLinks' );
 
function leaderAddActionLinks ( $actions ) {
   $mylinks = array(
      '<a href="' . admin_url( 'options-general.php?page=leaderApiConnection' ) . '">Settings</a>',
   );
   $actions = array_merge( $actions, $mylinks );
   return $actions;
}
/**********************************************
include files
**********************************************/
include(plugin_dir_path(__FILE__) . 'includes/api.php');
/**********************************************
register
**********************************************/
function registerLeaderApi() {
    add_option( 'leaderApi_token', '');
	add_option( 'leaderApi_client_id', '');
	add_option( 'leaderApi_leader_id', '');
    register_setting( 'leaderApi_options_group', 'leaderApi_token', 'leaderApi_callback' );
	register_setting( 'leaderApi_options_group', 'leaderApi_client_id', 'leaderApi_callback' );
	register_setting( 'leaderApi_options_group', 'leaderApi_leader_id', 'leaderApi_callback' );
}
add_action( 'admin_init', 'registerLeaderApi' );

//---------------------------------------------

function registerLeaderApiRegisterPage() {
    add_options_page(
        'Leader - חיבור מערכת',
        'LeaderApi',
        'manage_options',
		'leaderApiConnection',
        'LeaderApiPage'
    );
}
add_action('admin_menu', 'registerLeaderApiRegisterPage');

//---------------------------------------------
function LeaderApiPage() {
    include(plugin_dir_path(__FILE__) . 'includes/admin-page.php');
}
