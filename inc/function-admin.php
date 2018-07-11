<?php

/*
@package wg
==========================
	ADMIN PAGE
==========================
*/

function wg_add_admin_page(){

	//Generate WG Admin Page
	add_menu_page( 'WG Options', 'WG', 'manage_options', 'options_wg', 'wg_theme_create_page','dashicons-admin-customizer', 110 );

	//Generate WG Admin Sub Pages
	add_submenu_page( 'options_wg', 'WG Options', 'General', 'manage_options', 'options_wg', 'wg_theme_create_page' );
	add_submenu_page( 'options_wg', 'WG CSS Options', 'Custom CSS', 'manage_options', 'options_wg_css', 'wg_theme_settings_page' );	

	//Activate custom settings
	add_action( 'admin_init', 'wg_custom_settings');

}
add_action('admin_menu', 'wg_add_admin_page');

function wg_custom_settings(){
	register_setting( 'wg-settings-group', 'option_1', 'wg_sanitize_option_1' );
	register_setting( 'wg-settings-group', 'option_2' );
	register_setting( 'wg-settings-group', 'option_3' );
	add_settings_section( 'wg-general-options', 'General Options', 'wp_general_options', 'options_wg' );
	add_settings_field( 'option_1_field', 'Option 1', 'wg_option_1', 'options_wg', 'wg-general-options' );
	add_settings_field( 'option_2_field', 'Option 2', 'wg_option_2', 'options_wg', 'wg-general-options' );
	add_settings_field( 'option_3_field', 'Option 3', 'wg_option_3', 'options_wg', 'wg-general-options' );
	
}

function wp_general_options(){
	echo 'Costomize your General Information';
}

function wg_option_1(){
	$option_1 = esc_attr( get_option('option_1') );
	echo '<input type="text" name="option_1" value="'.$option_1.'" placeholder="Option 1" /><p class="description">Ingrese la opción 1 del Theme WG</p>';
}

function wg_option_2(){
	$option_2 = esc_attr( get_option('option_2') );
	echo '<input type="text" name="option_2" value="'.$option_2.'" placeholder="Option 2" /><p class="description">Ingrese la opción 2 del Theme WG</p>';
}

function wg_option_3(){
	$option_3 = esc_attr( get_option('option_3') );
	echo '<input type="text" name="option_3" value="'.$option_3.'" placeholder="Option 3" /><p class="description">Ingrese la opción 3 del Theme WG</p>';
}

//Sanitization settings
function wg_sanitize_option_1($input){
	$output = sanitize_text_field( $input );
	return $output;
}

function wg_theme_create_page(){
	require_once( get_template_directory() . '/inc/templates/wg-admin.php');

}
function wg_theme_settings_page(){

}

?>