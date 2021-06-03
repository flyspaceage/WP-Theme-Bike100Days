<?php
/*
 * Template Name: About Page Template
 * description: >-
  Page template without sidebar and full-width
 */
get_header('fullwidth'); ?>

<?php if ( have_posts() ) : ?>

	<?php if ( get_theme_mod('page_style', 'fimg-classic') == 'fimg-fullwidth' ) : ?>
		<div class="featured-image">
			<div class="entry-header">
				<?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
			</div>
			<?php if ( has_post_thumbnail() && get_theme_mod('page_has_featured_image', 1) ) : ?>
				<figure class="entry-thumbnail">
					<?php the_post_thumbnail('type-fullwidth'); ?>
				</figure>
			<?php endif; // Featured Image ?>
		</div>
	<?php endif; ?>
	
	<div id="primary" class="full-width-content">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			</div>

			<section class="what-we-do text-center">
				<div class="container">
					<h2>OUR GOALS</h2>
					<div class="row">
						<div class="col-md-4 col-sm-12 order-md-2">
							<i class="fas fa-biking"></i>
							<h3>Bike Rides</h3>
							<p>All-inclusive bike rides for riders of all levels, everyone's invited!</p>
						</div>
						<div class="col-md-4 col-sm-12 order-md-1">
							<i class="fas fa-users-cog"></i>
							<h3>Community Engagment</h3>
							<p>Connecting the Milwaukee community by hosting and participating in bicycling events.</p>
						</div>
						<div class="col-md-4 col-sm-12 order-md-3">
							<i class="fas fa-university"></i>
							<h3>Policy Advocacy</h3>
							<p>Utilizing the power of grassroots activism to advocate for bike-centric urban planning.</p>
						</div>
					</div>
				</div>
			</section>
			<!--<br><br>
			<section class="featured-events container">
			<h2>OUR VIBE</h2>
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<img class="card-img-top" src="http://www.bike100days.com/wp-content/uploads/2020/10/tuesday-night-rides.jpg" alt="Tuesday Night Rides">
							<div class="card-body">
								<h5 class="card-title">Tuesday Night Rides</h5>
								<p class="card-text">Every Tuesday night, ride proceeds in rain, shine or snow. Roll out @ 7pm from Purple Door, slow roll, no drop ride.</p>
								<a href="https://www.facebook.com/mketnr/" class="btn btn-link" target="_blank">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<img class="card-img-top" src="http://www.bike100days.com/wp-content/uploads/2020/10/wheelie-wednesday-calling-statue.jpg" alt="Wheelie Wednesday">
							<div class="card-body">
								<h5 class="card-title">Wheelie Wednesday</h5>
								<p class="card-text">Every Wednesday weather permitting. Meet @ The Calling Statue aka O’Donnell Park by 7pm</p>
								<a href="https://www.facebook.com/millymob414/" class="btn btn-link" target="_blank">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card">
							<img class="card-img-top" src="http://www.bike100days.com/wp-content/uploads/2020/10/saternalia.jpg" alt="Saternalia: Holy Hill">
							<div class="card-body">
								<h5 class="card-title">Saternalia: Holy Hill</h5>
								<p class="card-text">Join us on Saturday's for a group ride to Holy Hill. Expect a fast pace and lots of hills on an 80 mile route.</p>
								<a href="https://www.facebook.com/bike100days" class="btn btn-link" target="_blank">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<br><br>
			<section class="sponsors text-center">
				<div class="container">
					<h2>SUPPORT OUR SPONSORS</h2>
					<div class="row">
						<div class="col-md-4">
							<a class="sponsor" href="https://www.bicyclebenefits.org/" target="_blank">
								<img src="http://www.bike100days.com/wp-content/uploads/2020/10/bicyclebenefits-logo.png" alt="Bicycle Benefits">
								<h3>Bicycle Benefits</h3>
								<p>Discounts for riding your bike at businesses throughout the U.S.</p>
							</a>
						</div>
						<div class="col-md-4">
							<a class="sponsor" href="https://bublrbikes.org/" target="_blank">
								<img src="http://www.bike100days.com/wp-content/uploads/2020/10/bublr-bikes-logo.png" alt="Buble Bikes">
								<h3>Bublr Bikes</h3>
								<p>Greater Milwaukee's nonprofit bike share program for all.</p>
							</a>
						</div>
						<div class="col-md-4">
							<a class="sponsor" href="http://www.vulturespace.org/" target="_blank">
								<img src="http://www.bike100days.com/wp-content/uploads/2020/10/vulture-space-logo.png" alt="Vulture Space">
								<h3>Vulture Space</h3>
								<p>Hands-on bicycle workshop & recyclery located in downtown Milwaukee.</p>
							</a>
						</div>
					</div>
				</div>
			</section>-->
			


		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php endif; ?>

<?php //get_sidebar(); ?>
<?php get_footer('fullwidth'); ?>
