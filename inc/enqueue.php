<?php

/*
@package wg
==========================
	ADMIN ENQUEUE
==========================
*/

function wg_load_admin_scripts($hook){
	if('toplevel_page_options_wg' != $hook ){
		return;
	}
	wp_register_style( 'wg_admin', get_template_directory_uri() . '/css/wg.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'wg_admin' );
}
add_action( 'admin_enqueue_scripts', 'wg_load_admin_scripts' );