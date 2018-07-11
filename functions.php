<?php 

require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';

if ( ! function_exists( 'wg_setup' ) ) :
	// Configura los valores predeterminados del tema y registra el soporte para varias características de WordPress.
	// Tenga en cuenta que esta función está enganchada en el enganche after_setup_theme, que
	// se ejecuta antes del gancho de inicio. El gancho de inicio es demasiado tarde para algunas funciones, como
	// como indicando soporte para las miniaturas de publicación.
	function wg_setup() {
		/*
		* Haga que el tema esté disponible para la traducción.
		* Las traducciones se pueden archivar en el directorio / languages ​​/.
		* Si está creando un tema basado en wg, use un buscar y reemplazar
		* para cambiar 'wg' al nombre de su tema en todos los archivos de plantilla.
		 */
		load_theme_textdomain( 'wg', get_template_directory() . '/languages' );

		// Agregue publicaciones predeterminadas y comentarios enlaces de fuentes RSS a la cabeza.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Deje que WordPress administre el título del documento.
		* Al agregar compatibilidad con temas, declaramos que este tema no usa un
		* etiqueta codificada <título> en el encabezado del documento, y espera que WordPress
		* proporciónalo para nosotros.
		 */
		add_theme_support( 'title-tag' );

		/* 
		* Habilite la compatibilidad para Publicar miniaturas en publicaciones y páginas.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Este tema usa wp_nav_menu () en una ubicación.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Principal', 'wg' ),
		) );

		add_filter('nav_menu_link_attributes', 'clase_menu_invento', 10, 3);

		function clase_menu_invento ($atts, $item, $args){
			$class = 'nav-link';
			$atts['class'] = $class;
			return $atts;
		}

		/* 
		* Cambiar el marcado básico predeterminado para el formulario de búsqueda, el formulario de comentarios y los comentarios
		* para generar HTML5 válido.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Añadir compatibilidad con temas para la actualización selectiva de widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		* Agregue soporte para el logotipo personalizado central.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wg_setup' );

// Agregamos un area de Widgets

function wg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wg' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wg' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wg_scripts() {
	wp_enqueue_style( 'wg-style', get_stylesheet_uri() );

	wp_enqueue_style( 'wg-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_script( 'wg-jquery', get_template_directory_uri() . '/js/jquery.js');

	wp_enqueue_script( 'wg-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wg_scripts' );


?>