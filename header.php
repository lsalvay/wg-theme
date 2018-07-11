<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container-fluid bg-dark">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark container">
		  <a class="navbar-brand" href="#">
		    <img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
		    Bootstrap
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <?php 
		  	wp_nav_menu(
			  array(
			    'theme_location' => 'menu-1',
			    'container' => 'div',
			    'container_class' => 'collapse navbar-collapse',
			    'container_id' => 'navbarSupportedContent',
			    'items_wrap' => '<ul class="navbar-nav ml-auto">%3$s</ul> ',
			    'menu_class' => 'nav-item'
			  )
			);
		  ?>

		</nav>
	</div>