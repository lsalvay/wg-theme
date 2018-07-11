<h1>WG Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php 
		settings_fields('wg-settings-group');
		do_settings_sections( 'options_wg' );
		submit_button( 'Guardar Cambios');

	 ?>
	
</form>