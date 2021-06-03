<?php
/*
 * Template Name: Custom Full Width
 * description: >-
  Full width page template without  title, ft. image or sidebar - sponsors in footer
 */
get_header('fullwidth'); ?>

<?php if ( have_posts() ) : ?>
	
	<div id="primary" class="full-width-content">
		<main id="main" class="site-main" role="main">

		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/richtext', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
        ?>
      
		</main><!-- #main -->
	</div><!-- #primary -->

<?php endif; ?>

<?php get_template_part( 'template-parts/page/sponsors', 'page' ); ?>
<?php get_footer('fullwidth'); ?>
