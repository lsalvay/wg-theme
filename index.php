<?php get_header();?>
<div class="container">
	<div class="row">
		<div class="col text-center"><h1>Hola Mundo con Wordpress</h1></div>
	</div>

</div>
<div class="container">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="col-12 col-sm-6 col-md-4 mb-3">	
			<div class="card" style="width: 18rem;">
			  <img class="card-img-top" src=" <?php the_post_thumbnail_url( 'thumbnail' ); ?> " alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title"><?php the_title(); ?></h5>
			    <p class="card-text"><?php the_content(); ?></p>
			    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Go somewhere</a>
			  </div>
			</div>
			</div>
			<?php endwhile; else : ?>
			<!-- The very first "if" tested to see if there were any Posts to -->
		 	<!-- display.  This "else" part tells what do if there weren't any. -->
		 	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>


		 	<!-- REALLY stop The Loop. -->
		 <?php endif; ?>
	</div>
</div>
<?php get_footer();?>